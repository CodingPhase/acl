<?php

namespace CodingPhase\Acl\Traits;

/**
 * Class HasPermissionsTrait
 * @package CodingPhase\Permissions\Traits
 */
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
