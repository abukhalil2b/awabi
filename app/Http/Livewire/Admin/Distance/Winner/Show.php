<?php

namespace App\Http\Livewire\Admin\Distance\Winner;

use Livewire\Component;
use App\Models\User;

class Show extends Component
{

    public $users = [];

    public $phone;

    public function search()
    {
        if ($this->phone) {

            $phones = explode("\n", $this->phone);
            // return $phones;
            $this->users =  User::whereIn('phone', $phones)
                ->whereNotIn('phone', [1, 2, 3])//admin users
                ->get();

        }

        // $this->users = User::where('phone','like','%' . $this->phone . '%')->get();
    }

    public function render()
    {
        return view('livewire.admin.distance.winner.show')->layout('layouts.admin');
    }
}
