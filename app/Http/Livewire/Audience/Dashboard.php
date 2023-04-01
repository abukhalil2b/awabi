<?php

namespace App\Http\Livewire\Audience;

use App\Models\Audience;
use Livewire\Component;

class Dashboard extends Component
{
    public $audiences = [];
    

    public function selectAudience($phone){

        Audience::where('phone',$phone)->update(['selected'=>1]);

        $this->audiences = Audience::where('selected',0)->get();
    }

    public function mount()
    {
        $this->audiences = Audience::where('selected',0)->get();

    }

    public function render()
    {
        return view('livewire.audience.dashboard');
    }
}
