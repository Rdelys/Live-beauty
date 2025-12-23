
<style>
/* ===========================================================
   👑 ADMIN CHAT PREMIUM – ROUGE / NOIR – ICÔNES SEXY & ÉLÉGANTES
   =========================================================== */

.adminchat-wrapper * { box-sizing: border-box !important; }

/* ICÔNES SVG CUSTOM POUR L'ADMIN */
:root {
    --admin-icon-crown: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'%3E%3Cpath fill='%23ffd700' d='M5 16L3 5l5.5 5L12 4l3.5 6L21 5l-2 11H5z'/%3E%3C/svg%3E");
    --admin-icon-refresh: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'%3E%3Cpath fill='%23ffffff' d='M17.65 6.35C16.2 4.9 14.21 4 12 4c-4.42 0-7.99 3.58-7.99 8s3.57 8 7.99 8c3.73 0 6.84-2.55 7.73-6h-2.08c-.82 2.33-3.04 4-5.65 4-3.31 0-6-2.69-6-6s2.69-6 6-6c1.66 0 3.14.69 4.22 1.78L13 11h7V4l-2.35 2.35z'/%3E%3C/svg%3E");
    --admin-icon-lipstick: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'%3E%3Cpath fill='%23ff0037' d='M7 1v10h10V1H7zm9 9H8V2h8v8zm-5-5h2v2h-2V5z'/%3E%3C/svg%3E");
    --admin-icon-heart: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'%3E%3Cpath fill='%23ff2a4f' d='M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z'/%3E%3C/svg%3E");
    --admin-icon-flame: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'%3E%3Cpath fill='%23ff5500' d='M17.66 11.2c-.23-.3-.51-.56-.77-.82-.67-.6-1.43-1.03-2.07-1.66C13.33 7.26 13 4.85 13.95 3c-.95.23-1.78.75-2.49 1.32-2.59 2.08-3.61 5.75-2.39 8.9.04.1.08.2.08.33 0 .22-.15.42-.35.5-.23.1-.47.04-.66-.12a.58.58 0 0 1-.14-.17c-1.13-1.43-1.31-3.48-.55-5.12C5.78 10 4.87 12.3 5 14.47c.06.5.12 1 .29 1.5.14.6.41 1.2.71 1.73 1.08 1.73 2.95 2.97 4.96 3.22 2.14.27 4.43-.12 6.07-1.6 1.83-1.66 2.47-4.32 1.53-6.6l-.13-.26c-.21-.46-.77-1.26-.77-1.26m-3.16 6.3c-.28.24-.74.5-1.1.6-1.12.4-2.24-.16-2.9-.82 1.19-.28 1.9-1.16 2.11-2.05.17-.8-.15-1.46-.28-2.23-.12-.74-.1-1.37.17-2.06.19.38.39.76.63 1.06.77 1 1.98 1.44 2.24 2.8.04.14.06.28.06.43.03.82-.33 1.72-.93 2.27z'/%3E%3C/svg%3E");
}

/* Placement fixe */
#adminChatWrapper {
    position: fixed !important;
    bottom: 35px !important;
    right: 35px !important;
    z-index: 100000000 !important;
    pointer-events: none;
}

/* Bouton & panel cliquables */
#adminChatToggle,
#adminChatPanel {
    pointer-events: auto;
}

/* ==================== 👑 BOUTON FLOTTANT ADMIN ==================== */
#adminChatToggle {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    cursor: pointer;
    background: linear-gradient(145deg, #ff0037, #d1001f);
    border: 3px solid rgba(255, 255, 255, 0.2);
    color: #fff;
    font-size: 36px;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 
        0 0 30px rgba(255, 0, 55, 0.8),
        0 15px 50px rgba(0, 0, 0, 0.6),
        inset 0 4px 15px rgba(255, 255, 255, 0.3),
        inset 0 -8px 25px rgba(0, 0, 0, 0.8);
    animation: adminChatGlow 2.5s infinite ease-in-out;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    overflow: hidden;
    position: relative;
}

#adminChatToggle::before {
    content: '';
    position: absolute;
    width: 100%;
    height: 100%;
    background: linear-gradient(45deg, transparent 30%, rgba(255, 255, 255, 0.3) 50%, transparent 70%);
    animation: shine 3s infinite linear;
    pointer-events: none;
}

#adminChatToggle:hover {
    transform: translateY(-6px) scale(1.1);
    box-shadow: 
        0 0 45px rgba(255, 0, 55, 1),
        0 20px 60px rgba(0, 0, 0, 0.7),
        inset 0 4px 20px rgba(255, 255, 255, 0.4),
        inset 0 -8px 30px rgba(0, 0, 0, 0.9);
}

@keyframes adminChatGlow {
    0%, 100% { 
        box-shadow: 
            0 0 25px rgba(255, 0, 55, 0.7),
            0 15px 50px rgba(0, 0, 0, 0.6),
            inset 0 4px 15px rgba(255, 255, 255, 0.3),
            inset 0 -8px 25px rgba(0, 0, 0, 0.8);
    }
    50% { 
        box-shadow: 
            0 0 40px rgba(255, 0, 55, 1),
            0 20px 60px rgba(0, 0, 0, 0.7),
            inset 0 4px 20px rgba(255, 255, 255, 0.4),
            inset 0 -8px 30px rgba(0, 0, 0, 0.9);
    }
}

@keyframes shine {
    0% { transform: translateX(-100%); }
    100% { transform: translateX(100%); }
}

/* Icône du bouton (Couronne) */
#adminChatToggle::after {
    content: '';
    position: relative;
    width: 40px;
    height: 40px;
    background-image: var(--admin-icon-crown);
    background-size: contain;
    background-repeat: no-repeat;
    background-position: center;
    filter: drop-shadow(0 3px 6px rgba(0, 0, 0, 0.4));
    transition: transform 0.3s ease;
}

#adminChatToggle:hover::after {
    transform: rotate(15deg) scale(1.1);
}

/* Badge notification */
#adminChatUnread {
    position: absolute;
    top: -8px;
    right: -8px;
    width: 28px;
    height: 28px;
    display: none;
    justify-content: center;
    align-items: center;
    background: linear-gradient(145deg, #ff5500, #ff0037);
    color: white;
    font-size: 13px;
    font-weight: 800;
    border-radius: 50%;
    box-shadow: 0 0 20px rgba(255, 0, 55, 0.8);
    border: 2px solid rgba(255, 255, 255, 0.3);
    animation: badgePulse 1.5s infinite;
    z-index: 10;
}

@keyframes badgePulse {
    0%, 100% { 
        transform: scale(1);
        box-shadow: 0 0 20px rgba(255, 0, 55, 0.8);
    }
    50% { 
        transform: scale(1.15);
        box-shadow: 0 0 30px rgba(255, 0, 55, 1);
    }
}

/* ===================== 📦 PANEL ADMIN PREMIUM ===================== */
#adminChatPanel {
    width: 520px;
    max-height: 720px;
    background: rgba(15, 15, 15, 0.97);
    backdrop-filter: blur(20px) saturate(180%);
    border: 1px solid rgba(255, 0, 55, 0.4);
    border-radius: 22px;
    position: fixed !important;
    bottom: 140px !important;
    right: 35px !important;
    display: none;
    flex-direction: column;
    animation: adminPanelUp 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
    box-shadow: 
        0 25px 60px rgba(0, 0, 0, 0.6),
        0 0 35px rgba(255, 0, 55, 0.4),
        0 5px 15px rgba(0, 0, 0, 0.3);
    overflow: hidden;
}

@keyframes adminPanelUp {
    from { 
        opacity: 0; 
        transform: translateY(30px) scale(0.95);
    }
    to   { 
        opacity: 1; 
        transform: translateY(0) scale(1);
    }
}

/* Header */
#adminChatHeader {
    padding: 20px 25px;
    background: linear-gradient(135deg, #ff0037 0%, #d1001f 50%, #ff2a4f 100%);
    color: #fff;
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 20px;
    font-weight: 700;
    letter-spacing: 0.5px;
    border-radius: 22px 22px 0 0;
    position: relative;
    overflow: hidden;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
}

#adminChatHeader::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 1px;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.6), transparent);
}

/* Bouton de fermeture */
#adminChatClose {
    cursor: pointer;
    width: 36px;
    height: 36px;
    background: rgba(255, 255, 255, 0.15);
    border: 1px solid rgba(255, 255, 255, 0.3);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
    backdrop-filter: blur(10px);
    font-size: 24px;
    position: relative;
}

#adminChatClose::after {
    content: '×';
    color: white;
    font-weight: 300;
    transition: transform 0.3s ease;
}

#adminChatClose:hover {
    background: rgba(255, 255, 255, 0.25);
    transform: rotate(90deg);
}

#adminChatClose:hover::after {
    transform: scale(1.2);
}

/* Bouton refresh */
#refreshChat {
    background: rgba(255, 255, 255, 0.15);
    border: 1px solid rgba(255, 255, 255, 0.3);
    color: white;
    padding: 8px 16px;
    border-radius: 10px;
    cursor: pointer;
    font-size: 14px;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 8px;
    transition: all 0.3s ease;
    backdrop-filter: blur(5px);
}

#refreshChat::before {
    content: '';
    width: 18px;
    height: 18px;
    background-image: var(--admin-icon-refresh);
    background-size: contain;
    background-repeat: no-repeat;
    background-position: center;
    transition: transform 0.5s ease;
}

#refreshChat:hover {
    background: rgba(255, 255, 255, 0.25);
    transform: translateY(-2px);
    box-shadow: 0 5px 20px rgba(255, 0, 55, 0.3);
}

#refreshChat:hover::before {
    transform: rotate(180deg);
}

/* Stats */
#adminChatStats {
    padding: 16px 25px;
    background: linear-gradient(90deg, rgba(255, 0, 55, 0.15), rgba(209, 0, 31, 0.1));
    border-bottom: 1px solid rgba(255, 0, 55, 0.2);
    font-size: 14px;
    color: rgba(255, 255, 255, 0.9);
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-weight: 500;
    backdrop-filter: blur(10px);
}

/* Conteneur de liste */
#adminChatList {
    padding: 25px;
    overflow-y: auto;
    height: 520px;
    color: #eee;
    background: linear-gradient(180deg, #0f0f0f 0%, #1a1a1a 100%);
}

/* Scrollbar premium */
#adminChatList::-webkit-scrollbar {
    width: 8px;
}

#adminChatList::-webkit-scrollbar-track {
    background: rgba(255, 255, 255, 0.05);
    border-radius: 10px;
    margin: 10px 0;
}

#adminChatList::-webkit-scrollbar-thumb {
    background: linear-gradient(180deg, #ff0037, #d1001f);
    border-radius: 10px;
    border: 2px solid transparent;
    background-clip: content-box;
    transition: all 0.3s ease;
}

#adminChatList::-webkit-scrollbar-thumb:hover {
    background: linear-gradient(180deg, #ff2a55, #ff0037);
    background-clip: content-box;
}

/* Firefox */
#adminChatList {
    scrollbar-width: thin;
    scrollbar-color: #ff0037 rgba(255, 255, 255, 0.05);
}

/* =========== 📩 BLOCK DE CLIENT =========== */
.adminChatBlock {
    background: linear-gradient(135deg, rgba(40, 40, 40, 0.9), rgba(30, 30, 30, 0.95));
    border: 1px solid rgba(255, 0, 55, 0.3);
    padding: 20px;
    border-radius: 16px;
    margin-bottom: 20px;
    box-shadow: 
        0 8px 25px rgba(0, 0, 0, 0.4),
        0 0 15px rgba(255, 0, 55, 0.2),
        inset 0 1px 0 rgba(255, 255, 255, 0.1);
    transition: all 0.3s ease;
    backdrop-filter: blur(10px);
}

.adminChatBlock:hover {
    border-color: rgba(255, 0, 55, 0.5);
    box-shadow: 
        0 12px 35px rgba(0, 0, 0, 0.5),
        0 0 25px rgba(255, 0, 55, 0.3),
        inset 0 1px 0 rgba(255, 255, 255, 0.15);
    transform: translateY(-3px);
}

/* En-tête du client */
.adminChatBlock h4 {
    margin: 0 0 12px;
    color: #ff2a4f;
    font-size: 18px;
    font-weight: 700;
    display: flex;
    align-items: center;
    gap: 10px;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
}

.adminChatBlock h4::before {
    content: '';
    width: 24px;
    height: 24px;
    background-image: var(--admin-icon-flame);
    background-size: contain;
    background-repeat: no-repeat;
    background-position: center;
}

.adminChatBlock .timestamp {
    font-size: 13px;
    color: rgba(255, 255, 255, 0.7);
    margin-left: auto;
    font-weight: 400;
}

/* Zone de thread (messages) */
.thread {
    margin: 15px 0;
    padding: 15px;
    background: rgba(10, 10, 10, 0.7);
    border-radius: 12px;
    border: 1px solid rgba(255, 255, 255, 0.1);
    max-height: 200px;
    overflow-y: auto;
}

.thread p {
    margin: 8px 0;
    font-size: 15px;
    line-height: 1.5;
    color: rgba(255, 255, 255, 0.9);
}

/* Messages stockés */
.stored-message {
    border-left: 3px solid #ff0037;
    padding-left: 15px;
    margin: 12px 0;
    position: relative;
}

.stored-message::before {
    content: '';
    position: absolute;
    left: -8px;
    top: 50%;
    transform: translateY(-50%);
    width: 16px;
    height: 16px;
    background-image: var(--admin-icon-heart);
    background-size: contain;
    background-repeat: no-repeat;
    opacity: 0.7;
}

/* Timestamps */
.message-timestamp {
    font-size: 12px;
    color: rgba(255, 255, 255, 0.6);
    margin-left: 10px;
    font-style: italic;
    font-weight: 300;
}

.admin-timestamp {
    font-size: 12px;
    color: #ff7799;
    margin-left: 10px;
    font-weight: 600;
}

/* Séparateurs de date */
.date-separator {
    text-align: center;
    margin: 20px 0;
    color: #ff2a4f;
    font-size: 13px;
    font-weight: 700;
    padding: 10px;
    background: linear-gradient(90deg, 
        transparent, 
        rgba(255, 0, 55, 0.15), 
        transparent);
    border-top: 1px dashed rgba(255, 0, 55, 0.3);
    border-bottom: 1px dashed rgba(255, 0, 55, 0.3);
    letter-spacing: 1px;
    position: relative;
    overflow: hidden;
}

.date-separator::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, 
        transparent, 
        rgba(255, 255, 255, 0.1), 
        transparent);
    animation: slideShine 3s infinite;
}

@keyframes slideShine {
    0% { left: -100%; }
    100% { left: 100%; }
}

/* Input de réponse */
.adminReply {
    width: 100%;
    padding: 15px 20px;
    background: rgba(255, 255, 255, 0.07);
    border: 1px solid rgba(255, 0, 55, 0.4);
    border-radius: 12px;
    color: white;
    margin-top: 15px;
    font-size: 15px;
    transition: all 0.3s ease;
    backdrop-filter: blur(5px);
    font-weight: 400;
}

.adminReply:focus {
    outline: none;
    border-color: #ff2a55;
    background: rgba(255, 255, 255, 0.1);
    box-shadow: 
        0 0 0 4px rgba(255, 0, 55, 0.15),
        0 0 25px rgba(255, 0, 55, 0.2);
}

.adminReply::placeholder {
    color: rgba(255, 255, 255, 0.5);
    font-weight: 300;
}

/* Effet de notification */
.notification-pulse {
    animation: notificationPulse 0.5s ease;
}

@keyframes notificationPulse {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.05); }
}

/* =========== RESPONSIVE =========== */
@media (max-width: 768px) {
    #adminChatWrapper {
        bottom: 25px !important;
        right: 25px !important;
    }
    
    #adminChatPanel {
        width: calc(100vw - 50px);
        right: 25px !important;
        bottom: 120px !important;
        max-height: 70vh;
    }
    
    #adminChatToggle {
        width: 70px;
        height: 70px;
    }
    
    #adminChatToggle::after {
        width: 35px;
        height: 35px;
    }
}

/* =========== ANIMATIONS =========== */
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}

@keyframes pulseSubtle {
    0%, 100% { opacity: 1; }
    50% { opacity: 0.8; }
}

* {
    scroll-behavior: smooth;
}

</style>

<div id="adminChatWrapper" class="adminchat-wrapper">
    <div id="adminChatToggle">
        <div id="adminChatUnread"></div>
    </div>

    <div id="adminChatPanel">
        <div id="adminChatHeader">
            <div style="display: flex; align-items: center; gap: 12px;">
                <span style="color: #ffd700;">👑</span>
                <span style="font-weight: 800; text-shadow: 0 2px 4px rgba(0,0,0,0.4);">
                    {{ __('Admin Live Beauty Chat') }}
                </span>
            </div>
            <div style="display: flex; align-items: center; gap: 15px;">
                <button id="refreshChat" title="Rafraîchir les conversations">
                    Rafraîchir
                </button>
                <span id="adminChatClose" title="Fermer le panneau"></span>
            </div>
        </div>
        
        <div id="adminChatStats">
            <span id="onlineUsers" style="display: flex; align-items: center; gap: 8px;">
                <span style="width: 10px; height: 10px; background: #4caf50; border-radius: 50%; box-shadow: 0 0 10px #4caf50;"></span>
                En ligne: <strong>0</strong>
            </span>
            <span id="storedMessages" style="display: flex; align-items: center; gap: 8px;">
                <span style="width: 10px; height: 10px; background: #ff2a4f; border-radius: 50%; box-shadow: 0 0 10px #ff2a4f;"></span>
                Messages: <strong>0</strong>
            </span>
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

/* ==================== 🎨 FONCTIONS D'ANIMATION ==================== */

function animateButtonPress(button) {
    button.style.transform = 'scale(0.95)';
    setTimeout(() => {
        button.style.transform = '';
    }, 150);
}

function addNotificationEffect(element) {
    element.classList.add('notification-pulse');
    setTimeout(() => {
        element.classList.remove('notification-pulse');
    }, 500);
}

function createMessageElement(content, type = 'client', timestamp = null, pseudo = null) {
    const timeHtml = timestamp ? 
        `<span class="${type === 'admin' ? 'admin-timestamp' : 'message-timestamp'}">${formatDateTime(timestamp)}</span>` : 
        '';
    
    const pseudoElement = pseudo ? `<strong style="color:${type === 'client' ? '#ff2a4f' : '#ff0037'}">${pseudo} :</strong>` : '';
    
    return `
        <p class="${type === 'client' ? 'stored-message' : ''}" style="animation: fadeIn 0.3s ease;">
            ${pseudoElement} ${content} ${timeHtml}
        </p>`;
}

/* ==================== 📱 GESTION DE L'INTERFACE ==================== */

toggle.onclick = () => {
    panel.style.display = "flex";
    toggle.style.display = "none";
    
    // Animation d'ouverture
    panel.style.opacity = '0';
    panel.style.transform = 'translateY(30px) scale(0.95)';
    
    setTimeout(() => {
        panel.style.transition = 'opacity 0.4s, transform 0.4s cubic-bezier(0.34, 1.56, 0.64, 1)';
        panel.style.opacity = '1';
        panel.style.transform = 'translateY(0) scale(1)';
    }, 10);
    
    // Charger les messages stockés
    socket.emit("load-stored-messages");
    
    // Reset du badge
    unreadCount = 0;
    unread.style.display = "none";
    unread.textContent = "0";
};

document.getElementById("adminChatClose").onclick = () => {
    // Animation de fermeture
    panel.style.transition = 'opacity 0.3s, transform 0.3s';
    panel.style.opacity = '0';
    panel.style.transform = 'translateY(30px) scale(0.95)';
    
    setTimeout(() => {
        panel.style.display = "none";
        toggle.style.display = "flex";
        panel.style.opacity = '1';
        panel.style.transform = 'translateY(0) scale(1)';
    }, 300);
};

/* ==================== 🔌 SOCKET.IO ==================== */

const socket = io("https://livebeautyofficial.com", {
    path: "/chatbot/socket.io",
    transports: ["polling", "websocket"], 
    upgrade: true,
    reconnection: true,
    reconnectionAttempts: 5,
    reconnectionDelay: 1000
});

socket.on("connect", () => {
    socket.emit("identify", { type: "admin" });
    console.log("👑 Admin premium connecté au socket");
});

/* ==================== 📅 GESTION DES DATES ==================== */

function formatDateTime(timestamp) {
    if (!timestamp) return '';
    
    try {
        const date = typeof timestamp === 'string' ? new Date(timestamp) : timestamp;
        if (isNaN(date.getTime())) return '';
        
        const now = new Date();
        const today = now.toDateString();
        const messageDate = date.toDateString();
        
        if (today === messageDate) {
            return `Aujourd'hui ${date.getHours().toString().padStart(2, '0')}:${date.getMinutes().toString().padStart(2, '0')}`;
        }
        
        const yesterday = new Date(now);
        yesterday.setDate(yesterday.getDate() - 1);
        if (yesterday.toDateString() === messageDate) {
            return `Hier ${date.getHours().toString().padStart(2, '0')}:${date.getMinutes().toString().padStart(2, '0')}`;
        }
        
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
        const separator = document.createElement('div');
        separator.className = 'date-separator';
        separator.textContent = dateLabel;
        separator.style.animation = 'fadeIn 0.5s ease';
        thread.appendChild(separator);
        return true;
    }
    
    return false;
}

/* ==================== 📨 GESTION DES MESSAGES ==================== */

socket.on("stored-messages-count", data => {
    storedSpan.innerHTML = storedSpan.innerHTML.replace(/\d+/, data.count);
    updateBadge();
});

socket.on("stored-messages", messages => {
    console.log(`📨 Réception de ${messages.length} conversations stockées`);
    
    lastProcessedDates = {};
    
    messages.forEach(group => {
        let block = document.getElementById("client-" + group.userId);
        
        if (!block) {
            list.innerHTML += `
                <div class="adminChatBlock" id="client-${group.userId}" style="animation: fadeIn 0.4s ease;">
                    <h4>${group.pseudo} 
                        <span class="timestamp">(${group.count} message${group.count > 1 ? 's' : ''} stocké${group.count > 1 ? 's' : ''})</span>
                    </h4>
                    <div class="thread"></div>
                    <input class="adminReply" data-id="${group.userId}" placeholder="Répondre à ${group.pseudo}…">
                </div>
            `;
            block = document.getElementById("client-" + group.userId);
        }
        
        const thread = block.querySelector(".thread");
        thread.innerHTML = '';
        
        group.messages.forEach((msg, index) => {
            const timestamp = group.timestamps && group.timestamps[index] ? group.timestamps[index] : null;
            
            addDateSeparatorIfNeeded(group.userId, timestamp, thread);
            
            const messageEl = createMessageElement(msg, 'client', timestamp, group.pseudo);
            thread.innerHTML += messageEl;
        });
        
        socket.emit("mark-as-read", { userId: group.userId });
    });
    
    const totalMessages = messages.reduce((total, group) => total + group.messages.length, 0);
    storedSpan.innerHTML = storedSpan.innerHTML.replace(/\d+/, totalMessages);
    
    setTimeout(() => {
        list.scrollTop = list.scrollHeight;
    }, 100);
});

socket.on("admin-new-message", data => {
    console.log("💌 Nouveau message en direct:", data);
    
    let block = document.getElementById("client-" + data.userId);

    if (!block) {
        list.innerHTML += `
            <div class="adminChatBlock" id="client-${data.userId}" style="animation: fadeIn 0.4s ease;">
                <h4>${data.pseudo}</h4>
                <div class="thread"></div>
                <input class="adminReply" data-id="${data.userId}" placeholder="Répondre à ${data.pseudo}…">
            </div>
        `;
        block = document.getElementById("client-" + data.userId);
        addNotificationEffect(block);
    }

    const thread = block.querySelector(".thread");
    const timestamp = data.timestamp || new Date().toISOString();
    
    addDateSeparatorIfNeeded(data.userId, timestamp, thread);
    
    const messageEl = createMessageElement(data.message, 'client', timestamp, data.pseudo);
    thread.innerHTML += messageEl;

    // Ajouter l'original si traduit
    if (data.original_message && data.translated) {
        thread.innerHTML += `
            <p style="font-size: 13px; color: #ff7799; margin-left: 20px; font-style: italic; animation: fadeIn 0.5s ease;">
                <em>🌐 Original (${data.original_language || 'auto'}): "${data.original_message}"</em>
            </p>`;
    }

    // Effets sonores et visuels
    if (sound) {
        sound.currentTime = 0;
        sound.play().catch(()=>{});
    }

    if (panel.style.display === "none") {
        unreadCount++;
        unread.textContent = unreadCount > 9 ? '9+' : unreadCount;
        unread.style.display = "flex";
        addNotificationEffect(unread);
    }

    updateMessageStats();
    
    setTimeout(() => {
        list.scrollTop = list.scrollHeight;
    }, 100);
});

function updateMessageStats() {
    socket.emit("load-stored-messages");
}

/* ==================== 👥 GESTION DES CLIENTS ==================== */

socket.on("client-connected", data => {
    connectedClients[data.userId] = data.pseudo;
    updateOnlineStats();
    addNotificationEffect(onlineSpan);
});

socket.on("client-disconnected", data => {
    delete connectedClients[data.userId];
    updateOnlineStats();
});

function updateOnlineStats() {
    const count = Object.keys(connectedClients).length;
    onlineSpan.innerHTML = onlineSpan.innerHTML.replace(/\d+/, count);
}

function updateBadge() {
    const totalMessages = storedSpan.textContent.match(/\d+/);
    if (totalMessages && parseInt(totalMessages[0]) > 0) {
        unread.style.display = "flex";
    }
}

/* ==================== ✉️ ENVOI DES RÉPONSES ==================== */

document.addEventListener("keydown", e => {
    if (e.target.classList.contains("adminReply") && e.key === "Enter") {
        const msg = e.target.value.trim();
        if (!msg) return;

        const id = String(e.target.dataset.id);
        const now = new Date();
        const timestamp = formatDateTime(now);

        // Animation du bouton
        animateButtonPress(e.target);

        // Envoyer au serveur
        socket.emit("admin-reply", { 
            userId: id, 
            message: msg,
            timestamp: now.toISOString()
        });

        // Afficher localement
        const thread = document.querySelector(`#client-${id} .thread`);
        const messageEl = createMessageElement(msg, 'admin', now, 'Vous');
        thread.innerHTML += messageEl;

        e.target.value = "";
        
        setTimeout(() => {
            list.scrollTop = list.scrollHeight;
        }, 50);
    }
});

// Rafraîchir le chat
document.getElementById("refreshChat").onclick = function() {
    animateButtonPress(this);
    socket.emit("load-stored-messages");
    list.innerHTML = '';
    lastProcessedDates = {};
    
    // Effet de chargement
    const loadingDiv = document.createElement('div');
    loadingDiv.innerHTML = '<p style="text-align: center; color: #ff2a4f; padding: 20px;">🔄 Chargement des conversations...</p>';
    list.appendChild(loadingDiv);
    
    setTimeout(() => {
        if (loadingDiv.parentNode) {
            loadingDiv.remove();
        }
    }, 1000);
};

/* ==================== 🎬 INITIALISATION ==================== */

document.addEventListener('DOMContentLoaded', function() {
    // Animation d'apparition du bouton
    toggle.style.opacity = '0';
    toggle.style.transform = 'scale(0.8)';
    
    setTimeout(() => {
        toggle.style.transition = 'opacity 0.5s, transform 0.5s cubic-bezier(0.34, 1.56, 0.64, 1)';
        toggle.style.opacity = '1';
        toggle.style.transform = 'scale(1)';
    }, 300);
    
    if (socket.connected) {
        socket.emit("identify", { type: "admin" });
    }
    
    // Effet de pulsation périodique
    setInterval(() => {
        if (panel.style.display === "none" && unreadCount === 0) {
            toggle.style.boxShadow = 
                '0 0 35px rgba(255, 0, 55, 1), 0 20px 60px rgba(0, 0, 0, 0.7), inset 0 4px 20px rgba(255, 255, 255, 0.4), inset 0 -8px 30px rgba(0, 0, 0, 0.9)';
            setTimeout(() => {
                if (panel.style.display === "none" && unreadCount === 0) {
                    toggle.style.boxShadow = 
                        '0 0 25px rgba(255, 0, 55, 0.7), 0 15px 50px rgba(0, 0, 0, 0.6), inset 0 4px 15px rgba(255, 255, 255, 0.3), inset 0 -8px 25px rgba(0, 0, 0, 0.8)';
                }
            }, 800);
        }
    }, 8000);
});

// Sauvegarder l'état
window.addEventListener('beforeunload', () => {
    const isOpen = panel.style.display === "flex";
    localStorage.setItem('admin_chat_open', isOpen);
});

// Restaurer l'état
window.addEventListener('load', () => {
    const wasOpen = localStorage.getItem('admin_chat_open') === 'true';
    if (wasOpen) {
        setTimeout(() => {
            toggle.click();
        }, 1000);
    }
});

// Effet de parallaxe sur le bouton
document.addEventListener('mousemove', (e) => {
    if (toggle && toggle.style.display !== 'none') {
        const x = (e.clientX / window.innerWidth - 0.5) * 8;
        const y = (e.clientY / window.innerHeight - 0.5) * 8;
        toggle.style.transform = `translate(${x}px, ${y}px) scale(1.05)`;
    }
});

document.addEventListener('mouseleave', () => {
    if (toggle && toggle.style.display !== 'none') {
        toggle.style.transform = 'translateY(0) scale(1)';
    }
});
</script>

