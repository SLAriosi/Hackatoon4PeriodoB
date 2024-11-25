<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Notificacao;
use App\Models\User;

class NotificacaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $notificacoes = [
            [
                'usuario_id' => User::where('email', 'ariosilucas@gmail.com')->first()->id,
                'mensagem' => 'Sua reserva foi confirmada.',
                'tipo' => 'RESERVA',
                'lida' => false,
            ],
            [
                'usuario_id' => User::where('email', 'maria.silva@gmail.com')->first()->id,
                'mensagem' => 'Sua reserva foi cancelada.',
                'tipo' => 'CANCELAMENTO',
                'lida' => false,
            ],
            [
                'usuario_id' => User::where('email', 'ariosilucas@gmail.com')->first()->id,
                'mensagem' => 'Lembrete: Você tem uma reserva amanhã.',
                'tipo' => 'LEMBRETE',
                'lida' => false,
            ],
            [
                'usuario_id' => User::where('email', 'maria.silva@gmail.com')->first()->id,
                'mensagem' => 'Lembrete: Você tem uma reunião hoje.',
                'tipo' => 'LEMBRETE',
                'lida' => false,
            ],
            [
                'usuario_id' => User::where('email', 'ariosilucas@gmail.com')->first()->id,
                'mensagem' => 'Sua reserva foi alterada.',
                'tipo' => 'RESERVA',
                'lida' => false,
            ],
            [
                'usuario_id' => User::where('email', 'maria.silva@gmail.com')->first()->id,
                'mensagem' => 'Sua reserva foi aprovada.',
                'tipo' => 'RESERVA',
                'lida' => false,
            ],
            [
                'usuario_id' => User::where('email', 'ariosilucas@gmail.com')->first()->id,
                'mensagem' => 'Lembrete: Não se esqueça da sua reserva.',
                'tipo' => 'LEMBRETE',
                'lida' => false,
            ],
        ];

        foreach ($notificacoes as $notificacao) {
            Notificacao::create($notificacao);
        }
    }
}