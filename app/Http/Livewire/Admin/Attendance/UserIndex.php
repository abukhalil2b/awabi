<?php

namespace App\Http\Livewire\Admin\Attendance;

use App\Models\User;
use Livewire\Component;

class UserIndex extends Component
{

    public $listeners = ['refreshUser'=>'$refresh'];

    public function render()
    {
        $users = User::where('app','attendance')->get();

        return view('livewire.admin.attendance.user-index',['users'=>$users]);
    }
}
