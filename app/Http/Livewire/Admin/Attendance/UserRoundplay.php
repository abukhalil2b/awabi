<?php

namespace App\Http\Livewire\Admin\Attendance;

use App\Models\Roundplay;
use App\Models\User;
use Livewire\Component;

class UserRoundplay extends Component
{

    public Roundplay $roundplay;

    public function save($userId)
    {
        $subscriped = $this->roundplay->users()->where('user_id', $userId)->first();

        if ($subscriped) {
            $this->roundplay->users()
                ->where('user_id', $userId)
                ->detach($userId);

        } else {
            $this->roundplay->users()
                ->attach($userId);
        }
    }

    public function render()
    {
        $users = User::where('app','attendance')->get();

        return view('livewire.admin.attendance.user-roundplay',['users'=>$users]);
    }
}
