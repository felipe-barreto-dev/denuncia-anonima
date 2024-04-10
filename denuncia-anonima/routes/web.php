<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

Route::get('/denuncias-usuario', function () {
    return view('denuncias-usuario');
});
