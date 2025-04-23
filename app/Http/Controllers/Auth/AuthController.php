<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Muestra el formulario de inicio de sesión.
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Procesa la solicitud de inicio de sesión.
     */
    public function login(Request $request)
    {
        // Validar los datos del formulario
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Intentar iniciar sesión
        if (Auth::attempt($credentials)) {
            // Regenerar la sesión por seguridad
            $request->session()->regenerate();

            // Redirigir al dashboard u otra página
            return redirect()->intended('/dashboard');
        }

        // Si falló, redirigir con mensaje de error
        return back()->withErrors([
            'email' => 'Las credenciales no coinciden con nuestros registros.',
        ])->onlyInput('email');
    }
}
