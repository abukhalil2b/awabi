<?php

namespace App\Http\Livewire\Audience;

use App\Models\Audience;
use Livewire\Component;

class Register extends Component
{
    public $phone;

    public $name;

    public $message;

    public function register()
    {
        $audience = Audience::where('phone', $this->phone)->first();

        if ($audience) {
            $this->message = 'مسجل مسبقاً';
            return;
        }

        Audience::create([
            'name' => $this->name,
            'phone' => $this->phone,
        ]);

        $this->message = 'تم تسجيلك';
    }

    public function render()
    {
        return view('livewire.audience.register')->extends('layouts.audience');
    }
}
