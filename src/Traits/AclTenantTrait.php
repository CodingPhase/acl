<?php

namespace CodingPhase\Acl\Traits;

/**
 * Class HasPermissionsTrait
 * @package CodingPhase\Permissions\Traits
 */
trait AclTenantTrait
{
    public function roles()
    {
        return $this->belongsToMany(config('acl.role'));
    }

    public function plans()
    {
        return $this->belongsToMany(config('acl.plan'));
    }
}
