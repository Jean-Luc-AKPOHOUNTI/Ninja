@extends('components.layout')

@section('content')
<div class="min-h-screen flex items-center justify-center py-12 px-4 relative overflow-hidden"
    style="background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.6)), url('{{ asset('sign.jpg') }}') center center / cover no-repeat;">

    <div class="relative z-10 w-full max-w-md">
        <div class="bg-gray-900/80 backdrop-blur-md rounded-xl shadow-2xl border border-gray-700 p-8">
            <div class="text-center mb-8">
                <div class="flex justify-center mb-4">
                    <div class="p-3 bg-red-600 rounded-full">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                        </svg>
                    </div>
                </div>
                <h2 class="text-2xl font-bold text-white mb-2">Rejoindre l'Ordre</h2>
                <p class="text-gray-400">Créez votre compte ninja</p>
            </div>

            @if ($errors->any())
                <div class="mb-6 bg-red-900/80 border border-red-600 rounded-lg p-4">
                    <div class="flex items-center space-x-2 mb-2">
                        <svg class="w-5 h-5 text-red-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                        </svg>
                        <span class="text-red-300 font-medium">Erreurs de validation</span>
                    </div>
                    <ul class="list-disc list-inside text-red-200 text-sm space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('register.submit') }}" method="POST" class="space-y-6">
                @csrf

                <div class="space-y-4">
                    <div>
                        <label for="name" class="flex items-center space-x-2 text-sm font-medium text-gray-300 mb-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            <span>Nom de guerre</span>
                        </label>
                        <input 
                            type="text" 
                            id="name" 
                            name="name"
                            value="{{ old('name') }}" 
                            required 
                            autofocus
                            class="w-full px-4 py-3 border border-gray-600 bg-gray-800/80 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all"
                            placeholder="Votre nom de ninja">
                    </div>

                    <div>
                        <label for="email" class="flex items-center space-x-2 text-sm font-medium text-gray-300 mb-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/>
                            </svg>
                            <span>Adresse e-mail</span>
                        </label>
                        <input 
                            type="email" 
                            id="email" 
                            name="email" 
                            value="{{ old('email') }}" 
                            required
                            class="w-full px-4 py-3 border border-gray-600 bg-gray-800/80 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all"
                            placeholder="votre@email.com">
                    </div>

                    <div>
                        <label for="password" class="flex items-center space-x-2 text-sm font-medium text-gray-300 mb-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            </svg>
                            <span>Mot de passe</span>
                        </label>
                        <input 
                            type="password" 
                            id="password" 
                            name="password" 
                            required
                            class="w-full px-4 py-3 border border-gray-600 bg-gray-800/80 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all"
                            placeholder="••••••••">
                    </div>

                    <div>
                        <label for="password_confirmation" class="flex items-center space-x-2 text-sm font-medium text-gray-300 mb-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <span>Confirmer le mot de passe</span>
                        </label>
                        <input 
                            type="password" 
                            id="password_confirmation" 
                            name="password_confirmation" 
                            required
                            class="w-full px-4 py-3 border border-gray-600 bg-gray-800/80 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all"
                            placeholder="••••••••">
                    </div>
                </div>

                <div class="mt-6">
                    <button type="submit"
                        class="w-full flex items-center justify-center space-x-2 bg-red-600 hover:bg-red-700 text-white font-semibold py-3 px-6 rounded-lg transition-all shadow-lg hover:shadow-red-900/50">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                        </svg>
                        <span>Rejoindre l'Ordre</span>
                    </button>
                </div>
            </form>

            <div class="mt-6 text-center">
                <p class="text-gray-400 text-sm">
                    Déjà membre ? 
                    <a href="{{ route('login') }}" class="text-red-400 hover:text-red-300 font-medium transition-colors">
                        Connectez-vous
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
