<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Denuncia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ShowReportsController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $userRole = $user->perfil->nome;

        $filter = $request->input('filter', 'todas');

        switch ($userRole) {
            case 'admin':
                $query = Denuncia::query();
                break;
            case 'analista':
                $query = Denuncia::where('id_responsavel', $user->id);
                break;
            case 'denunciante':
                $query = Denuncia::where('id_usuario', $user->id);
                break;
            default:
                return redirect()->route('home')->with('error', 'Perfil não reconhecido.');
        }

        if ($filter === 'pendentes') {
            $query->whereNull('id_responsavel');
        } elseif ($filter === 'andamento') {
            $query->whereNull('data_conclusao')->whereNotNull('id_responsavel');
        } elseif ($filter === 'concluidas') {
            $query->whereNotNull('data_conclusao');
        }

        $userReports = $query->get();

        return view('site.index', [
            'userReports' => $userReports,
            'currentFilter' => $filter
        ]);
    }
}
