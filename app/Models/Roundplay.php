<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Roundplay extends Model
{
    public $timestamps = false;
    
    protected $fillable = ['title'];

    public function users()
    {
        return $this->belongsToMany(User::class,'user_roundplay')
        ->withPivot('mark');
    }


    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}
