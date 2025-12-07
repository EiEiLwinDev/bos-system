<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;

use App\Projects\Infrastructure\Http\Controllers\ProjectController;
use App\Projects\Infrastructure\Http\Controllers\TaskController;
use App\Users\Infrastructure\Http\Controllers\AuthController;

Route::post('/login', [AuthController::class, 'login']);

Route::get('/users', function () {
    // Placeholder for user listing
    $users = User::class::all();
    return response()->json(['data' => $users]);
});

Route::middleware('auth:sanctum')->get('/user', function () {
    return request()->user();
});

Route::middleware('auth:sanctum')->group(function () {
  
  Route::prefix('projects')->group(function () {
      Route::post('/', [ProjectController::class, 'store']);
      Route::get('/{id}', [ProjectController::class, 'show']);
  });

  Route::prefix('tasks')->group(function () { 
      Route::post('/', [TaskController::class, 'store']);
  });

});