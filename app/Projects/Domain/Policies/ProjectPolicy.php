<?php

namespace App\Projects\Domain\Policies;

use App\Models\User;
use App\Projects\Infrastructure\Persistence\Eloquent\Project;

class ProjectPolicy
{
    public function viewAny(User $user): bool
    {
        return true; // or only allow admin/manager
    }
     
    public function view(User $user, Project $project): bool
    {
        if (!$user) {
            return false;
        }

        // Example logic: allow admin or manager to view any project
        if (in_array($user->role, ['admin', 'manager'])) {
            return true;
        }

        // Example: a normal user can only view projects they are assigned to
        // assuming you have a relation like $project->assignedUsers()
        if ($project->assignedUsers()->where('id', $user->id)->exists()) {
            return true;
        }

        // Otherwise, deny
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return in_array($user->role, ['admin', 'manager']);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Project $project): bool
    {
        return in_array($user->role, ['admin', 'manager']);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Project $project): bool
    {
        return in_array($user->role, ['admin', 'manager']);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Project $project): bool
    {
        return in_array($user->role, ['admin', 'manager']);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Project $project): bool
    {
        return in_array($user->role, ['admin']);
    }
}