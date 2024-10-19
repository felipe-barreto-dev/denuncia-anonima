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
        'login',
        'password',
        'id_perfil'
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

    public function denuncias()
    {
        return $this->hasMany(Denuncia::class, 'id_usuario'); // Certifique-se de que 'id_usuario' é a chave estrangeira na tabela de denuncias
    }

    public function canAccessChat($denunciaId)
    {
        return $this->denuncias()->where('id', $denunciaId)->exists();
    }

    /**
     * Retorna todas as denúncias associadas ao usuário.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAllDenuncias()
    {
        return $this->denuncias()->get();
    }
}
