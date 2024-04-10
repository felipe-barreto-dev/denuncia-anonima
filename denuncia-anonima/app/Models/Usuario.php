<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuarios'; // Define o nome da tabela

    protected $fillable = [
        'login', 'senha', 'id_perfil'
    ];

    public function perfil()
    {
        return $this->belongsTo('App\Perfil', 'id_perfil');
    }
}
