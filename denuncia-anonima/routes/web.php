<?php

use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ShowController;
use App\Http\Controllers\ShowReportsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AutenticadoController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ConfirmationController;
use Illuminate\Support\Facades\Route;

Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('login', [AuthenticatedSessionController::class, 'store']);

Route::get('fazer-denuncia', [ReportController::class, 'create']);
Route::post('fazer-denuncia', [ReportController::class, 'store'])->name('fazer-denuncia');

Route::fallback(function () {
    echo 'A rota acessada não existe. <a href="' . route('login') . '">Clique aqui</a> para ir na página inicial';
});

Route::middleware('auth')->group(function () {
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
    Route::get('autenticado', [AutenticadoController::class, 'autenticado']);

    Route::get('confirmacao/{token}', [ConfirmationController::class, 'confirmation'])->name('confirmacao');

    Route::get('/', [ShowReportsController::class, 'index'])->name('denuncias.index');

    Route::get('show/{id}', [ShowController::class, 'show'])->name('denuncia.show');
    Route::post('concluir/{id}', [ReportController::class, 'concluir'])->name('denuncia.concluir');
    Route::post('delegar/{id}', [ShowController::class, 'delegarResponsavel'])->name('denuncia.delegar');

    Route::post('/chat/send', [ChatController::class, 'sendMessage'])->name('chat.send');
    Route::get('/chat/fetch/{denuncia}', [ChatController::class, 'fetchMessages'])->name('chat.fetch');

    Route::get('criar-usuario', [UserController::class, 'create'])->name('criar.usuario');
    Route::post('criar-usuario', [UserController::class, 'store']);
    Route::post('editar-usuario', [UserController::class, 'store'])->name('editar.usuario');
    Route::post('excluir-usuario', [UserController::class, 'store'])->name('excluir.usuario');
});