<?php

namespace CodingPhase\Acl\Traits;

use Illuminate\Database\Eloquent\Model;


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

    public function isAuthorized(Model $model)
    {
        $namespace = get_class($model);
        $classSnake = snake_case(collect(explode('\\', $namespace))->last());
        $classCamel = camel_case($classSnake);
        $classCamelPlural = str_plural($classCamel);

        return (boolean)$this->$classCamelPlural()->whereIn($classSnake . '_id', [$model->id])->count();
    }

    public function canUseFeature($feature)
    {
        $collection = $this->plans()->whereHas('features', function ($query) use ($feature) {
            $query->where('name', $feature);
        })->get();

        return ! $collection->isEmpty();
    }
}
