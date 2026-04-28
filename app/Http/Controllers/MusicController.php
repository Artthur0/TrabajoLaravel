<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Support\Facades\Auth;

class MusicController extends Controller
{
    public function VistaLares()
    {
        $user = Auth::user();

        $canciones = Song::all();
        $misCancionesIds = $user->songs->pluck('id')->toArray();

        return view('layout.LaresDownloads', compact('canciones', 'misCancionesIds'));
    }

    public function descargar($id)
    {
        $user = Auth::user();

        $user->songs()->syncWithoutDetaching([$id]);

        return redirect()->back();
    }

    public function VistaMusica()
    {
        $user = Auth::user();

        $canciones = $user->songs;

        return view('layout.VistaMusica', compact('canciones'));
    }

    public function eliminarDeBiblioteca($id)
    {
        $user = Auth::user();

        $user->songs()->detach($id);

        return redirect()->back();
    }
}
