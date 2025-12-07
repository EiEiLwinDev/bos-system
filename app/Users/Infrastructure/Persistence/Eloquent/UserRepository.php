<?php

namespace App\Users\Infrastructure\Persistence\Eloquent;

use App\Models\User;
use App\Users\Domain\Repositories\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    public function findByEmail(string $email): ?User
    {
        return User::where('email', $email)->first();
    }
}