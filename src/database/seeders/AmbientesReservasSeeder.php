<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ambiente;
use App\Models\AmbientesReserva;
use App\Models\User;

class AmbientesReservasSeeder extends Seeder
{
    public function run()
    {
        $reservas = [
            [
                'data_reserva' => '2024-12-01',
                'ambiente_id' => Ambiente::where('name', 'Auditório')->first()->id,
                'periodo' => 'MANHÃ',
                'user_id' => '5',
            ],
            [
                'data_reserva' => '2024-12-02',
                'ambiente_id' => Ambiente::where('name', 'Biblioteca')->first()->id,
                'periodo' => 'TARDE',
                'user_id' => '1',
            ],
            // Adicione mais reservas aqui
        ];

        foreach ($reservas as $reserva) {
            AmbientesReserva::create($reserva);
        }
    }
}