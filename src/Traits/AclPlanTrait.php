<?php

namespace CodingPhase\Acl\Traits;

/**
 * Class HasPermissionsTrait
 * @package CodingPhase\Permissions\Traits
 */
trait AclPlanTrait
{
    public function tenants()
    {
        return $this->belongsToMany(config('acl.tenant'));
    }

    public function features()
    {
        return $this->belongsToMany(config('acl.feature'));
    }

    /**
     * @param array $feature
     *
     * @return bool
     */
    public function hasFeature($feature)
    {
        $name = $feature;

        $class = config('acl.feature');

        if($feature instanceof $class) {
            $name = $feature->name;
        }

        $feature = $this->roles()
            ->where('name', $name)
            ->first();

        if ($feature) {
            return true;
        }

        return false;
    }
}
