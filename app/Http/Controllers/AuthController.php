<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('login'); // Vista login.blade.php
    }

    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        // Buscar el usuario por correo
        $usuario = Usuario::whereHas('trabajador', function ($q) use ($email) {
            $q->where('emaTrab', $email);
        })->with('trabajador')->first();

        if ($usuario && $usuario->pasUsu === $password) {
            // Guardar en sesión
            Session::put('usuario_id', $usuario->codUsu);
            Session::put('nombre', $usuario->trabajador->nomTrab . ' ' . $usuario->trabajador->appTrab);
            Session::put('rol', $usuario->trabajador->rolTrab);
            Session::put('trabajador_id', $usuario->trabajador->codTrab);

            if ($usuario->trabajador->rolTrab == 1) {
                return redirect('/admin/docentes');
            } elseif ($usuario->trabajador->rolTrab == 2) {
                return redirect('/user');
            } else {
                return back()->withErrors(['error' => 'Rol no reconocido']);
            }
        }

        return back()->withErrors(['error' => 'Credenciales inválidas']);
    }

    public function logout()
    {
        Session::flush();
        return redirect('/');
    }
}
