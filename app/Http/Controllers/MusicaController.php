<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MusicaController extends Controller
{
    public function VistaMusica()
    {
        $Titulo = ['ReawakeR', 'Amorfoda', 'Phoenix', 'Coqueta', 'Odds Are'];
        $Artista = ['LiSA, Felix', 'BadBunny', 'LOL', 'Fuerza regida', 'RIELL'];
        $Fecha = ['2022', '2017', '2022', '2023', '2022'];
        return view('layout.VistaMusica')
            ->with([
                'Titulo' => $Titulo,
                'Artista' => $Artista,
                'Fecha' => $Fecha,
            ]);
    }
}
