@extends('components.layout')

@section('content')
    <div class="min-h-screen py-4 flex flex-col items-center justify-center relative overflow-hidden"
        style="background: linear-gradient(rgba(255, 255, 255, 0), rgba(255, 255, 255, 0)), url('{{ asset('images/samourai.jpeg') }}') center center / cover no-repeat;">

        <!-- Contenu principal -->
        <div class="relative z-10 text-center max-w-4xl mx-auto px-4">
            <!-- Logo et accroche -->
            <div class="mb-12">
                <div class="flex justify-center mb-8">
                    <div class="bg-gray-900/90 backdrop-blur-md rounded-2xl shadow-2xl p-4 flex items-center space-x-4">
                        <img src="{{ asset('images/logo.jpeg') }}" alt="Ninja Network" class="h-16 w-auto rounded-lg">
                        <span class="text-3xl font-bold text-yellow-400">Warrior</span>
                    </div>
                </div>
                <p class="text-lg md:text-xl text-yellow-400 font-bold italic mb-8 tracking-wide">
                    « L'acier tranche les mots, mais le silence guide la lame. »
                </p>
                <p class="text-gray-300 text-sm mb-4">
                    La plateforme ultime des guerriers ayant marqué l'histoire des arts martiaux.
                </p>
            </div>

            <!-- Carte principale -->
            <div
                class="bg-gray-900/80 backdrop-blur-md rounded-xl shadow-2xl border border-gray-700 p-8 mb-8 max-w-lg mx-auto">
                @auth
                    @if (auth()->user()->isAdmin())
                        <div class="flex items-center space-x-3 mb-6">
                            <div class="p-2 bg-red-600 rounded-full">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m5-6a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>

                            </div>
                            <div>
                                <p class="text-white font-semibold">Bienvenue, Maître {{ auth()->user()->name }}</p>
                                <p class="text-gray-400 text-sm">Administrateur</p>
                            </div>
                        </div>
                        <a href="{{ route('admin.dashboard') }}"
                            class="flex items-center justify-center space-x-2 w-full bg-red-600 hover:bg-red-700 text-white font-semibold py-4 px-6 rounded-lg transition-all shadow-lg hover:shadow-red-900/50">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm6 0v-10a2 2 0 012-2h2a2 2 0 012 2v10a2 2 0 01-2 2h-2a2 2 0 01-2-2zm-6 0a2 2 0 002 2h2a2 2 0 002-2" />
                            </svg>
                            <span>Accéder au Dashboard</span>
                        </a>
                    @else
                        <div class="flex items-center space-x-3 mb-6">
                            <div class="p-2 bg-gray-600 rounded-full">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-white font-semibold">Bienvenue, {{ auth()->user()->name }}</p>
                                <p class="text-gray-400 text-sm">Ninja</p>
                            </div>
                        </div>
                        <a href="{{ route('ninjas.index') }}"
                            class="flex items-center justify-center space-x-2 w-full bg-gray-700 hover:bg-gray-600 text-white font-semibold py-4 px-6 rounded-lg transition-all shadow-lg">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2
                c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            <span>Découvrir les Ninjas</span>
                        </a>
                    @endif
                @else
                    <div class="text-center mb-6">
                        <div class="flex justify-center mb-4">
                            <div class="p-3 bg-red-600 rounded-full">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                                </svg>
                            </div>
                        </div>
                        <p class="text-white font-semibold mb-2">Prêt à rejoindre l'ordre ?</p>
                        <p class="text-gray-400 text-sm">Découvrez l'univers des ninjas</p>
                    </div>
                    <a href="/login"
                        class="flex items-center justify-center space-x-2 w-full bg-red-600 hover:bg-red-700 text-white font-semibold py-4 px-6 rounded-lg transition-all shadow-lg hover:shadow-red-900/50">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                        <span>Commencer l'Aventure</span>
                    </a>
                @endauth
            </div>

            @guest
                <div class="text-center">
                    <p class="text-gray-400 text-sm">
                        Pas encore de compte ?
                        <a href="{{ route('register') }}" class="text-red-400 hover:text-red-300 font-medium transition-colors">
                            Rejoignez l'ordre
                        </a>
                    </p>
                </div>
            @endguest

            <!-- Fonctionnalités -->
            {{-- <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-12">
                <x-feature-box icon="users" title="Communauté" color="blue"
                    description="Rejoignez une communauté de ninjas passionnés" />
                <x-feature-box icon="home-modern" title="Dojos" color="green"
                    description="Découvrez les dojos et leurs techniques secrètes" />
                <x-feature-box icon="lightning-bolt" title="Compétences" color="red"
                    description="Évaluez et améliorez vos compétences ninja" />
            </div> --}}
        </div>
    </div>
@endsection
