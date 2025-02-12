<?php

namespace App\DTOs\User;

use App\Http\Requests\CreateUserRequest;
use Illuminate\Support\Facades\Hash;

class CreateUserDto
{
    public function __construct(
        public string $name,
        public string $email,
        public string $hashedPassword
    ) {}

    public static function fromRequest(CreateUserRequest $request): self
    {
        return new self(
            $request->name,
            $request->email,
            Hash::make($request->password) // Hash da senha movido para o DTO
        );
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->hashedPassword,
        ];
    }
}
