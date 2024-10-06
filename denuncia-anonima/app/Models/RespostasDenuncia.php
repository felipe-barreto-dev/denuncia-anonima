<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RespostasDenuncia extends Model
{
    use HasFactory;

    public $table = 'respostas_denuncias';
    protected $fillable = ['id', 'id_usuario', 'mensagem', 'id_denuncia', 'data_envio'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }

    public function report(): BelongsTo
    {
        return $this->belongsTo(Denuncia::class, 'id_denuncia');
    }

    public function getTimeAttribute(): string
    {
        return date(
            "d M Y, H:i:s",
            strtotime($this->attributes['data_envio'])
        );
    }
}