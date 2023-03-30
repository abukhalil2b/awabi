<?php

namespace App\Http\Livewire\Admin\Attendance;

use App\Models\Cate;
use Livewire\Component;

class CateUpdate extends Component
{
    public Cate $cate;

    protected $rules = [
        'cate.title' => 'required|min:6'
    ];

    public function mount(Cate $cate)
    {
       $this->cate = $cate;
    }

    public function save()
    {
        $this->cate->save();

    }

    public function render()
    {
        return view('livewire.admin.attendance.cate-update');
    }
}
