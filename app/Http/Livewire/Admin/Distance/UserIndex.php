<?php

namespace App\Http\Livewire\Admin\Distance;

use App\Models\User;
use Livewire\Component;

class UserIndex extends Component
{
    public $listeners = ['refreshUser' => '$refresh'];

    public function render()
    {
        $updatedUsers = User::where('app', 'distance')
            ->whereNotNull('state_id')
            ->get();

        $notUpdatedUsers = User::where('app', 'distance')
            ->whereNull('state_id')
            ->get();

        return view('livewire.admin.distance.user-index', [
            'updatedUsers' => $updatedUsers,
            'notUpdatedUsers' => $notUpdatedUsers
        ]);
    }
}
