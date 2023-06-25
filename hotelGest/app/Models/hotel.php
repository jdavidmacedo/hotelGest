<?php
// app/Models/hotel.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{


    use HasFactory;
    protected $table = 'hotel';

    protected $fillable = [
        'nome',
        'email',
        'endereco',
        'cidade',
        'pais',
        'codigo_postal',
        'telefone',
        'estrelas',
        'descricao'
    ];

    public function quartos()
    {
        return $this->hasMany(Quarto::class, 'id_hotel');
    }


}



