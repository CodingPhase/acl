<?php

namespace CodingPhase\Acl;

use CodingPhase\Permissions\Models\Permission;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider as Provider;

class ServiceProvider extends Provider
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
        $this->definePermissions();
        $this->defineRoleDirective();
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
        $this->publishes([__DIR__ . '/../config/config.php' => base_path('acl')]);
    }

    /**
     * @return void
     */
    protected function handleMigrations()
    {
        $this->publishes([__DIR__ . '/../database/migrations' => base_path('database/migrations')]);
    }

    /**
     * @return void
     */
    protected function definePermissions()
    {
        if (! Schema::hasTable('permissions')) {
            return;
        }

        Permission::get()->map(function ($permission) {
            Gate::define($permission->name, function ($user) use ($permission) {
                return $user->hasPermissionTo($permission);
            });
        });
    }

    /**
     * @return void
     */
    protected function defineRoleDirective()
    {
        Blade::directive('role', function ($role) {
            return "<?php if (auth()->check() && auth()->user()->hasRole({$role})): ?>";
        });

        Blade::directive('endrole', function ($role) {
            return "<?php endif; ?>";
        });
    }
}
