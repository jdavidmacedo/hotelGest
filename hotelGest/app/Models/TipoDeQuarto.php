<?php

namespace App\Models;
// App\Models\TipoQuarto.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoDeQuarto extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_hotel',
        'nome',
        'descricao',
    ];

    public function hotel()
    {
        return $this->belongsTo(Hotel::class, 'id_hotel');
    }
}
