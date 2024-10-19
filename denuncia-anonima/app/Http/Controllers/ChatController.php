<?php

namespace App\Http\Controllers;

use App\Models\Denuncia;
use App\Models\RespostasDenuncia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    // Método para enviar uma mensagem
    public function sendMessage(Request $request)
    {
        $validated = $request->validate([
            'mensagem' => 'required|string|max:1000',
            'denuncia_id' => 'required|exists:denuncias,id',
        ]);

        $message = RespostasDenuncia::create([
            'id_usuario' => Auth::id(),
            'mensagem' => $validated['mensagem'],
            'id_denuncia' => $validated['denuncia_id'],
            'data_envio' => now(),
        ]);

        return response()->json($message, 201);
    }

    // Método para buscar as mensagens de uma denúncia específica
    public function fetchMessages(Denuncia $denuncia, Request $request)
    {
        // Pega a última data de verificação para long polling
        $lastChecked = $request->input('last_checked');

        // Loop para long polling
        $startTime = time();
        while (time() - $startTime < 30) { // Timeout de 30 segundos
            $messagesQuery = $denuncia->respostas()->with('user')->latest();

            if ($lastChecked) {
                $messagesQuery->where('data_envio', '>', $lastChecked);
            }

            $messages = $messagesQuery->get();

            if ($messages->count() > 0) {
                return response()->json([
                    'messages' => $messages,
                    'last_checked' => now()->toDateTimeString(),
                ]);
            }

            usleep(500000); // Pausa de meio segundo antes de tentar novamente
        }

        // Retorna uma resposta vazia se não houver novas mensagens no intervalo de tempo
        return response()->json([
            'messages' => [],
            'last_checked' => now()->toDateTimeString(),
        ]);
    }
}
