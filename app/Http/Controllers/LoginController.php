<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function showLoginView(){
        return view('auth/login');
    }

    public function destroySession(){
        auth()->logout();
        return redirect('/')->with('registered', 'Sesion Finalizada');
    }

    public function store(){
        $atributs = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (!auth()->attempt($atributs)) {
            throw ValidationException::withMessages([
                'email' => 'Tus credenciales no han podido ser verificadas'
            ]);
        }
        
        session()->regenerate();

        return redirect('/home')->with('registered', 'Bienvenido de nuevo!');
    }


}
