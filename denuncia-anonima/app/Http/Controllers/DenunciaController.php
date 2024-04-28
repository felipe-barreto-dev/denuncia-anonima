<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Denuncia;
use Illuminate\Http\Request;
use App\Models\TipoDenuncia; // Certifique-se de importar o modelo de TipoDenuncia
use Illuminate\Support\Facades\Auth;

class DenunciaController extends Controller
{

    public function create()
    {
        $tiposDenuncia = TipoDenuncia::all();
        return view('usuario.fazer-denuncia', ['tiposDenuncia' => $tiposDenuncia]);
    }

    public function generate_protocol()
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        $characters_length = strlen($characters);

        $protocol = '';

        for ($i = 0; $i < 6; $i++) {
            $random_index = rand(0, $characters_length - 1);
            $protocol .= $characters[$random_index];
        }

        return $protocol;
    }

    public function store(Request $request)
    {
        $denuncia = new Denuncia();
    
        $denuncia->protocolo = $this->generate_protocol();
    
        $denuncia->descricao = $request->input('descricao');
        $denuncia->titulo = $request->input('titulo');
        $denuncia->pessoas_afetadas = $request->input('pessoas_afetadas');
    
        $denuncia->id_usuario = Auth::id();
    
        $denuncia->save();
    
        // Tipos de denúncia (array com os IDs das opções selecionadas)
        $tiposDenuncia = $request->input('tipos_denuncia');
        $denuncia->tiposDenuncia()->attach($tiposDenuncia);
    
        // Redireciona para a rota adequada com uma mensagem de sucesso
        return redirect()->route('autenticado')->with('success', 'Denúncia criada com sucesso!');
    }
    
}
