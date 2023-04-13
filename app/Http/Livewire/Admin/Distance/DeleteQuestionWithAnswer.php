<?php

namespace App\Http\Livewire\Admin\Distance;

use App\Models\Cate;
use App\Models\Answer;
use App\Models\Question;
use Livewire\Component;

class DeleteQuestionWithAnswer extends Component
{
    public $code = null;

    public $message = '';

    public Cate $cate;

    public function mount(Cate $cate)
    {
        $this->cate = $cate;
    }

    public function delete()
    {
        Answer::where([
            'app' => 'distance',
            'cate_id' => $this->cate->id
        ])->delete();

        Question::where([
            'app' => 'distance',
            'cate_id' => $this->cate->id
        ])->delete();

        $this->code = null;

        $this->message = 'تم الحذف';
    }

    public function render()
    {
        return view('livewire.admin.distance.delete-question-with-answer');
    }
}
