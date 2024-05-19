<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Denuncia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\TipoDenuncia;

class CreateReportTypeController extends Controller
{
    public function create()
    {
        return view('auth.create-report-type'); 
    }

    public function store(Request $request)
    {
        // Validação dos dados
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'required|string',
        ]);

        // Armazenar os dados no banco de dados
        TipoDenuncia::create($validated);

        // Redirecionar com mensagem de sucesso
        return redirect()->route('criar.tipo.denuncia')->with('success', 'Tipo de denúncia criado com sucesso!');
    }
}

