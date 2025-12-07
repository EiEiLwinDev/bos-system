<?php

namespace App\Providers;

use App\Projects\Domain\Repositories\ProjectRepositoryInterface;
use App\Projects\Domain\Repositories\TaskRepositoryInterface;
use App\Projects\Infrastructure\Persistence\Eloquent\ProjectRepository;
use App\Projects\Infrastructure\Persistence\Eloquent\TaskRepository;
use Illuminate\Support\ServiceProvider;

class ProjectServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            ProjectRepositoryInterface::class,
            ProjectRepository::class
        );

        $this->app->bind(
            TaskRepositoryInterface::class,
            TaskRepository::class
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}