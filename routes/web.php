<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InicioController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/inicio', [InicioController::class, 'VistaInicial']);
Route::get('/musica', [InicioController::class, 'VistaMusica']);
Route::get('/juegos', [InicioController::class, 'VistaJuegos']);
