<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\RoleRepository;
use App\Services\RoleService;
use Spatie\Permission\Models\Role;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(RoleRepository::class , function($app){
            return new RoleRepository(new Role());
        });
        $this->app->bind(RoleService::class , function($app){
            return new RoleService($app->make(RoleRepository::class));
        });
        $this->app->register(RoleInterfaceRepositoryServiceProvider::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
