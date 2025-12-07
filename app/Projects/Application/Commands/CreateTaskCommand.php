<?php

namespace App\Projects\Application\Commands;

class CreateTaskCommand
{
    /**
     * Create a new class instance.
     */
    public int $project_id;
    public string $title;
    public string $deadline;
    public int $assigned_user;
    public string $status;

    public function __construct(
        int $project_id,
        string $title,
        string $deadline,
        int $assigned_user,
        string $status
    )
    {
        $this->project_id = $project_id;
        $this->title = $title;
        $this->deadline = $deadline;
        $this->assigned_user = $assigned_user;
        $this->status = $status;
    }
}