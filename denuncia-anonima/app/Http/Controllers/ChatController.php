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
        // Pega todas as mensagens mais recentes
        $messages = $denuncia->respostas()->with('user')->get();

        return response()->json([
            'messages' => $messages,
        ]);
    }
}
