<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Events\TesteEvent;
use App\Models\Denuncia;
use App\Models\RespostasDenuncia;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function show($id_denuncia)
    {
        $denuncia = Denuncia::findOrFail($id_denuncia);
        $messages = RespostasDenuncia::where('id_denuncia', $id_denuncia)->with('user')->get();

        return view('chat', [
            'denuncia' => $denuncia,
            'messages' => $messages,
        ]);
    }

    public function sendMessage(Request $request)
    {
        try {
            \Log::info('Entrou na função sendMessage');
            $request->validate([
                'mensagem' => 'required|string',
                'id_denuncia' => 'required|exists:denuncias,id',
            ]);
            \Log::info('Validação concluída');

            $message = RespostasDenuncia::create([
                'id_usuario' => auth()->id(),
                'mensagem' => $request->input('mensagem'),
                'id_denuncia' => $request->input('id_denuncia'),
                'data_envio' => now(),
            ]);
            \Log::info('Criação concluída');

            broadcast(new MessageSent($message->load('user')))->toOthers();
            \Log::info('Evento MessageSent enviado');

            return response()->json(['success' => 'Message sent successfully']);
        } catch (\Exception $e) {
            \Log::error('Erro ao enviar mensagem: ' . $e->getMessage());
            return response()->json(['error' => 'Erro ao enviar mensagem de denúncia: ' . $e->getMessage()], 500);
        }
    }
}

