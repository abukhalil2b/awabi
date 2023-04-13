<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Winner extends Model
{
    protected $guarded = [];

    public function wincate()
    {
        return $this->belongsTo(Wincate::class);
    }
}
