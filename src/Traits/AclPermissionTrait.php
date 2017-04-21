<?php

namespace CodingPhase\Acl\Traits;

/**
 * Class HasPermissionsTrait
 * @package CodingPhase\Permissions\Traits
 */
trait AclPermissionTrait
{
    public function roles()
    {
        return $this->belongsToMany(config('acl.role'));
    }

    public function feature()
    {
        return $this->belongsTo(config('acl.feature'));
    }

    /**
     * @param array $role
     *
     * @return bool
     */
    public function hasPermission($role)
    {
        $name = $role;

        if($role instanceof Role) {
            $name = $role->name;
        }

        $role = $this->roles()->where('name', $name)->first();

        if ($role) {
            return true;
        }

        return false;
    }
}
