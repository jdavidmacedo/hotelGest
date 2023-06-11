<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservaQuarto extends Model
{
    use HasFactory;
    protected $table = 'reserva_quartos';

    protected $fillable = [
        'id_reserva',
        'id_quarto',

    ];

    public function reserva()
    {
        return $this->belongsTo(Reserva::class, 'id_reserva');
    }

    public function quarto()
    {
        return $this->belongsTo(Quarto::class, 'id_quarto');
    }
}
