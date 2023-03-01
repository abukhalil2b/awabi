<?php

namespace App\Http\Livewire\Admin\Attendance;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class UserCreate extends Component
{

    public User $user;

    protected $rules = [
        'user.name' => 'required',
        'user.phone' => 'required'
    ];

    public function mount()
    {
        $this->user = new User();
    }


    public function save()
    {

        $this->validate();

        $this->user->app = 'attendance';

        $this->user->email = $this->user->phone . '@gmail.com';

        $this->user->password = Hash::make($this->user->phone);

        $this->user->plain_password = $this->user->phone;

        $this->user->save();

        $this->emit('refreshUser');

    }

    public function render()
    {
        return view('livewire.admin.attendance.user-create');
    }
}
