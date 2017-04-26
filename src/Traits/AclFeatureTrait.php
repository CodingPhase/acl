<?php

namespace CodingPhase\Acl\Traits;


trait AclFeatureTrait
{
    public function plans()
    {
        return $this->belongsToMany(config('acl.plan'));
    }

    public function permissions()
    {
        return $this->hasMany(config('acl.permission'));
    }
}
