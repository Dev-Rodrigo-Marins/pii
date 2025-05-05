<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Arquivo;

class UsuarioSeeder extends Seeder
{
    public function run(): void
    {
        // Cria o usuário com e-mail verificado
        $user = User::create([
            'name' => 'Usuário Teste',
            'email' => 'usuario@example.com',
            'email_verified_at' => now(), // isso faz o bypass do "MustVerifyEmail"
            'password' => Hash::make('123456'),
        ]);

        // Cria um arquivo associado ao usuário
        Arquivo::create([
            'user_id' => $user->id,
            'arquivo' => 'Documento de Teste',
            'categoria' => 'Teste',
            'anexo' => 'arquivos/exemplo.pdf', // Você pode criar manualmente esse arquivo depois
        ]);
    }
}
