<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('register'); 
    }
    public function showLoginForm()
    {
        return view('login'); 
    }

    public function login (Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:8',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
    
            return redirect()->route('users.index'); 
        }
    
    
        return back()->withErrors([
            'email' => 'Pogrešni podaci za prijavu.',
        ])->withInput();

    }

}


