<?php

namespace App\Providers;

use App\Models\Image;
use App\Models\User;
use App\Repositories\RoleRepository;
use App\Repositories\UserRepository;
use App\Services\ClassesService;
use App\Services\UserService;
use Illuminate\Support\ServiceProvider;
use Spatie\Permission\Models\Role;

class UserServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepository::class , function($app){
            return new UserRepository(new User() , new Role(),new Image() , new RoleRepository(),new ClassesService());
        });
        $this->app->bind(UserService::class , function($app){
            return new UserService($this->app->make(UserRepository::class));
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {

    }
}
