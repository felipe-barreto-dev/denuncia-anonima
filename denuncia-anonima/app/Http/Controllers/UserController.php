<?php

namespace App\Http\Controllers;

use App\Models\Perfil;
use Illuminate\Http\Request;
use App\Models\Usuario;

class UserController extends Controller
{
    public function create()
    {
        $perfis = Perfil::all();
        $usuarios = Usuario::with('perfil')->whereIn('id_perfil', [1, 3])->get();
            return view('auth.register', ['perfis' => $perfis, 'usuarios' => $usuarios]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'login' => 'required|string|max:255|unique:usuarios',
            'password' => 'required|string|min:8|confirmed',
            'perfil' => 'required|exists:perfis,id',
        ]);

        $user = new Usuario();
        $user->login = $request->login;
        $user->password = bcrypt($request->password);
        $user->id_perfil = $request->perfil;
        $user->save();

        return redirect()->route('criar.usuario')->with('success', 'Usuário criado com sucesso!');
    }
}
