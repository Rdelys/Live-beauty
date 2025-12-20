<!-- components/chatbot-admin.blade.php -->

<style>
/* ===========================================================
   🌟 ADMIN CHAT PREMIUM – ROUGE / NOIR – FULL UPGRADE 2025
   =========================================================== */

.adminchat-wrapper * { box-sizing: border-box !important; }

/* Placement fixe */
#adminChatWrapper {
    position: fixed !important;
    bottom: 25px !important;
    right: 25px !important;
    z-index: 999999999 !important;
    pointer-events: none;
}

/* Bouton & panel cliquables */
#adminChatToggle,
#adminChatPanel {
    pointer-events: auto;
}

/* ==================== 🔴 BOUTON FLOTTANT ==================== */
#adminChatToggle {
    width: 85px;
    height: 85px;
    border-radius: 50%;
    cursor: pointer;

    background: radial-gradient(circle at 30% 30%, #2b2b2b, #080808);
    border: 3px solid #ff0037;
    color: #ff3355;
    font-size: 36px;

    display: flex;
    align-items: center;
    justify-content: center;

    box-shadow:
        0 0 25px rgba(255,0,55,0.95),
        0 0 45px rgba(255,0,55,0.6),
        inset 0 10px 20px rgba(255,0,55,0.4),
        inset 0 -10px 30px rgba(0,0,0,0.8);

    animation: adminChatGlow 2.4s infinite ease-in-out;
    transition: transform .25s ease;
}

#adminChatToggle:hover { transform: scale(1.15); }

@keyframes adminChatGlow {
    0% { box-shadow: 0 0 18px #ff0037; }
    50% { box-shadow: 0 0 45px #ff0037; }
    100% { box-shadow: 0 0 18px #ff0037; }
}

/* Badge */
#adminChatUnread {
    position: absolute;
    top: -6px;
    right: -6px;
    width: 30px;
    height: 30px;
    display: none;
    justify-content: center;
    align-items: center;

    background: #ff0037;
    color: white;
    font-size: 14px;
    font-weight: bold;
    border-radius: 50%;
    box-shadow: 0 0 12px #000;
}

/* ===================== 📦 PANEL ===================== */
#adminChatPanel {
    width: 500px;
    max-height: 700px;
    background: rgba(12,12,12,0.95);
    border: 2px solid #ff0037;
    border-radius: 22px;
    backdrop-filter: blur(14px);

    position: fixed !important;
    bottom: 130px !important;
    right: 25px !important;

    display: none;
    flex-direction: column;

    animation: adminPanelUp .35s ease;

    box-shadow:
        0 0 45px rgba(255,0,55,0.6),
        0 0 22px rgba(0,0,0,0.9);
}

@keyframes adminPanelUp {
    from { opacity: 0; transform: translateY(25px); }
    to   { opacity: 1; transform: translateY(0); }
}

/* Header */
#adminChatHeader {
    padding: 16px;
    background: linear-gradient(145deg, #ff0037, #b00022);
    color: #fff;
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 19px;
    border-radius: 22px 22px 0 0;
}

#adminChatClose { cursor: pointer; font-size: 26px; }

/* Stats */
#adminChatStats {
    padding: 10px 16px;
    background: rgba(255,0,55,0.1);
    border-bottom: 1px solid #550010;
    font-size: 14px;
    color: #ff7799;
    display: flex;
    justify-content: space-between;
}

/* List */
#adminChatList {
    padding: 15px;
    overflow-y: auto;
    height: 500px;
    color: #eee;
}

/* Scrollbar premium */
#adminChatList::-webkit-scrollbar {
    width: 8px;
}
#adminChatList::-webkit-scrollbar-track {
    background: #111;
    border-radius: 10px;
}
#adminChatList::-webkit-scrollbar-thumb {
    background: linear-gradient(180deg, #ff0037, #700010);
    border-radius: 10px;
}
#adminChatList::-webkit-scrollbar-thumb:hover {
    background: linear-gradient(180deg, #ff2a55, #a00020);
}

/* Firefox */
#adminChatList {
    scrollbar-width: thin;
    scrollbar-color: #ff0037 #111;
}

/* =========== 📩 MESSAGE BLOCK =========== */
.adminChatBlock {
    background: rgba(30,30,30,0.95);
    border: 1px solid #550010;
    padding: 14px;
    border-radius: 14px;
    margin-bottom: 16px;

    box-shadow:
        0 0 10px rgba(255,0,55,0.15),
        inset 0 0 8px rgba(0,0,0,0.5);
}

.adminChatBlock h4 {
    margin: 0 0 8px;
    color: #ff2a4f;
    font-size: 17px;
}

.adminChatBlock .timestamp {
    font-size: 12px;
    color: #888;
    margin-left: 10px;
}

/* Messages */
.thread p {
    margin: 5px 0;
    font-size: 15px;
    line-height: 1.4;
}

.stored-message {
    border-left: 3px solid #ff0037;
    padding-left: 10px;
    margin: 8px 0;
}

/* Timestamps */
.message-timestamp {
    font-size: 11px;
    color: #888;
    margin-left: 8px;
    font-style: italic;
}

.admin-timestamp {
    font-size: 11px;
    color: #ff7799;
    margin-left: 8px;
    font-weight: bold;
}

.date-separator {
    text-align: center;
    margin: 10px 0;
    color: #ff0037;
    font-size: 12px;
    font-weight: bold;
    border-top: 1px dashed #444;
    border-bottom: 1px dashed #444;
    padding: 5px;
    background: rgba(255, 0, 55, 0.1);
}

/* Input */
.adminReply {
    width: 100%;
    padding: 11px;
    background: #161616;
    border: 1px solid #ff0037;
    border-radius: 10px;
    color: white;
    margin-top: 10px;
    font-size: 15px;
}

/* Bouton refresh */
#refreshChat {
    background: #ff0037;
    border: none;
    color: white;
    padding: 5px 10px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 12px;
    display: flex;
    align-items: center;
    gap: 5px;
}

#refreshChat:hover {
    background: #ff2a55;
}
</style>

<div id="adminChatWrapper" class="adminchat-wrapper">
    <div id="adminChatToggle">
        💬 <div id="adminChatUnread"></div>
    </div>

    <div id="adminChatPanel">
        <div id="adminChatHeader">
            👑 {{ __('Admin Chat') }}
            <div style="display: flex; align-items: center; gap: 10px;">
                <button id="refreshChat">
                    🔄 Rafraîchir
                </button>
                <span id="adminChatClose">&times;</span>
            </div>
        </div>
        
        <div id="adminChatStats">
            <span id="onlineUsers">En ligne: 0</span>
            <span id="storedMessages">Messages stockés: 0</span>
        </div>
        
        <div id="adminChatList"></div>
    </div>

    <audio id="adminChatSound" src="/sounds/notificationAction.mp3" preload="auto"></audio>
</div>

<script src="https://cdn.socket.io/4.8.1/socket.io.min.js"></script>
<script>
const panel  = document.getElementById("adminChatPanel");
const toggle = document.getElementById("adminChatToggle");
const unread = document.getElementById("adminChatUnread");
const list   = document.getElementById("adminChatList");
const sound  = document.getElementById("adminChatSound");
const stats  = document.getElementById("adminChatStats");
const onlineSpan = document.getElementById("onlineUsers");
const storedSpan = document.getElementById("storedMessages");

let unreadCount = 0;
let connectedClients = {};
let lastProcessedDates = {};

/* Ouvrir */
toggle.onclick = () => {
    panel.style.display = "flex";
    toggle.style.display = "none";
    
    // Charger les messages stockés
    socket.emit("load-stored-messages");
    
    // reset du badge
    unreadCount = 0;
    unread.style.display = "none";
};

/* Fermer */
document.getElementById("adminChatClose").onclick = () => {
    panel.style.display = "none";
    toggle.style.display = "flex";
};

/* SOCKET */
const socket = io("https://livebeautyofficial.com", {
    path: "/chatbot/socket.io",
    transports: ["polling", "websocket"], 
    upgrade: true
});

socket.on("connect", () => {
    socket.emit("identify", { type: "admin" });
    console.log("👑 Admin connecté au socket");
});

/* Fonctions utilitaires pour les dates */
function formatDateTime(timestamp) {
    if (!timestamp) return '';
    
    try {
        const date = typeof timestamp === 'string' ? new Date(timestamp) : timestamp;
        if (isNaN(date.getTime())) return '';
        
        const now = new Date();
        const today = now.toDateString();
        const messageDate = date.toDateString();
        
        // Si c'est aujourd'hui
        if (today === messageDate) {
            return `Aujourd'hui ${date.getHours().toString().padStart(2, '0')}:${date.getMinutes().toString().padStart(2, '0')}`;
        }
        
        // Si c'est hier
        const yesterday = new Date(now);
        yesterday.setDate(yesterday.getDate() - 1);
        if (yesterday.toDateString() === messageDate) {
            return `Hier ${date.getHours().toString().padStart(2, '0')}:${date.getMinutes().toString().padStart(2, '0')}`;
        }
        
        // Sinon, date complète
        return `${date.getDate().toString().padStart(2, '0')}/${(date.getMonth() + 1).toString().padStart(2, '0')}/${date.getFullYear()} ${date.getHours().toString().padStart(2, '0')}:${date.getMinutes().toString().padStart(2, '0')}`;
    } catch (e) {
        console.error("Erreur formatDateTime:", e);
        return '';
    }
}

function getDateLabel(timestamp) {
    if (!timestamp) return '';
    
    try {
        const date = typeof timestamp === 'string' ? new Date(timestamp) : timestamp;
        if (isNaN(date.getTime())) return '';
        
        const now = new Date();
        const today = now.toDateString();
        const messageDate = date.toDateString();
        
        if (today === messageDate) {
            return 'Aujourd\'hui';
        }
        
        const yesterday = new Date(now);
        yesterday.setDate(yesterday.getDate() - 1);
        if (yesterday.toDateString() === messageDate) {
            return 'Hier';
        }
        
        return `${date.getDate().toString().padStart(2, '0')}/${(date.getMonth() + 1).toString().padStart(2, '0')}/${date.getFullYear()}`;
    } catch (e) {
        return '';
    }
}

function addDateSeparatorIfNeeded(userId, timestamp, thread) {
    if (!timestamp) return false;
    
    const dateLabel = getDateLabel(timestamp);
    if (!dateLabel) return false;
    
    if (!lastProcessedDates[userId]) {
        lastProcessedDates[userId] = {};
    }
    
    if (lastProcessedDates[userId][dateLabel] !== true) {
        lastProcessedDates[userId][dateLabel] = true;
        thread.innerHTML += `<div class="date-separator">${dateLabel}</div>`;
        return true;
    }
    
    return false;
}

/* MESSAGES STOCKÉS */
socket.on("stored-messages-count", data => {
    storedSpan.textContent = `Messages stockés: ${data.count}`;
});

socket.on("stored-messages", messages => {
    console.log(`📨 Réception de ${messages.length} conversations stockées`);
    
    // Réinitialiser les dates traitées
    lastProcessedDates = {};
    
    messages.forEach(group => {
        let block = document.getElementById("client-" + group.userId);
        
        if (!block) {
            list.innerHTML += `
                <div class="adminChatBlock" id="client-${group.userId}">
                    <h4>${group.pseudo} 
                        <span class="timestamp">(${group.count} message${group.count > 1 ? 's' : ''} stocké${group.count > 1 ? 's' : ''})</span>
                    </h4>
                    <div class="thread"></div>
                    <input class="adminReply" data-id="${group.userId}" placeholder="Répondre…">
                </div>
            `;
            block = document.getElementById("client-" + group.userId);
        }
        
        const thread = block.querySelector(".thread");
        thread.innerHTML = '';
        
        // Ajouter les messages avec timestamps
        group.messages.forEach((msg, index) => {
            const timestamp = group.timestamps && group.timestamps[index] ? group.timestamps[index] : null;
            
            // Ajouter séparateur de date si nécessaire
            addDateSeparatorIfNeeded(group.userId, timestamp, thread);
            
            // Formater l'heure
            const timeHtml = timestamp ? 
                `<span class="message-timestamp">${formatDateTime(timestamp)}</span>` : 
                '';
                
            thread.innerHTML += `
                <p class="stored-message">
                    <strong>${group.pseudo} :</strong> ${msg} ${timeHtml}
                </p>`;
        });
        
        // Marquer comme lu
        socket.emit("mark-as-read", { userId: group.userId });
    });
    
    // Mettre à jour le compteur
    storedSpan.textContent = `Messages stockés: ${messages.reduce((total, group) => total + group.messages.length, 0)}`;
    
    // Faire défiler vers le bas
    setTimeout(() => {
        list.scrollTop = list.scrollHeight;
    }, 100);
});

// Réception des nouveaux messages
socket.on("admin-new-message", data => {
    console.log("📩 Nouveau message en direct:", data);
    
    let block = document.getElementById("client-" + data.userId);

    if (!block) {
        list.innerHTML += `
            <div class="adminChatBlock" id="client-${data.userId}">
                <h4>${data.pseudo}</h4>
                <div class="thread"></div>
                <input class="adminReply" data-id="${data.userId}" placeholder="Répondre…">
            </div>
        `;
        block = document.getElementById("client-" + data.userId);
    }

    const thread = block.querySelector(".thread");
    
    // Ajouter séparateur de date si nécessaire
    const timestamp = data.timestamp || new Date().toISOString();
    addDateSeparatorIfNeeded(data.userId, timestamp, thread);
    
    // Formater le timestamp
    const timeHtml = `<span class="message-timestamp">${formatDateTime(timestamp)}</span>`;
    
    // Afficher le message avec l'heure
    thread.innerHTML += `
        <p class="stored-message">
            <strong>${data.pseudo} :</strong> ${data.message} ${timeHtml}
        </p>`;

    // Si c'est un message traduit, afficher l'original
    if (data.original_message && data.translated) {
        thread.innerHTML += `
            <p style="font-size: 12px; color: #ff7799; margin-left: 15px;">
                <em>Original (${data.original_language || 'auto'}): "${data.original_message}"</em>
            </p>`;
    }

    // Jouer le son
    if (sound) {
        sound.currentTime = 0;
        sound.play().catch(()=>{});
    }

    // Notification badge
    if (panel.style.display === "none") {
        unreadCount++;
        unread.innerText = unreadCount;
        unread.style.display = "flex";
    }

    // Mettre à jour les stats
    updateMessageStats();
    
    // Faire défiler vers le bas
    setTimeout(() => {
        list.scrollTop = list.scrollHeight;
    }, 100);
});

// Fonction pour mettre à jour les stats
function updateMessageStats() {
    socket.emit("load-stored-messages");
}

/* STATS CLIENTS EN LIGNE */
socket.on("client-connected", data => {
    connectedClients[data.userId] = data.pseudo;
    updateOnlineStats();
});

socket.on("client-disconnected", data => {
    delete connectedClients[data.userId];
    updateOnlineStats();
});

function updateOnlineStats() {
    onlineSpan.textContent = `En ligne: ${Object.keys(connectedClients).length}`;
}

/* ENVOI REPONSE */
document.addEventListener("keydown", e => {
    if (e.target.classList.contains("adminReply") && e.key === "Enter") {
        const msg = e.target.value.trim();
        if (!msg) return;

        const id = String(e.target.dataset.id);
        const now = new Date();
        const timestamp = formatDateTime(now);

        // Envoyer au serveur
        socket.emit("admin-reply", { 
            userId: id, 
            message: msg,
            timestamp: now.toISOString()
        });

        // Afficher localement
        const thread = document.querySelector(`#client-${id} .thread`);
        
        // Ajouter le message admin avec timestamp
        thread.innerHTML += `
            <p style="margin: 8px 0;">
                <strong style="color:#ff0037">Admin :</strong> ${msg} 
                <span class="admin-timestamp">${timestamp}</span>
            </p>`;

        e.target.value = "";
        
        // Faire défiler vers le bas
        setTimeout(() => {
            list.scrollTop = list.scrollHeight;
        }, 50);
    }
});

// Rafraîchir le chat
document.getElementById("refreshChat").onclick = () => {
    socket.emit("load-stored-messages");
    // Réinitialiser l'affichage
    list.innerHTML = '';
    lastProcessedDates = {};
};

// Initialiser au chargement
document.addEventListener('DOMContentLoaded', function() {
    if (socket.connected) {
        socket.emit("identify", { type: "admin" });
    }
});
</script>