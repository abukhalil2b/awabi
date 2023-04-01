<?php

namespace App\Http\Livewire\Admin\Setting;

use App\Models\Setting;
use Livewire\Component;

class Update extends Component
{
    public Setting $setting;

    public function mount(Setting $setting)
    {
        $this->setting = $setting;
    }

    public function updateStats($status)
    {
        $this->setting->status = $status;

        $this->setting->save();
    }

    public function render()
    {
        return view('livewire.admin.setting.update');
    }
}
