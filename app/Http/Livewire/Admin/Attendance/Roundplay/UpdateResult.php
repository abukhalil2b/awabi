<?php

namespace App\Http\Livewire\Admin\Attendance\Roundplay;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class UpdateResult extends Component
{
    public $mark = 0;

    public $userId;

    public $roundplayId;

    public function mount($userId,$roundplayId)
    {
        $roundplayResult = DB::table('user_roundplay')
        ->where(['user_id'=>$userId,'roundplay_id' => $roundplayId])
        ->first();

        $this->mark = $roundplayResult->mark;

        $this->userId = $roundplayResult->user_id;

        $this->roundplayId = $roundplayResult->roundplay_id;

    }

    public function incPoint()
    {
        $this->mark = $this->mark + 1;

        DB::table('user_roundplay')->where(['user_id'=>$this->userId,'roundplay_id' => $this->roundplayId])
        ->update(['mark' => $this->mark ]);
    }

    public function decPoint($userId,$roundplayId)
    {
        $this->mark = $this->mark - 1;

        DB::table('user_roundplay')->where(['user_id'=>$userId,'roundplay_id' => $roundplayId])
        ->update(['mark' => $this->mark ]);
    }

    public function render()
    {
        return view('livewire.admin.attendance.roundplay.update-result');
    }
}
