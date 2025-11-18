@if(Auth::check())
<style>
/* ------------------------------------------ */
/* BOUTON FLOTTANT LUXE ROUGE & NOIR          */
/* ------------------------------------------ */

#chatbot-toggle {
    position: fixed;
    bottom: 20px;
    right: 20px;

    width: 75px;
    height: 75px;
    border-radius: 50%;
    cursor: pointer;

    /* Noir glossy 3D */
    background: radial-gradient(circle at 35% 35%, #222 0%, #000 70%);
    border: 3px solid #d40022;

    color: #ff2a4f; /* pour l’emoji 💋 */
    font-size: 36px;

    display: flex;
    align-items: center;
    justify-content: center;

    /* Effet 3D + glow néon */
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
    0% {
        box-shadow:
            0 0 15px rgba(212,0,34,0.6),
            0 0 25px rgba(212,0,34,0.4),
            inset 0 3px 9px rgba(255,0,60,0.2),
            inset 0 -4px 12px rgba(0,0,0,0.7);
    }
    50% {
        box-shadow:
            0 0 25px rgba(255,0,60,1),
            0 0 35px rgba(255,0,60,0.9),
            inset 0 5px 10px rgba(255,0,60,0.35),
            inset 0 -5px 15px rgba(0,0,0,0.9);
    }
    100% {
        box-shadow:
            0 0 15px rgba(212,0,34,0.6),
            0 0 25px rgba(212,0,34,0.4),
            inset 0 3px 9px rgba(255,0,60,0.2),
            inset 0 -4px 12px rgba(0,0,0,0.7);
    }
}

#chatbot-toggle:hover {
    transform: scale(1.12);
}


/* ------------------------------------------ */
/* CHATBOX LUXE ROUGE & NOIR                   */
/* ------------------------------------------ */

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
    from { transform: translateY(20px); opacity: 0; }
    to { transform: translateY(0); opacity: 1; }
}

/* Header rouge glossy */
#chatbot-header {
    background: linear-gradient(145deg, #ff0037, #b0001c);
    padding: 12px 16px;
    color: white;
    font-size: 17px;
    font-weight: bold;
    display: flex;
    justify-content: space-between;
    align-items: center;

    box-shadow: inset 0 -2px 5px rgba(0,0,0,0.4);
}

#close-chatbot {
    cursor: pointer;
    font-size: 20px;
}

/* Messages */
#chatbot-messages {
    padding: 12px;
    height: 320px;
    overflow-y: auto;
    color: #eee;
    font-size: 15px;
}

/* Zone de saisie */
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

#chatbot-input input::placeholder {
    color: #777;
}

/* Responsive mobile */
@media (max-width: 480px) {
    #chatbot-container {
        width: 90%;
        right: 5%;
        bottom: 100px;
    }

    #chatbot-toggle {
        width: 65px;
        height: 65px;
        font-size: 32px;
    }
}
</style>


<!-- BOUTON FLOTTANT LUXE -->
<button id="chatbot-toggle">💋</button>

<!-- CHATBOT -->
<div id="chatbot-container">
    <div id="chatbot-header">
        🔥 Live Beauty CHAT – Bonjour {{ Auth::user()->pseudo }} !
        <span id="close-chatbot">&times;</span>
    </div>

    <div id="chatbot-messages">
        <p><strong style="color:#ff2a4f;">Bot :</strong> Bienvenue au chat VIP 😘</p>
        <p><strong style="color:#ff2a4f;">Bot :</strong> Comment puis-je t’aider ?</p>
    </div>

    <div id="chatbot-input">
        <input type="text" placeholder="Écris ton message…">
    </div>
</div>


<script>
document.getElementById("chatbot-toggle").onclick = () => {
    document.getElementById("chatbot-container").style.display = "flex";
    document.getElementById("chatbot-toggle").style.display = "none";
};

document.getElementById("close-chatbot").onclick = () => {
    document.getElementById("chatbot-container").style.display = "none";
    document.getElementById("chatbot-toggle").style.display = "flex";
};
</script>
@endif
