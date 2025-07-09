@extends('components.layout')

@section('content')
    <div
        class="min-h-screen bg-gradient-to-b from-gray-950 via-gray-900 to-gray-800 py-12 px-4 flex items-center justify-center">
        <div class="max-w-7xl w-full bg-gray-900 rounded-xl shadow-2xl border border-gray-800 overflow-hidden">
            <div class="flex flex-col md:flex-row">
                @if ($ninja->image)
                    <div class="md:w-1/3 flex-shrink-0 bg-black h-96 md:h-auto">
                        <img src="{{ asset('storage/' . $ninja->image) }}" alt="Portrait de {{ $ninja->name }}"
                            class="object-cover object-top w-full h-full grayscale contrast-125 shadow-lg border-r border-gray-800" />
                    </div>
                @else
                    <div class="md:w-1/3 flex-shrink-0 h-96 md:h-auto flex items-center justify-center bg-gradient-to-br from-gray-800 to-gray-900">
                        <div class="text-gray-600 text-8xl">⚔️</div>
                    </div>
                @endif
                <div class="flex-1 p-8 flex flex-col justify-between">
                    <div>
                        <h2 class="text-4xl font-extrabold text-white mb-2 tracking-wider drop-shadow-lg">
                            {{ $ninja->name }}</h2>
                        <div class="flex items-center space-x-4 mb-4">
                            <span
                                class="inline-block bg-gray-800 text-gray-300 px-3 py-1 rounded-full text-xs uppercase tracking-widest">Dojo
                                : {{ $ninja->dojo->name }}</span>
                            <span class="inline-block bg-red-900 text-red-200 px-3 py-1 rounded-full text-xs">Niveau :
                                {{ $ninja->skill }}/100</span>
                        </div>
                        <div class="mb-6">
                            <h3 class="text-lg text-gray-400 font-semibold mb-2">Biographie</h3>
                            <p class="text-gray-200 leading-relaxed italic">{{ $ninja->bio }}</p>
                        </div>
                        @if ($ninja->story)
                            <div class="mb-6 bg-black/60 rounded-lg p-6 border-l-4 border-red-800 shadow-inner">
                                <h3 class="text-xl text-red-400 font-bold mb-3 tracking-wide">L'Histoire de
                                    {{ $ninja->name }}</h3>
                                <div class="prose prose-invert prose-sm max-w-none text-gray-100 leading-relaxed"
                                    style="font-family: 'Merriweather', serif;">
                                    {!! nl2br(e($ninja->story)) !!}
                                </div>
                            </div>
                        @endif
                        <div class="mb-6 bg-gray-800 rounded-lg p-4 border border-gray-700">
                            <h3 class="text-lg text-gray-400 font-semibold mb-2">À propos du Dojo</h3>
                            <p class="text-gray-300"><span class="font-bold">Lieu :</span> {{ $ninja->dojo->location }}</p>
                            <p class="text-gray-300 mt-2">{{ $ninja->dojo->description }}</p>
                        </div>

                        <!-- Système de Réactions -->
                        <div class="mb-6 bg-gray-800 rounded-lg p-6 border border-gray-700">
                            @php
                                $reactionCounts = $ninja->getReactionCounts();
                                $userReaction = $ninja->getUserReaction();
                                $emojis = App\Models\Reaction::getEmojis();
                                $totalReactions = array_sum($reactionCounts);
                            @endphp
                            
                            <!-- Compteurs de réactions -->
                            @if($totalReactions > 0)
                                <div class="flex items-center space-x-4 mb-4">
                                    @foreach($reactionCounts as $type => $count)
                                        <div class="flex items-center space-x-1">
                                            <span class="text-lg">{{ $emojis[$type] }}</span>
                                            <span class="text-gray-300 text-sm">{{ $count }}</span>
                                        </div>
                                    @endforeach
                                    <span class="text-gray-400 text-sm ml-2">{{ $totalReactions }} réaction{{ $totalReactions > 1 ? 's' : '' }}</span>
                                </div>
                            @endif
                            
                            @auth
                                <!-- Boutons de réactions -->
                                <div class="flex items-center space-x-2">
                                    @foreach($emojis as $type => $emoji)
                                        <form action="{{ route('ninjas.reaction', $ninja) }}" method="POST" class="inline">
                                            @csrf
                                            <input type="hidden" name="type" value="{{ $type }}">
                                            <button type="submit" 
                                                class="group px-3 py-2 rounded-lg transition-all duration-200 hover:scale-110 {{ $userReaction && $userReaction->type === $type ? 'bg-blue-600 shadow-lg' : 'bg-gray-700 hover:bg-gray-600' }}">
                                                <span class="text-xl">{{ $emoji }}</span>
                                            </button>
                                        </form>
                                    @endforeach
                                </div>
                            @else
                                <div class="flex items-center space-x-2 text-gray-500">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                    </svg>
                                    <span>Connectez-vous pour réagir</span>
                                </div>
                            @endauth
                        </div>
                        
                        <!-- Section Commentaires -->
                        <div class="mb-6 bg-gray-800 rounded-lg p-6 border border-gray-700">
                            <h3 class="text-lg font-semibold text-white mb-4 flex items-center space-x-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                                </svg>
                                <span>Commentaires ({{ $ninja->comments->count() }})</span>
                            </h3>
                            
                            @auth
                                <!-- Formulaire d'ajout de commentaire -->
                                <form action="{{ route('comments.store', $ninja) }}" method="POST" class="mb-6">
                                    @csrf
                                    <div class="flex space-x-3">
                                        <div class="flex-shrink-0">
                                            <div class="w-8 h-8 bg-gray-700 rounded-full flex items-center justify-center">
                                                <svg class="w-4 h-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="flex-1">
                                            <textarea name="content" rows="3" 
                                                class="w-full bg-gray-700 text-white rounded-lg px-4 py-3 border border-gray-600 focus:border-red-500 focus:outline-none resize-none" 
                                                placeholder="Ajoutez un commentaire..."></textarea>
                                            <button type="submit" class="mt-2 bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition-colors">
                                                Commenter
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            @endauth
                            
                            <!-- Liste des commentaires -->
                            <div class="space-y-4">
                                @forelse($ninja->comments as $comment)
                                    <div class="flex space-x-3 p-4 bg-gray-900 rounded-lg">
                                        <div class="flex-shrink-0">
                                            <div class="w-8 h-8 bg-gray-700 rounded-full flex items-center justify-center">
                                                <svg class="w-4 h-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="flex-1">
                                            <div class="flex items-center justify-between mb-1">
                                                <div class="flex items-center space-x-2">
                                                    <span class="font-medium text-white">{{ $comment->user->name }}</span>
                                                    @if($comment->user->isAdmin())
                                                        <span class="text-xs bg-red-600 text-white px-2 py-1 rounded-full">Admin</span>
                                                    @endif
                                                </div>
                                                <div class="flex items-center space-x-2">
                                                    <span class="text-xs text-gray-400">{{ $comment->created_at->diffForHumans() }}</span>
                                                    @if($comment->user_id === auth()->id() || auth()->user()->isAdmin())
                                                        <form action="{{ route('comments.destroy', $comment) }}" method="POST" class="inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="text-gray-400 hover:text-red-400 transition-colors" onclick="return confirm('Supprimer ce commentaire ?')">
                                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                                </svg>
                                                            </button>
                                                        </form>
                                                    @endif
                                                </div>
                                            </div>
                                            <p class="text-gray-300">{{ $comment->content }}</p>
                                        </div>
                                    </div>
                                @empty
                                    <div class="text-center py-8 text-gray-400">
                                        <svg class="w-12 h-12 mx-auto mb-3 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                                        </svg>
                                        <p>Aucun commentaire pour le moment</p>
                                        @auth
                                            <p class="text-sm mt-1">Soyez le premier à commenter !</p>
                                        @endauth
                                    </div>
                                @endforelse
                            </div>
                        </div>
                        
                        <!-- Actions -->
                        @if (auth()->user()->isAdmin())
                            <div class="flex flex-wrap gap-3 justify-between items-center pt-6 border-t border-gray-700">

                                <div class="flex space-x-3">
                                    <a href="{{ route('ninjas.edit', $ninja) }}"
                                        class="flex items-center space-x-2 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                        <span>Modifier</span>
                                    </a>
                                    <form action="{{ route('ninjas.destroy', $ninja->id) }}" method="POST"
                                        class="inline m-0">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="flex items-center space-x-2 bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition-colors"
                                            onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce ninja ?')">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                            <span>Supprimer</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
