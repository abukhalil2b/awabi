<?php

namespace App\Http\Livewire\Admin\Distance\Wincate;

use Livewire\Component;
use App\Models\Wincate;
use App\Models\Winner;


class Store extends Component
{

    public $title;

    public $wincates = [];

    public $phones;

    public function mount()
    {
        $this->wincates = Wincate::all();
    }

    public function storeWincate()
    {
        if ($this->title) {
            Wincate::create(['title' => $this->title]);

            $this->wincates = Wincate::all();

            $this->title = '';
        }
    }




    public function render()
    {
        return view('livewire.admin.distance.wincate.store')->layout('layouts.admin');
    }
}
