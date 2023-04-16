<?php
// app/Models/hotel.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class hotel extends Model
{
    protected $table = 'hotel';
    protected $fillable = [
        'name',
        'endereco',
        'cidade',
        'pais',
        'telefone',
        'email'
    ];
}



