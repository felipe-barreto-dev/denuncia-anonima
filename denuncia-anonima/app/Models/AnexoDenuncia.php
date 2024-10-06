<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnexoDenuncia extends Model
{
    protected $table = 'anexos_denuncia';

    protected $fillable = [
        'id_denuncia',
        'caminho_arquivo',
        'nome_arquivo',
    ];

    public function denuncia()
    {
        return $this->belongsTo(Denuncia::class, 'id_denuncia');
    }
}
