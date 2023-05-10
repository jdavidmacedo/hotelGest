<?php

namespace App\Models;
// App\Models\TipoQuarto.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoDeQuarto extends Model
{
    use HasFactory;
    protected $table = 'tipo_quartos';

    protected $fillable = [
        'nome',
        'descricao',
    ];

}
