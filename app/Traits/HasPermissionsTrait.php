<?php

namespace App\Traits;

use App\Models\Permission;
use App\Models\Role;

trait HasPermissionsTrait
{
    public function getAllPermissions($permission)
    {
        return  $permissions = Permission::whereIn('slug', $permission)->get();
    }

    public function hasPermission($permission)
    {
        return (bool)  $this->permissions->where('slug', $permission->slug)->count();
    }
    public  function permissions()
    {
        return $this->belongsToMany(Permission::class, 'users_permissions');
    }
    public  function roles()
    {
        return $this->belongsToMany(Role::class, 'users_roles');
    }
    public  function hasRole(...$roles)
    {
        foreach ($roles  as $role) {
            if ($this->roles->contains('slug', $role)) {
                return true;
            }
        }
        return false;
    }
    public  function hasPermissionThroughRole($permissions)
    {
        foreach ($permissions->roles  as $role) {
            if ($this->roles->contains($role)) {
                return true;
            }
        }
        return false;
    }
    public  function hasPermissionTo($permission)
    {
        return $this->hasPermissionThroughRole($permission) || $this->hasPermission($permission);
    }
  
  
    public  function givePermissionTo(...$permission)
    {
        $permissions = $this->getAllPermissions($permission);
        if ($permissions == null) {
            return $this;
        }
        $this->permissions()->saveMany($permissions);
    }
}
