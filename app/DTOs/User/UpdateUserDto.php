<?php

namespace App\DTOs\User;

use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Hash;

class UpdateUserDto
{
    public function __construct(
        public string $name,
        public string $hashedPassword
    ) {}

    public static function fromRequest(UpdateUserRequest $request): self
    {
        return new self(
            $request->name,
            Hash::make($request->password)
        );
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'password' => $this->hashedPassword,
        ];
    }
}
