<?php

namespace App\Repositories\Eloquent;

use App\DTOs\User\CreateUserDto;
use App\DTOs\User\UpdateUserDto;
use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class EloquentUserRepository implements UserRepositoryInterface
{
    public function findById(int $id): ?User
    {
        return User::find($id);
    }

    public function create(CreateUserDto $createUserDto): User
    {
        return User::create($createUserDto->toArray());
    }

    public function update(User $user, UpdateUserDto $updateUserDto): User
    {
        $user->update($updateUserDto->toArray());
        return $user;
    }

    public function getAll(): Collection
    {
        return User::all();
    }

    public function delete(User $user): void
    {
        $user->delete();
    }

}
