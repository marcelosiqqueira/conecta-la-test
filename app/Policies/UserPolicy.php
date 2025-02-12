<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    /**
     * Determine se o usuário pode visualizar o modelo.
     */
    public function view(User $authUser, User $user): bool
    {
        // Administradores podem visualizar qualquer usuário
        // Usuários não administradores só podem visualizar a si mesmos
        return $authUser->is_admin || $authUser->id === $user->id;
    }

    /**
     * Determine se o usuário pode criar modelos.
     */
    public function create(User $authUser): bool
    {
        // Apenas administradores podem criar usuários
        return $authUser->is_admin;
    }

    /**
     * Determine se o usuário pode atualizar o modelo.
     */
    public function update(User $authUser, User $user): bool
    {
        // Administradores podem atualizar qualquer usuário
        // Usuários não administradores só podem atualizar a si mesmos
        return $authUser->is_admin || $authUser->id === $user->id;
    }

    /**
     * Determine se o usuário pode deletar o modelo.
     */
    public function delete(User $authUser, User $user): bool
    {
        // Administradores podem deletar qualquer usuário
        // Usuários não administradores só podem deletar a si mesmos
        return $authUser->is_admin || $authUser->id === $user->id;
    }
}
