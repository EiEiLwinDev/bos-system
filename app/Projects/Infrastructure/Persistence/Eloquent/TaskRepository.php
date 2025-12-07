<?php

namespace App\Projects\Infrastructure\Persistence\Eloquent;

use App\Projects\Domain\Entities\Task as DomainTask;
use App\Projects\Domain\Repositories\TaskRepositoryInterface;

class TaskRepository implements TaskRepositoryInterface
{
    public function create(array $data): DomainTask
    {
        $eloquent = Task::create($data);

        return new DomainTask(
            id: $eloquent->id,
            title: $eloquent->title,
            deadline: $eloquent->deadline,
            assignedUserId: $eloquent->assigned_user,
            status: $eloquent->status,
            projectId: $eloquent->project_id
        );
    }

    public function find(int $id): ?DomainTask
    {
        $eloquent = Task::find($id);
        if (!$eloquent) return null;

        return new DomainTask(
            id: $eloquent->id,
            title: $eloquent->title,
            deadline: $eloquent->deadline,
            assignedUserId: $eloquent->assigned_user,
            status: $eloquent->status,
            projectId: $eloquent->project_id
        );
    }
}
  