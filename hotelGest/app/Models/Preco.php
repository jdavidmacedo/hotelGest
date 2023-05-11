<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preco extends Model
{
    use HasFactory;
    protected $table = 'preco';

    protected $fillable = [
        'id_tipo_quartos',
        'id_epoca',
        'preco'
    ];

    public function tipoQuarto()
    {
        return $this->belongsTo(TipoQuarto::class, 'id_tipo_quartos');
    }

    public function epoca()
    {
        return $this->belongsTo(Epoca::class, 'id_epoca');
    }
}
