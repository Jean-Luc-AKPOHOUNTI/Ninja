@extends('components.layout')

@section('content')
<div class="min-h-screen flex items-center justify-center py-12 px-4 relative overflow-hidden"
    style="background: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.9)), url('{{ asset('login.jpg') }}') center center / cover no-repeat;">
    
    <!-- Effet de fumée mystérieuse -->
    <div class="absolute inset-0 bg-gradient-to-b from-transparent via-gray-900/40 to-gray-950/60"></div>
    
    <!-- Particules mystérieuses -->
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute top-1/4 left-1/4 w-2 h-2 bg-red-500/30 rounded-full animate-pulse"></div>
        <div class="absolute top-1/3 right-1/3 w-1 h-1 bg-gray-400/40 rounded-full animate-ping"></div>
        <div class="absolute bottom-1/4 left-1/3 w-1.5 h-1.5 bg-red-600/20 rounded-full animate-pulse"></div>
        <div class="absolute top-1/2 right-1/4 w-1 h-1 bg-red-400/25 rounded-full animate-ping"></div>
    </div>

    <div class="relative z-10 w-full max-w-md">
        <div class="bg-gray-900/90 backdrop-blur-sm rounded-2xl shadow-2xl border border-gray-800 p-8">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-extrabold text-white mb-2 tracking-wider">🔐 Connexion</h2>
                <p class="text-gray-400 italic">Entrez dans l'ombre</p>
            </div>

            @if ($errors->any())
                <div class="mb-6 bg-red-900/50 border border-red-700 rounded-lg p-4">
                    <ul class="list-disc list-inside text-red-300 text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('login.submit') }}" method="POST" class="space-y-6">
                @csrf

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-300 mb-2">📧 Adresse e-mail</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                        class="w-full px-4 py-3 border border-gray-700 bg-gray-800 text-gray-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-700 focus:border-transparent transition-all duration-200"
                        placeholder="votre@email.com">
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-300 mb-2">🔒 Mot de passe</label>
                    <input id="password" type="password" name="password" required
                        class="w-full px-4 py-3 border border-gray-700 bg-gray-800 text-gray-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-700 focus:border-transparent transition-all duration-200"
                        placeholder="••••••••">
                </div>

                <div class="mt-8">
                    <button type="submit"
                        class="w-full bg-red-700 hover:bg-red-800 text-white font-bold py-3 px-6 rounded-lg transition-all duration-300 shadow-lg hover:shadow-red-900/50 transform hover:scale-105">
                        ⚔️ Se connecter
                    </button>
                </div>
            </form>

            <div class="mt-8 text-center">
                <p class="text-gray-400 text-sm">
                    Pas encore de compte ? 
                    <a href="{{ route('register') }}" class="text-red-400 hover:text-red-300 underline font-semibold transition-colors duration-200">
                        Rejoignez l'ordre
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
