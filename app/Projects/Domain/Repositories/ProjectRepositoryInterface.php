<?php

namespace App\Projects\Domain\Repositories;

use App\Projects\Domain\Entities\Project;

interface ProjectRepositoryInterface
{
    public function create(array $data): Project;

    public function findWithTasks(int $id): ?Project;
}