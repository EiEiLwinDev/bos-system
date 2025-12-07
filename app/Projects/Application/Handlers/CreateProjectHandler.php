<?php

namespace App\Projects\Application\Handlers;

use App\Projects\Application\Commands\CreateProjectCommand;
use App\Projects\Domain\Repositories\ProjectRepositoryInterface;

class CreateProjectHandler
{
    /**
     * Create a new class instance.
     */

    protected ProjectRepositoryInterface $projects;

    public function __construct(ProjectRepositoryInterface $projects)
    {
        $this->projects = $projects;
    }

    public function handle(CreateProjectCommand $command)
    {
        return $this->projects->create([
            'title'       => $command->title,
            'client'      => $command->client,
            'start_date'  => $command->start_date,
            'end_date'    => $command->end_date,
            'status'      => $command->status,
        ]);
    }
}