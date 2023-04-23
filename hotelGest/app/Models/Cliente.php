<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'cliente';
    use HasFactory;

    protected $fillable = [
        'nome',
        'sobrenome',
        'email',
        'telefone',
        'endereco',
        'cidade',
        'pais',
    ];
}
