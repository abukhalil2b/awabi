<?php

namespace App\Http\Livewire\Admin\Attendance;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UserIndex extends Component
{

    public $listeners = ['refreshUser' => '$refresh'];

    public function resetPassword()
    {

        for ($i = 4; $i <= 40; $i++) {

            $pass = rand(1000, 9999);

            User::where('id', $i)->update([
                'password' => Hash::make($pass),
                'plain_password' => $pass,
            ]);
        }

        $this->emit('refreshUser');
    }

    public function resetName()
    {

        User::where('app', 'attendance')->update([
            'name' => NULL
        ]);

        $this->emit('refreshUser');
    }

    public function render()
    {
        $users = User::where('app', 'attendance')->get();

        return view('livewire.admin.attendance.user-index', ['users' => $users]);
    }
}
