@extends('components.layout')

@section('content')
<div class="min-h-screen flex flex-col items-center justify-center relative overflow-hidden"
    style="background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.8)), url('{{ asset('fondhome.jpg') }}') center center / cover no-repeat;">
    
    <!-- Effet de fumée mystérieuse -->
    <div class="absolute inset-0 bg-gradient-to-b from-transparent via-gray-900/30 to-gray-950/50"></div>
    
    <div class="relative z-10 text-center">
        <div class="mb-8">
            <h1 class="text-6xl font-extrabold text-white mb-4 tracking-widest drop-shadow-2xl">
                NINJA NETWORK
            </h1>
            <p class="text-xl text-gray-300 italic mb-8">L'ombre qui veille dans la nuit</p>
        </div>

        <div class="bg-gray-900/80 backdrop-blur-sm rounded-2xl shadow-2xl border border-gray-800 p-8 mb-8 max-w-md mx-auto">
            @auth
                @if(auth()->user()->isAdmin())
                    <p class="text-gray-300 mb-6">Bienvenue, Maître {{ auth()->user()->name }}</p>
                    <a href="{{ route('admin.dashboard') }}"
                        class="block w-full bg-red-700 hover:bg-red-800 text-white font-bold py-4 px-6 rounded-lg transition-all duration-300 shadow-lg hover:shadow-red-900/50 transform hover:scale-105">
                        🏛️ Accéder au Dashboard
                    </a>
                @else
                    <p class="text-gray-300 mb-6">Bienvenue, {{ auth()->user()->name }}</p>
                    <a href="{{ route('ninjas.index') }}"
                        class="block w-full bg-gray-700 hover:bg-gray-800 text-white font-bold py-4 px-6 rounded-lg transition-all duration-300 shadow-lg hover:shadow-gray-900/50 transform hover:scale-105">
                        ⚔️ Découvrir les Ninjas
                    </a>
                @endif
            @else
                <p class="text-gray-300 mb-6">Prêt à entrer dans l'ombre ?</p>
                <a href="/login"
                    class="block w-full bg-red-700 hover:bg-red-800 text-white font-bold py-4 px-6 rounded-lg transition-all duration-300 shadow-lg hover:shadow-red-900/50 transform hover:scale-105">
                    🚀 Commencer l'Aventure
                </a>
            @endauth
        </div>

        @guest
            <div class="text-center">
                <p class="text-gray-400 text-sm">
                    Pas encore de compte ? 
                    <a href="{{ route('register') }}" class="text-red-400 hover:text-red-300 underline">
                        Rejoignez l'ordre
                    </a>
                </p>
            </div>
        @endguest
    </div>

    <!-- Effet de particules mystérieuses -->
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute top-1/4 left-1/4 w-2 h-2 bg-red-500/30 rounded-full animate-pulse"></div>
        <div class="absolute top-1/3 right-1/3 w-1 h-1 bg-gray-400/40 rounded-full animate-ping"></div>
        <div class="absolute bottom-1/4 left-1/3 w-1.5 h-1.5 bg-red-600/20 rounded-full animate-pulse"></div>
    </div>
</div>
@endsection
