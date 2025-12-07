<?php

namespace App\Projects\Application\Commands;

class CreateProjectCommand
{
    /**
     * Create a new class instance.
     */
    public string $title;
    public string $client;
    public string $start_date;
    public ?string $end_date;
    public string $status;

    public function __construct(
        string $title,
        string $client,
        string $start_date,
        ?string $end_date,
        string $status
    ) {
        $this->title = $title;
        $this->client = $client;
        $this->start_date = $start_date;
        $this->end_date = $end_date;
        $this->status = $status;
    } 
}