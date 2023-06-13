<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReservaHospede extends Model
{
    protected $table = 'reserva_hospede';

    protected $fillable = [
        'id_cliente',
        'id_reserva',
        'nome',
        'sobrenome',
        'email',
        'telefone',
        'endereco',
        'pais',
        'data_nascimento',
        'NIF',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }

    public function reserva()
    {
        return $this->belongsTo(Reserva::class, 'id_reserva');
    }
}
