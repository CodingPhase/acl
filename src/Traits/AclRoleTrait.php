<?php

namespace CodingPhase\Acl\Traits;


trait AclRoleTrait
{
    public function tenants()
    {
        return $this->belongsToMany(config('acl.tenant'));
    }

    public function permissions()
    {
        return $this->belongsToMany(config('acl.permission'));
    }

    /**
     * @param array $permission
     *
     * @return bool
     */
    public function hasPermission($permission)
    {
        $name = $permission;

        $class = config('acl.permission');

        if($permission instanceof $class) {
            $name = $permission->name;
        }

        $permission = $this->permissions()->where('name', $name)->first();

        if ($permission) {
            return true;
        }

        return false;
    }
}
