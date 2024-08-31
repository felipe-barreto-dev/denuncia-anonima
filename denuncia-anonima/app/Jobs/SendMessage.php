<?php

namespace App\Jobs;

use App\Events\GotMessage;
use App\Models\RespostasDenuncia;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendMessage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(public RespostasDenuncia $message)
    {
        //
    }

    public function handle(): void
    {
        GotMessage::dispatch([
            'id' => $this->message->id,
            'id_usuario' => $this->message->id_usuario,
            'mensagem' => $this->message->mensagem,
            'data_envio' => $this->message->data_envio,
        ]);
    }
}