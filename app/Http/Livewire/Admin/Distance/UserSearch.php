<?php

namespace App\Http\Livewire\Admin\Distance;

use App\Models\User;
use App\Models\Whatsapp;
use Livewire\Component;

class UserSearch extends Component
{
    public $users = [];

    public $phone;

    public $whatsappText = '';

    public function mount()
    {
        $whatsapp = Whatsapp::first();
        
        if($whatsapp){

            $this->whatsappText = $whatsapp->text;
        }
    }
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
        return view('livewire.admin.distance.user-search')->layout('layouts.admin');
    }
}
