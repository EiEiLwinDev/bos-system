<?php

namespace App\Projects\Infrastructure\Http\Controllers;

use App\Projects\Application\Jobs\SendTaskCreatedEmail;
use App\Projects\Application\Commands\CreateTaskCommand;
use App\Projects\Application\Handlers\CreateTaskHandler;
use App\Projects\Domain\Entities\Task;
use App\Projects\Infrastructure\Http\Requests\StoreTaskRequest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class TaskController
{
    use AuthorizesRequests;
    
    protected CreateTaskHandler $handler;

    public function __construct(CreateTaskHandler $handler)
    {
        $this->handler = $handler;
    }

    public function store(StoreTaskRequest $request)
    {
        $command = new CreateTaskCommand(
            $request->project_id,
            $request->title,
            $request->deadline,
            $request->assigned_user,
            $request->status
        );

        $task = $this->handler->handle($command);

        $this->authorize('create', $task);
        
        SendTaskCreatedEmail::dispatch($task);
        
        return response()->json([
            'message' => 'Task created successfully',
            'data' => $task
        ], 201);
    }

}