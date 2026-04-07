<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InicioController extends Controller
{
    public function VistaInicial()
    {
        return view('layout.Inicio');
    }
    public function VistaMusica()
    {
        return view('layout.VistaMusica');
    }
    public function VistaJuegos()
    {
        return view('layout.VistaJuegos');
    }
}
