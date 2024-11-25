<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ReservaHistorico;
use App\Models\AmbientesReserva;
use App\Models\User;
use Carbon\Carbon;

class ReservaHistoricoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $historicos = [
            [
                'reserva_id' => AmbientesReserva::first()->id,
                'usuario_id' => User::where('email', 'ariosilucas@gmail.com')->first()->id,
                'alteracoes' => 'Reserva criada.',
                'alterado_em' => Carbon::now()->format('Y-m-d'),
            ],
            [
                'reserva_id' => AmbientesReserva::first()->id,
                'usuario_id' => User::where('email', 'maria.silva@gmail.com')->first()->id,
                'alteracoes' => 'Reserva alterada.',
                'alterado_em' => Carbon::now()->format('Y-m-d'),
            ],
            [
                'reserva_id' => AmbientesReserva::first()->id,
                'usuario_id' => User::where('email', 'ariosilucas@gmail.com')->first()->id,
                'alteracoes' => 'Reserva cancelada.',
                'alterado_em' => Carbon::now()->format('Y-m-d'),
            ],
        ];

        foreach ($historicos as $historico) {
            ReservaHistorico::create($historico);
        }
    }
}