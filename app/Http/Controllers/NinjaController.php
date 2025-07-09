<?php

namespace App\Http\Controllers;

use App\Models\Ninja;
use App\Models\Dojo;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class NinjaController extends Controller
{
  public function index() {
    // route --> /ninjas/
    $ninjas = Ninja::with('dojo')->orderBy('created_at', 'desc')->paginate(3);

    return view('ninjas.index', ["ninjas" => $ninjas]);
  }

  public function show(Ninja $ninja) {
    // route --> /ninjas/{id}
    $ninja->load('dojo');

    return view('ninjas.show', ["ninja" => $ninja]);
  }

  public function create() {
    // route --> /ninjas/create (Admin seulement)
    if (!Auth::user()->isAdmin()) {
        return redirect()->route('ninjas.index')->with('error', 'Seuls les administrateurs peuvent créer des ninjas.');
    }

    return view('ninjas.create');
  }

  public function store(Request $request) {
    // --> /ninjas/ (POST) (Admin seulement)
    if (!Auth::user()->isAdmin()) {
        return redirect()->route('ninjas.index')->with('error', 'Seuls les administrateurs peuvent créer des ninjas.');
    }

    $validated = $request->validate([
      'name' => 'required|string|max:255',
      'skill' => 'required|integer|min:0|max:100',
      'bio' => 'required|string|max:1000',
      'dojo_name' => 'required|string|max:255',
      'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
      'story' => 'nullable|string|min:1',
    ]);

    // Créer ou récupérer le dojo
    $dojo = Dojo::firstOrCreate(
      ['name' => $validated['dojo_name']],
      [
        'location' => 'Lieu secret',
        'description' => 'Un dojo mystérieux aux techniques légendaires.'
      ]
    );

    $validated['dojo_id'] = $dojo->id;
    unset($validated['dojo_name']);

    // Gestion de l'upload d'image
    if ($request->hasFile('image')) {
      $imagePath = $request->file('image')->store('ninjas', 'public');
      $validated['image'] = $imagePath;
    }

    $validated['story'] = $request->input('story');

    Ninja::create($validated);

    return redirect()->route('ninjas.index')->with('success', 'Ninja Created!');
  }

  public function destroy(Ninja $ninja) {
    // --> /ninjas/{id} (DELETE) (Admin seulement)
    if (!Auth::user()->isAdmin()) {
        return redirect()->route('ninjas.index')->with('error', 'Seuls les administrateurs peuvent supprimer des ninjas.');
    }

    $ninja->delete();

    return redirect()->route('ninjas.index')->with('success', 'Ninja Deleted!');
  }

  public function edit(Ninja $ninja) {
    // route --> /ninjas/{id}/edit (Admin seulement)
    if (!Auth::user()->isAdmin()) {
        return redirect()->route('ninjas.index')->with('error', 'Seuls les administrateurs peuvent modifier des ninjas.');
    }

    $ninja->load('dojo');

    return view('ninjas.edit', ["ninja" => $ninja]);
  }

  public function update(Request $request, Ninja $ninja) {
    // --> /ninjas/{id} (PUT) (Admin seulement)
    if (!Auth::user()->isAdmin()) {
        return redirect()->route('ninjas.index')->with('error', 'Seuls les administrateurs peuvent modifier des ninjas.');
    }

    $validated = $request->validate([
      'name' => 'required|string|max:255',
      'skill' => 'required|integer|min:0|max:100',
      'bio' => 'required|string|max:1000',
      'dojo_name' => 'required|string|max:255',
      'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
      'story' => 'nullable|string|min:20',
    ]);

    // Créer ou récupérer le dojo
    $dojo = Dojo::firstOrCreate(
      ['name' => $validated['dojo_name']],
      [
        'location' => 'Lieu secret',
        'description' => 'Un dojo mystérieux aux techniques légendaires.'
      ]
    );

    $validated['dojo_id'] = $dojo->id;
    unset($validated['dojo_name']);

    // Gestion de l'upload d'image
    if ($request->hasFile('image')) {
      // Supprimer l'ancienne image si elle existe
      if ($ninja->image && Storage::disk('public')->exists($ninja->image)) {
        Storage::disk('public')->delete($ninja->image);
      }

      $imagePath = $request->file('image')->store('ninjas', 'public');
      $validated['image'] = $imagePath;
    }

    $validated['story'] = $request->input('story');

    $ninja->update($validated);

    return redirect()->route('ninjas.show', $ninja)->with('success', 'Ninja modifié avec succès !');
  }

  public function like(Ninja $ninja)
  {
    $user = Auth::user();

    // Vérifier si l'utilisateur a déjà liké ce ninja
    if ($user->hasLiked($ninja)) {
        return back()->with('error', 'Vous avez déjà liké ce ninja !');
    }

    // Créer le like
    Like::create([
        'user_id' => $user->id,
        'ninja_id' => $ninja->id,
    ]);

    return back()->with('success', 'Ninja liké avec succès !');
  }

  public function unlike(Ninja $ninja)
  {
    $user = Auth::user();

    // Supprimer le like
    $like = Like::where('user_id', $user->id)
                ->where('ninja_id', $ninja->id)
                ->first();

    if ($like) {
        $like->delete();
        return back()->with('success', 'Like retiré avec succès !');
    }

    return back()->with('error', 'Vous n\'aviez pas liké ce ninja !');
  }

}
