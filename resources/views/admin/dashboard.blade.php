@extends('components.layout')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-gray-950 via-gray-900 to-gray-800 py-8 px-4">
  <div class="max-w-7xl mx-auto">
    <div class="mb-8 text-center">
      <h1 class="text-4xl font-extrabold text-white mb-2 tracking-wider drop-shadow-lg">🏛️ Dashboard Administrateur</h1>
      <p class="text-gray-400 italic">Le contrôle absolu sur l'ordre des ninjas</p>
    </div>

    <!-- Statistiques -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
      <div class="bg-gray-900 rounded-xl shadow-2xl border border-gray-800 p-6 hover:shadow-red-900/20 transition-all duration-300">
        <div class="flex items-center">
          <div class="p-3 rounded-full bg-red-900/50 text-red-400 border border-red-800">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
            </svg>
          </div>
          <div class="ml-4">
            <p class="text-sm font-medium text-gray-400">Utilisateurs</p>
            <p class="text-2xl font-bold text-white">{{ $stats['total_users'] }}</p>
          </div>
        </div>
      </div>

      <div class="bg-gray-900 rounded-xl shadow-2xl border border-gray-800 p-6 hover:shadow-red-900/20 transition-all duration-300">
        <div class="flex items-center">
          <div class="p-3 rounded-full bg-red-900/50 text-red-400 border border-red-800">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
            </svg>
          </div>
          <div class="ml-4">
            <p class="text-sm font-medium text-gray-400">Ninjas</p>
            <p class="text-2xl font-bold text-white">{{ $stats['total_ninjas'] }}</p>
          </div>
        </div>
      </div>

      <div class="bg-gray-900 rounded-xl shadow-2xl border border-gray-800 p-6 hover:shadow-red-900/20 transition-all duration-300">
        <div class="flex items-center">
          <div class="p-3 rounded-full bg-red-900/50 text-red-400 border border-red-800">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
            </svg>
          </div>
          <div class="ml-4">
            <p class="text-sm font-medium text-gray-400">Dojos</p>
            <p class="text-2xl font-bold text-white">{{ $stats['total_dojos'] }}</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Actions rapides -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
      <div class="bg-gray-900 rounded-xl shadow-2xl border border-gray-800 p-6">
        <h3 class="text-lg font-bold text-white mb-4">⚡ Actions Rapides</h3>
        <div class="space-y-3">
          <a href="{{ route('ninjas.create') }}" class="block w-full bg-red-700 text-white py-3 px-4 rounded-lg hover:bg-red-800 transition-all duration-200 text-center font-semibold shadow-lg hover:shadow-red-900/50">
            ⚔️ Créer un nouveau ninja
          </a>
          <a href="{{ route('admin.users') }}" class="block w-full bg-gray-700 text-white py-3 px-4 rounded-lg hover:bg-gray-800 transition-all duration-200 text-center font-semibold shadow-lg">
            👥 Gérer les utilisateurs
          </a>
          <a href="{{ route('ninjas.index') }}" class="block w-full bg-gray-700 text-white py-3 px-4 rounded-lg hover:bg-gray-800 transition-all duration-200 text-center font-semibold shadow-lg">
            🏮 Voir tous les ninjas
          </a>
        </div>
      </div>

      <div class="bg-gray-900 rounded-xl shadow-2xl border border-gray-800 p-6">
        <h3 class="text-lg font-bold text-white mb-4">👥 Utilisateurs Récents</h3>
        <div class="space-y-3">
          @foreach($stats['recent_users'] as $user)
          <div class="flex items-center justify-between p-3 bg-gray-800 rounded-lg border border-gray-700">
            <div>
              <p class="font-semibold text-white">{{ $user->name }}</p>
              <p class="text-sm text-gray-400">{{ $user->email }}</p>
            </div>
            <span class="px-2 py-1 text-xs rounded-full {{ $user->role === 'admin' ? 'bg-red-900 text-red-200' : 'bg-gray-700 text-gray-300' }}">
              {{ ucfirst($user->role) }}
            </span>
          </div>
          @endforeach
        </div>
      </div>
    </div>

    <!-- Ninjas récents -->
    <div class="bg-gray-900 rounded-xl shadow-2xl border border-gray-800 p-6">
      <h3 class="text-lg font-bold text-white mb-4">⚔️ Ninjas Récents</h3>
      <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-800">
          <thead class="bg-gray-800">
            <tr>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Nom</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Dojo</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Niveau</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Date</th>
            </tr>
          </thead>
          <tbody class="bg-gray-900 divide-y divide-gray-800">
            @foreach($stats['recent_ninjas'] as $ninja)
            <tr class="hover:bg-gray-800 transition-colors duration-200">
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm font-semibold text-white">{{ $ninja->name }}</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-300">{{ $ninja->dojo->name ?? 'N/A' }}</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-300">{{ $ninja->skill }}/100</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400">
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