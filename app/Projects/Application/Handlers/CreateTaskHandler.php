<?php

namespace App\Projects\Application\Handlers;

use App\Projects\Application\Commands\CreateTaskCommand;
use App\Projects\Domain\Repositories\TaskRepositoryInterface;

class CreateTaskHandler
{
    /**
     * Create a new class instance.
     */
    protected TaskRepositoryInterface $tasks;

    public function __construct(TaskRepositoryInterface $tasks)
    {
        $this->tasks = $tasks;
    }

    public function handle(CreateTaskCommand $command)
    {
        return $this->tasks->create([
            'project_id'    => $command->project_id,
            'title'         => $command->title,
            'deadline'      => $command->deadline,
            'assigned_user' => $command->assigned_user,
            'status'        => $command->status,
        ]);
    }
}