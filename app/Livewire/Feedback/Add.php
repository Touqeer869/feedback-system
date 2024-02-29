<?php

namespace App\Livewire\Feedback;

use App\Models\Category;
use App\Models\Feedback;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Add extends Component
{
    public $categories;
    public $feedback = [];

    protected $rules = [
        'feedback.title'=>'required|string',
        'feedback.category_id'=>'required',
        'feedback.description'=>'required',
    ];
    protected $validationAttributes = [
        'feedback.title'=>'Title',
        'feedback.category_id'=>'Category',
        'feedback.description'=>'Description',
    ];
    public function mount()
    {
        $this->categories = Category::get();
    }
    public function render()
    {
        return view('livewire.feedback.add');
    }

    public function submitFeedback()
    {
        $this->feedback['user_id'] = Auth::user()->id;
        $this->validate();

        DB::beginTransaction();
        try {
            Feedback::create($this->feedback);
            DB::commit();
            session()->flash('success','Feedback submitted successfully');
            $this->reset('feedback');
        }catch (\Exception $e){
            $this->addError('error',$e->getMessage());
            DB::rollBack();
        }

    }
}
