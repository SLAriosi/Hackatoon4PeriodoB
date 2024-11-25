<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AmbientesReserva extends Model
{
    use HasFactory;

    protected $table = 'ambientes_reservas';

    protected $fillable = [
        'data_reserva',
        'ambiente_id',
        'periodo',
        'user_id'
    ];

    public function ambiente()
    {
        return $this->belongsTo(Ambiente::class, 'ambiente_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
