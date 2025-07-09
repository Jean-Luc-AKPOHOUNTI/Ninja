<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Ninja;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function toggle(Ninja $ninja)
    {
        $user = Auth::user();
        
        $favorite = Favorite::where('user_id', $user->id)
                           ->where('ninja_id', $ninja->id)
                           ->first();
        
        if ($favorite) {
            $favorite->delete();
            $favorited = false;
        } else {
            Favorite::create([
                'user_id' => $user->id,
                'ninja_id' => $ninja->id,
            ]);
            $favorited = true;
        }
        
        return back()->with('success', $favorited ? 'Ninja ajouté aux favoris !' : 'Ninja retiré des favoris !');
    }

    public function index()
    {
        $user = Auth::user();
        $favoriteNinjas = Ninja::whereHas('favorites', function($query) use ($user) {
            $query->where('user_id', $user->id);
        })->with('dojo')->orderBy('created_at', 'desc')->paginate(6);
        
        return view('ninjas.favorites', ['ninjas' => $favoriteNinjas]);
    }
}