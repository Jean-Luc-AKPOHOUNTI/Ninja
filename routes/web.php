<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NinjaController;

// Page d'accueil
Route::get('/', function () {
    return view('welcome');
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
    Route::get('/ninjas/create', [NinjaController::class, 'create'])->name('ninjas.create');
    Route::get('/ninjas/{ninja}', [NinjaController::class, 'show'])->name('ninjas.show');
    Route::post('/ninjas', [NinjaController::class, 'store'])->name('ninjas.store');
    Route::delete('/ninjas/{ninja}', [NinjaController::class, 'destroy'])->name('ninjas.destroy');
});
