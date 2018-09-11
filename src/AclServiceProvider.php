<?php

namespace CodingPhase\Acl;

use CodingPhase\Permissions\Models\Permission;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider as Provider;

class AclServiceProvider extends Provider
{
    /**
     * @var bool
     */
    protected $defer = false;


    /**
     * @return void
     */
    public function boot()
    {
        $this->handleMigrations();
        $this->publishConfig();
    }

    /**
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/config.php', 'acl'
        );
    }

    /**
     * @return array
     */
    public function provides()
    {
        return [];
    }

    /**
     * @return void
     */
    protected function publishConfig()
    {
        $this->publishes([__DIR__ . '/../config/config.php' => base_path('config/acl.php')]);
    }

    /**
     * @return void
     */
    protected function handleMigrations()
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
    }
}
