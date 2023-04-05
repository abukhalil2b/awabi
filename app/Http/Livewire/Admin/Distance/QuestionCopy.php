<?php

namespace App\Http\Livewire\Admin\Distance;

use App\Models\Question;
use Livewire\Component;

class QuestionCopy extends Component
{
    public $cate;

    public $questions = [];

    public function copy($questionId, $cateId)
    {
        Question::where('id', $questionId)->update([
            'app' => 'distance',
            'cate_id' => $cateId
        ]);

        $this->questions = Question::where(['app' => 'attendance', 'status' => 'close'])
            ->select('id', 'content')
            ->get();

    }

    public function mount()
    {
        $this->questions = Question::where(['app' => 'attendance', 'status' => 'close'])
            ->select('id', 'content')
            ->get();
    }

    public function render()
    {
        return view('livewire.admin.distance.question-copy', ['questions' => $this->questions]);
    }
}
