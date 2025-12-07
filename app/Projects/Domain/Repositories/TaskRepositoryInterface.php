<?php

namespace App\Projects\Domain\Repositories;

use App\Projects\Domain\Entities\Task;

interface TaskRepositoryInterface
{
    public function create(array $data): Task;
}