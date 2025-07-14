<?php

namespace App\Http\Controllers;

use App\Models\ChatMessage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index()
    {
        $messages = ChatMessage::with('user')
            ->latest()
            ->take(50)
            ->get()
            ->reverse();

        return view('chat.index', compact('messages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:500'
        ]);

        ChatMessage::create([
            'user_id' => Auth::id(),
            'message' => $request->message
        ]);

        return response()->json(['status' => 'success']);
    }

    public function destroy(ChatMessage $message)
    {
        if (!Auth::user()->isAdmin()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $message->delete();

        return response()->json(['status' => 'deleted']);
    }

    public function kickUser(User $user)
    {
        if (!Auth::user()->isAdmin()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        // Supprimer tous les messages de l'utilisateur
        ChatMessage::where('user_id', $user->id)->delete();

        return response()->json(['status' => 'kicked']);
    }

    public function getMessages()
    {
        $messages = ChatMessage::with('user')
            ->latest()
            ->take(50)
            ->get()
            ->reverse()
            ->values();

        return response()->json($messages);
    }
}