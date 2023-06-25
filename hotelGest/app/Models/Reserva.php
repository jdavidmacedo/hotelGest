<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;
    protected $table = 'reserva';

    protected $fillable = [
        'id_cliente',
        'id_hotel',
        'id_quarto_epoca',
        'data_checkin',
        'data_checkout',
        'status'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }

    public function hotel()
    {
        return $this->belongsTo(Hotel::class, 'id_hotel');
    }

    public function QuartoEpoca()
    {
        return $this->belongsTo(QuartoEpoca::class, 'id_quarto_epoca');
    }
}
