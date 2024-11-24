<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'name' => 'Ariosi Lucas',
                'email' => 'ariosilucas@gmail.com',
                'password' => 'admin123',
                'role' => 'ADMINISTRADOR',
                'course' => 'SISTEMAS',
            ],
            [
                'name' => 'Maria Silva',
                'email' => 'maria.silva@gmail.com',
                'password' => 'admin123',
                'role' => 'PROFESSOR',
                'course' => 'PEDAGOGIA',
            ],
            [
                'name' => 'João Souza',
                'email' => 'joao.souza@gmail.com',
                'password' => 'admin123',
                'role' => 'ESTUDANTE',
                'course' => 'DIREITO',
            ],
            [
                'name' => 'Ana Pereira',
                'email' => 'ana.pereira@gmail.com',
                'password' => 'admin123',
                'role' => 'ESTUDANTE',
                'course' => 'PSICOLOGIA',
            ],
            [
                'name' => 'Carlos Lima',
                'email' => 'carlos.lima@gmail.com',
                'password' => 'admin123',
                'role' => 'ADMINISTRADOR',
                'course' => 'DIREITO',
            ],
            [
                'name' => 'Fernanda Costa',
                'email' => 'fernanda.costa@gmail.com',
                'password' => 'admin123',
                'role' => 'PROFESSOR',
                'course' => 'SISTEMAS',
            ],
            [
                'name' => 'Pedro Almeida',
                'email' => 'pedro.almeida@gmail.com',
                'password' => 'admin123',
                'role' => 'ESTUDANTE',
                'course' => 'PEDAGOGIA',
            ],
            [
                'name' => 'Juliana Santos',
                'email' => 'juliana.santos@gmail.com',
                'password' => 'admin123',
                'role' => 'ESTUDANTE',
                'course' => 'DIREITO',
            ],
            [
                'name' => 'Ricardo Oliveira',
                'email' => 'ricardo.oliveira@gmail.com',
                'password' => 'admin123',
                'role' => 'PROFESSOR',
                'course' => 'DIREITO',
            ],
            [
                'name' => 'Patrícia Mendes',
                'email' => 'patricia.mendes@gmail.com',
                'password' => 'admin123',
                'role' => 'ESTUDANTE',
                'course' => 'PSICOLOGIA',
            ]
        ];

        foreach ($users as $user) {
            User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'role' => $user['role'],
                'course' => $user['course'],
                'password' => Hash::make($user['password']),
            ]);
        }
    }
}
