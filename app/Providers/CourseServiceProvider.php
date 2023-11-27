<?php

namespace App\Providers;

use App\Interfaces\CourseInterface;
use App\Models\Course;
use App\Repositories\CourseRepository;
use App\Services\CourseService;
use Illuminate\Support\ServiceProvider;

class CourseServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(CourseRepository::class , function($app){
            return new CourseRepository(new Course());
        });
        $this->app->bind(CourseService::class,function($app){
            return new CourseService($this->app->make(CourseRepository::class));
        });
        $this->app->bind(CourseInterface::class , CourseRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
