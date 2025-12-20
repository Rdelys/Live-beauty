<!-- components/chatbot.blade.php -->
@if(Auth::check())

<audio id="adminChatSound" src="/sounds/notificationAction.mp3" preload="auto"></audio>

<!-- 🔒 ANTI-DOUBLE CHARGEMENT -->
<script>
if (window._chatAlreadyLoaded) {
    console.warn("Chatbot déjà chargé → skip");
    throw new Error("Chatbot already loaded");
}
window._chatAlreadyLoaded = true;
</script>

<!-- 🔒 SOCKET.IO CHARGÉ UNE SEULE FOIS -->

<style>
/* ----------------------------------------------------------- */
/* 🔥 STYLE DU CHAT COMPLET - MODERNE, PREMIUM, ROUGE & NOIR   */
/* ----------------------------------------------------------- */

/* Bouton flottant */
#chatbot-toggle {
    position: fixed;
    bottom: 20px;
    right: 20px;
    width: 75px;
    height: 75px;
    border-radius: 50%;
    cursor: pointer;
    background: radial-gradient(circle at 35% 35%, #222 0%, #000 70%);
    border: 3px solid #d40022;
    color: #ff2a4f;
    font-size: 36px;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow:
        0 0 15px rgba(212,0,34,0.8),
        0 0 25px rgba(212,0,34,0.5),
        inset 0 3px 9px rgba(255,0,60,0.25),
        inset 0 -4px 12px rgba(0,0,0,0.8);
    animation: pulseGlow 2s infinite ease-in-out;
    z-index: 10000;
    transition: 0.25s ease;
}

@keyframes pulseGlow {
    0% { box-shadow: 0 0 15px rgba(212,0,34,0.6); }
    50% { box-shadow: 0 0 35px rgba(255,0,60,1); }
    100% { box-shadow: 0 0 15px rgba(212,0,34,0.6); }
}

#chatbot-toggle:hover { transform: scale(1.12); }

/* ---------------- CHATBOX ---------------- */
#chatbot-container {
    position: fixed;
    bottom: 110px;
    right: 20px;
    width: 360px;
    max-height: 520px;
    background: rgba(15, 15, 15, 0.95);
    backdrop-filter: blur(10px);
    border: 2px solid #d1001f;
    border-radius: 18px;
    box-shadow:
        0 0 25px rgba(212,0,34,0.4),
        0 0 10px rgba(255,0,60,0.5);
    overflow: hidden;
    display: none;
    flex-direction: column;
    animation: slideUp 0.3s ease;
    z-index: 9999;
}

@keyframes slideUp {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

#chatbot-header {
    background: linear-gradient(145deg, #ff0037, #b0001c);
    padding: 12px 16px;
    color: white;
    font-size: 17px;
    font-weight: bold;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

#close-chatbot { cursor: pointer; font-size: 20px; }

/* Messages */
#chatbot-messages {
    padding: 12px;
    height: 320px;
    overflow-y: auto;
    color: #eee;
    display: flex;
    flex-direction: column;
}

/* BUBBLES */
.msg-left {
    background: #2a2a2a;
    color: #ff5f7f;
    padding: 8px 12px;
    max-width: 80%;
    border-radius: 12px 12px 12px 4px;
    margin: 6px 0;
    display: inline-block;
    animation: fadeInLeft .25s ease;
}

.msg-right {
    background: #d40022;
    color: white;
    padding: 8px 12px;
    max-width: 80%;
    border-radius: 12px 12px 4px 12px;
    margin: 6px 0;
    align-self: flex-end;
    display: inline-block;
    animation: fadeInRight .25s ease;
}

@keyframes fadeInLeft {
    from { opacity:0; transform:translateX(-15px); }
    to { opacity:1; transform:translateX(0); }
}

@keyframes fadeInRight {
    from { opacity:0; transform:translateX(15px); }
    to { opacity:1; transform:translateX(0); }
}

.welcome-msg {
    animation: fadePop .5s ease-out;
}

@keyframes fadePop {
    0% { opacity:0; transform:scale(.7); }
    100% { opacity:1; transform:scale(1); }
}

/* Input */
#chatbot-input {
    background: #0f0f0f;
    padding: 10px;
    border-top: 1px solid #55000c;
}

#chatbot-input input {
    width: 100%;
    padding: 10px;
    background: #111;
    border: 1px solid #aa0022;
    border-radius: 8px;
    color: white;
}

#chatbot-input input::placeholder { color: #777; }
/* 🎨 SCROLLBAR PREMIUM ROUGE & NOIR */
#chatbot-messages::-webkit-scrollbar {
    width: 6px;
}

#chatbot-messages::-webkit-scrollbar-track {
    background: #111;
    border-radius: 10px;
}

#chatbot-messages::-webkit-scrollbar-thumb {
    background: linear-gradient(180deg, #d40022, #700010);
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(212,0,34,0.7);
}

#chatbot-messages::-webkit-scrollbar-thumb:hover {
    background: linear-gradient(180deg, #ff0037, #b0001c);
}

/* Firefox */
#chatbot-messages {
    scrollbar-width: thin;
    scrollbar-color: #d40022 #111;
}

</style>

<!-- BOUTON -->
<button id="chatbot-toggle">💋</button>

<!-- CHATBOX -->
<div id="chatbot-container">
    <div id="chatbot-header">
        🔥 Live Beauty CHAT – {{ __('Bonjour') }} {{ Auth::user()->pseudo }} !
        <span id="close-chatbot">&times;</span>
    </div>

    <div style="padding: 8px 16px; background: rgba(255,0,55,0.1); border-bottom: 1px solid #550010;">
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <small style="color: #ff7799;">Langue: {{ Auth::user()->preferred_language ?? 'FR' }}</small>
            <select id="languageSelector" style="background: #111; color: white; border: 1px solid #ff0037; padding: 3px 8px; border-radius: 4px;">
                <option value="FR" {{ (Auth::user()->preferred_language ?? 'FR') === 'FR' ? 'selected' : '' }}>Français</option>
                <option value="EN" {{ (Auth::user()->preferred_language ?? 'FR') === 'EN' ? 'selected' : '' }}>English</option>
                <option value="ES" {{ (Auth::user()->preferred_language ?? 'FR') === 'ES' ? 'selected' : '' }}>Español</option>
                <option value="IT" {{ (Auth::user()->preferred_language ?? 'FR') === 'IT' ? 'selected' : '' }}>Italiano</option>
                <option value="DE" {{ (Auth::user()->preferred_language ?? 'FR') === 'DE' ? 'selected' : '' }}>Deutsch</option>
                <!-- Ajoutez d'autres langues selon vos besoins -->
            </select>
        </div>
    </div>

    <div id="chatbot-messages">
        <div class="msg-left welcome-msg">🔥 {{ __('Bienvenue') }} {{ Auth::user()->pseudo }} !</div>
        <div class="msg-left welcome-msg">😘 {{ __('Comment puis-je t’aider aujourd’hui') }} ?</div>
        
        <!-- Historique des réponses stockées -->
        <!-- Historique des réponses stockées -->
@php
    // Si vous utilisez le service
    if(class_exists('App\Services\ChatStorageService')) {
        $history = App\Services\ChatStorageService::getUserHistory(Auth::user()->id);
    } else {
        // Fallback en cas d'absence du service
        $history = collect(); // ou un tableau vide []
    }
@endphp
        
        @foreach($history as $message)
            @if($message->sender == 'admin')
                <div class="msg-left">
                    <strong>Support :</strong> {{ $message->message }}
                    <small style="color:#888; font-size:11px">
                        ({{ $message->created_at->format('H:i') }})
                    </small>
                </div>
            @endif
        @endforeach
    </div>

    <div id="chatbot-input">
        <input type="text" id="chatbot-user-input" placeholder="Écris ton message…">
    </div>
</div>

<script src="https://cdn.socket.io/4.8.1/socket.io.min.js"></script>
<script>
/* --------------------
   OUVERTURE / FERMETURE
---------------------- */
document.getElementById("chatbot-toggle").onclick = () => {
    document.getElementById("chatbot-container").style.display = "flex";
    document.getElementById("chatbot-toggle").style.display = "none";
};

document.getElementById("close-chatbot").onclick = () => {
    document.getElementById("chatbot-container").style.display = "none";
    document.getElementById("chatbot-toggle").style.display = "flex";
};

/* -------------------------
  SOCKET.IO
------------------------- */
if (!window.socketChat) {
    window.socketChat = io("https://livebeautyofficial.com", {
        path: "/chatbot/socket.io",
        transports: ["polling", "websocket"],
        upgrade: true,
        autoConnect: true
    });
}

const socketChat = window.socketChat;
const USER_ID = "{{ Auth::user()->id }}";
const USER_PSEUDO = "{{ Auth::user()->pseudo }}";
const soundAdmin = document.getElementById("adminChatSound");

/* IDENTIFICATION */
socketChat.on("connect", () => {
    socketChat.emit("identify", {
        type: "client",
        userId: USER_ID,
        pseudo: USER_PSEUDO
    });
    console.log("Client connecté au chat");
});

/* MESSAGES */
function addStyledMessage(sender, msg, timestamp = null) {
    const box = document.getElementById("chatbot-messages");
    const side = (sender === "Moi") ? "msg-right" : "msg-left";
    
    let timeHtml = '';
    if (timestamp) {
        const date = new Date(timestamp);
        timeHtml = `<small style="color:#888; font-size:11px">(${date.getHours()}:${date.getMinutes().toString().padStart(2, '0')})</small>`;
    }

    box.innerHTML += `
        <div class="${side}">
            <strong>${sender} :</strong> ${msg} ${timeHtml}
        </div>
    `;

    scrollChatToBottom();
}

/* RÉCEPTION MESSAGES */
socketChat.on("chatbot-reply", d => {
    addStyledMessage(d.sender, d.message, new Date());
});

socketChat.on("bot-reply", d => {
    addStyledMessage("Bot", d.message, new Date());
});

/* ENVOI MESSAGE */
document.getElementById("chatbot-user-input").addEventListener("keydown", function (e) {
    if (e.key === "Enter") {
        const message = this.value.trim();
        if (!message) return;

        addStyledMessage("Moi", message, new Date());

        socketChat.emit("client-message", {
            userId: USER_ID,
            pseudo: USER_PSEUDO,
            message
        });

        this.value = "";
    }
});

/* SCROLL */
function scrollChatToBottom() {
    const box = document.getElementById("chatbot-messages");
    box.scrollTo({ top: box.scrollHeight, behavior: "smooth" });
}

document.getElementById("chatbot-toggle").addEventListener("click", () => {
    setTimeout(scrollChatToBottom, 150);
});

document.getElementById('languageSelector').addEventListener('change', function() {
    const selectedLang = this.value;
    
    fetch('/api/set-language', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({
            language: selectedLang
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Rafraîchir la connexion socket pour prendre en compte la nouvelle langue
            if (window.socketChat) {
                window.socketChat.disconnect();
                window.socketChat.connect();
            }
            
            // Afficher un message de confirmation
            const messagesDiv = document.getElementById('chatbot-messages');
            messagesDiv.innerHTML += `
                <div class="msg-left" style="background: #1a3a1a; color: #77ff77;">
                    🌐 Langue mise à jour: ${selectedLang}
                </div>
            `;
        }
    })
    .catch(error => {
        console.error('Erreur changement de langue:', error);
    });
});
</script>

@endif