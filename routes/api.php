<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\ExceptionHandlingMiddleware;
use Illuminate\Support\Facades\Route;

// Rota de login
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::post('/users', [AuthController::class, 'register'])
    ->middleware(ExceptionHandlingMiddleware::class)
    ->name('users.register');

Route::middleware(['auth:sanctum', ExceptionHandlingMiddleware::class])
    ->apiResource('users', UserController::class)
    ->except(['store']);
