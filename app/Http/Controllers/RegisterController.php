<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function showRegisterView(){
        return view('auth/register');
    }

    public function store(){
        $atributs = request()->validate([
            'name' => 'required|min:3|max:25|unique:users,name',
            'email' => 'required|email|max:50|unique:users,email',
            'password' => 'required|min:7|max:18',
        ]);
        $user = User::create($atributs);
        $user->setPasswordAttribute($atributs['password']);
        auth()->login($user);
        return redirect('/home')->with('registered', 'Tu cuenta se ha crado correctamente');
    }
}
