<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuartoEpoca extends Model
{
    protected $table = 'quarto_epoca';

    protected $fillable = [
        'id_quarto',
        'id_epoca',
        'id_tipo_quartos',
        'preco_base_por_noite',
    ];

    // Relacionamento com outras tabelas
    public function quarto()
    {
        return $this->belongsTo(Quarto::class, 'id_quarto');
    }

    public function epoca()
    {
        return $this->belongsTo(Epoca::class, 'id_epoca');
    }

    public function tipoQuartos()
    {
        return $this->belongsTo(TipoQuartos::class, 'id_tipo_quartos');
    }
}
