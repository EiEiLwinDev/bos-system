<?php

namespace App\Projects\Application\Jobs;

use App\Models\User;
use App\Projects\Infrastructure\Mail\TaskCreatedMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendTaskCreatedEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public $task;
    public $user;

    public function __construct($task)
    {
        $this->task = $task;
        $this->user = User::find($task->assignedUserId);
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->user->email)
            ->send(new TaskCreatedMail($this->task, $this->user));
    }
}