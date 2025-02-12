<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Criar um administrador fixo
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('senha123'), // Senha segura
            'is_admin' => true,
        ]);

        // Criar um usuário comum fixo
        User::create([
            'name' => 'usuario1',
            'email' => 'user@gmail.com',
            'password' => Hash::make('senha123'),
            'is_admin' => false,
        ]);
    }
}
