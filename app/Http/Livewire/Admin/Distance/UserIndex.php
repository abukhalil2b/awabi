<?php

namespace App\Http\Livewire\Admin\Distance;

use App\Models\User;
use Livewire\Component;

class UserIndex extends Component
{
    public $listeners = ['refreshUser'=>'$refresh'];

    public function render()
    {
        $users = User::where('app','distance')->get();

        return view('livewire.admin.distance.user-index',['users'=>$users]);
    }
}
