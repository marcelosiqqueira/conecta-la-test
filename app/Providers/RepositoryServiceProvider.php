<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Repositories\Eloquent\EloquentUserRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Registra os serviços da aplicação.
     */
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class, EloquentUserRepository::class);
    }

    /**
     * Executa as ações de inicialização dos serviços.
     */
    public function boot(): void
    {
        //
    }
}
