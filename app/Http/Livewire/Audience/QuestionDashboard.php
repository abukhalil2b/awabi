<?php

namespace App\Http\Livewire\Audience;

use App\Models\AudienceAnswer;
use App\Models\AudienceQuestion;
use Livewire\Component;

class QuestionDashboard extends Component
{

    public AudienceQuestion $audienceQuestion;

    public  $answers = [];

    public $showTimer = false;
    
    public $showAnswer = false;
    
    public function getQuestion($id)
    {
        AudienceAnswer::truncate();

        $this->audienceQuestion = AudienceQuestion::find($id);

        $this->audienceQuestion->status = 'open';

        $this->audienceQuestion->save();

        $this->showTimer = true;
    }

    public function getAnswers(){
        $this->showTimer = false;

        $this->showAnswer = true;

        $this->audienceQuestion->status = 'close';

        $this->audienceQuestion->save();

        $this->answers = AudienceAnswer::where('point',1)
        ->limit(15)
        ->get();
    }


    public function render()
    {
        $questions = AudienceQuestion::select('id','status')->get();

        return view('livewire.audience.question-dashboard', ['questions' => $questions])
            ->extends('layouts.attendance');
    }
}
