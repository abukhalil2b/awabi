<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public $timestamps = false;

    public function permissions()
    {
        return $this->belongsToMany(Permission::class,'role_permission','role_id','permission_id');
    }

    public function hasPermission($id)
    {
       $hasPermission = $this->permissions()->where('permission_id',$id)->first();

       return $hasPermission ? true : false;
    }
}
