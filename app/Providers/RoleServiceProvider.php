<?php

namespace App\Providers;

use App\Models\User;
use App\Repositories\RoleRepository;
use App\Services\RoleService;
use Illuminate\Support\ServiceProvider;
use Spatie\Permission\Models\Role;

class RoleServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(RoleRepository::class , function($app){
            return new RoleRepository(new Role() , new User());
        });
        $this->app->bind(RoleService::class , function($app){
            return new RoleService($app->make(RoleRepository::class));
        });
        $this->app->register(RoleInterfaceRepositoryServiceProvider::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
