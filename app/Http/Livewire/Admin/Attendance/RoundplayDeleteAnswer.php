<?php

namespace App\Http\Livewire\Admin\Attendance;

use Livewire\Component;
use App\Models\Roundplay;
use Illuminate\Support\Facades\DB;

class RoundplayDeleteAnswer extends Component
{
    public Roundplay $roundplay;

    public $answersCount;

    public function mount(Roundplay $roundplay){
        $this->roundplay = $roundplay;

        $this->answersCount = DB::table('answers')->where('roundplay_id',$roundplay->id)->count();
    }

    public function deleteAnswers()
    {
        DB::table('answers')->where('roundplay_id',$this->roundplay->id)->delete();

        $this->answersCount = DB::table('answers')->where('roundplay_id',$this->roundplay->id)->count();

    }


    public function render()
    {
        return view('livewire.admin.attendance.roundplay-delete-answer');
    }
}
