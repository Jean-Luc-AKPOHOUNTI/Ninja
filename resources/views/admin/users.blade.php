@extends('components.layout')

@section('content')
<div class="p-8">
  <div class="max-w-7xl mx-auto">
    <!-- En-tête -->
    <div class="mb-8">
      <div class="flex items-center space-x-3 mb-2">
        <div class="p-2 bg-blue-600 rounded-lg">
          <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"/>
          </svg>
        </div>
        <h1 class="text-3xl font-bold text-white">Gestion des Utilisateurs</h1>
      </div>
      <p class="text-gray-400">Administrez les comptes et les rôles des utilisateurs</p>
    </div>

    @if(session('success'))
        <div class="bg-green-900/80 border border-green-700 text-green-200 px-4 py-3 rounded-lg mb-6 flex items-center space-x-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-900/80 border border-red-700 text-red-200 px-4 py-3 rounded-lg mb-6 flex items-center space-x-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"/>
            </svg>
            <span>{{ session('error') }}</span>
        </div>
    @endif

    <!-- Statistiques rapides -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
      <div class="bg-gray-800 rounded-lg border border-gray-700 p-6">
        <div class="flex items-center justify-between">
          <div>
            <p class="text-sm font-medium text-gray-400 mb-1">Total Utilisateurs</p>
            <p class="text-2xl font-bold text-white">{{ $users->total() }}</p>
          </div>
          <div class="p-3 bg-blue-600 rounded-lg">
            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"/>
            </svg>
          </div>
        </div>
      </div>
      
      <div class="bg-gray-800 rounded-lg border border-gray-700 p-6">
        <div class="flex items-center justify-between">
          <div>
            <p class="text-sm font-medium text-gray-400 mb-1">Administrateurs</p>
            <p class="text-2xl font-bold text-white">{{ $users->where('role', 'admin')->count() }}</p>
          </div>
          <div class="p-3 bg-red-600 rounded-lg">
            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5-6a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
          </div>
        </div>
      </div>
      
      <div class="bg-gray-800 rounded-lg border border-gray-700 p-6">
        <div class="flex items-center justify-between">
          <div>
            <p class="text-sm font-medium text-gray-400 mb-1">Utilisateurs</p>
            <p class="text-2xl font-bold text-white">{{ $users->where('role', 'user')->count() }}</p>
          </div>
          <div class="p-3 bg-green-600 rounded-lg">
            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
            </svg>
          </div>
        </div>
      </div>
    </div>

    <!-- Tableau des utilisateurs -->
    <div class="bg-gray-800 rounded-lg border border-gray-700 overflow-hidden">
      <div class="px-6 py-4 border-b border-gray-700">
        <h3 class="text-lg font-semibold text-white flex items-center space-x-2">
          <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
          </svg>
          <span>Liste des Utilisateurs</span>
        </h3>
      </div>
      
      <div class="overflow-x-auto">
        <table class="min-w-full">
          <thead>
            <tr class="border-b border-gray-700">
              <th class="px-6 py-4 text-left text-sm font-medium text-gray-300">Utilisateur</th>
              <th class="px-6 py-4 text-left text-sm font-medium text-gray-300">Email</th>
              <th class="px-6 py-4 text-left text-sm font-medium text-gray-300">Rôle</th>
              <th class="px-6 py-4 text-left text-sm font-medium text-gray-300">Date d'inscription</th>
              <th class="px-6 py-4 text-left text-sm font-medium text-gray-300">Actions</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-700">
            @foreach($users as $user)
            <tr class="hover:bg-gray-700 transition-colors">
              <td class="px-6 py-4">
                <div class="flex items-center space-x-3">
                  <div class="w-10 h-10 bg-gray-600 rounded-full flex items-center justify-center">
                    <span class="text-sm font-semibold text-white">{{ substr($user->name, 0, 1) }}</span>
                  </div>
                  <div>
                    <div class="font-medium text-white">{{ $user->name }}</div>
                  </div>
                </div>
              </td>
              <td class="px-6 py-4">
                <div class="text-gray-300">{{ $user->email }}</div>
              </td>
              <td class="px-6 py-4">
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $user->role === 'admin' ? 'bg-red-900 text-red-200' : 'bg-gray-600 text-gray-300' }}">
                  @if($user->role === 'admin')
                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5-6a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                  @else
                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                  @endif
                  {{ ucfirst($user->role) }}
                </span>
              </td>
              <td class="px-6 py-4 text-gray-400">
                {{ $user->created_at->format('d/m/Y H:i') }}
              </td>
              <td class="px-6 py-4">
                @if($user->id !== auth()->id())
                  <form action="{{ route('admin.users.role', $user) }}" method="POST" class="inline">
                    @csrf
                    @method('PATCH')
                    <select name="role" onchange="this.form.submit()" 
                            class="text-sm bg-gray-700 border border-gray-600 text-gray-300 rounded-md px-3 py-1 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors">
                      <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>Utilisateur</option>
                      <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Administrateur</option>
                    </select>
                  </form>
                @else
                  <span class="text-gray-500 italic flex items-center space-x-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                    <span>Vous</span>
                  </span>
                @endif
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      
      <div class="px-6 py-4 border-t border-gray-700">
        <div class="flex justify-center">
          {{ $users->links() }}
        </div>
      </div>
    </div>

    <!-- Actions -->
    <div class="mt-8 flex justify-center">
      <a href="{{ route('admin.dashboard') }}" 
         class="flex items-center space-x-2 bg-gray-700 text-white px-6 py-3 rounded-lg hover:bg-gray-600 transition-colors">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
        </svg>
        <span>Retour au Dashboard</span>
      </a>
    </div>
  </div>
</div>
@endsection 