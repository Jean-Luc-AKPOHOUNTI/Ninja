<?php

namespace App\Http\Controllers;
use \App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Afficher le formulaire de login
    public function showLoginForm()
    {
        // Crée la vue resources/views/auth/login.blade.php
        return view('auth.login');
    }

    // Traitement a la soumission du formulaire de login
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentification réussie
            $user = Auth::user();
            
            // Rediriger selon le rôle
            if ($user->isAdmin()) {
                return redirect()->intended('/admin/dashboard');
            } else {
                return redirect()->intended('/ninjas');
            }
        }

        // Échec de login
        return back()->withErrors([
            'email' => 'Identifiants invalides.',
        ])->withInput($request->except('password'));
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'user', // Par défaut, les nouveaux utilisateurs sont des 'user'
        ]);

        Auth::login($user);

        return redirect()->route('ninjas.index');
    }


    // Déconnexion
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
