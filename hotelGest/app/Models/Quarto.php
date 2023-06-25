<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quarto extends Model
{
    use HasFactory;
    protected $table = 'quartos';

    protected $fillable = ['id_hotel',
        'id_tipo_quartos',
        'numero_do_quarto',
        'status',
        'descricao',
        'piso'
    ];

    public function hotel()
    {
        return $this->belongsTo(Hotel::class, 'id_hotel');
    }

    public function tipo_quartos()
    {
        return $this->belongsTo(TipoDeQuarto::class, 'id_tipo_quartos');
    }

}

