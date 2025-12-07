<?php

namespace App\Projects\Domain\Entities;

use Illuminate\Support\Collection;

class Task
{
    public function __construct(
        public ?int $id,
        public string $title,
        public string $deadline,
        public int $assignedUserId,
        public string $status,
        public ?int $projectId = null
    ) {}
}