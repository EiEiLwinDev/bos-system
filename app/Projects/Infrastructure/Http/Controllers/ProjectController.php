<?php

namespace App\Projects\Infrastructure\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Projects\Application\Commands\CreateProjectCommand;
use App\Projects\Application\Handlers\CreateProjectHandler;
use App\Projects\Infrastructure\Persistence\Eloquent\Project as EloquentProject;
use App\Projects\Domain\Repositories\ProjectRepositoryInterface;
use App\Projects\Infrastructure\Http\Requests\StoreProjectRequest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ProjectController extends Controller
{
    use AuthorizesRequests;

    protected CreateProjectHandler $handler;

    protected ProjectRepositoryInterface $projects;

    public function __construct(CreateProjectHandler $handler, ProjectRepositoryInterface $projects)
    {
        $this->handler = $handler;
        $this->projects = $projects;
    }

    public function store(StoreProjectRequest $request)
    {
        
        $command = new CreateProjectCommand(
            $request->title,
            $request->client,
            $request->start_date,
            $request->end_date,
            $request->status
        );

        $project = $this->handler->handle($command);

        $this->authorize('create', $project);
        
        return response()->json([
            'message' => 'Project created successfully',
            'data' => $project
        ], 201);
    }

    public function show($id)
    {
        $project = $this->projects->findWithTasks($id);

        if (!$project) {
            return response()->json(['message' => 'Project not found'], 404);
        }

        $eloquentProject = EloquentProject::find($id);

        $this->authorize('view', $eloquentProject);

        return response()->json([
            'message' => 'Project retrieved successfully',
            'data' => $project
        ], 200);
    }
}