<?php

namespace App\DTOs\Auth;

use Illuminate\Http\Request;

class LoginUserDto
{
    public function __construct(
        public string $email,
        public string $password
    ) {}

    public static function fromRequest(Request $request): self
    {
        return new self(
            $request->email,
            $request->password
        );
    }

    public function toArray(): array
    {
        return [
            'email' => $this->email,
            'password' => $this->password,
        ];
    }
}
