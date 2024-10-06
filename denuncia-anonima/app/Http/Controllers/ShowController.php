<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Denuncia;
use App\Models\RespostasDenuncia;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function show($id)
    {
        // Recupere a denúncia específica pelo id, incluindo os tipos de denúncia
        $denuncia = Denuncia::with('tiposDenuncia')->find($id);
        $analistas = Usuario::whereHas('perfil', function ($query) {
            $query->where('nome', 'analista');
        })->get();

        $messages = RespostasDenuncia::where('id_denuncia', $id)->with('user')->get();

        // Verifica se a denúncia existe e se pertence ao usuário autenticado ou o usuário autenticado é admin ou o usuário autenticado é responsavel pela denúncia
        if ($denuncia && ($denuncia->id_usuario == auth()->user()->id || auth()->user()->perfil->nome == "admin" || $denuncia->id_responsavel == auth()->user()->id)) {
            // Passe os dados da denúncia para a visualização
            return view('site.show-report', ['denuncia' => $denuncia, 'analistas' => $analistas, 'messages' => $messages]);
        } else {
            // Redireciona ou exibe uma mensagem de erro se a denúncia não for encontrada ou não pertencer ao usuário
            return redirect()->route('denuncias.index')->with('error', 'Denúncia não encontrada ou não autorizada.');
        }
    }

    public function concluirDenuncia($id)
    {
        $user = Auth::user();

        // Encontrar a denúncia pelo ID
        $denuncia = Denuncia::findOrFail($id);

        // Verificar se o usuário tem permissão para concluir a denúncia
        if ($user->perfil->nome === 'admin' || $user->perfil->nome === 'analista') {
            $denuncia->data_conclusao = now(); // Definir a data de conclusão como a data atual
            $denuncia->save();
            return redirect()->route('denuncias.index')->with('success', 'Denúncia concluída com sucesso.');
        }

        return redirect()->route('denuncias.index')->with('error', 'Você não tem permissão para concluir esta denúncia.');
    }

    public function delegarResponsavel(Request $request, $id)
    {
        $request->validate([
            'id_responsavel' => 'required|exists:usuarios,id',
        ]);

        $denuncia = Denuncia::findOrFail($id);

        if (Auth::user()->perfil->nome === 'admin') {
            $denuncia->id_responsavel = $request->id_responsavel;
            $denuncia->save();
            return redirect()->route('denuncias.index')->with('success', 'Responsável atribuído com sucesso.');
        }

        return redirect()->route('denuncias.index')->with('error', 'Você não tem permissão para atribuir um responsável a esta denúncia.');
    }
}
