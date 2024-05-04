<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoDenuncia extends Model
{
    protected $table = 'tipos_denuncia'; // Define o nome da tabela

    protected $fillable = [
        'titulo',
        'descricao'
    ];

}
