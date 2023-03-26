<?php

namespace App\Http\Livewire\Admin\Distance;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UserUpdate extends Component
{
    public User $user;

    public function mount(User $user)
    {
        $this->user = $user;
    }

    public function updatePassword()
    {
        $this->user->password = Hash::make($this->user->phone);

        $this->user->plain_password = $this->user->phone;

        $this->user->save();
    }

    public function render()
    {
        return view('livewire.admin.distance.user-update');
    }
}
