<?php

namespace App\Http\Livewire\Attendance;

use App\Models\Answer;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class SendAnswer extends Component
{

    public $question;

    public $user_id;

    public $roundplay_id;

    public $show = true;

    public function sendAnswer($selectedOption)
    {

        $correct = $selectedOption == $this->question->ans ? 1 : 0;

        $hasPermission = DB::table('user_roundplay')
            ->where(['user_id' => $this->user_id, 'roundplay_id' => $this->roundplay_id])
            ->first();

        if($hasPermission){

            Answer::create([
                'app' => 'attendance',
                
                'roundplay_id' => $this->question->cate_id,
                
                'question_id' => $this->question->id,
                
                'user_id' => $this->user_id,
                
                'ans' => $selectedOption,
                
                'correct' => $correct,
            ]);
        }

        $this->show = false;
    }

    public function render()
    {
        return view('livewire.attendance.send-answer');
    }
}
