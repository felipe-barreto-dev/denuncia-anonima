<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class Usuario extends Model implements AuthenticatableContract
{
    use AuthenticatableTrait;
    protected $table = 'usuarios'; // Define o nome da tabela

    protected $fillable = [
        'login', 'password', 'id_perfil'
    ];

    protected $casts = [
        'password' => 'hashed',
    ];

    public function username()
    {
        return 'login';
    }

    public function perfil()
    {
        return $this->belongsTo(Perfil::class, 'id_perfil');
    }
}
