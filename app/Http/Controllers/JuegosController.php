<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JuegosController extends Controller
{
    public function VistaJuegos()
    {
        $Juegos = ['Chess', 'Genshin Impact', 'FIFA 2024', 'DokiDoki', 'Minecraft'];
        return view('layout.VistaJuegos')
            ->with(['Juegos' => $Juegos]);
    }
}
