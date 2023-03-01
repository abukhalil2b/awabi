<?php

namespace App\Http\Livewire\Admin\Attendance;

use App\Models\Roundplay;
use Livewire\Component;

class RoundplayUpdate extends Component
{
    public Roundplay $roundplay;

    public function mount(Roundplay $roundplay){
        $this->roundplay = $roundplay;
    }

    protected $rules = [
        'roundplay.title' => 'required',
        'roundplay.status' => 'required'
    ];

    public function active()
    {
        Roundplay::where('status','active')
        ->update(['status'=>'disable']);

        $this->roundplay->status = 'active';

        $this->roundplay->save();

        $this->dispatchBrowserEvent('updated');

    }


    public function update()
    {
        $this->validate();

        $this->roundplay->save();

        $this->dispatchBrowserEvent('updated');
    }

    public function render()
    {
        return view('livewire.admin.attendance.roundplay-update');
    }
}
