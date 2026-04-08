<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\MusicaController;
use App\Http\Controllers\JuegosController;


Route::get('/', [InicioController::class, 'VistaInicial']);
Route::get('/musica', [MusicaController::class, 'VistaMusica']);
Route::get('/juegos', [JuegosController::class, 'VistaJuegos']);
