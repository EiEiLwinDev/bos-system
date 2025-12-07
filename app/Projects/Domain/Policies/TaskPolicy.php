<?php

namespace App\Projects\Domain\Policies;
 
use App\Models\User;
use App\Projects\Infrastructure\Persistence\Eloquent\Task; 

class TaskPolicy
{
     
    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Task $task): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return in_array($user->role, ['admin', 'manager', 'user']);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Task $task): bool
    {
        return $user->role === 'admin'
            || $user->role === 'manager'
            || $task->assigned_user === $user->id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Task $task): bool
    {
        return in_array($user->role, ['admin', 'manager']);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Task $task): bool
    {
        return in_array($user->role, ['admin', 'manager']);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Task $task): bool
    {
        return in_array($user->role, ['admin']);
    }
}