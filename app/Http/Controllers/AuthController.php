<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function showLogin()
    {
        $usuarios = User::all();
        return view('auth.login', compact('usuarios'));
    }
    public function actualizarPerfil(Request $request)
    {
        $user = Auth::user();

        // Validamos que lo que recibimos sea uno de los campos permitidos
        if ($request->has('avatar')) {
            $user->avatar = $request->avatar;
        }

        if ($request->has('wallpaper')) {
            $user->wallpaper = $request->wallpaper;
        }

        $user->save();

        return back()->with('success', 'Perfil actualizado');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('escritorio');
        }
        return back()->withErrors(['error' => 'Contraseña incorrecta']);
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users',
            'password' => 'required|min:4',
        ]);

        User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'avatar'   => 'duck.png',
        ]);

        return redirect()->route('login_view')->with('success', 'Cuenta creada con éxito');
    }
}
