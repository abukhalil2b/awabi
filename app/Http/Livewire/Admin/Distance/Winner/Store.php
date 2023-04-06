<?php

namespace App\Http\Livewire\Admin\Distance\Winner;

use App\Models\Winner;
use Livewire\Component;

class Store extends Component
{
    public $phonesCount;

    public $phones;

    public function mount()
    {
        $this->phonesCount = Winner::count();
    }

    public function storeWinners()
    {
        if ($this->phones) {

            $phones = explode("\n", $this->phones);
            
            foreach ($phones as $phone) {
                $exist = Winner::where(['phone' => $phone])->first();

                if($exist)
                return;
            }

            foreach ($phones as $phone) {
                Winner::create(['phone' => $phone]);
            }

        }

        $this->phonesCount = Winner::count();
    }

    public function render()
    {
        return view('livewire.admin.distance.winner.store')->layout('layouts.admin');
    }
}
