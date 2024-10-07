<?php

namespace App\Events;

use App\Models\RespostasDenuncia;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Queue\SerializesModels;

class MessageSent implements ShouldBroadcast
{
    use InteractsWithSockets, SerializesModels;

    public $message;

    public function __construct(RespostasDenuncia $message)
    {
        $this->message = $message;

        // Log a mensagem ao criar o evento
        \Log::info('Evento MessageSent criado com os dados:', [
            'mensagem' => $this->message->mensagem,
            'id_usuario' => $this->message->id_usuario,
            'id_denuncia' => $this->message->id_denuncia,
            'data_envio' => $this->message->data_envio,
        ]);
    }

    public function broadcastOn()
    {
        $channel = 'chat.' . $this->message->id_denuncia;

        // Log o canal em que o evento será transmitido
        \Log::info('Evento MessageSent será transmitido no canal:', [
            'canal' => $channel
        ]);

        return new PrivateChannel($channel); // Canal privado por denúncia
    }

    public function broadcastWith()
    {
        \Log::info('Dados a serem enviados com o evento MessageSent:', [
            'mensagem' => $this->message->mensagem,
            'user' => [
                'id' => $this->message->user->id,
                'name' => $this->message->user->name,
            ],
            'data_envio' => $this->message->data_envio,
        ]);
    
        return [
            'message' => [
                'mensagem' => $this->message->mensagem,
                'user' => [
                    'id' => $this->message->user->id,
                    'name' => $this->message->user->name,
                ],
                'data_envio' => $this->message->data_envio,
            ],
        ];
    }
    
}



