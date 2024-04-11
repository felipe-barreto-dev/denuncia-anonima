<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/admin', 'App\Http\Controllers\Admin@index');


Route::get('/analist', 'App\Http\Controllers\Analist@index');

Route::get('/user', 'App\Http\Controllers\User@index');