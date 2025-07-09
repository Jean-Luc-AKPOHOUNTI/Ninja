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
            <div class="h-72 bg-black overflow-hidden">
              <img src="{{ asset('storage/' . $ninja->image) }}"
                   alt="Portrait de {{ $ninja->name }}"
                   class="w-full h-full object-cover object-top grayscale hover:contrast-150 transition-all duration-300" />
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

            <!-- Stats et actions -->
            <div class="flex items-center justify-between mb-4">
              <div class="flex items-center justify-between w-full">
                <div class="flex items-center space-x-1 text-red-400">
                  <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"/>
                  </svg>
                  <span class="text-sm font-medium">{{ $ninja->likes_count }}</span>
                </div>
                @auth
                  <form action="{{ route('ninjas.favorite', $ninja) }}" method="POST" class="inline m-0">
                    @csrf
                    <button type="submit" class="group flex items-center space-x-1 px-2 py-1 rounded-md transition-all duration-200 {{ $ninja->isFavoritedByUser() ? 'bg-yellow-100 text-yellow-700 hover:bg-yellow-200' : 'bg-gray-100 text-gray-500 hover:bg-yellow-100 hover:text-yellow-600' }}">
                      @if($ninja->isFavoritedByUser())
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                          <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                      @else
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                        </svg>
                      @endif
                    </button>
                  </form>
                @endauth
              </div>
            </div>

            <div class="flex justify-between items-center">
              <a href="{{ route('ninjas.show', $ninja->id) }}"
                 class="flex items-center space-x-2 bg-red-700 text-white px-4 py-2 rounded-lg hover:bg-red-800 transition-all duration-200 shadow-lg hover:shadow-red-900/50">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                </svg>
                <span>Voir détails</span>
              </a>

              @if(auth()->user()->isAdmin())
                <div class="flex space-x-2">
                  <a href="{{ route('ninjas.edit', $ninja) }}"
                     class="bg-blue-700 text-white px-3 py-2 m-0 rounded-lg hover:bg-blue-800 transition-all duration-200">
                    ✏️
                  </a>
                  <form action="{{ route('ninjas.destroy', $ninja) }}" method="POST" class="inline m-0">
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

    <div class="mt-12 flex justify-center ">
      <div class="bg-gray-900 rounded-lg p-4 border border-gray- w-full">
        {{ $ninjas->links() }}
      </div>
    </div>
  </div>
</div>
@endsection
