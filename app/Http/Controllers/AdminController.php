<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Ninja;
use App\Models\Dojo;

class AdminController extends Controller
{
    /**
     * Afficher le dashboard administrateur
     */
    public function dashboard()
    {
        $stats = [
            'total_users' => User::count(),
            'total_ninjas' => Ninja::count(),
            'total_dojos' => Dojo::count(),
            'recent_users' => User::latest()->take(5)->get(),
            'recent_ninjas' => Ninja::with('dojo')->latest()->take(5)->get(),
        ];

        return view('admin.dashboard', compact('stats'));
    }

    /**
     * Afficher la liste des utilisateurs
     */
    public function users()
    {
        $users = User::latest()->paginate(10);
        return view('admin.users', compact('users'));
    }

    /**
     * Changer le rôle d'un utilisateur
     */
    public function changeUserRole(Request $request, User $user)
    {
        $request->validate([
            'role' => 'required|in:user,admin'
        ]);

        $user->update(['role' => $request->role]);

        return back()->with('success', 'Rôle de l\'utilisateur mis à jour avec succès.');
    }
}
