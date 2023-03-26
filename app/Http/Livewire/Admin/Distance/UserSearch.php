<?php

namespace App\Http\Livewire\Admin\Distance;

use App\Models\User;
use Livewire\Component;

class UserSearch extends Component
{
    public $users = [];

    public $phone;

    public function search()
    {
        if ($this->phone) {

            $phones = explode("\n", $this->phone);
            // return $phones;
            $this->users =  User::whereIn('phone', $phones)
                ->whereNotIn('phone', [1, 2, 3])
                ->get();

        }

        // $this->users = User::where('phone','like','%' . $this->phone . '%')->get();
    }

    public function render()
    {
        return view('livewire.admin.distance.user-search')->layout('layouts.admin');
    }
}
