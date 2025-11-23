<style>
/* Force namespace pour éviter conflits */
.adminchat-wrapper * {
    box-sizing: border-box !important;
}

/* POSE FINALE ABSOLUE – aucune page ne peut le déplacer */
#adminChatWrapper {
    position: fixed !important;
    bottom: 25px !important;
    right: 25px !important;
    z-index: 999999999 !important;
    pointer-events: none; /* Laisse la page normale cliquer */
}

/* Mais les éléments internes doivent accepter les clics */
#adminChatToggle, 
#adminChatPanel {
    pointer-events: auto;
}

/* === BOUTON FLOTTANT PREMIUM 2025 === */
#adminChatToggle {
    width: 78px;
    height: 78px;
    border-radius: 50%;
    cursor: pointer;

    background: radial-gradient(circle at 30% 30%, #2b2b2b, #0a0a0a);
    border: 3px solid #ff0037;

    color: #ff3355;
    font-size: 32px;

    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;

    box-shadow:
        0 0 25px rgba(255,0,55,0.95),
        0 0 45px rgba(255,0,55,0.6),
        inset 0 6px 14px rgba(255,0,55,0.4),
        inset 0 -6px 18px rgba(0,0,0,0.9);

    animation: adminChatGlow 2.4s infinite ease-in-out;
    transition: transform .25s ease;
}
#adminChatToggle:hover { transform: scale(1.12); }

@keyframes adminChatGlow {
    0% { box-shadow: 0 0 18px #ff0037; }
    50% { box-shadow: 0 0 38px #ff0037; }
    100% { box-shadow: 0 0 18px #ff0037; }
}

/* BADGE */
#adminChatUnread {
    position: absolute;
    top: -6px;
    right: -6px;
    width: 28px;
    height: 28px;

    display: none;
    justify-content: center;
    align-items: center;

    background: #ff0037;
    color: white;
    font-size: 13px;
    border-radius: 50%;
    font-weight: bold;
    box-shadow: 0 0 10px black;
}

/* === CHAT PANEL === */
#adminChatPanel {
    width: 390px;
    max-height: 560px;
    background: rgba(12,12,12,0.95);
    border: 2px solid #ff0037;
    border-radius: 20px;
    backdrop-filter: blur(12px);

    position: fixed !important;
    bottom: 120px !important;
    right: 25px !important;

    display: none;
    flex-direction: column;

    z-index: 999999999 !important;
    animation: adminPanelUp .35s ease;
    box-shadow:
        0 0 40px rgba(255,0,55,0.6),
        0 0 18px rgba(0,0,0,0.8);
}

@keyframes adminPanelUp {
    from { opacity: 0; transform: translateY(20px); }
    to   { opacity: 1; transform: translateY(0); }
}

/* HEADER */
#adminChatHeader {
    padding: 14px;
    background: linear-gradient(145deg, #ff0037, #b00022);
    color: #fff;
    display: flex;
    justify-content: space-between;
    font-size: 18px;
    border-radius: 18px 18px 0 0;
}
#adminChatClose {
    cursor: pointer;
    font-size: 24px;
}

/* LIST */
#adminChatList {
    padding: 12px;
    overflow-y: auto;
    height: 380px;
    color: #eee;
}

/* MESSAGE BLOCK */
.adminChatBlock {
    background: rgba(30,30,30,0.9);
    border: 1px solid #550010;
    padding: 12px;
    border-radius: 12px;
    margin-bottom: 14px;
}
.adminChatBlock h4 {
    margin: 0 0 6px;
    color: #ff2a4f;
}
.adminChatBlock input {
    width: 100%;
    padding: 9px;
    background: #161616;
    border: 1px solid #ff0037;
    border-radius: 8px;
    color: white;
    margin-top: 8px;
}
.thread p {
    margin: 4px 0;
}
</style>

<div id="adminChatWrapper" class="adminchat-wrapper">

    <div id="adminChatToggle">
        💬 <div id="adminChatUnread"></div>
    </div>

    <div id="adminChatPanel">
        <div id="adminChatHeader">
            👑 Admin Chat
            <span id="adminChatClose">&times;</span>
        </div>
        <div id="adminChatList"></div>
    </div>

    <audio id="adminChatSound" src="/sounds/notificationAction.mp3" preload="auto"></audio>
</div>

<script src="https://cdn.socket.io/4.5.4/socket.io.min.js"></script>

<script>
/* Elements */
const panel  = document.getElementById("adminChatPanel");
const toggle = document.getElementById("adminChatToggle");
const unread = document.getElementById("adminChatUnread");
const list   = document.getElementById("adminChatList");
const sound  = document.getElementById("adminChatSound");

/* Socket */
const socket = io("http://localhost:4000");

/* IDENTIFICATION FIABLE DE L’ADMIN */
socket.on("connect", () => {
    console.log("ADMIN CONNECTÉ :", socket.id);
    socket.emit("identify", { type: "admin" });
});

/* Ouvrir */
toggle.onclick = () => {
    panel.style.display = "flex";
    toggle.style.display = "none";
    unread.style.display = "none";
};

/* Fermer */
document.getElementById("adminChatClose").onclick = () => {
    panel.style.display = "none";
    toggle.style.display = "flex";
};

/* Réception d’un message client */
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

    if (panel.style.display === "none") {
        unread.innerText = "1";
        unread.style.display = "flex";
    }

    sound.currentTime = 0;
    sound.play().catch(()=>{});
});

/* Envoi réponse admin */
document.addEventListener("keydown", e => {
    if (e.target.classList.contains("adminReply") && e.key === "Enter") {
        const msg = e.target.value.trim();
        if (!msg) return;

        const id = String(e.target.dataset.id);

        socket.emit("admin-reply", { 
            userId: id, 
            message: msg 
        });

        const thread = document.querySelector(`#client-${id} .thread`);
        thread.innerHTML += `<p><strong style="color:#ff0037">Admin :</strong> ${msg}</p>`;

        e.target.value = "";
    }
});
</script>
