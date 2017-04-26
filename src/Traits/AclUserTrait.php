<?php

namespace CodingPhase\Acl\Traits;

trait AclUserTrait
{
    public function roles()
    {
        return $this->belongsToMany(config('acl.role'));
    }

    /**
     * @param array $role
     *
     * @return bool
     */
    public function hasRole($role)
    {
        $name = $role;

        $class = config('acl.role');

        if($role instanceof $class) {
            $name = $role->name;
        }

        $role = $this->roles()->where('name', $name)->first();

        if ($role) {
            return true;
        }

        return false;
    }

    public function hasPermission($permission)
    {
        $result = $this->roles()->whereHas('permissions', function ($query) use ($permission) {
            $query->where('name', $permission);
        })->count();

        return (boolean)$result;
    }
}
