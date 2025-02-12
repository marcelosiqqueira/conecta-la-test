<?php

namespace App\Services;


use App\DTOs\Auth\LoginUserDto;
use App\Repositories\Eloquent\EloquentAuthRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    protected EloquentAuthRepository $authRepository;

    public function __construct(EloquentAuthRepository $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function login(LoginUserDto $loginUserDto): JsonResponse
    {
        $user = $this->authRepository->findByEmail($loginUserDto->email);

        if (!$user || !Hash::check($loginUserDto->password, $user->password)) {
            throw new Exception("Credenciais inválidas.");
        }

        $token = $user->createToken('token-name')->plainTextToken;

        return response()->json(['token' => $token], 200);
    }
}
