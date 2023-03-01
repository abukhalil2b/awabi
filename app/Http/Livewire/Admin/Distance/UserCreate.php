<?php

namespace App\Http\Livewire\Admin\Distance;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UserCreate extends Component
{


    public $phone = '';

    protected $rules = [
        'phone' => ['required', 'unique:users']
    ];

    public function save()
    {

        $this->validate();

        $phone = $this->phone;

        $email =   $this->phone . '@gmail.com';

        $password =  Hash::make($this->phone);

        $plain_password = $this->phone;

        User::create([
            'app'   =>  'distance',
            'phone' =>  $phone,
            'email' =>  $email,
            'password' =>  $password,
            'plain_password' =>  $plain_password,
        ]);

        $this->phone = '';

        $this->emit('refreshUser');
    }

    public function render()
    {
        return view('livewire.admin.distance.user-create');
    }
}
