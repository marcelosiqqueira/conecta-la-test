<?php

namespace App\Exceptions;

use App\Traits\ApiResponser;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserNotFoundException extends Exception
{
    use ApiResponser;

    /**
     * Reporta ou registra a exceção.
     */
    public function report(): void
    {
        // Lógica para registrar a exceção, se necessário
    }

    /**
     * Renderiza a exceção em uma resposta HTTP.
     */
    public function render(Request $request): JsonResponse
    {
        return $this->errorResponse("Usuário não encontrado!", 400);
    }
}
