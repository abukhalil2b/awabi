<?php

namespace App\Http\Livewire\Admin\Permission;

use App\Models\Permission;
use Livewire\Component;

class Create extends Component
{

    public $title;

    public $slug;

    public $cate;

    public $permissions;

    public function mount()
    {
        $this->permissions = Permission::latest('id')->get();
    }

    public function store()
    {
        Permission::create([
            'title' => $this->title,
            'slug' => $this->slug,
            'cate' => $this->cate
        ]);

        $this->permissions = Permission::latest('id')->get();

        $this->reset('title','slug','cate');
    }

    public function render()
    {
        return view('livewire.admin.permission.create')->layout('layouts.admin');
    }
}
