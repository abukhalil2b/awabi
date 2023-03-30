<?php

namespace App\Http\Livewire\Admin\Attendance;

use Livewire\Component;
use App\Models\Roundplay;
use Illuminate\Support\Facades\DB;

class RoundplayDeleteUser extends Component
{

    public Roundplay $roundplay;

    public $usersCount;

    public function mount(Roundplay $roundplay){
        $this->roundplay = $roundplay;

        $this->usersCount = DB::table('user_roundplay')->where('roundplay_id',$roundplay->id)->count();
    }

    public function deleteUsers()
    {

        DB::table('user_roundplay')->where('roundplay_id',$this->roundplay->id)->delete();

        $this->usersCount = DB::table('user_roundplay')->where('roundplay_id',$this->roundplay->id)->count();

    }

    public function render()
    {
        return view('livewire.admin.attendance.roundplay-delete-user');
    }
}
