<?php

namespace App\Providers;

use App\Interfaces\ResourcesInterface;
use App\Repositories\ResourcesRepository;
use Illuminate\Support\ServiceProvider;

class ResourcesInterfaceServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(ResourcesInterface::class , ResourcesRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
