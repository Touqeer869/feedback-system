<?php

namespace App\Livewire\Feedback;

use App\Models\Category;
use App\Models\Feedback;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $filters = [];
    public $categories;
    public $per_page;
    public $modal = false;
    public $feedback_detail;
    public $category_detail;
    public $user;
    public $comments = [];

    protected $rules = [
      'comments.date' => 'date'
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

    public function popup($feedback_id)
    {
        $feedback_detail = Feedback::find($feedback_id);
        $category_detail = Category::where('id',$feedback_detail->category_id)->get()->first();
        $user = User::where('id',$feedback_detail->user_id)->get()->first();
        $this->user = $user->toArray();
        $this->feedback_detail = $feedback_detail->toArray();
        $this->category_detail = $category_detail->toArray();
        $this->modal = true;
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
            ->select('fb.id as feedback_id','fb.title', 'cat.name as category', 'user.name as user')
            ->paginate($this->per_page);

        return view('livewire.feedback.index', [
            'feedbacks' => $feedbacks,
        ]);
    }

    public function addComment()
    {

    }
}
