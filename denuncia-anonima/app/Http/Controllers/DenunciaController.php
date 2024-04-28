<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Denuncia;
use Illuminate\Http\Request;
use App\Models\TipoDenuncia; // Certifique-se de importar o modelo de TipoDenuncia

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
        $denuncia->pessoas_afetadas = 'outros';
        $denuncia->id_responsavel = 3;
        $denuncia->id_usuario = 4;
        $denuncia->save();

        return redirect()->route('autenticado')->with('success', 'Denúncia criada com sucesso!');
    }
}
