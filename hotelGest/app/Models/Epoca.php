<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Epoca extends Model
{
    use HasFactory;
    protected $table = 'epoca';

    protected $fillable = [
        'nome',
        'data_inicio',
        'data_fim'
    ];
}
