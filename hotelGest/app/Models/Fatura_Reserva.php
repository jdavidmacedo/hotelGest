<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fatura_Reserva extends Model
{
    protected $table = 'fatura_reserva';

    protected $fillable = [
        'id_reserva',
        'id_fatura',
    ];

    public function reserva()
    {
        return $this->belongsTo(Reserva::class, 'id_reserva');
    }

    public function fatura()
    {
        return $this->belongsTo(Fatura::class, 'id_fatura');
    }
}
