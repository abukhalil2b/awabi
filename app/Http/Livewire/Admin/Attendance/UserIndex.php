<?php

namespace App\Http\Livewire\Admin\Attendance;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UserIndex extends Component
{

    public $listeners = ['refreshUser'=>'$refresh'];

    public function resetPassword()
    {
        $pass = rand(100000,999999);
        
        User::where('app','attendance')->update([
            'password' => Hash::make($pass),
            'plain_password' => $pass,
        ]);
    }

    public function render()
    {
        $users = User::where('app','attendance')->get();

        return view('livewire.admin.attendance.user-index',['users'=>$users]);
    }
}
