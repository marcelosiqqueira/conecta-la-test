<?php

namespace App\Http\Controllers;

use App\DTOs\User\UpdateUserDto;
use App\Exceptions\UserNotFoundException;
use App\Http\Requests\UpdateUserRequest;
use App\Services\UserService;
use App\Traits\ApiResponser;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    use ApiResponser;

    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->middleware('auth:sanctum');
        $this->userService = $userService;
    }

    public function show(int $id): JsonResponse
    {
        try {
            $user = $this->userService->getUserById($id);
            return $this->successResponse($user);
        } catch (UserNotFoundException $e) {
            return $this->errorResponse("Usuário não encontrado", 400);
        }
    }

    public function index(): JsonResponse
    {
        $users = $this->userService->getAllUsers();
        return $this->successResponse($users);
    }

    public function update(int $id, UpdateUserRequest $request): JsonResponse
    {
        try {
            $updateUserDto = UpdateUserDto::fromRequest($request);
            $user = $this->userService->updateUser($id, $updateUserDto);
            return $this->successResponse($user, "Usuário atualizado com sucesso!");
        } catch (UserNotFoundException $e) {
            return $this->errorResponse("Usuário não encontrado", 400);
        }
    }

    public function destroy(int $id): JsonResponse
    {
        try {
            $this->userService->deleteUser($id);
            return $this->successResponse(null, "Usuário deletado com sucesso!", 200);
        } catch (UserNotFoundException $e) {
            return $this->errorResponse("Usuário não encontrado", 404);
        }
    }
}
