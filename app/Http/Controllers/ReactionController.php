<?php

namespace App\Http\Controllers;

use App\Models\Reaction;
use App\Models\Ninja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReactionController extends Controller
{
    public function toggle(Request $request, Ninja $ninja)
    {
        $user = Auth::user();
        $type = $request->input('type');
        
        $reaction = Reaction::where('user_id', $user->id)
                           ->where('ninja_id', $ninja->id)
                           ->first();
        
        if ($reaction) {
            if ($reaction->type === $type) {
                // Même réaction : supprimer
                $reaction->delete();
                $hasReaction = false;
                $currentType = null;
            } else {
                // Différente réaction : modifier
                $reaction->update(['type' => $type]);
                $hasReaction = true;
                $currentType = $type;
            }
        } else {
            // Nouvelle réaction
            Reaction::create([
                'user_id' => $user->id,
                'ninja_id' => $ninja->id,
                'type' => $type,
            ]);
            $hasReaction = true;
            $currentType = $type;
        }
        
        return back()->with('success', 'Réaction mise à jour !');
    }
}