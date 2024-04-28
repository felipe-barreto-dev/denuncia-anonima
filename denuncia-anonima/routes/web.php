<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\CreateController;
use Illuminate\Support\Facades\Route;

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });
//Rota para denunciar sem as credencias
Route::get('/create-report', [CreateController::class, 'create'])->name('create-report');

require __DIR__.'/auth.php';

// Rotas para as telas acessíveis apenas após o login
//Route::middleware(['auth'])->group(function () {
    Route::get('/create', 'App\Http\Controllers\CreateController@create')->name('denuncia.create');
    Route::post('/create', 'App\Http\Controllers\CreateController@store')->name('denuncia.store');
    Route::get('/confirmation', 'App\Http\Controllers\ConfirmationController@confirmation')->name('confirmation');

    //Como ainda não temos o banco de dados populado, não temos denúncia cadastrada para ter um id AINDA
    //Route::get('/show/{id}', 'App\Http\Controllers\ShowController@show')->name('denuncia.show');
    Route::get('/show', 'App\Http\Controllers\ShowController@show')->name('denuncia.show');
//});