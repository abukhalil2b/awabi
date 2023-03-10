<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cate extends Model
{
    public $timestamps = false;
    
    protected $guarded = [];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
