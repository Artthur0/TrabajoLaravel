<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\MusicController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\AuthController;


Route::get('/login', [AuthController::class, 'showLogin'])->name('login_view');
Route::post('/login', [AuthController::class, 'login'])->name('login_proceso');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register_view');
Route::post('/register', [AuthController::class, 'register'])->name('register_proceso');


Route::middleware(['auth'])->group(function () {
    Route::get('/', [IndexController::class, 'VistaInicial'])->name('escritorio');
    Route::get('/musica', [MusicController::class, 'VistaMusica'])->name('musica_b');
    Route::get('/juegos', [GameController::class, 'VistaJuegos']);

    Route::get('/lares-downloads', [MusicController::class, 'VistaLares'])->name('lares_downloads');
    Route::post('/lares-downloads/descargar/{id}', [MusicController::class, 'descargar'])->name('descargar');

    Route::get('/musica/biblioteca', [MusicController::class, 'VistaMusica'])->name('mi_musica');

    Route::delete('/musica/eliminar/{id}', [MusicController::class, 'eliminarDeBiblioteca'])->name('eliminar_cancion');
    Route::post('/logout', function () {
        Auth::logout();
        return redirect()->route('login_view');
    })->name('logout');
});
