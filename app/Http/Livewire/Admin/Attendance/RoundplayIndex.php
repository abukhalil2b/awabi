<?php

namespace App\Http\Livewire\Admin\Attendance;

use App\Models\Roundplay;
use Livewire\Component;

class RoundplayIndex extends Component
{

    public $listeners = ['refreshRoundplay'=>'$refresh'];

    public function render()
    {
        $roundplays = Roundplay::all();

        return view('livewire.admin.attendance.roundplay-index',['roundplays'=>$roundplays]);
    }
}
