<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ninja Network</title>

  @vite('resources/css/app.css')
</head>
<body class="bg-gray-950">
  @if (session('success'))
    <div id="flash" class="p-4 text-center bg-green-900/80 text-green-300 font-bold border-b border-green-700 backdrop-blur-sm">
      {{ session('success') }}
    </div>
  @endif

  @if (session('error'))
    <div id="flash" class="p-4 text-center bg-red-900/80 text-red-300 font-bold border-b border-red-700 backdrop-blur-sm">
      {{ session('error') }}
    </div>
  @endif
  
<header class="bg-gradient-to-r from-gray-950 via-gray-900 to-gray-950 border-b border-gray-800 shadow-2xl sticky top-0 z-50 backdrop-blur-sm">
    <nav class="container mx-auto flex items-center justify-between py-4 px-6">
        <!-- Logo et titre -->
        <div class="flex items-center space-x-4">
            <div class="w-10 h-10 bg-gradient-to-br from-red-700 to-red-900 rounded-lg flex items-center justify-center shadow-lg border border-red-600">
                <span class="text-white font-bold text-lg">⚔️</span>
            </div>
            <h1>
                <a href="{{ route('ninjas.index') }}" class="text-2xl font-extrabold bg-gradient-to-r from-red-400 via-red-500 to-red-600 bg-clip-text text-transparent hover:from-red-300 hover:to-red-500 transition-all duration-300 tracking-wider">
                    NINJA NETWORK
                </a>
            </h1>
        </div>

        <!-- Navigation -->
        <div class="flex items-center space-x-6">
            @auth
                <!-- Menu principal -->
                <div class="hidden md:flex items-center space-x-4">
                    <a href="{{ route('ninjas.index') }}" 
                       class="text-gray-300 hover:text-white font-medium px-3 py-2 rounded-lg hover:bg-gray-800 transition-all duration-200 flex items-center space-x-2">
                        <span>🏮</span>
                        <span>Ninjas</span>
                    </a>
                    
                    @if(auth()->user()->isAdmin())
                        <a href="{{ route('admin.dashboard') }}"
                           class="text-purple-300 hover:text-purple-200 font-medium px-3 py-2 rounded-lg hover:bg-purple-900/30 transition-all duration-200 flex items-center space-x-2">
                            <span>🏛️</span>
                            <span>Dashboard</span>
                        </a>
                        
                        <a href="{{ route('ninjas.create') }}"
                           class="text-red-300 hover:text-red-200 font-medium px-3 py-2 rounded-lg hover:bg-red-900/30 transition-all duration-200 flex items-center space-x-2">
                            <span>⚔️</span>
                            <span>Créer</span>
                        </a>
                    @endif
                </div>

                <!-- Profil utilisateur -->
                <div class="flex items-center space-x-4">
                    <div class="hidden md:flex items-center space-x-2 text-gray-400">
                        <span class="text-sm">Bienvenue,</span>
                        <span class="font-semibold text-white">{{ auth()->user()->name }}</span>
                        @if(auth()->user()->isAdmin())
                            <span class="px-2 py-1 text-xs bg-red-900 text-red-200 rounded-full border border-red-700">Admin</span>
                        @else
                            <span class="px-2 py-1 text-xs bg-gray-700 text-gray-300 rounded-full border border-gray-600">User</span>
                        @endif
                    </div>
                    
                    <!-- Bouton déconnexion -->
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit"
                                class="bg-red-700 hover:bg-red-800 text-white font-semibold py-2 px-4 rounded-lg transition-all duration-200 shadow-lg hover:shadow-red-900/50 flex items-center space-x-2">
                            <span>🚪</span>
                            <span class="hidden sm:inline">Déconnexion</span>
                        </button>
                    </form>
                </div>
            @else
                <!-- Menu pour visiteurs -->
                <div class="flex items-center space-x-4">
                    <a href="{{ route('login') }}" 
                       class="text-gray-300 hover:text-white font-medium px-3 py-2 rounded-lg hover:bg-gray-800 transition-all duration-200">
                        🔐 Connexion
                    </a>
                    <a href="{{ route('register') }}" 
                       class="bg-red-700 hover:bg-red-800 text-white font-semibold py-2 px-4 rounded-lg transition-all duration-200 shadow-lg hover:shadow-red-900/50">
                        ⚔️ Rejoindre
                    </a>
                </div>
            @endauth
        </div>
    </nav>
</header>

  <main class="min-h-screen"> 
    @yield('content')
  </main>

</body>
</html>