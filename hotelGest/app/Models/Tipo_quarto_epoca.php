<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Tipo_quarto_epoca extends Model
{
    use HasFactory;
    protected $table = 'tipo_quartos_epoca';

    protected $fillable = [
        'id_quartos',
        'id_epoca',
        'id_tipo_quartos',
        'preco_base_por_noite',

    ];
    public function tipo_quartos()
    {
        return $this->belongsTo(TipoDeQuarto::class, 'id_tipo_quartos');
    }

    public function epoca()
    {
        return $this->belongsTo(Epoca::class, 'id_epoca');
    }

    public function quarto()
    {
        return $this->belongsTo(Quarto::class, 'id_quarto');
    }
}
