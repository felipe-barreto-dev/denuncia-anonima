<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Denuncia extends Model
{
    use HasFactory;
    protected $table = 'denuncias'; // Define o nome da tabela

    protected $fillable = [
        'protocolo', 'descricao', 'titulo', 'pessoas_afetadas', 'id_usuario', 'id_responsavel', 'data_conclusao', 'data_ocorrido'
    ];
    
    public function tiposDenuncia()
    {
        return $this->belongsToMany(TipoDenuncia::class, 'denuncia_tipo_denuncia', 'denuncia_id', 'tipo_denuncia_id')->withTimestamps();
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }

    public function responsavel()
    {
        return $this->belongsTo(User::class, 'id_responsavel');
    }

    public function anexos()
    {
        return $this->hasMany(AnexoDenuncia::class, 'id_denuncia');
    }
}
