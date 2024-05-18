<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Denuncia;

class ShowController extends Controller
{
    public function show($id)
    {
         // Recupere a denúncia específica pelo id, incluindo os tipos de denúncia
         $denuncia = Denuncia::with('tiposDenuncia')->find($id);

         // Verifica se a denúncia existe e se pertence ao usuário autenticado
         if ($denuncia && $denuncia->id_usuario == auth()->user()->id) {
             // Passe os dados da denúncia para a visualização
             return view('site.show-report', ['denuncia' => $denuncia]);
         } else {
             // Redireciona ou exibe uma mensagem de erro se a denúncia não for encontrada ou não pertencer ao usuário
             return redirect()->route('denuncias.index')->with('error', 'Denúncia não encontrada ou não autorizada.');
         }
    }
}
