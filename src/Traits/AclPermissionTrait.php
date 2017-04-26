<?php

namespace CodingPhase\Acl\Traits;


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
}
