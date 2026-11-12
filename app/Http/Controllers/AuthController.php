<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email|ends_with:@disfarma.hn',
            'password' => 'required',
        ], [
            'email.required' => 'Ingrese su correo institucional.',
            'email.email' => 'El formato del correo no es válido.',
            'email.ends_with' => 'Debe usar su correo institucional (@disfarma.hn).',
            'password.required' => 'Ingrese su contraseña.',
        ]);

        $datos = $request->only('email', 'password');

        if (Auth::attempt($datos, $request->has('remember'))) {
            $request->session()->regenerate();

            return redirect()->intended('/dashboard');
        }

        return back()
            ->withInput($request->only('email'))
            ->withErrors(['email' => 'El correo o la contraseña son incorrectos.']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
