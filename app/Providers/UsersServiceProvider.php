<?php

namespace App\Providers;

use App\Users\Domain\Repositories\UserRepositoryInterface;
use App\Users\Infrastructure\Persistence\Eloquent\UserRepository;
use Illuminate\Support\ServiceProvider;

class UsersServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}