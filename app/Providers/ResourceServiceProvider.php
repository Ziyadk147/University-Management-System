<?php

namespace App\Providers;

use App\Models\Course;
use App\Models\Resource;
use App\Repositories\CourseRepository;
use App\Repositories\ResourcesRepository;
use App\Services\ResourcesService;
use Illuminate\Support\ServiceProvider;

class ResourceServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(ResourcesRepository::class , function($app){
            return new ResourcesRepository(new Resource() , new Course() , new CourseRepository());
        });
        $this->app->bind(ResourcesService::class ,function($app){
            return new ResourcesService($this->app->make(ResourcesRepository::class));
        });
        $this->app->register(ResourcesInterfaceServiceProvider::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
