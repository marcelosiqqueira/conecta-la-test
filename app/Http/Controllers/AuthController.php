<?php

namespace App\Http\Controllers;

use App\DTOs\Auth\LoginUserDto;
use App\DTOs\User\CreateUserDto;
use App\Http\Requests\CreateUserRequest;
use App\Services\AuthService;
use App\Services\UserService;
use App\Traits\ApiResponser;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    use ApiResponser;

    protected $userService;
    protected AuthService $authService;

    public function __construct(UserService $userService, AuthService $authService)
    {
        $this->userService = $userService;
        $this->authService = $authService;
    }

    public function login(Request $request): JsonResponse
    {
        $loginUserDto = LoginUserDto::fromRequest($request);
        return $this->authService->login($loginUserDto);
    }

    public function register(CreateUserRequest $request): JsonResponse
    {
        $createUserDto = CreateUserDto::fromRequest($request);
        $user = $this->userService->createUser($createUserDto);
        return $this->successResponse($user, "Usuário criado com sucesso!", 201);
    }
}
