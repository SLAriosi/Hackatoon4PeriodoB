<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservaHistorico extends Model
{
    use HasFactory;

    protected $table = 'reservas_historico';

    protected $fillable = [
        'reserva_id',
        'usuario_id',
        'alteracoes',
        'alterado_em',
    ];

    public function reserva()
    {
        return $this->belongsTo(AmbientesReserva::class, 'reserva_id');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }
}