<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function auth(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], [
            //customizar mensagens de erro
            'email.required' => 'O campo email é obrigatório',
            'email.email' => 'O email não é válido ',
            'password.required' => 'O campo senha é obrigatório'
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/home');
        }else{
            return redirect()->back()->withErrors([
                'email' => 'As credenciais fornecidas não são válidas.',
            ])->onlyInput('email');
        }

    }
}
