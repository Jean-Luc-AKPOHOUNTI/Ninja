@extends('components.layout')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-gray-950 via-gray-900 to-gray-800 py-12 px-4 flex items-center justify-center">
  <div class="max-w-7xl w-full bg-gray-900 rounded-xl shadow-2xl border border-gray-800 overflow-hidden">
    <div class="flex flex-col md:flex-row">
      @if($ninja->image)
        <div class="md:w-1/3 flex-shrink-0 flex items-center justify-center bg-black">
          <img src="{{ asset('storage/' . $ninja->image) }}" alt="Portrait de {{ $ninja->name }}" class="object-cover w-full h-full grayscale contrast-125 shadow-lg border-r border-gray-800"/>
        </div>
      @else
        <div class="md:w-1/3 flex-shrink-0 flex items-center justify-center bg-gradient-to-br from-gray-800 to-gray-900">
          <div class="text-gray-600 text-8xl">⚔️</div>
        </div>
      @endif
      <div class="flex-1 p-8 flex flex-col justify-between">
        <div>
          <h2 class="text-4xl font-extrabold text-white mb-2 tracking-wider drop-shadow-lg">{{ $ninja->name }}</h2>
          <div class="flex items-center space-x-4 mb-4">
            <span class="inline-block bg-gray-800 text-gray-300 px-3 py-1 rounded-full text-xs uppercase tracking-widest">Dojo : {{ $ninja->dojo->name }}</span>
            <span class="inline-block bg-red-900 text-red-200 px-3 py-1 rounded-full text-xs">Niveau : {{ $ninja->skill }}/100</span>
          </div>
          <div class="mb-6">
            <h3 class="text-lg text-gray-400 font-semibold mb-2">Biographie</h3>
            <p class="text-gray-200 leading-relaxed italic">{{ $ninja->bio }}</p>
          </div>
          @if($ninja->story)
            <div class="mb-6 bg-black/60 rounded-lg p-6 border-l-4 border-red-800 shadow-inner">
              <h3 class="text-xl text-red-400 font-bold mb-3 tracking-wide">L'Histoire de {{ $ninja->name }}</h3>
              <div class="prose prose-invert prose-sm max-w-none text-gray-100 leading-relaxed" style="font-family: 'Merriweather', serif;">
                {!! nl2br(e($ninja->story)) !!}
              </div>
            </div>
          @endif
          <div class="mb-6 bg-gray-800 rounded-lg p-4 border border-gray-700">
            <h3 class="text-lg text-gray-400 font-semibold mb-2">À propos du Dojo</h3>
            <p class="text-gray-300"><span class="font-bold">Lieu :</span> {{ $ninja->dojo->location }}</p>
            <p class="text-gray-300 mt-2">{{ $ninja->dojo->description }}</p>
          </div>

          <!-- Système de Like -->
          <div class="mb-6 bg-gray-800 rounded-lg p-4 border border-gray-700">
            <div class="flex items-center justify-between">
              <div class="flex items-center space-x-4">
                <span class="text-gray-400 font-semibold">Likes : {{ $ninja->likes_count }}</span>
                @auth
                  @if($ninja->isLikedByUser())
                    <form action="{{ route('ninjas.unlike', $ninja) }}" method="POST" class="inline">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="bg-red-700 text-white px-4 py-2 rounded-lg hover:bg-red-800 transition-all duration-200 flex items-center space-x-2">
                        <span>❤️</span>
                        <span>Retirer le like</span>
                      </button>
                    </form>
                  @else
                    <form action="{{ route('ninjas.like', $ninja) }}" method="POST" class="inline">
                      @csrf
                      <button type="submit" class="bg-gray-700 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition-all duration-200 flex items-center space-x-2">
                        <span>🤍</span>
                        <span>Liker</span>
                      </button>
                    </form>
                  @endif
                @else
                  <span class="text-gray-500 text-sm">Connectez-vous pour liker</span>
                @endauth
              </div>
            </div>
          </div>
          <!-- Actions -->
          <div class="flex flex-wrap gap-3 justify-between items-center pt-6 border-t border-gray-700">
            <a href="{{ route('ninjas.index') }}" class="flex items-center space-x-2 bg-gray-700 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition-colors">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
              </svg>
              <span>Retour à la liste</span>
            </a>
            @if(auth()->user()->isAdmin())
              <div class="flex space-x-3">
                <a href="{{ route('ninjas.edit', $ninja) }}" class="flex items-center space-x-2 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                  </svg>
                  <span>Modifier</span>
                </a>
                <form action="{{ route('ninjas.destroy', $ninja->id) }}" method="POST" class="inline m-0">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="flex items-center space-x-2 bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition-colors" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce ninja ?')">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                    </svg>
                    <span>Supprimer</span>
                  </button>
                </form>
              </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
