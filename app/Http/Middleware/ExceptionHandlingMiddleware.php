<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Response;
use Throwable;

class ExceptionHandlingMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        try {
            return $next($request);
        } catch (Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => 'Ocorreu um erro no servidor.',
                'exception' => get_class($th),
                'details' => $th->getMessage(),
            ], 500);
        }
    }
}
