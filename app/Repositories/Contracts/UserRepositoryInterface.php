<?php

namespace App\Repositories\Contracts;

use App\DTOs\User\UpdateUserDto;
use App\Models\User;

interface UserRepositoryInterface
{
    public function findById(int $id): ?User;
    public function update(User $user, UpdateUserDto $updateUserDto): User;

}
