@if(Auth::check())

<audio id="adminChatSound" src="/sounds/notificationAction.mp3" preload="auto"></audio>

<!-- 🔒 ANTI-DOUBLE CHARGEMENT GLOBAL DU CHATBOT -->
<script>
if (window._chatAlreadyLoaded) {
    console.warn("Chatbot déjà chargé → skip");
    throw new Error("Chatbot already loaded");
}
window._chatAlreadyLoaded = true;
</script>

<!-- 🔒 SOCKET.IO CHARGÉ UNE SEULE FOIS -->
<script>
<script src="https://cdn.socket.io/4.5.4/socket.io.min.js" defer></script>

</script>

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
        🔥 Live Beauty CHAT – {{ __('Bonjour') }}
 {{ Auth::user()->pseudo }} !
        <span id="close-chatbot">&times;</span>
    </div>

    <div id="chatbot-messages">
        <div class="msg-left welcome-msg">🔥 {{ __('Bienvenue') }}
 {{ Auth::user()->pseudo }} !</div>
        <div class="msg-left welcome-msg">😘 {{ __('Comment puis-je t’aider aujourd’hui') }}
 ?</div>
    </div>

    <div id="chatbot-input">
        <input type="text" id="chatbot-user-input" placeholder="Écris ton message…">
    </div>
</div>


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
</script>


<script>
/* -------------------------
  SOCKET.IO - SINGLETON SAFE
------------------------- */
if (!window.socketChat) {
    window.socketChat = io("https://livebeautyofficial.com/chatbot", {
        path: "/chatbot/socket.io",
        transports: ["websocket"],
        upgrade: false,
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
});


/* -------------------------------------------------
   FONCTION D'AJOUT DE MESSAGE AVEC ALIGNEMENT + SON
--------------------------------------------------- */
function addStyledMessage(sender, msg) {
    const box = document.getElementById("chatbot-messages");

    const side = (sender === "Moi") ? "msg-right" : "msg-left";

    if (sender !== "Moi") {
        soundAdmin.currentTime = 0;
        soundAdmin.play().catch(() => {});
    }

    box.innerHTML += `
        <div class="${side}">
            <strong>${sender} :</strong> ${msg}
        </div>
    `;

    // 🔥 Scroll automatique vers le bas à chaque message
    scrollChatToBottom();
}



/* -------------------------
  MESSAGES REÇUS SERVEUR
-------------------------- */
socketChat.on("chatbot-reply", d => {
    addStyledMessage(d.sender, d.message);
});

socketChat.on("bot-reply", d => {
    addStyledMessage("Bot", d.message);
});


/* -------------------------
  ENVOI MESSAGE UTILISATEUR
-------------------------- */
document.getElementById("chatbot-user-input").addEventListener("keydown", function (e) {
    if (e.key === "Enter") {
        const message = this.value.trim();
        if (!message) return;

        addStyledMessage("Moi", message);

        socketChat.emit("client-message", {
            userId: USER_ID,
            pseudo: USER_PSEUDO,
            message
        });

        this.value = "";
    }
});
</script>
<script>
/* 🔥 SCROLLER AUTOMATIQUE - TOP À L'OUVERTURE, BAS À CHAQUE MESSAGE */

function scrollChatToTop() {
    const box = document.getElementById("chatbot-messages");
    box.scrollTo({ top: 0, behavior: "smooth" });
}

function scrollChatToBottom() {
    const box = document.getElementById("chatbot-messages");
    box.scrollTo({ top: box.scrollHeight, behavior: "smooth" });
}

/* Quand on ouvre le chat → scroll tout en haut */
document.getElementById("chatbot-toggle").addEventListener("click", () => {
    setTimeout(scrollChatToTop, 150);
});
</script>

@endif
