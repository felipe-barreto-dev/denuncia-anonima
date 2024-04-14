<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Denuncia extends Model
{
    protected $table = 'denuncias'; // Define o nome da tabela

    protected $fillable = [
        'protocolo', 'descricao', 'titulo', 'pessoas_afetadas', 'id_usuario', 'id_responsavel'
    ];

}
