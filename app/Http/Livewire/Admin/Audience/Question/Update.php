<?php

namespace App\Http\Livewire\Admin\Audience\Question;

use App\Models\AudienceQuestion;
use Livewire\Component;

class Update extends Component
{
    public $audienceQuestion;

    public $content;

    public $A;

    public $B;

    public $C;

    public $D;


    public function mount(AudienceQuestion $audienceQuestion)
    {
       $this->audienceQuestion = $audienceQuestion;

        $this->content = $audienceQuestion->content;

        $this->A = $audienceQuestion->A;

        $this->B = $audienceQuestion->B;

        $this->C = $audienceQuestion->C;

        $this->D = $audienceQuestion->D;
       
    }

    public function saveChange()
    {
        $this->audienceQuestion->content = $this->content;
        
        $this->audienceQuestion->A = $this->A;
        
        $this->audienceQuestion->B = $this->B;
        
        $this->audienceQuestion->C = $this->C;
        
        $this->audienceQuestion->D = $this->D;
        

        $this->audienceQuestion->save();
    }

    public function updateStatus($status)
    {
        $this->audienceQuestion->status = $status;

        $this->audienceQuestion->save();

    }

    public function render()
    {
        return view('livewire.admin.audience.question.update');
    }
}
