<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Denuncia;
use Illuminate\Support\Facades\Auth;

class ShowReportsController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $userRole = $user->perfil->nome;

        switch ($userRole) {
            case 'admin':
                $userReports = Denuncia::all();
                break;
            case 'analista':
                $userReports = Denuncia::where('id_responsavel', $user->id)->get();
                break;
            case 'denunciante':
                $userReports = Denuncia::where('id_usuario', $user->id)->get();
                break;
            default:
                return redirect()->route('home')->with('error', 'Perfil não reconhecido.');
        }

        return view('site.index', ['userReports' => $userReports]);
    }
}
