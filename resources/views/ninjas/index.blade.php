@extends('components.layout')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-gray-950 via-gray-900 to-gray-800 py-12 px-4">
  <div class="max-w-7xl mx-auto">
    <div class="text-center mb-12">
      <h2 class="text-5xl font-extrabold text-white mb-4 tracking-wider drop-shadow-lg">Les Ninjas de l'Ombre</h2>
      <p class="text-gray-400 text-lg italic">Découvrez les guerriers les plus redoutables de notre réseau</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
      @foreach($ninjas as $ninja)
        <div class="bg-gray-900 rounded-xl shadow-2xl border border-gray-800 overflow-hidden hover:shadow-red-900/20 transition-all duration-300 transform hover:-translate-y-2">
          @if($ninja->image)
            <div class="h-48 bg-black overflow-hidden">
              <img src="{{ asset('storage/' . $ninja->image) }}" 
                   alt="Portrait de {{ $ninja->name }}" 
                   class="w-full h-full object-cover grayscale contrast-125 hover:contrast-150 transition-all duration-300" />
            </div>
          @else
            <div class="h-48 bg-gradient-to-br from-gray-800 to-gray-900 flex items-center justify-center">
              <div class="text-gray-600 text-6xl">⚔️</div>
            </div>
          @endif
          
          <div class="p-6">
            <div class="flex items-center justify-between mb-3">
              <h3 class="text-xl font-bold text-white tracking-wide">{{ $ninja->name }}</h3>
              <span class="inline-block bg-red-900 text-red-200 px-2 py-1 rounded-full text-xs font-semibold">
                {{ $ninja->skill }}/100
              </span>
            </div>
            
            <p class="text-gray-400 mb-4 text-sm italic">{{ $ninja->dojo->name }}</p>
            
            <p class="text-gray-300 text-sm mb-4 line-clamp-3">{{ Str::limit($ninja->bio, 120) }}</p>
            
            <!-- Indicateur de likes -->
            <div class="flex items-center space-x-2 mb-4">
              <span class="text-red-400 text-sm">❤️ {{ $ninja->likes_count }}</span>
              @auth
                @if($ninja->isLikedByUser())
                  <span class="text-xs text-red-300">(Vous avez liké)</span>
                @endif
              @endauth
            </div>
            
            <div class="flex justify-between items-center">
              <a href="{{ route('ninjas.show', $ninja->id) }}" 
                 class="bg-red-700 text-white px-4 py-2 rounded-lg hover:bg-red-800 transition-all duration-200 shadow-lg hover:shadow-red-900/50">
                Découvrir l'histoire
              </a>
              
              @if(auth()->user()->isAdmin())
                <div class="flex space-x-2">
                  <a href="{{ route('ninjas.edit', $ninja) }}" 
                     class="bg-blue-700 text-white px-3 py-2 rounded-lg hover:bg-blue-800 transition-all duration-200">
                    ✏️
                  </a>
                  <form action="{{ route('ninjas.destroy', $ninja) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                            class="bg-gray-800 text-gray-300 px-3 py-2 rounded-lg hover:bg-red-900 hover:text-white transition-all duration-200"
                            onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce ninja ?')">
                      🗑️
                    </button>
                  </form>
                </div>
              @endif
            </div>
          </div>
        </div>
      @endforeach
    </div>

    <div class="mt-12 flex justify-center">
      <div class="bg-gray-900 rounded-lg p-4 border border-gray-800">
        {{ $ninjas->links() }}
      </div>
    </div>
  </div>
</div>
@endsection