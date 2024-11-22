<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Denuncia;
use App\Models\Perfil;
use Exception;
use Illuminate\Http\Request;
use App\Models\TipoDenuncia;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;

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

        $login = 'user_' . Str::random(8);
        $password = Str::random(12);

        // for ($i = 0; $i < 10; $i++) {
        //     $random_index = rand(0, $characters_length - 1);
        //     $password .= $characters[$random_index];
        // }

        return ['login' => $login, 'password' => $password];
    }

    public function store(Request $request)
    {
        $credentials = null;

        $messages = [
            'arquivos.*.max' => 'Os arquivos não podem ter mais que 2MB.',
            'arquivos.*.mimes' => 'Os arquivos devem ser um dos seguintes tipos: jpg, jpeg, png, pdf, doc, docx, xls, xlsx, csv, zip, rar.'
        ];

        $request->validate([
            'arquivos.*' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx,xls,xlsx,csv,zip,rar|max:2048',
        ], $messages);

        if (!Auth::check()) {
            $credentials = $this->generate_random_credentials();

            $usuario = new Usuario();
            $usuario->login = $credentials['login'];
            $usuario->password = bcrypt($credentials['password']);
            $perfil = Perfil::where('nome', 'denunciante')->first();

            if ($perfil) {
                $usuario->id_perfil = $perfil->id;
            } else {
                throw new Exception('Perfil "denunciante" não encontrado.');
            }

            $usuario->save();

            Auth::login($usuario);
        }

        //$data_ocorrido = Carbon::createFromFormat('d/m/Y', $request->input('data_ocorrido'))->format('Y-m-d');

        $denuncia = new Denuncia();

        $denuncia->protocolo = $this->generate_protocol();

        $denuncia->descricao = $request->input('descricao');
        $denuncia->titulo = $request->input('titulo');
        $denuncia->pessoas_afetadas = $request->input('pessoas_afetadas');
        $denuncia->data_ocorrido = $request->input('data_ocorrido');

        $denuncia->id_usuario = Auth::id();

        $denuncia->save();

        if ($request->hasFile('arquivos')) {
            foreach ($request->file('arquivos') as $arquivo) {
                $caminhoArquivo = $arquivo->store('arquivos_denuncias', 'public'); 
                $nomeOriginal = $arquivo->getClientOriginalName(); 
                
                $denuncia->anexos()->create([
                    'id_denuncia' => $denuncia->id,
                    'caminho_arquivo' => $caminhoArquivo,
                    'nome_arquivo' => $nomeOriginal,
                ]);
            }
        }

        $tiposDenuncia = $request->input('tipos_denuncia');
        $denuncia->tiposDenuncia()->attach($tiposDenuncia);

        if ($credentials) {
            $token = $this->generate_unique_token();

            Cache::put('denuncia_' . $token, [
                'login' => $credentials['login'],
                'password' => $credentials['password'],
                'protocolo' => $denuncia->protocolo
            ], now()->addHours(1));
        }

        return response()->json([
            'redirect' => $credentials 
                ? route('confirmacao', ['token' => $token]) 
                : route('denuncias.index'),
            'message' => 'Denúncia criada com sucesso!',
        ], 200);
        
    }

    public function concluir($id)
    {
        try {
            $denuncia = Denuncia::findOrFail($id);
            $denuncia->data_conclusao = now();
            $denuncia->save();

            return redirect()->route('denuncias.index')->with('success', 'Denúncia concluída com sucesso!');
        } catch (Exception $e) {
            return redirect()->route('denuncias.index')->with('error', 'Erro ao concluir a denúncia: ' . $e->getMessage());
        }
    }
}
