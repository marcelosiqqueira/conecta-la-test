<?php

use App\Http\Middleware\ExceptionHandlingMiddleware;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Request; // 🔹 Importação correta do Request

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->append(ExceptionHandlingMiddleware::class);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->render(function (ValidationException $e, Request $request) {
            return response()->json([
                'message' => 'Erro de validação',
                'errors' => $e->errors()
            ], 422);
        });

        $exceptions->render(function (ModelNotFoundException $e, Request $request) {
            return response()->json([
                'message' => 'Recurso não encontrado'
            ], 404);
        });

        $exceptions->render(function (\Exception $e, Request $request) { // 🔹 Usando Exception ao invés de Throwable
            return response()->json([
                'message' => 'Erro interno no servidor',
                'exception' => get_class($e),
                'details' => $e->getMessage(),
            ], 500);
        });
    })
    ->create();
