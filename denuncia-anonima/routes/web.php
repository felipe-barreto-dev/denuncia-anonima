<?php

use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\ShowReportsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AutenticadoController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ConfirmationController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('criar-usuario', [UserController::class, 'create'])->name('criar.usuario');
    Route::post('criar-usuario', [UserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

Route::get('fazer-denuncia', [ReportController::class, 'create']);
Route::post('fazer-denuncia', [ReportController::class, 'store'])->name('fazer-denuncia');

Route::fallback(function() {
    echo 'A rota acessada não existe. <a href="'.route('login').'">Clique aqui</a> para ir na página inicial';
});

Route::middleware('auth')->group(function () {
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
    Route::get('autenticado', [AutenticadoController::class, 'autenticado']);

    Route::get('confirmacao/{token}', [ConfirmationController::class, 'confirmation'])->name('confirmacao');

    Route::get('/', [ShowReportsController::class, 'index'])->name('denuncias.index');

    Route::get('show/{id}', 'App\Http\Controllers\ShowController@show')->name('denuncia.show');
});