<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fatura extends Model
{
    use HasFactory;
    protected $table = 'fatura';

    protected $fillable = [
        'data',
        'valor_total',
        'status',
        'tipo_pagamento',
    ];
}
