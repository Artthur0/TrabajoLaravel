<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MusicaController extends Controller
{
    public function VistaMusica(Request $request)
    {
        $buscar = $request->input('buscar');
        $canciones = [
            (object) [
                'Titulo' => 'ReawakeR',
                'Artista' => 'LiSA, Felix',
                'Fecha' => '2022',
            ],
            (object) [
                'Titulo' => 'Amorfoda',
                'Artista' => 'BadBunny',
                'Fecha' => '2017',
            ],
            (object) [
                'Titulo' => 'Phoenix',
                'Artista' => 'LOL',
                'Fecha' => '2022',
            ],
            (object) [
                'Titulo' => 'Coqueta',
                'Artista' => 'Fuerza regida',
                'Fecha' => '2023',
            ],
            (object) [
                'Titulo' => 'Odds Are',
                'Artista' => 'RIELL',
                'Fecha' => '2022',
            ],
        ];
        if ($buscar)
            $canciones = array_filter($canciones, function ($cancion) use ($buscar) {
                return $cancion->Titulo == $buscar;
            });
        return view('layout.VistaMusica', compact('canciones',));
    }
}
