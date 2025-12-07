<?php 
namespace App\Projects\Domain\Entities;

use Illuminate\Support\Collection;

class Project
{
    public function __construct(
        public ?int $id,
        public string $title,
        public string $client,
        public string $startDate,
        public string $endDate,
        public string $status,
        public ?Collection $tasks = null,
    ) {}
}