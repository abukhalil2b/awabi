<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wincate extends Model
{
    public $timestamps = false;

    protected $fillable = ['title'];

    public function winners()
    {
        return $this->hasMany(Winner::class);
    }
}
