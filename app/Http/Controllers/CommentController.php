<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Ninja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, Ninja $ninja)
    {
        $request->validate([
            'content' => 'required|string|max:500'
        ]);

        Comment::create([
            'user_id' => Auth::id(),
            'ninja_id' => $ninja->id,
            'content' => $request->content,
        ]);

        return back()->with('success', 'Commentaire ajouté !');
    }

    public function destroy(Comment $comment)
    {
        if ($comment->user_id !== Auth::id() && !Auth::user()->isAdmin()) {
            return back()->with('error', 'Non autorisé');
        }

        $comment->delete();
        return back()->with('success', 'Commentaire supprimé !');
    }
}