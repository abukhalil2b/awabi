<?php

namespace App\Http\Livewire\Admin\Distance\Wincate;

use Livewire\Component;
use App\Models\Wincate;
use App\Models\Winner;

class Show extends Component
{
    public Wincate $wincate;

    public  $winners = [];

    public $phones;

    public $message;

    public function mount(Wincate $wincate)
    {
        $this->wincate = $wincate;

        $this->winners = $this->wincate->winners;
    }

    public function delete($id)
    {
        $winner = Winner::find($id);

        $winner->delete();

        $this->winners = Winner::where('wincate_id', $this->wincate->id)->get();
    }

    public function storeWinners()
    {
        if ($this->phones) {

            $phones = explode("\n", $this->phones);

            foreach ($phones as $phone) {
                $exist = Winner::where(['phone' => $phone])->first();

                if ($exist)
                    return;
            }

            foreach ($phones as $phone) {
                Winner::create([
                    'phone' => $phone,
                    'wincate_id' => $this->wincate->id
                ]);
            }

            $this->message = 'تم الحفظ';
        }
    }

    public function render()
    {
        return view('livewire.admin.distance.wincate.show')->layout('layouts.admin');
    }
}
