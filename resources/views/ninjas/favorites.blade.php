@extends('components.layout')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-gray-950 via-gray-900 to-gray-800 py-12 px-4">
  <div class="max-w-7xl mx-auto">
    <div class="text-center mb-12">
      <h1 class="text-5xl font-extrabold text-white mb-4 tracking-wider drop-shadow-lg">
        ❤️ Mes Ninjas Favoris
      </h1>
      <p class="text-gray-400 text-lg">Vos ninjas préférés en un coup d'œil</p>
    </div>

    @if($ninjas->count() > 0)
      <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6 mb-12">
        @foreach($ninjas as $ninja)
          <div class="group relative bg-black rounded-2xl overflow-hidden shadow-2xl border border-gray-800 hover:border-red-500/50 transition-all duration-500 hover:scale-105">
            <!-- Image principale -->
            <div class="relative aspect-[3/4] overflow-hidden">
              @if($ninja->image)
                <img src="{{ asset('storage/' . $ninja->image) }}" 
                     alt="{{ $ninja->name }}" 
                     class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-700 group-hover:scale-110"/>
              @else
                <div class="w-full h-full bg-gradient-to-br from-gray-900 via-gray-800 to-black flex items-center justify-center">
                  <div class="text-gray-600 text-8xl opacity-50 group-hover:opacity-80 transition-opacity">⚔️</div>
                </div>
              @endif
              
              <!-- Overlay gradient -->
              <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent opacity-60 group-hover:opacity-40 transition-opacity duration-500"></div>
              
              <!-- Badge niveau -->
              <div class="absolute top-3 right-3 bg-red-900/90 backdrop-blur-sm text-red-100 px-2 py-1 rounded-full text-xs font-bold border border-red-700/50">
                {{ $ninja->skill }}
              </div>
              
              <!-- Étoile favori -->
              <div class="absolute top-3 left-3 text-yellow-400 drop-shadow-lg">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                </svg>
              </div>
            </div>
            
            <!-- Infos ninja -->
            <div class="absolute bottom-0 left-0 right-0 p-4 text-white">
              <h3 class="font-bold text-lg mb-1 drop-shadow-lg group-hover:text-red-300 transition-colors">{{ $ninja->name }}</h3>
              <p class="text-gray-300 text-sm mb-2 drop-shadow">{{ $ninja->dojo->name }}</p>
              
              <!-- Stats en bas -->
              <div class="flex items-center justify-between text-xs">
                <div class="flex items-center space-x-1 text-red-400">
                  <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"/>
                  </svg>
                  <span>{{ $ninja->likes_count }}</span>
                </div>
                
                <!-- Bouton voir détails au hover -->
                <a href="{{ route('ninjas.show', $ninja) }}" 
                   class="opacity-0 group-hover:opacity-100 bg-red-600/90 backdrop-blur-sm px-3 py-1 rounded-full text-white text-xs font-medium hover:bg-red-500 transition-all duration-300 border border-red-500/50">
                  Voir
                </a>
              </div>
            </div>
            
            <!-- Effet de brillance au hover -->
            <div class="absolute inset-0 opacity-0 group-hover:opacity-20 bg-gradient-to-r from-transparent via-white to-transparent -skew-x-12 transform translate-x-full group-hover:translate-x-[-200%] transition-transform duration-1000 ease-out"></div>
          </div>
        @endforeach
      </div>

      <!-- Pagination -->
      <div class="flex justify-center">
        {{ $ninjas->links() }}
      </div>
    @else
      <div class="text-center py-16">
        <div class="text-gray-600 text-8xl mb-6">💔</div>
        <h2 class="text-2xl font-bold text-gray-400 mb-4">Aucun ninja favori</h2>
        <p class="text-gray-500 mb-8">Vous n'avez pas encore ajouté de ninjas à vos favoris.</p>
        <a href="{{ route('ninjas.index') }}" class="bg-red-700 text-white px-6 py-3 rounded-lg hover:bg-red-800 transition-colors">
          Découvrir les ninjas
        </a>
      </div>
    @endif
  </div>
</div>
@endsection