<?php

namespace App\Providers;

use App\Interfaces\ClassesInterface;
use App\Repositories\ClassesRepository;
use Illuminate\Support\ServiceProvider;

class ClassesInterfaceServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(ClassesInterface::class , ClassesRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
