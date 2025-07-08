@extends('components.layout')

@section('content')
<div class="p-8">
  <div class="max-w-7xl mx-auto">
    <!-- En-tête -->
    <div class="mb-8">
      <div class="flex items-center space-x-3 mb-2">
        <div class="p-2 bg-red-600 rounded-lg">
          <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
          </svg>
        </div>
        <h1 class="text-3xl font-bold text-white">Dashboard Administrateur</h1>
      </div>
      <p class="text-gray-400">Vue d'ensemble et gestion de la plateforme Ninja Network</p>
    </div>

    <!-- Statistiques -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
      <div class="bg-gray-800 rounded-lg border border-gray-700 p-6 hover:bg-gray-750 transition-colors">
        <div class="flex items-center justify-between">
          <div>
            <p class="text-sm font-medium text-gray-400 mb-1">Utilisateurs</p>
            <p class="text-3xl font-bold text-white">{{ $stats['total_users'] }}</p>
          </div>
          <div class="p-3 bg-blue-600 rounded-lg">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"/>
            </svg>
          </div>
        </div>
      </div>

      <div class="bg-gray-800 rounded-lg border border-gray-700 p-6 hover:bg-gray-750 transition-colors">
        <div class="flex items-center justify-between">
          <div>
            <p class="text-sm font-medium text-gray-400 mb-1">Ninjas</p>
            <p class="text-3xl font-bold text-white">{{ $stats['total_ninjas'] }}</p>
          </div>
          <div class="p-3 bg-red-600 rounded-lg">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
            </svg>
          </div>
        </div>
      </div>

      <div class="bg-gray-800 rounded-lg border border-gray-700 p-6 hover:bg-gray-750 transition-colors">
        <div class="flex items-center justify-between">
          <div>
            <p class="text-sm font-medium text-gray-400 mb-1">Dojos</p>
            <p class="text-3xl font-bold text-white">{{ $stats['total_dojos'] }}</p>
          </div>
          <div class="p-3 bg-green-600 rounded-lg">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
            </svg>
          </div>
        </div>
      </div>
    </div>

    <!-- Actions rapides -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
      <div class="bg-gray-800 rounded-lg border border-gray-700 p-6">
        <div class="flex items-center space-x-2 mb-4">
          <svg class="w-5 h-5 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
          </svg>
          <h3 class="text-lg font-semibold text-white">Actions Rapides</h3>
        </div>
        <div class="space-y-3">
          <a href="{{ route('ninjas.create') }}" class="flex items-center space-x-3 w-full bg-red-600 text-white py-3 px-4 rounded-lg hover:bg-red-700 transition-colors font-medium">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
            </svg>
            <span>Créer un nouveau ninja</span>
          </a>
          <a href="{{ route('admin.users') }}" class="flex items-center space-x-3 w-full bg-gray-700 text-white py-3 px-4 rounded-lg hover:bg-gray-600 transition-colors font-medium">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"/>
            </svg>
            <span>Gérer les utilisateurs</span>
          </a>
          <a href="{{ route('ninjas.index') }}" class="flex items-center space-x-3 w-full bg-gray-700 text-white py-3 px-4 rounded-lg hover:bg-gray-600 transition-colors font-medium">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
            </svg>
            <span>Voir tous les ninjas</span>
          </a>
        </div>
      </div>

      <div class="bg-gray-800 rounded-lg border border-gray-700 p-6">
        <div class="flex items-center space-x-2 mb-4">
          <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"/>
          </svg>
          <h3 class="text-lg font-semibold text-white">Utilisateurs Récents</h3>
        </div>
        <div class="space-y-3">
          @foreach($stats['recent_users'] as $user)
          <div class="flex items-center justify-between p-3 bg-gray-700 rounded-lg">
            <div class="flex items-center space-x-3">
              <div class="w-8 h-8 bg-gray-600 rounded-full flex items-center justify-center">
                <svg class="w-4 h-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                </svg>
              </div>
              <div>
                <p class="font-medium text-white">{{ $user->name }}</p>
                <p class="text-sm text-gray-400">{{ $user->email }}</p>
              </div>
            </div>
            <span class="px-2 py-1 text-xs rounded-full font-medium {{ $user->role === 'admin' ? 'bg-red-900 text-red-200' : 'bg-gray-600 text-gray-300' }}">
              {{ ucfirst($user->role) }}
            </span>
          </div>
          @endforeach
        </div>
      </div>
    </div>

    <!-- Ninjas récents -->
    <div class="bg-gray-800 rounded-lg border border-gray-700 p-6">
      <div class="flex items-center space-x-2 mb-6">
        <svg class="w-5 h-5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
        </svg>
        <h3 class="text-lg font-semibold text-white">Ninjas Récents</h3>
      </div>
      <div class="overflow-x-auto">
        <table class="min-w-full">
          <thead>
            <tr class="border-b border-gray-700">
              <th class="px-4 py-3 text-left text-sm font-medium text-gray-300">Nom</th>
              <th class="px-4 py-3 text-left text-sm font-medium text-gray-300">Dojo</th>
              <th class="px-4 py-3 text-left text-sm font-medium text-gray-300">Niveau</th>
              <th class="px-4 py-3 text-left text-sm font-medium text-gray-300">Date</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-700">
            @foreach($stats['recent_ninjas'] as $ninja)
            <tr class="hover:bg-gray-700 transition-colors">
              <td class="px-4 py-4">
                <div class="font-medium text-white">{{ $ninja->name }}</div>
              </td>
              <td class="px-4 py-4">
                <div class="text-gray-300">{{ $ninja->dojo->name ?? 'N/A' }}</div>
              </td>
              <td class="px-4 py-4">
                <div class="flex items-center space-x-2">
                  <div class="w-16 bg-gray-700 rounded-full h-2">
                    <div class="bg-red-500 h-2 rounded-full" style="width: {{ $ninja->skill }}%"></div>
                  </div>
                  <span class="text-sm text-gray-300">{{ $ninja->skill }}/100</span>
                </div>
              </td>
              <td class="px-4 py-4 text-gray-400">
                {{ $ninja->created_at->format('d/m/Y') }}
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection 