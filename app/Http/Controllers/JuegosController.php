<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JuegosController extends Controller
{
    public function VistaJuegos()
    {
        return view('layout.VistaJuegos');
    }
}
