<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NinjaController;
use App\Http\Controllers\AdminController;

// Page d'accueil
Route::get('/', function () {
    return view('welcome');
});

// Page About
Route::get('/about', function () {
    return view('about');
});

// Page Contact
Route::get('/contact', function () {
    return view('contact');
});

    // Authentification
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
    // Enregistrement
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
    // Déconnexion
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Actions sur les ninjas (protégées par auth)
Route::middleware('auth')->group(function () {
    Route::get('/ninjas', [NinjaController::class, 'index'])->name('ninjas.index');

    // Routes admin pour la gestion des ninjas (DOIT être avant /ninjas/{ninja})
    Route::middleware('admin')->group(function () {
        Route::get('/ninjas/create', [NinjaController::class, 'create'])->name('ninjas.create');
        Route::post('/ninjas', [NinjaController::class, 'store'])->name('ninjas.store');
        Route::get('/ninjas/{ninja}/edit', [NinjaController::class, 'edit'])->name('ninjas.edit');
        Route::put('/ninjas/{ninja}', [NinjaController::class, 'update'])->name('ninjas.update');
        Route::delete('/ninjas/{ninja}', [NinjaController::class, 'destroy'])->name('ninjas.destroy');
    });

    // Route pour voir un ninja spécifique (DOIT être après /ninjas/create)
Route::get('/ninjas/{ninja}', [NinjaController::class, 'show'])->name('ninjas.show');

    // Routes pour les likes
Route::post('/ninjas/{ninja}/like', [NinjaController::class, 'like'])->name('ninjas.like');
Route::delete('/ninjas/{ninja}/like', [NinjaController::class, 'unlike'])->name('ninjas.unlike');
    
    // Routes pour les favoris
Route::post('/ninjas/{ninja}/favorite', [App\Http\Controllers\FavoriteController::class, 'toggle'])->name('ninjas.favorite');
Route::get('/favorites', [App\Http\Controllers\FavoriteController::class, 'index'])->name('ninjas.favorites');
    
    // Routes pour les réactions
Route::post('/ninjas/{ninja}/reaction', [App\Http\Controllers\ReactionController::class, 'toggle'])->name('ninjas.reaction');
    
    // Routes pour les commentaires
Route::post('/ninjas/{ninja}/comment', [App\Http\Controllers\CommentController::class, 'store'])->name('comments.store');
Route::delete('/comments/{comment}', [App\Http\Controllers\CommentController::class, 'destroy'])->name('comments.destroy');

    // Routes pour le chat
    Route::get('/chat', [\App\Http\Controllers\ChatController::class, 'index'])->name('chat.index');
    Route::post('/chat', [\App\Http\Controllers\ChatController::class, 'store'])->name('chat.store');
    Route::get('/chat/messages', [\App\Http\Controllers\ChatController::class, 'getMessages'])->name('chat.messages');
    
    // Routes admin pour le chat
    Route::middleware('admin')->group(function () {
        Route::delete('/chat/messages/{message}', [\App\Http\Controllers\ChatController::class, 'destroy'])->name('chat.destroy');
        Route::post('/chat/kick/{user}', [\App\Http\Controllers\ChatController::class, 'kickUser'])->name('chat.kick');
    });

});



// Routes d'administration (protégées par auth + admin)
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/users', [AdminController::class, 'users'])->name('admin.users');
    Route::patch('/users/{user}/role', [AdminController::class, 'changeUserRole'])->name('admin.users.role');
});
