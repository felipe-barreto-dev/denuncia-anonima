<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Denuncia extends Model
{
    use HasFactory;

    protected $table = 'denuncias';

    // Campos que podem ser preenchidos em massa
    protected $fillable = [
        'protocolo',
        'descricao',
        'titulo',
        'pessoas_afetadas',
        'id_usuario',
        'id_responsavel',
        'data_conclusao',
        'data_ocorrido'
    ];

    protected $casts = [
        'data_ocorrido' => 'datetime',
    ];

    // Relacionamento com tipos de denúncia (muitos para muitos)
    public function tiposDenuncia(): BelongsToMany
    {
        return $this->belongsToMany(
            TipoDenuncia::class,
            'denuncia_tipo_denuncia',
            'denuncia_id',
            'tipo_denuncia_id'
        )->withTimestamps();
    }

    // Relacionamento com o usuário que fez a denúncia
    public function usuario(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }

    // Relacionamento com o usuário responsável
    public function responsavel(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_responsavel');
    }

    // Relacionamento com anexos
    public function anexos(): HasMany
    {
        return $this->hasMany(AnexoDenuncia::class, 'id_denuncia');
    }

    // Relacionamento com respostas
    public function respostas(): HasMany
    {
        return $this->hasMany(RespostasDenuncia::class, 'id_denuncia');
    }

    // Verifica se a denúncia foi concluída
    public function isConcluded(): bool
    {
        return !is_null($this->data_conclusao);
    }

    // Formata a data de ocorrido para um formato mais amigável
    public function getFormattedDataOcorridoAttribute(): string
    {
        return \Carbon\Carbon::parse($this->data_ocorrido)->format('d/m/Y');
    }
}
