<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $fillable=['name','slug'];
    public function permissions(){
        return $this->belongsToMany(Permission::class,'role_permissions');//roles_permission is table name here 
    }
    public function users(){
        return $this->belongsToMany(User::class,'users_role');//roles_permission is table name here 
    }
}
