<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Song;
use Illuminate\Support\Facades\Auth;

class MusicController extends Controller
{
    public function VistaLares()
    {
        $canciones = Song::all();
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $misCancionesIds = $user->songs->pluck('id')->toArray();

        return view('layout.LaresDownloads', compact('canciones', 'misCancionesIds'));
    }

    public function descargar($id)
    {
        Auth::user()->songs()->syncWithoutDetaching([$id]);
        return redirect()->back();
    }

    public function VistaMusica()
    {
        $canciones = Auth::user()->songs;
        return view('layout.VistaMusica', compact('canciones'));
    }

    public function eliminarDeBiblioteca($id)
    {
        Auth::user()->songs()->detach($id);
        return redirect()->back();
    }
}
