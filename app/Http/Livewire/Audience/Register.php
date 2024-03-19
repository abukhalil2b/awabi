<?php

namespace App\Http\Livewire\Audience;

use App\Models\Audience;
use Livewire\Component;

class Register extends Component
{

    public $name;

    public $message;

    protected $rules = [
        'name' => 'required',
    ];

    public function register()
    {
        $this->validate();

        $audience = Audience::where('name', 'LIKE', $this->name)->first();

        if ($audience) {
            $this->message = 'مسجل مسبقاً';
            $this->reset(['name']);
            return;
        }

        Audience::create([
            'name' => $this->name,
        ]);

        $this->reset(['name']);

        $this->message = 'تم تسجيلك';
    }

    public function render()
    {
        return view('livewire.audience.register')->extends('layouts.audience');
    }
}
