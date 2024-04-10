<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    protected $table = 'perfis'; // Define o nome da tabela

    protected $fillable = [
        'nome'
    ];

}
