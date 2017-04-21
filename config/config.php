<?php

/**
 * This file is part of Acl,
 * a role & permission management solution for Laravel.
 *
 * @license MIT
 * @package CodingPhase\Acl
 */

return [

    /*
    |--------------------------------------------------------------------------
    | Acl Role Model
    |--------------------------------------------------------------------------
    |
    | This is the Role model used by Acl to create correct relations.  Update
    | the role if it is in a different namespace.
    |
    */
    'role' => 'App\Models\Role',

    /*
    |--------------------------------------------------------------------------
    | Acl Permission Model
    |--------------------------------------------------------------------------
    |
    | This is the Permission model used by Acl to create correct relations.
    | Update the permission if it is in a different namespace.
    |
    */
    'permission' => 'App\Models\Permission',

    /*
    |--------------------------------------------------------------------------
    | Acl Tenant Model
    |--------------------------------------------------------------------------
    |
    | This is the Tenant model used by Acl to create correct relations.
    | Update if it is in a different namespace.
    |
    */
    'tenant' => 'App\Models\Tenant',

    /*
    |--------------------------------------------------------------------------
    | Acl Tenant Model
    |--------------------------------------------------------------------------
    |
    | This is the Tenant model used by Acl to create correct relations.
    | Update if it is in a different namespace.
    |
    */
    'feature' => 'App\Models\Feature',

    /*
    |--------------------------------------------------------------------------
    | Acl Tenant Model
    |--------------------------------------------------------------------------
    |
    | This is the Tenant model used by Acl to create correct relations.
    | Update if it is in a different namespace.
    |
    */
    'plan' => 'App\Models\Plan',

];
