<?php

namespace App\Models;


use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    public function roundplays(){

        return $this->belongsToMany(Roundplay::class,'user_roundplay')
        ->withPivot('mark');
    }

    public function isInRoundplay($roundplayId){
        
        return $this->roundplays()
        ->where('roundplay_id',$roundplayId)
        ->first()? true:false;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'type',
        'name',
        'phone',
        'plain_password',
        'email',
        'password',
        'state_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
