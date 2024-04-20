<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario; // Certifique-se de importar o modelo de Usuario

class UsuarioController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        // Validação dos dados do formulário (opcional, mas recomendado)

        // Criação do usuário
        $usuario = new Usuario();
        $usuario->login = $request->input('login');
        $usuario->password = bcrypt($request->input('password'));
        $usuario->id_perfil = 1;
        $usuario->save();

        return redirect()->route('criar.usuario')->with('success', 'Usuário criado com sucesso!');
    }
}
