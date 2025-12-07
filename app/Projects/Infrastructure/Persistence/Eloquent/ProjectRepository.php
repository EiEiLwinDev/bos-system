<?php

namespace App\Projects\Infrastructure\Persistence\Eloquent;

use App\Projects\Domain\Entities\Project as DomainProject;
use App\Projects\Domain\Repositories\ProjectRepositoryInterface;

class ProjectRepository implements ProjectRepositoryInterface
{
    public function create(array $data): DomainProject
    {
        $eloquent = Project::create($data);

        return new DomainProject(
            id: $eloquent->id,
            title: $eloquent->title,
            client: $eloquent->client,
            startDate: $eloquent->start_date,
            endDate: $eloquent->end_date,
            status: $eloquent->status
        );
    }

    public function findWithTasks(int $id): ?DomainProject
    {
        $eloquent = Project::with('tasks')->find($id);

        if (!$eloquent) return null;

        return new DomainProject(
            id: $eloquent->id,
            title: $eloquent->title,
            client: $eloquent->client,
            startDate: $eloquent->start_date,
            endDate: $eloquent->end_date,
            status: $eloquent->status,
            tasks: $eloquent->tasks
        );
    }
}