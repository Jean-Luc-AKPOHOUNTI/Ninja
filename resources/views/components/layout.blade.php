<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ninja Network</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  @vite('resources/css/app.css')
</head>
<body class="bg-gray-900 font-['Inter'] antialiased">
  @if (session('success'))
    <div id="flash" class="fixed top-4 right-4 z-50 p-4 bg-green-900/90 text-green-200 font-medium rounded-lg border border-green-700 backdrop-blur-sm">
      {{ session('success') }}
    </div>
  @endif

  @if (session('error'))
    <div id="flash" class="fixed top-4 right-4 z-50 p-4 bg-red-900/90 text-red-200 font-medium rounded-lg border border-red-700 backdrop-blur-sm">
      {{ session('error') }}
    </div>
  @endif
  
  <div class="flex h-screen">
    <!-- Mobile menu button -->
    <button id="mobile-menu-button" class="lg:hidden fixed top-4 left-4 z-50 p-2 bg-gray-800 text-white rounded-lg">
      <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
      </svg>
    </button>

    <!-- Sidebar -->
    <aside id="sidebar" class="w-64 bg-gray-950 border-r border-gray-800 flex flex-col fixed lg:relative h-full z-40 transform -translate-x-full lg:translate-x-0 transition-transform">
      <!-- Logo -->
      <div class="p-6 border-b border-gray-800">
        <div class="flex items-center space-x-3">
          <div class="w-8 h-8 bg-red-600 rounded-lg flex items-center justify-center">
            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
            </svg>
          </div>
          <h1>
            <a href="{{ route('ninjas.index') }}" class="text-lg font-semibold text-white hover:text-red-400 transition-colors">
              Ninja Network
            </a>
          </h1>
        </div>
      </div>

      <!-- Navigation -->
      <nav class="flex-1 p-4 space-y-2">
        @auth
          <a href="{{ route('ninjas.index') }}" 
             class="flex items-center space-x-3 px-3 py-2 rounded-lg text-gray-300 hover:text-white hover:bg-gray-800 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 515.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 919.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
            </svg>
            <span>Ninjas</span>
          </a>
        @endauth
        
        @if(!auth()->check() || !auth()->user()->isAdmin())
          <a href="/about" 
             class="flex items-center space-x-3 px-3 py-2 rounded-lg text-gray-300 hover:text-white hover:bg-gray-800 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <span>À propos</span>
          </a>
          
          <a href="/contact" 
             class="flex items-center space-x-3 px-3 py-2 rounded-lg text-gray-300 hover:text-white hover:bg-gray-800 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
            </svg>
            <span>Contact</span>
          </a>
        @endif
        
        @auth
          @if(auth()->user()->isAdmin())
            <a href="{{ route('admin.dashboard') }}"
               class="flex items-center space-x-3 px-3 py-2 rounded-lg text-gray-300 hover:text-white hover:bg-gray-800 transition-colors">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
              </svg>
              <span>Dashboard</span>
            </a>
            
            <a href="{{ route('ninjas.create') }}"
               class="flex items-center space-x-3 px-3 py-2 rounded-lg bg-red-600 text-white hover:bg-red-700 transition-colors">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
              </svg>
              <span>Créer un Ninja</span>
            </a>
          @endif
        @endauth
      </nav>

      <!-- Profil utilisateur / Menu visiteurs -->
      @auth
        <div class="p-4 border-t border-gray-800">
          <div class="flex items-center space-x-3 mb-3">
            <div class="w-8 h-8 bg-gray-700 rounded-full flex items-center justify-center">
              <svg class="w-4 h-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
              </svg>
            </div>
            <div>
              <p class="text-sm font-medium text-white">{{ auth()->user()->name }}</p>
              @if(auth()->user()->isAdmin())
                <p class="text-xs text-red-400">Administrateur</p>
              @else
                <p class="text-xs text-gray-400">Utilisateur</p>
              @endif
            </div>
          </div>
          
          <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit"
                    class="w-full flex items-center space-x-3 px-3 py-2 rounded-lg text-gray-300 hover:text-white hover:bg-gray-800 transition-colors">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
              </svg>
              <span>Déconnexion</span>
            </button>
          </form>
        </div>
      @else
        <div class="p-4 border-t border-gray-800 space-y-2">
          <a href="{{ route('login') }}" 
             class="flex items-center space-x-3 px-3 py-2 rounded-lg text-gray-300 hover:text-white hover:bg-gray-800 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
            </svg>
            <span>Connexion</span>
          </a>
          <a href="{{ route('register') }}" 
             class="flex items-center space-x-3 px-3 py-2 rounded-lg bg-red-600 text-white hover:bg-red-700 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
            </svg>
            <span>Rejoindre</span>
          </a>
        </div>
      @endauth
    </aside>

    <!-- Overlay pour mobile -->
    <div id="sidebar-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-30 lg:hidden hidden"></div>

    <!-- Contenu principal -->
    <main class="flex-1 overflow-auto bg-gray-900 lg:ml-0"> 
      @yield('content')
      
      <!-- Footer -->
      <footer class="bg-gray-950 border-t border-gray-800 p-6 mt-auto">
        <div class="max-w-6xl mx-auto">
          <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
            <div class="flex items-center space-x-2">
              <div class="w-6 h-6 bg-red-600 rounded flex items-center justify-center">
                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                </svg>
              </div>
              <span class="text-gray-400 text-sm">© 2024 Ninja Network. Tous droits réservés.</span>
            </div>
            
            <div class="flex items-center space-x-6">
              <a href="/about" class="text-gray-400 hover:text-white text-sm transition-colors">À propos</a>
              <a href="/contact" class="text-gray-400 hover:text-white text-sm transition-colors">Contact</a>
              <a href="#" class="text-gray-400 hover:text-white text-sm transition-colors">Confidentialité</a>
            </div>
          </div>
        </div>
      </footer>
    </main>
  </div>

  <script>
    // Menu mobile
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('sidebar-overlay');

    function toggleSidebar() {
      sidebar.classList.toggle('-translate-x-full');
      overlay.classList.toggle('hidden');
    }

    mobileMenuButton?.addEventListener('click', toggleSidebar);
    overlay?.addEventListener('click', toggleSidebar);
  </script>

</body>
</html>