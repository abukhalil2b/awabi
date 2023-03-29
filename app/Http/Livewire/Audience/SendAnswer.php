<?php

namespace App\Http\Livewire\Audience;

use App\Models\AudienceAnswer;
use App\Models\AudienceQuestion;
use Livewire\Component;

class SendAnswer extends Component
{
    public $show = false;

    public $questionOpen = false;

    public $question;

    public $phone;

    public $message = '';

    public function answer($choice)
    {
        $point = 0;

        $question = AudienceQuestion::first();

        if (!$question) {
            return;
        }

        $answered = AudienceAnswer::where('phone', $this->phone)->first();

        if ($answered) {
            return;
        }

        if ($choice == $question->ans) {
            $point = 1;
        }

        AudienceAnswer::create([
            'phone' => $this->phone,
            'ans' => $choice,
            'point' => $point
        ]);

        $this->questionOpen = false;
    }

    public function checkOldAnswer()
    {
        $answered = AudienceAnswer::where('phone', $this->phone)->first();

        if ($answered) {
            return;
        }

        $this->show = true;

        $this->question = AudienceQuestion::where('status', 'open')
            ->latest('id')
            ->select('A', 'B', 'C', 'D')->first();
    }

    public function mount()
    {
        $question = AudienceQuestion::where('status', 'open')
            ->latest('id')
            ->select('A', 'B', 'C', 'D')->first();

        if ($question) {
            $this->questionOpen = true;
        }
    }

    public function render()
    {
        return view('livewire.audience.send-answer')->layout('layouts.audience');
    }
}
