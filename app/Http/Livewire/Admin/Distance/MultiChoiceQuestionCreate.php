<?php

namespace App\Http\Livewire\Admin\Distance;

use Livewire\Component;
use App\Models\Cate;
use App\Models\Question;

class MultiChoiceQuestionCreate extends Component
{

    public Cate $cate;

    public $content;
    public $A;
    public $B;
    public $C;
    public $D;
    public $ans;
    public $duration = 30;
    public $img;

    protected $rules = [
        'content' => 'required',
        'A' => 'required',
        'B' => 'required',
        'C' => 'required',
        'D' => 'required',
        'ans' => 'required',
        'duration' => 'required'
    ];



    public function save()
    {

        $this->validate();

        Question::create([
            'content' =>  $this->content,
            'A' => $this->A,
            'B' => $this->B,
            'C' => $this->C,
            'D' => $this->D,
            'ans' => $this->ans,
            'duration' => $this->duration,
            'app' => 'distance',
            'type' => 'multiChoice',// correctAnswer - multiChoice
            'cate_id' => $this->cate->id,
        ]);


        // $this->emit('refreshQuestion');

        $this->dispatchBrowserEvent('close-question-creation', ['name' => 'create-question']);

    }

    public function render()
    {
        return view('livewire.admin.distance.multi-choice-question-create');
    }
}
