<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Carbon\Carbon;

class RespostasDenuncia extends Model
{
    use HasFactory;

    protected $table = 'respostas_denuncias';

    // Definindo os campos que podem ser preenchidos em massa
    protected $fillable = [
        'id_usuario',
        'mensagem',
        'id_denuncia',
        'data_envio'
    ];

    // Relacionamento com o modelo de usuário
    public function user(): BelongsTo
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }

    // Relacionamento com o modelo de denúncia
    public function report(): BelongsTo
    {
        return $this->belongsTo(Denuncia::class, 'id_denuncia');
    }

    // Formata a data de envio para um formato mais amigável
    public function getFormattedDateAttribute(): string
    {
        return Carbon::parse($this->data_envio)->format('d M Y, H:i:s');
    }

    // Verifica se a resposta foi enviada pelo autor da denúncia
    public function isAuthor(): bool
    {
        return $this->user->id === $this->report->id_usuario;
    }

    // Retorna os primeiros 50 caracteres da mensagem como um resumo
    public function getSummaryAttribute(): string
    {
        return mb_strimwidth($this->mensagem, 0, 50, '...');
    }
}
