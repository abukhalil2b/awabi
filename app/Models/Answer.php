<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $guarded = [];

    public function participant()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function question()
    {
        return $this->belongsTo(Question::class,'question_id');
    }
}
