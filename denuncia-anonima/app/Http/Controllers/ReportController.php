<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Denuncia;
use Illuminate\Http\Request;
use App\Models\TipoDenuncia; // Certifique-se de importar o modelo de TipoDenuncia
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;

class ReportController extends Controller
{

    public function create()
    {
        $tiposDenuncia = TipoDenuncia::all();
        return view('site.create-report', ['tiposDenuncia' => $tiposDenuncia]);
    }

    public function generate_unique_token()
    {
        return Str::random(32); // Gera um token único de 32 caracteres
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

    public function generate_random_credentials()
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $characters_length = strlen($characters);

        $login = '';
        $password = '';

        // Gerar login aleatório
        for ($i = 0; $i < 8; $i++) {
            $random_index = rand(0, $characters_length - 1);
            $login .= $characters[$random_index];
        }

        // Gerar senha aleatória
        for ($i = 0; $i < 10; $i++) {
            $random_index = rand(0, $characters_length - 1);
            $password .= $characters[$random_index];
        }

        return ['login' => $login, 'password' => $password];
    }

    public function store(Request $request)
    {
        $credentials = null;
    
        if (!Auth::check()) {
            $credentials = $this->generate_random_credentials();
    
            $usuario = new Usuario();
            $usuario->login = $credentials['login'];
            $usuario->password = bcrypt($credentials['password']);
            $usuario->id_perfil = 1;
            $usuario->save();

            Auth::login($usuario);
        }

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

        if ($credentials) {
            $token = $this->generate_unique_token();
    
            // Salvar os detalhes da denúncia com o token gerado
            Cache::put('denuncia_' . $token, [
                'login' => $credentials['login'],
                'password' => $credentials['password'],
                'protocolo' => $denuncia->protocolo
            ], now()->addHours(1)); // Define o tempo de expiração do cache para 1 hora
    
            // Redireciona para a rota adequada com o token gerado
            return redirect()->route('confirmacao', ['token' => $token])->with('success', 'Denúncia criada com sucesso!');
        }

        return redirect()->route('denuncias.index');
    }
}
