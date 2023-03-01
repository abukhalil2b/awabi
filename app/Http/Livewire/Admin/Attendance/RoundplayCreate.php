<?php

namespace App\Http\Livewire\Admin\Attendance;

use App\Models\Roundplay;
use Livewire\Component;

class RoundplayCreate extends Component
{

    public Roundplay $roundplay;

    protected $rules = [
        'roundplay.title' => 'required'
    ];

    public function mount()
    {
        $this->roundplay = new Roundplay();
    }


    public function save()
    {

        $this->validate();

        $this->roundplay->save();

        $this->emit('refreshRoundplay');

    }

    public function render()
    {
        return view('livewire.admin.attendance.roundplay-create');
    }
}
