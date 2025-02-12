<?php

namespace App\Repositories\Eloquent;

use App\Models\User;

class EloquentAuthRepository
{
    public function findByEmail(string $email): ?User
    {
        return User::where('email', $email)->first();
    }
}
