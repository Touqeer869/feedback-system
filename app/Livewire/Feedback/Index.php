<?php

namespace App\Livewire\Feedback;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Feedback;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Locked;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $filters = [];
    public $categories;
    public $per_page;

    #[Locked]
    public $feedback_id;
    public $comment_modal = false;
    public $view_modal = false;
    public $feedback_detail;
    public $category_detail;
    public $comment_detail;
    public $user;
    public $comments = [];
    public $viewComment = false;
    public $status;


    protected $rules = [
        'comments.created_at' => 'required|date|date_equals:today',
        'comments.comment' => 'required',
    ];

    protected $validationAttributes = [
        'comments.created_at' => 'Date',
        'comments.comment' => 'Comment'
    ];

    public function mount()
    {
        $this->categories = Category::get();
        $this->per_page = 10;
    }


    public function search()
    {
        $this->resetPage();
    }

    public function clear()
    {
        $this->reset('filters');
    }

    public function commentModal($feedback_id)
    {
        $this->feedback_id = $feedback_id;
        $feedback_detail = Feedback::find($feedback_id);
        $category_detail = Category::where('id', $feedback_detail->category_id)->get()->first();
        $user = User::where('id', $feedback_detail->user_id)->get()->first();

        $this->user = $user->toArray();
        $this->feedback_detail = $feedback_detail->toArray();
        $this->category_detail = $category_detail->toArray();

        $this->comment_modal = true;
    }

    public function viewModal($feedback_id)
    {
        $feedback_detail = Feedback::find($feedback_id);
        $this->category_detail = Category::where('id', $feedback_detail->category_id)->get()->first()->toArray();
        $this->user = User::where('id', $feedback_detail->user_id)->get()->first()->toArray();
        $this->feedback_detail = $feedback_detail->toArray();

        $this->comment_detail = Comment::from('comments as c')
            ->leftJoin('users as user', 'user.id', '=', 'c.user_id')
            ->where('feedback_id', $feedback_id)
            ->select('user.name as created_by', 'c.comment', 'c.created_at')
            ->get();

        $this->view_modal = true;
    }

    public function render()
    {
        $feedbacks = Feedback::from('feedback as fb')
            ->leftjoin('categories as cat', 'cat.id', '=', 'fb.category_id')
            ->leftjoin('users as user', 'user.id', '=', 'fb.user_id')
            ->when(!empty($this->filters['title']), function ($q) {
                return $q->where('title', 'like', '%' . $this->filters['title'] . '%');
            })
            ->when(!empty($this->filters['category_id']), function ($q) {
                return $q->where('cat.id', $this->filters['category_id']);
            })
            ->when(!empty($this->filters['user']), function ($q) {
                return $q->where('user.name', 'like', '%' . $this->filters['user'] . '%');
            })
            ->orderBy('fb.created_at', 'desc')
            ->select('fb.id as feedback_id', 'fb.title', 'cat.name as category', 'user.name as user')
            ->paginate($this->per_page);

        return view('livewire.feedback.index', ['feedbacks' => $feedbacks]);
    }

    public function addComment()
    {
        $this->validate();

        $date = Carbon::now();
        $this->comments['created_at'] .= ' ' . $date->toTimeString();
        $this->comments['user_id'] = Auth::user()->id;
        $this->comments['feedback_id'] = $this->feedback_id;

        DB::beginTransaction();
        try {
            Comment::create($this->comments);
            DB::commit();
            session()->flash('success', 'Comment added successfully!');
            $this->reset('comments');
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
            DB::rollBack();
        }
    }
}
