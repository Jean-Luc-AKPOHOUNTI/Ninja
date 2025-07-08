@extends('components.layout')

@section('content')
<div class="p-8">
  <div class="max-w-6xl mx-auto">
    <!-- En-tête -->
    <div class="text-center mb-12">
      <div class="flex justify-center mb-6">
        <div class="p-4 bg-red-600 rounded-full">
          <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
          </svg>
        </div>
      </div>
      <h1 class="text-4xl font-bold text-white mb-4">À propos de Ninja Network</h1>
      <p class="text-xl text-gray-400 max-w-3xl mx-auto">Découvrez comment fonctionne notre plateforme dédiée aux guerriers de l'ombre</p>
    </div>

    <!-- Mission -->
    <div class="bg-gray-800 rounded-lg border border-gray-700 p-8 mb-8">
      <div class="flex items-center space-x-3 mb-6">
        <svg class="w-6 h-6 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
        </svg>
        <h2 class="text-2xl font-bold text-white">Notre Mission</h2>
      </div>
      <p class="text-gray-300 text-lg leading-relaxed">
        Ninja Network est une plateforme communautaire qui rassemble les passionnés d'arts martiaux et de culture ninja. 
        Notre objectif est de créer un espace où chaque membre peut découvrir, partager et célébrer l'art ancestral des ninjas.
      </p>
    </div>

    <!-- Comment ça marche -->
    <div class="mb-12">
      <div class="flex items-center space-x-3 mb-8">
        <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
        </svg>
        <h2 class="text-2xl font-bold text-white">Comment ça marche</h2>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-gray-800 rounded-lg border border-gray-700 p-6 text-center">
          <div class="flex justify-center mb-4">
            <div class="p-3 bg-blue-600 rounded-full">
              <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
              </svg>
            </div>
          </div>
          <h3 class="text-white font-semibold mb-2">1. Inscription</h3>
          <p class="text-gray-400 text-sm">Créez votre compte et rejoignez la communauté des ninjas</p>
        </div>

        <div class="bg-gray-800 rounded-lg border border-gray-700 p-6 text-center">
          <div class="flex justify-center mb-4">
            <div class="p-3 bg-green-600 rounded-full">
              <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
              </svg>
            </div>
          </div>
          <h3 class="text-white font-semibold mb-2">2. Exploration</h3>
          <p class="text-gray-400 text-sm">Découvrez les profils des ninjas et leurs histoires</p>
        </div>

        <div class="bg-gray-800 rounded-lg border border-gray-700 p-6 text-center">
          <div class="flex justify-center mb-4">
            <div class="p-3 bg-red-600 rounded-full">
              <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
              </svg>
            </div>
          </div>
          <h3 class="text-white font-semibold mb-2">3. Interaction</h3>
          <p class="text-gray-400 text-sm">Likez vos ninjas préférés et montrez votre appréciation</p>
        </div>

        <div class="bg-gray-800 rounded-lg border border-gray-700 p-6 text-center">
          <div class="flex justify-center mb-4">
            <div class="p-3 bg-purple-600 rounded-full">
              <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
              </svg>
            </div>
          </div>
          <h3 class="text-white font-semibold mb-2">4. Dojos</h3>
          <p class="text-gray-400 text-sm">Explorez les différents dojos et leurs spécialités</p>
        </div>
      </div>
    </div>

    <!-- Fonctionnalités -->
    <div class="mb-12">
      <div class="flex items-center space-x-3 mb-8">
        <svg class="w-6 h-6 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
        </svg>
        <h2 class="text-2xl font-bold text-white">Fonctionnalités</h2>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <div class="bg-gray-800 rounded-lg border border-gray-700 p-6">
          <h3 class="text-white font-semibold mb-4 flex items-center space-x-2">
            <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
            </svg>
            <span>Pour tous les utilisateurs</span>
          </h3>
          <ul class="space-y-2 text-gray-300">
            <li class="flex items-center space-x-2">
              <svg class="w-4 h-4 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
              </svg>
              <span>Consulter les profils des ninjas</span>
            </li>
            <li class="flex items-center space-x-2">
              <svg class="w-4 h-4 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
              </svg>
              <span>Liker et interagir avec le contenu</span>
            </li>
            <li class="flex items-center space-x-2">
              <svg class="w-4 h-4 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
              </svg>
              <span>Explorer les dojos et leurs histoires</span>
            </li>
            <li class="flex items-center space-x-2">
              <svg class="w-4 h-4 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
              </svg>
              <span>Découvrir les niveaux de compétence</span>
            </li>
          </ul>
        </div>

        <div class="bg-gray-800 rounded-lg border border-gray-700 p-6">
          <h3 class="text-white font-semibold mb-4 flex items-center space-x-2">
            <svg class="w-5 h-5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5-6a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <span>Pour les administrateurs</span>
          </h3>
          <ul class="space-y-2 text-gray-300">
            <li class="flex items-center space-x-2">
              <svg class="w-4 h-4 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
              </svg>
              <span>Créer et modifier les profils ninja</span>
            </li>
            <li class="flex items-center space-x-2">
              <svg class="w-4 h-4 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
              </svg>
              <span>Gérer les utilisateurs et leurs rôles</span>
            </li>
            <li class="flex items-center space-x-2">
              <svg class="w-4 h-4 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
              </svg>
              <span>Accéder au dashboard administrateur</span>
            </li>
            <li class="flex items-center space-x-2">
              <svg class="w-4 h-4 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
              </svg>
              <span>Consulter les statistiques détaillées</span>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Technologies -->
    <div class="bg-gray-800 rounded-lg border border-gray-700 p-8 mb-8">
      <div class="flex items-center space-x-3 mb-6">
        <svg class="w-6 h-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
        </svg>
        <h2 class="text-2xl font-bold text-white">Technologies utilisées</h2>
      </div>
      <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <div class="text-center p-4 bg-gray-700 rounded-lg">
          <div class="text-red-500 font-bold text-lg mb-1">Laravel</div>
          <div class="text-gray-400 text-sm">Framework PHP</div>
        </div>
        <div class="text-center p-4 bg-gray-700 rounded-lg">
          <div class="text-blue-500 font-bold text-lg mb-1">Tailwind CSS</div>
          <div class="text-gray-400 text-sm">Framework CSS</div>
        </div>
        <div class="text-center p-4 bg-gray-700 rounded-lg">
          <div class="text-green-500 font-bold text-lg mb-1">MySQL</div>
          <div class="text-gray-400 text-sm">Base de données</div>
        </div>
        <div class="text-center p-4 bg-gray-700 rounded-lg">
          <div class="text-yellow-500 font-bold text-lg mb-1">Blade</div>
          <div class="text-gray-400 text-sm">Moteur de templates</div>
        </div>
      </div>
    </div>

    <!-- Contact -->
    <div class="text-center">
      <div class="flex items-center justify-center space-x-3 mb-4">
        <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
        </svg>
        <h2 class="text-2xl font-bold text-white">Une question ?</h2>
      </div>
      <p class="text-gray-400 mb-6">N'hésitez pas à nous contacter pour toute question ou suggestion</p>
      <a href="{{ route('ninjas.index') }}" class="inline-flex items-center space-x-2 bg-red-600 hover:bg-red-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
        </svg>
        <span>Retour aux Ninjas</span>
      </a>
    </div>
  </div>
</div>
@endsection