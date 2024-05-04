<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Denuncia;

class ShowReportsController extends Controller
{
    public function index()
    {
        // Recupere todas as denúncias do usuário atual (você precisará de lógica para determinar o usuário atual)
        $userReports = Denuncia::where('id_usuario', auth()->user()->id)->get();

        // Passe os dados das denúncias para a visualização
        return view('site.index', ['userReports' => $userReports]);
    }
}
