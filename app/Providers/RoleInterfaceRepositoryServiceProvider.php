<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\RoleInterface;
use App\Repositories\RoleRepository;

class RoleInterfaceRepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(RoleInterface::class , RoleRepository::class );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
