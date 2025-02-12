<?php

namespace App\Services;

use App\DTOs\User\CreateUserDto;
use App\DTOs\User\UpdateUserDto;
use App\Models\User;
use App\Repositories\Eloquent\EloquentUserRepository;
use App\Exceptions\UserNotFoundException;
use Illuminate\Database\Eloquent\Collection;

class UserService
{
    protected $userRepository;

    public function __construct(EloquentUserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getUserById(int $id): User
    {
        $user = $this->userRepository->findById($id);

        if (!$user) {
            throw new UserNotFoundException();
        }

        return $user;
    }

    public function updateUser(int $id, UpdateUserDto $updateUserDto): User
    {
        $user = $this->userRepository->findById($id);

        if (!$user) {
            throw new UserNotFoundException();
        }

        return $this->userRepository->update($user, $updateUserDto);
    }

    public function createUser(CreateUserDto $createUserDto): User
    {
        return $this->userRepository->create($createUserDto);
    }

    public function getAllUsers(): Collection
    {
        return $this->userRepository->getAll();
    }

    public function deleteUser(int $id): void
    {
        $user = $this->userRepository->findById($id);

        if (!$user) {
            throw new UserNotFoundException();
        }

        $this->userRepository->delete($user);
    }

}
