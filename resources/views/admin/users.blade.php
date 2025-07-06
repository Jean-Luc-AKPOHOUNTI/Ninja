@extends('components.layout')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-gray-950 via-gray-900 to-gray-800 py-8 px-4">
  <div class="max-w-7xl mx-auto">
    <div class="mb-8 text-center">
      <h1 class="text-4xl font-extrabold text-white mb-2 tracking-wider drop-shadow-lg">👥 Gestion des Utilisateurs</h1>
      <p class="text-gray-400 italic">Contrôlez l'ordre et les rangs de vos ninjas</p>
    </div>

    @if(session('success'))
        <div class="bg-green-900/50 border border-green-700 text-green-300 px-4 py-3 rounded-lg mb-6 text-center">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-900/50 border border-red-700 text-red-300 px-4 py-3 rounded-lg mb-6 text-center">
            {{ session('error') }}
        </div>
    @endif

    <div class="bg-gray-900 rounded-xl shadow-2xl border border-gray-800 overflow-hidden">
      <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-800">
          <thead class="bg-gray-800">
            <tr>
              <th class="px-6 py-4 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Utilisateur</th>
              <th class="px-6 py-4 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Email</th>
              <th class="px-6 py-4 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Rôle</th>
              <th class="px-6 py-4 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Date d'inscription</th>
              <th class="px-6 py-4 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Actions</th>
            </tr>
          </thead>
          <tbody class="bg-gray-900 divide-y divide-gray-800">
            @foreach($users as $user)
            <tr class="hover:bg-gray-800 transition-colors duration-200">
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                  <div class="flex-shrink-0 h-12 w-12">
                    <div class="h-12 w-12 rounded-full bg-gradient-to-br from-gray-700 to-gray-800 flex items-center justify-center border-2 border-gray-600">
                      <span class="text-lg font-bold text-gray-300">{{ substr($user->name, 0, 1) }}</span>
                    </div>
                  </div>
                  <div class="ml-4">
                    <div class="text-sm font-semibold text-white">{{ $user->name }}</div>
                  </div>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-300">{{ $user->email }}</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <span class="px-3 py-1 text-xs rounded-full font-semibold {{ $user->role === 'admin' ? 'bg-red-900 text-red-200 border border-red-700' : 'bg-gray-700 text-gray-300 border border-gray-600' }}">
                  {{ ucfirst($user->role) }}
                </span>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400">
                {{ $user->created_at->format('d/m/Y H:i') }}
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                @if($user->id !== auth()->id())
                  <form action="{{ route('admin.users.role', $user) }}" method="POST" class="inline">
                    @csrf
                    @method('PATCH')
                    <select name="role" onchange="this.form.submit()" 
                            class="text-sm border border-gray-700 bg-gray-800 text-gray-300 rounded-lg px-3 py-1 focus:outline-none focus:ring-2 focus:ring-red-700 focus:border-transparent transition-all duration-200">
                      <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>Utilisateur</option>
                      <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Administrateur</option>
                    </select>
                  </form>
                @else
                  <span class="text-gray-500 italic">Vous</span>
                @endif
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      
      <div class="bg-gray-800 px-6 py-4 border-t border-gray-700">
        <div class="flex justify-center">
          {{ $users->links() }}
        </div>
      </div>
    </div>

    <div class="mt-8 text-center">
      <a href="{{ route('admin.dashboard') }}" 
         class="bg-gray-700 text-white px-6 py-3 rounded-lg hover:bg-gray-800 transition-all duration-200 shadow-lg hover:shadow-gray-900/50">
        🏛️ Retour au Dashboard
      </a>
    </div>
  </div>
</div>
@endsection 