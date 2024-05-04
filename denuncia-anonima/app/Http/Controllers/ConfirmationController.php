<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class ConfirmationController extends Controller
{
    public function confirmation($token)
    {
        $details = Cache::get('denuncia_' . $token);

        // Verifica se os detalhes foram encontrados
        if (!$details) {
            abort(404); // Denúncia não encontrada
        }

        // Remover os detalhes da denúncia do cache após exibição
        Cache::forget('denuncia_' . $token);

        return view('site.confirmation', ['details' => $details]);
    }
}
