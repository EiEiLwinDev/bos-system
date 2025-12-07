<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;

use App\Projects\Infrastructure\Http\Controllers\ProjectController;
use App\Projects\Infrastructure\Http\Controllers\TaskController;
use App\Users\Infrastructure\Http\Controllers\AuthController;


Route::prefix('v1')->group(function () {
    
    Route::post('/login', [AuthController::class, 'login']);

    Route::middleware('auth:sanctum')->group(function () {
    
    Route::prefix('projects')->group(function () {
        Route::post('/', [ProjectController::class, 'store']);
        Route::get('/{id}', [ProjectController::class, 'show']);
    });

    Route::prefix('tasks')->group(function () { 
        Route::post('/', [TaskController::class, 'store']);
    });

    });
});