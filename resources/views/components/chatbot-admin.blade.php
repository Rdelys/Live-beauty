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
    width: 500px; /* PLUS LARGE */
    max-height: 700px; /* PLUS HAUT */
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

/* =========== 📩 MESSAGE BLOCK (agrandi + lisible) =========== */
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
    opacity: 0.8;
    border-left: 3px solid #ff0037;
    padding-left: 10px;
    margin: 5px 0;
    font-style: italic;
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
</style>

<div id="adminChatWrapper" class="adminchat-wrapper">
    <div id="adminChatToggle">
        💬 <div id="adminChatUnread"></div>
    </div>

    <div id="adminChatPanel">
        <div id="adminChatHeader">
            👑 {{ __('Admin Chat') }}
            <span id="adminChatClose">&times;</span>
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

/* MESSAGES STOCKÉS */
socket.on("stored-messages-count", data => {
    storedSpan.textContent = `Messages stockés: ${data.count}`;
});

socket.on("stored-messages", messages => {
    messages.forEach(group => {
        let block = document.getElementById("client-" + group.userId);
        
        if (!block) {
            list.innerHTML += `
                <div class="adminChatBlock" id="client-${group.userId}">
                    <h4>${group.pseudo} <span class="timestamp">(stocké)</span></h4>
                    <div class="thread"></div>
                    <input class="adminReply" data-id="${group.userId}" placeholder="Répondre…">
                </div>
            `;
            block = document.getElementById("client-" + group.userId);
        }
        
        const thread = block.querySelector(".thread");
        group.messages.forEach((msg, index) => {
            thread.innerHTML += `<p class="stored-message"><strong>${group.pseudo} :</strong> ${msg}</p>`;
        });
        
        // Marquer comme lu
        socket.emit("mark-as-read", { userId: group.userId });
    });
});

/* NOUVEAU MESSAGE EN DIRECT */
socket.on("admin-new-message", data => {
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
    thread.innerHTML += `<p><strong>${data.pseudo} :</strong> ${data.message}</p>`;

    sound.currentTime = 0;
    sound.play().catch(()=>{});

    /* Notification */
    if (panel.style.display === "none") {
        unreadCount++;
        unread.innerText = unreadCount;
        unread.style.display = "flex";
    }

    list.scrollTop = list.scrollHeight;
});

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

        socket.emit("admin-reply", { userId: id, message: msg });

        const thread = document.querySelector(`#client-${id} .thread`);
        thread.innerHTML += `<p><strong style="color:#ff0037">Admin :</strong> ${msg}</p>`;

        e.target.value = "";
        list.scrollTop = list.scrollHeight;
    }
});
</script>