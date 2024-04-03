<?php

namespace App\Models;


use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function roundplays(){

        return $this->belongsToMany(Roundplay::class,'user_roundplay')
        ->withPivot('mark');
    }

    public function isInRoundplay($roundplayId){
        
        return $this->roundplays()
        ->where('roundplay_id',$roundplayId)
        ->first()? true:false;
    }


    public function roles()
    {
        return $this->belongsToMany(Role::class,'role_user','user_id','role_id');
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class,'user_permission','user_id','permission_id');
    }

    public function hasPermission($permission)
    {
        if ( $this->id === 1 ) {
			return true;
		}

        $hasPermission = $this->permissions()->where('slug',$permission)->first();

        if($hasPermission){
            return true;
        }

        $hasPermission = $this->roles()->whereHas('permissions',function($q)use($permission){
            $q->where('slug',$permission);
        })->first();

        if($hasPermission){
            return true;
        }else{
            return false;
        }

    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'app',
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
