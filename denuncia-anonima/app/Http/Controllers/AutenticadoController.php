<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AutenticadoController extends Controller
{
    public function autenticado()
    {
        $usuario = Auth::user();
        return view('site.history');
    }
}