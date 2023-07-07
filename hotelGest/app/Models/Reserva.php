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
        'status',
        'preco_total'
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


    public function precoTotal() {
        if ($this->quartoEpoca) {
            $checkin = \Carbon\Carbon::parse($this->data_checkin);
            $checkout = \Carbon\Carbon::parse($this->data_checkout);
            $noites = $checkin->diffInDays($checkout);
            return $noites * $this->quartoEpoca->preco_base_por_noite;
        }
        // Caso não exista `quartoEpoca`, retornar algum valor padrão, como 0
        return 0;
    }

}
