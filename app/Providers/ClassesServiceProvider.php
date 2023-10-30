<?php

namespace App\Providers;

use App\Models\Classes;
use App\Repositories\ClassesRepository;
use App\Services\ClassesService;
use Illuminate\Support\ServiceProvider;

class ClassesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(ClassesRepository::class , function($app){
            return new ClassesRepository(new Classes());
        });
        $this->app->bind(ClassesService::class, function($app){
            return new ClassesService($this->app->make(ClassesRepository::class));
        });

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
