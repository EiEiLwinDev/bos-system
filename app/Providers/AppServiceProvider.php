<?php

namespace App\Providers;

use App\Projects\Infrastructure\Persistence\Eloquent\Project as EloquentProject;
use App\Projects\Infrastructure\Persistence\Eloquent\Task as EloquentTask;
use App\Projects\Domain\Policies\ProjectPolicy;
use App\Projects\Domain\Policies\TaskPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::policy(EloquentProject::class, ProjectPolicy::class);
        Gate::policy(EloquentTask::class, TaskPolicy::class);
    }
}