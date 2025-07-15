@extends('components.layout')

@section('content')
<div class="h-screen bg-black overflow-hidden flex">
    <!-- Sidebar gauche -->
    <div class="w-72 bg-gray-950 border-r border-gray-800 flex flex-col">
        <!-- Header sidebar -->
        <div class="p-6 border-b border-gray-800">
            <div class="flex items-center space-x-3">
                <div class="w-8 h-8 bg-gray-800 rounded-lg flex items-center justify-center border border-gray-700">
                    <span class="text-gray-300 text-sm">⚔️</span>
                </div>
                <div>
                    <h2 class="text-white font-medium text-lg">Shadow Channels</h2>
                    <p class="text-gray-500 text-sm">{{ auth()->user()->name }}</p>
                </div>
            </div>
        </div>

        <!-- Liste des channels -->
        <div class="flex-1 p-4 space-y-1">
            <div class="bg-gray-900 border border-gray-800 rounded-lg p-3 cursor-pointer hover:bg-gray-800 transition-colors">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <div class="w-6 h-6 bg-gray-800 rounded flex items-center justify-center">
                            <span class="text-xs text-gray-400">#</span>
                        </div>
                        <div>
                            <p class="text-gray-200 font-medium text-sm">general</p>
                            <p class="text-gray-500 text-xs">Main discussion</p>
                        </div>
                    </div>
                    <div class="bg-blue-600 text-white text-xs px-2 py-1 rounded-full font-medium">{{ $messages->count() }}</div>
                </div>
            </div>

            <div class="border border-gray-800 rounded-lg p-3 cursor-pointer hover:bg-gray-900 transition-colors opacity-50">
                <div class="flex items-center space-x-3">
                    <div class="w-6 h-6 bg-gray-800 rounded flex items-center justify-center">
                        <span class="text-xs text-gray-500">#</span>
                    </div>
                    <div>
                        <p class="text-gray-400 font-medium text-sm">training</p>
                        <p class="text-gray-600 text-xs">Private channel</p>
                    </div>
                </div>
            </div>

            <div class="border border-gray-800 rounded-lg p-3 cursor-pointer hover:bg-gray-900 transition-colors opacity-50">
                <div class="flex items-center space-x-3">
                    <div class="w-6 h-6 bg-gray-800 rounded flex items-center justify-center">
                        <span class="text-xs text-gray-500">#</span>
                    </div>
                    <div>
                        <p class="text-gray-400 font-medium text-sm">missions</p>
                        <p class="text-gray-600 text-xs">Coming soon</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- User status -->
        <div class="p-4 border-t border-gray-800">
            <div class="flex items-center space-x-3">
                <div class="relative">
                    <div class="w-8 h-8 bg-gray-800 rounded-full flex items-center justify-center border border-gray-700">
                        <span class="text-xs font-medium text-gray-300">{{ substr(auth()->user()->name, 0, 2) }}</span>
                    </div>
                    <div class="absolute -bottom-0.5 -right-0.5 w-3 h-3 bg-green-500 rounded-full border-2 border-gray-950"></div>
                </div>
                <div class="flex-1">
                    <p class="text-gray-200 font-medium text-sm">{{ auth()->user()->name }}</p>
                    <p class="text-green-500 text-xs">Online</p>
                </div>
                @if(auth()->user()->isAdmin())
                    <div class="bg-blue-600 text-white px-2 py-1 rounded text-xs font-medium">
                        ADMIN
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Zone principale -->
    <div class="flex-1 flex flex-col bg-gray-950">
        <!-- Top bar -->
        <div class="bg-gray-900 border-b border-gray-800 p-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <div class="w-6 h-6 bg-gray-800 rounded flex items-center justify-center">
                        <span class="text-xs text-gray-400">#</span>
                    </div>
                    <div>
                        <h1 class="text-white font-medium text-lg">general</h1>
                        <p class="text-gray-500 text-sm">{{ $messages->count() }} messages</p>
                    </div>
                </div>
                
                <div class="flex items-center space-x-3">
                    <!-- Typing indicator -->
                    <div id="typing-indicator" class="hidden text-gray-500 text-sm">
                        <span>Someone is typing...</span>
                    </div>
                    
                    <!-- Settings -->
                    <button class="w-8 h-8 bg-gray-800 hover:bg-gray-700 rounded flex items-center justify-center transition-colors">
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Messages area -->
        <div id="messages-container" class="flex-1 overflow-y-auto p-4 space-y-3 scrollbar-thin scrollbar-thumb-gray-700 scrollbar-track-transparent">
            @foreach($messages as $message)
                <div class="message-item group" data-message-id="{{ $message->id }}">
                    <div class="flex items-start space-x-3 hover:bg-gray-900/50 p-3 rounded-lg transition-colors">
                        <!-- Avatar avec tooltip -->
                        <div class="relative group/avatar">
                            <div class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center border border-gray-700">
                                <span class="text-gray-300 font-medium text-sm">{{ substr($message->user->name, 0, 2) }}</span>
                            </div>
                            @if($message->user->isAdmin())
                                <div class="absolute -top-1 -right-1 w-4 h-4 bg-blue-600 rounded-full flex items-center justify-center">
                                    <span class="text-white text-xs">•</span>
                                </div>
                            @endif
                            
                            <!-- Profile tooltip -->
                            <div class="absolute left-full ml-3 top-0 bg-gray-900 border border-gray-700 rounded-lg p-3 opacity-0 group-hover/avatar:opacity-100 transition-opacity pointer-events-none z-50 w-48">
                                <div class="flex items-center space-x-2 mb-2">
                                    <div class="w-12 h-12 bg-gray-800 rounded-full flex items-center justify-center border border-gray-700">
                                        <span class="text-gray-300 font-medium">{{ substr($message->user->name, 0, 2) }}</span>
                                    </div>
                                    <div>
                                        <p class="text-white font-medium text-sm">{{ $message->user->name }}</p>
                                        <p class="text-gray-500 text-xs">{{ $message->user->isAdmin() ? 'Shadow Master' : 'Shadow Warrior' }}</p>
                                    </div>
                                </div>
                                <div class="text-gray-400 text-xs space-y-1">
                                    <p>Joined: {{ $message->user->created_at->format('M Y') }}</p>
                                    <p>Status: <span class="text-green-500">Online</span></p>
                                </div>
                            </div>
                        </div>

                        <!-- Message content -->
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center space-x-2 mb-1">
                                <span class="text-white font-medium text-sm">{{ $message->user->name }}</span>
                                @if($message->user->isAdmin())
                                    <span class="bg-blue-600 text-white px-2 py-0.5 rounded text-xs font-medium">ADMIN</span>
                                @endif
                                <span class="text-gray-500 text-xs">{{ $message->created_at->format('H:i') }}</span>
                                
                                @if(auth()->user()->isAdmin())
                                    <div class="opacity-0 group-hover:opacity-100 transition-opacity flex space-x-1">
                                        <button onclick="deleteMessage({{ $message->id }})" class="text-gray-500 hover:text-red-400 p-1 rounded hover:bg-gray-800 transition-all">
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                        </button>
                                        @if(!$message->user->isAdmin())
                                            <button onclick="kickUser({{ $message->user->id }})" class="text-gray-500 hover:text-orange-400 p-1 rounded hover:bg-gray-800 transition-all">
                                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                                                </svg>
                                            </button>
                                        @endif
                                    </div>
                                @endif
                            </div>
                            
                            <div class="text-gray-300 text-sm leading-relaxed">
                                {{ $message->message }}
                                @if($message->file_path)
                                    <div class="mt-2">
                                        <a href="{{ asset('storage/' . $message->file_path) }}" target="_blank" class="inline-flex items-center space-x-2 bg-gray-800 hover:bg-gray-700 px-3 py-2 rounded-lg transition-colors">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"/>
                                            </svg>
                                            <span>{{ $message->file_name }}</span>
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Message input -->
        <div class="bg-gray-900 border-t border-gray-800 p-4">
            <!-- Emoji picker -->
            <div id="emoji-picker" class="hidden mb-3 p-3 bg-gray-800 rounded-lg border border-gray-700">
                <div class="grid grid-cols-8 gap-2">
                    @foreach(['😀','😂','😍','😎','😭','😡','👍','👎','❤️','🔥','⚡','🎉','🥷','⚔️','🏆','💪'] as $emoji)
                        <button type="button" onclick="addEmoji('{{ $emoji }}')" class="text-lg p-2 rounded hover:bg-gray-700 transition-colors">{{ $emoji }}</button>
                    @endforeach
                </div>
            </div>
            
            <form id="chat-form" class="flex items-center space-x-3" enctype="multipart/form-data">
                @csrf
                <!-- Attachment button -->
                <input type="file" id="file-input" name="file" class="hidden" accept="image/*,video/*,audio/*,.pdf,.doc,.docx">
                <button type="button" onclick="document.getElementById('file-input').click()" class="w-10 h-10 bg-gray-800 hover:bg-gray-700 rounded-lg flex items-center justify-center transition-colors">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"/>
                    </svg>
                </button>
                
                <!-- Emoji button -->
                <button type="button" onclick="toggleEmojiPicker()" class="w-10 h-10 bg-gray-800 hover:bg-gray-700 rounded-lg flex items-center justify-center transition-colors">
                    <span class="text-lg">😀</span>
                </button>
                
                <!-- Message input -->
                <div class="flex-1 relative">
                    <input type="text" id="message-input" name="message" 
                           class="w-full px-4 py-3 bg-gray-800 border border-gray-700 text-white rounded-lg focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600 placeholder-gray-500 transition-all" 
                           placeholder="Message #general..." maxlength="500" autocomplete="off">
                </div>
                
                <!-- Send button -->
                <button type="submit" class="w-10 h-10 bg-blue-600 hover:bg-blue-700 rounded-lg flex items-center justify-center transition-colors">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                    </svg>
                </button>
            </form>
        </div>
    </div>
</div>

<style>
.scrollbar-thin::-webkit-scrollbar { width: 4px; }
.scrollbar-thin::-webkit-scrollbar-track { background: transparent; }
.scrollbar-thin::-webkit-scrollbar-thumb { background: rgba(55, 65, 81, 0.8); border-radius: 2px; }
.scrollbar-thin::-webkit-scrollbar-thumb:hover { background: rgba(75, 85, 99, 1); }

@media (max-width: 768px) {
    .w-72 { width: 100%; position: absolute; z-index: 50; transform: translateX(-100%); transition: transform 0.3s; }
    .w-72.open { transform: translateX(0); }
}
</style>

<script>
// ===== VARIABLES GLOBALES =====
const messagesContainer = document.getElementById('messages-container');
const chatForm = document.getElementById('chat-form');
const messageInput = document.getElementById('message-input');
let typingTimeout; // Timer pour l'indicateur de frappe

// ===== FONCTIONS UTILITAIRES =====

/**
 * Fait défiler automatiquement vers le bas de la zone de messages
 */
function scrollToBottom() {
    messagesContainer.scrollTop = messagesContainer.scrollHeight;
}

// ===== GESTION DE L'INDICATEUR DE FRAPPE =====

/**
 * Affiche l'indicateur "typing" quand l'utilisateur tape
 * Se cache automatiquement après 2 secondes d'inactivité
 */
messageInput.addEventListener('input', () => {
    const indicator = document.getElementById('typing-indicator');
    indicator.classList.remove('hidden');
    
    // Réinitialise le timer à chaque frappe
    clearTimeout(typingTimeout);
    typingTimeout = setTimeout(() => {
        indicator.classList.add('hidden');
    }, 2000);
});

// ===== ENVOI DE MESSAGES =====

/**
 * Gère la soumission du formulaire de chat
 * Envoie le message au serveur et recharge les messages
 */
chatForm.addEventListener('submit', async (e) => {
    e.preventDefault();
    const message = messageInput.value.trim();
    const fileInput = document.getElementById('file-input');
    
    // Vérifie qu'il y a un message ou un fichier
    if (!message && !fileInput.files[0]) return;

    try {
        const formData = new FormData(chatForm);
        if (fileInput.files[0]) {
            formData.append('file', fileInput.files[0]);
        }
        
        const response = await fetch('{{ route("chat.store") }}', {
            method: 'POST',
            body: formData
        });

        if (response.ok) {
            messageInput.value = '';
            fileInput.value = '';
            document.getElementById('typing-indicator').classList.add('hidden');
            loadMessages();
        }
    } catch (error) {
        console.error('Erreur lors de l\'envoi du message:', error);
    }
});

// ===== CHARGEMENT DES MESSAGES =====

/**
 * Récupère tous les messages depuis le serveur
 * Met à jour l'affichage de la zone de chat
 */
async function loadMessages() {
    try {
        // Récupère les messages depuis l'API
        const response = await fetch('{{ route("chat.messages") }}');
        const messages = await response.json();
        
        // Vide le conteneur actuel
        messagesContainer.innerHTML = '';
        
        // Crée et ajoute chaque message
        messages.forEach(message => {
            const messageEl = createMessageElement(message);
            messagesContainer.appendChild(messageEl);
        });
        
        // Fait défiler vers le bas
        scrollToBottom();
    } catch (error) {
        console.error('Erreur lors du chargement des messages:', error);
    }
}

// ===== CRÉATION D'ÉLÉMENTS DE MESSAGE =====

/**
 * Crée un élément DOM pour un message
 * @param {Object} message - Objet message avec user, content, timestamp
 * @returns {HTMLElement} - Élément DOM du message
 */
function createMessageElement(message) {
    const div = document.createElement('div');
    div.className = 'message-item group';
    div.dataset.messageId = message.id;
    
    // Badge admin si l'utilisateur est administrateur
    const adminBadge = message.user.role === 'admin' ? 
        '<span class="bg-blue-600 text-white px-2 py-0.5 rounded text-xs font-medium">ADMIN</span>' : '';
    
    // Contrôles admin (supprimer/kicker) si l'utilisateur connecté est admin
    const adminControls = {{ auth()->user()->isAdmin() ? 'true' : 'false' }} ? `
        <div class="opacity-0 group-hover:opacity-100 transition-opacity flex space-x-1">
            <button onclick="deleteMessage(${message.id})" class="text-gray-500 hover:text-red-400 p-1 rounded hover:bg-gray-800 transition-all">
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                </svg>
            </button>
            ${message.user.role !== 'admin' ? `<button onclick="kickUser(${message.user.id})" class="text-gray-500 hover:text-orange-400 p-1 rounded hover:bg-gray-800 transition-all">
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                </svg>
            </button>` : ''}
        </div>
    ` : '';
    
    // Structure HTML du message
    div.innerHTML = `
        <div class="flex items-start space-x-3 hover:bg-gray-900/50 p-3 rounded-lg transition-colors">
            <!-- Avatar utilisateur -->
            <div class="relative">
                <div class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center border border-gray-700">
                    <span class="text-gray-300 font-medium text-sm">${message.user.name.substring(0, 2)}</span>
                </div>
                ${message.user.role === 'admin' ? '<div class="absolute -top-1 -right-1 w-4 h-4 bg-blue-600 rounded-full flex items-center justify-center"><span class="text-white text-xs">•</span></div>' : ''}
            </div>
            <!-- Contenu du message -->
            <div class="flex-1 min-w-0">
                <div class="flex items-center space-x-2 mb-1">
                    <span class="text-white font-medium text-sm">${message.user.name}</span>
                    ${adminBadge}
                    <span class="text-gray-500 text-xs">${new Date(message.created_at).toLocaleTimeString('fr-FR', {hour: '2-digit', minute: '2-digit'})}</span>
                    ${adminControls}
                </div>
                <div class="text-gray-300 text-sm leading-relaxed">
                    ${message.message}
                    ${message.file_path ? `<div class="mt-2"><a href="/storage/${message.file_path}" target="_blank" class="inline-flex items-center space-x-2 bg-gray-800 hover:bg-gray-700 px-3 py-2 rounded-lg transition-colors"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"/></svg><span>${message.file_name}</span></a></div>` : ''}
                </div>
            </div>
        </div>
    `;
    
    return div;
}

// ===== GESTION DES ÉMOJIS =====

/**
 * Affiche/cache le sélecteur d'émojis
 */
function toggleEmojiPicker() {
    const picker = document.getElementById('emoji-picker');
    picker.classList.toggle('hidden');
}

/**
 * Ajoute un émoji au champ de saisie
 * @param {string} emoji - L'émoji à ajouter
 */
function addEmoji(emoji) {
    const input = document.getElementById('message-input');
    input.value += emoji; // Ajoute l'émoji au texte existant
    input.focus(); // Remet le focus sur l'input
    document.getElementById('emoji-picker').classList.add('hidden'); // Cache le sélecteur
}

// ===== FONCTIONS ADMINISTRATEUR =====

/**
 * Supprime un message (fonction admin uniquement)
 * @param {number} messageId - ID du message à supprimer
 */
async function deleteMessage(messageId) {
    // Demande confirmation
    if (!confirm('Supprimer ce message ?')) return;
    
    try {
        // Récupère le token CSRF
        const csrfToken = document.querySelector('meta[name="csrf-token"]');
        
        // Envoie la requête DELETE
        const response = await fetch(`/chat/messages/${messageId}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': csrfToken ? csrfToken.getAttribute('content') : '',
                'Content-Type': 'application/json'
            }
        });
        
        // Recharge les messages si la suppression réussit
        if (response.ok) {
            loadMessages();
        }
    } catch (error) {
        console.error('Erreur lors de la suppression du message:', error);
    }
}

/**
 * Supprime tous les messages d'un utilisateur (fonction admin uniquement)
 * @param {number} userId - ID de l'utilisateur à kicker
 */
async function kickUser(userId) {
    // Demande confirmation
    if (!confirm('Supprimer tous les messages de cet utilisateur ?')) return;
    
    try {
        // Récupère le token CSRF
        const csrfToken = document.querySelector('meta[name="csrf-token"]');
        
        // Envoie la requête POST pour kicker l'utilisateur
        const response = await fetch(`/chat/kick/${userId}`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken ? csrfToken.getAttribute('content') : ''
            }
        });
        
        // Recharge les messages si l'action réussit
        if (response.ok) {
            loadMessages();
        }
    } catch (error) {
        console.error('Erreur lors du kick de l\'utilisateur:', error);
    }
}

// ===== GESTION DES ÉVÉNEMENTS =====

/**
 * Ferme le sélecteur d'émojis quand on clique ailleurs
 */
document.addEventListener('click', (e) => {
    const picker = document.getElementById('emoji-picker');
    const emojiBtn = e.target.closest('button[onclick="toggleEmojiPicker()"]');
    
    // Si le clic n'est ni sur le picker ni sur le bouton émoji
    if (!picker.contains(e.target) && !emojiBtn) {
        picker.classList.add('hidden');
    }
});

// ===== GESTION DES FICHIERS =====

document.getElementById('file-input').addEventListener('change', function(e) {
    const file = e.target.files[0];
    const button = document.querySelector('button[onclick="document.getElementById(\'file-input\').click()"]');
    
    if (file) {
        button.classList.add('bg-blue-600', 'hover:bg-blue-700');
        button.classList.remove('bg-gray-800', 'hover:bg-gray-700');
    } else {
        button.classList.remove('bg-blue-600', 'hover:bg-blue-700');
        button.classList.add('bg-gray-800', 'hover:bg-gray-700');
    }
});

// ===== INITIALISATION =====

// Recharge les messages toutes les 3 secondes
setInterval(loadMessages, 3000);

// Fait défiler vers le bas au chargement initial
scrollToBottom();
</script>
@endsection