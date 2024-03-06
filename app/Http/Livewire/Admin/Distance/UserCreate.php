<?php

namespace App\Http\Livewire\Admin\Distance;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UserCreate extends Component
{


    public $phone = '';

    public $message = '';

    protected $rules = [
        'phone' => ['required', 'unique:users']
    ];

    public function save()
    {

        $this->validate();

        $phone = $this->phone;

        $password =  Hash::make($this->phone);

        $user = User::create([
            'app'   =>  'distance',
            'phone' =>  $phone,
            'password' =>  $password,
            'plain_password' =>  $phone,
        ]);

        $this->phone = '';

        $this->emit('refreshUser');

        $this->message = ' تم إضافة المشارك' . $user->phone;
    }

    public function render()
    {
        return view('livewire.admin.distance.user-create');
    }
}
