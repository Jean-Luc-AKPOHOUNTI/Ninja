<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Ninja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function toggle(Ninja $ninja)
    {
        $user = Auth::user();
        
        $like = Like::where('user_id', $user->id)
                   ->where('ninja_id', $ninja->id)
                   ->first();
        
        if ($like) {
            $like->delete();
            $liked = false;
        } else {
            Like::create([
                'user_id' => $user->id,
                'ninja_id' => $ninja->id,
            ]);
            $liked = true;
        }
        
        return response()->json([
            'liked' => $liked,
            'likes_count' => $ninja->likes()->count()
        ]);
    }
}