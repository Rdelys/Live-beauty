<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Live de {{ $modele->prenom }}</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <audio id="soundMessage" src="{{ asset('sounds/notificationAction.mp3') }}" preload="auto"></audio>
  <audio id="soundSurprise" src="{{ asset('sounds/cadeau.mp3') }}" preload="auto"></audio>

<meta name="csrf-token" content="{{ csrf_token() }}">

  <style>
    .fullscreen-icon {
  background: linear-gradient(135deg, #263238, #37474f);
  color: #fff;
  box-shadow: 0 8px 28px rgba(0,0,0,0.3);
}
.fullscreen-icon:hover {
  transform: translateY(-3px);
}
@keyframes pulseFinished {
  0%   { transform: scale(1); opacity: 1; }
  50%  { transform: scale(1.2); opacity: 0.8; }
  100% { transform: scale(1); opacity: 1; }
}

    body {
  background: linear-gradient(135deg, #1e1e1e, #2a2a2a);
  color: #fff;
  font-family: 'Segoe UI', sans-serif;
  padding: 2rem 1rem;
  margin: 0;
  overflow-x: hidden;
}

.container-live {
  max-width: 1300px;
  margin: auto;
  display: flex;
  flex-wrap: wrap;
  gap: 2rem;
}

.left-live {
  flex: 2;
  background-color: #212121;
  border-radius: 12px;
  padding: 2rem;
  min-width: 320px;
}

.right-jetons {
  flex: 1;
  background-color: #212121;
  border-radius: 12px;
  padding: 2rem;
  min-width: 280px;
}

video {
  width: 100%;
  height: auto;
  max-height: none; /* Supprimer la limite */
  border: 4px solid #e53935;
  border-radius: 12px;
  object-fit: cover; /* Adapté pour plein écran */
}


.badge-live {
  background-color: #e53935;
  padding: 8px 18px;
  color: white;
  font-weight: bold;
  border-radius: 20px;
  display: inline-block;
  margin: 1rem 0;
  font-size: 1rem;
  animation: pulse 1.2s infinite;
}

@keyframes pulse {
  0% { opacity: 1; }
  50% { opacity: 0.5; }
  100% { opacity: 1; }
}

/* Jetons stylisés */
.jeton-card {
  background: linear-gradient(145deg, #2f2f2f, #1f1f1f);
  border: 1px solid #444;
  border-radius: 16px;
  padding: 1rem 1.2rem;
  margin-bottom: 1.2rem;
  display: flex;
  justify-content: space-between;
  align-items: center;
  transition: transform 0.2s ease;
}

.jeton-card:hover {
  transform: scale(1.02);
}

.jeton-info {
  display: flex;
  flex-direction: column;
  gap: 4px;
}

.jeton-name {
  font-size: 1.1rem;
  font-weight: bold;
  color: #f8f8f8;
}

.jeton-desc {
  font-size: 0.85rem;
  color: #ccc;
}

.jeton-btn {
  background-color: #ff1744;
  color: #fff;
  border: none;
  border-radius: 8px;
  padding: 0.5rem 1rem;
  font-weight: 600;
  font-size: 0.95rem;
}

.jeton-btn:hover {
  background-color: #d50000;
}

.jeton-btn:disabled {
  background-color: #666;
  cursor: not-allowed;
}

/* Chat bulles/messages */
.chat-wrapper {
  position: absolute;
  bottom: 100px; /* au-dessus du champ de texte */
  left: 10px;
  right: 10px;
  max-height: 150px;
  overflow-y: auto;
  padding-right: 5px;
  display: flex;
  flex-direction: column;
  gap: 6px;
  font-size: 0.95rem;
  z-index: 9999;
  pointer-events: auto;
  scrollbar-width: none; /* Firefox */
}

.chat-wrapper::-webkit-scrollbar {
  display: none; /* Chrome */
}

.chat-bubble {
  background: none; /* Pas de fond */
  padding: 0;
  border-radius: 0;
  color: #ffffff;
  font-size: 1rem;
  font-weight: 700; /* Texte plus épais */
  text-shadow: 
    1px 1px 3px rgba(0, 0, 0, 0.8),
    -1px -1px 2px rgba(0, 0, 0, 0.6); /* Ombre pour lisibilité */
  pointer-events: none;
  max-width: 90%;
  word-wrap: break-word;
  animation: fadeInUp 0.3s ease-out;
}
@keyframes fadeInUp {
  0% { opacity: 0; transform: translateY(10px); }
  100% { opacity: 1; transform: translateY(0); }
}




/*@keyframes fadeOut {
  0% { opacity: 1; transform: translateY(0); }
  90% { opacity: 1; }
  100% { opacity: 0; transform: translateY(-20px); }
}

/* Chat Form */
#videoContainer {

    position: relative;
}

#chatForm {
    position: absolute;
    bottom: 15px;
    left: 50%;
    transform: translateX(-50%);
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 8px;
    background-color: rgba(0,0,0,0.6);
    backdrop-filter: blur(6px);
    border-radius: 10px;
    width: calc(100% - 40px);
    max-width: 700px;
    box-sizing: border-box;
    z-index: 1000; /* Toujours au-dessus de la vidéo */
}

#chatForm input {
  flex: 1;
  padding: 8px 10px;
  border-radius: 6px;
  border: none;
  background: rgba(255,255,255,0.15);
  color: #fff;
}

#chatForm button {
  padding: 8px 14px;
  border-radius: 6px;
  border: none;
  background: #e53935;
  color: #fff;
  font-weight: bold;
}

#chatForm button:hover {
  background: #d32f2f;
}

/* En plein écran */
#videoContainer:fullscreen #chatForm,
#videoContainer:-webkit-full-screen #chatForm {
    bottom: 20px;
    width: calc(100% - 30px);
}

/* Responsive */
@media (max-width: 992px) {
  .container-live {
    flex-direction: column;
  }

  .left-live, .right-jetons {
    width: 100%;
    padding: 1.5rem;
  }

  .jeton-btn {
    font-size: 0.9rem;
    padding: 0.4rem 0.8rem;
  }

  #chatForm {
    flex-direction: column;
    padding: 8px;
  }

  .chat-bubble {
    font-size: 0.9rem;
    max-width: 95%;
  }
}

@media (max-width: 576px) {
  body {
    padding: 1rem 0.5rem;
  }

  h2, h4, h5 {
    font-size: 1.2rem;
  }

  .jeton-name {
    font-size: 1rem;
  }

  .jeton-desc {
    font-size: 0.8rem;
  }

  .jeton-btn {
    font-size: 0.85rem;
    padding: 0.3rem 0.6rem;
  }

 #chatForm {
  width: 95%;
  bottom: 15px;
}

#chatForm {
  width: 95%;
  bottom: 15px;
}

#chatForm input,
#chatForm button {
  font-size: 0.9rem;
  padding: 0.4rem;
}

#videoContainer:fullscreen #chatForm,
#videoContainer:-webkit-full-screen #chatForm {
  position: absolute;
  bottom: 20px;
  width: 95%;
  max-width: 700px;
}

}
#videoContainer:fullscreen {
  width: 100vw;
  height: 100vh;
  background-color: #000;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}

#videoContainer:-webkit-full-screen { /* pour Safari/Chrome */
  width: 100vw;
  height: 100vh;
  background-color: #000;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}
/* ICONS & MENUS POUR JETONS */
.video-top-icons {
  position: absolute;
  top: 12px;
  right: 12px;
  display: flex;
  flex-direction: column; /* empile les icônes verticalement */
  gap: 8px;
  z-index: 1100;
  align-items: center;
  pointer-events: auto;
}

/* Adapter pour mobile */
@media (max-width: 576px) {
  .video-top-icons {
    top: 8px;
    right: 8px;
    gap: 6px;
  }
}

/* Quand on est en plein écran */
#videoContainer:fullscreen .video-top-icons,
#videoContainer:-webkit-full-screen .video-top-icons {
  position: absolute;
  top: 12px;
  right: 12px;
  z-index: 99999; /* Très haut pour passer au-dessus */
}



/* Icones */
.token-icon {
  width: 44px;
  height: 44px;
  border-radius: 50%;
  border: none;
  background: rgba(0,0,0,0.45);
  color: #fff;
  font-size: 20px;
  display: flex;
  align-items: center;
  justify-content: center;
  box-shadow: 0 6px 18px rgba(0,0,0,0.5);
  cursor: pointer;
  transition: transform .12s ease, background .12s ease;
}
.token-icon:active { transform: scale(.96); }
.token-icon:hover { transform: translateY(-3px); }

/* Gold style for model tokens */
.golden-icon {
  background: linear-gradient(135deg,#b8860b,#ffd54f);
  color: #2b1600;
  box-shadow: 0 8px 28px rgba(189,137,9,0.25);
}

.surprise-icon {
  background: linear-gradient(135deg, #6a1b9a, #ba68c8); /* violet -> lavande */
  color: #fff; /* blanc pour contraste */
  box-shadow: 0 8px 28px rgba(106, 27, 154, 0.25); /* ombre violette douce */
}

/* small popup menu list */
.token-menu {
  position: absolute;
  top: 56px;
  right: 0;
  min-width: 220px;
  background: rgba(10,10,10,0.85);
  border: 1px solid rgba(255,255,255,0.06);
  border-radius: 10px;
  padding: 8px;
  display: none;
  flex-direction: column;
  gap: 6px;
  z-index: 1150;
  backdrop-filter: blur(6px);
}
.token-menu .menu-title {
  font-size: 0.85rem;
  color: #ddd;
  padding: 4px 6px;
  border-bottom: 1px solid rgba(255,255,255,0.03);
  margin-bottom: 6px;
}
.token-choice {
  background: transparent;
  border: none;
  color: #fff;
  text-align: left;
  padding: 8px;
  border-radius: 8px;
  cursor: pointer;
  transition: background .12s;
}
.token-choice:hover { background: rgba(255,255,255,0.03); }

/* BULLES QUI APPARAISSENT SUR LA VIDEO */
.token-bubble {
  position: absolute;
  bottom: 120px; /* au-dessus du chat */
  left: 50%;
  transform: translateX(-50%);
  padding: 10px 14px;
  border-radius: 999px;
  font-weight: 700;
  color: #fff;
  background: rgba(40,40,40,0.75);
  text-shadow: 0 2px 6px rgba(0,0,0,0.7);
  z-index: 1200;
  pointer-events: none;
  animation: floatUp 2200ms forwards;
  box-shadow: 0 8px 30px rgba(0,0,0,0.5);
}
.token-bubble.golden {
  background: linear-gradient(90deg,#ffd54f,#ffb300);
  color: #2b1600;
  transform-origin: center;
}

/* position aléatoire horizontal (we will set left via js) */
@keyframes floatUp {
  0% { opacity: 1; transform: translateY(0) scale(1); }
  60% { opacity: 1; transform: translateY(-40px) scale(1.02); }
  100% { opacity: 0; transform: translateY(-110px) scale(.95); }
}

/* responsive adjustments */
@media (max-width: 576px) {
  .video-top-icons { top: 8px; right: 8px; gap: 6px; }
  .token-icon { width: 38px; height: 38px; font-size: 18px; }
  .token-menu { right: -6px; min-width: 180px; top: 48px; }
  .token-bubble { bottom: 150px; font-size: 0.9rem; padding: 8px 12px; }
}

#typingIndicator {
    opacity: 0.7;
    font-size: 0.9em;
    animation: pulseTyping 1.5s infinite;
}

@keyframes pulseTyping {
    0% { opacity: 0.5; }
    50% { opacity: 0.9; }
    100% { opacity: 0.5; }
}

.token-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr); /* 3 colonnes */
    gap: 10px;
    margin-top: 10px;
}

.token-item {
    background: #222;
    border-radius: 8px;
    padding: 10px;
    text-align: center;
    cursor: pointer; /* Cliquable */
    transition: transform 0.2s, background 0.2s;
}

.token-item:hover {
    background: #444;
    transform: scale(1.05);
}

.token-emoji {
    font-size: 1.8rem;
    margin-bottom: 5px;
}

.token-cost {
    font-size: 0.9rem;
    color: #ccc;
}
@media screen and (max-width: 768px) {
    #videoContainer {
        height: 80vh; /* prend 80% de la hauteur de l'écran */
    }

    #videoContainer video {
        height: 100%;
        width: 100%;
        object-fit: cover; /* évite les bandes noires */
    }
}

#backBtn {
  background: linear-gradient(135deg, #ff1744, #d50000); /* Rouge dégradé */
  color: #fff;
  font-weight: bold;
  border: none;
  border-radius: 12px;
  padding: 0.6rem 1.2rem;
  box-shadow: 0 6px 18px rgba(0, 0, 0, 0.4);
  cursor: pointer;
  transition: transform 0.2s ease, box-shadow 0.2s ease;
}

#backBtn:hover {
  transform: translateY(-3px);
  box-shadow: 0 10px 25px rgba(0, 0, 0, 0.5);
}

#backBtn:active {
  transform: scale(0.97);
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
}

  </style>
</head>
<body>
  <div class="container-live">
  

    <!-- LIVE Section -->
    <div class="left-live">
      <button id="backBtn" class="btn btn-secondary mb-3">
          ← Retour
      </button>
      <h2>{{ $modele->prenom }} est en Live 🎥</h2>
      <div class="badge-live">🔴 EN DIRECT</div>
@auth
<div class="text-white mb-2">
    💰 Jetons : <span id="userJetons">{{ Auth::user()->jetons }}</span>
</div>
@endauth
<!-- Chrono privé -->
<div id="privateTimer"
     style="position:absolute;top:10px;left:50%;transform:translateX(-50%);
            background:rgba(0,0,0,0.6);color:#fff;
            padding:6px 12px;border-radius:6px;
            font-weight:bold;z-index:10;">
    00:00
</div>
@auth
    @if(Auth::user()->role != 'modele' && !isset($showPriveId))
        <div class="text-center my-3">
            <button id="switchPrivateBtn" class="btn btn-danger">
              🚪 Passer en show privée
            </button>
        </div>
    @endif
@endauth




<div id="videoContainer" style="position: relative;">
  
  <div id="startOverlay" style="
  position: absolute; top: 0; left: 0; right: 0; bottom: 0;
  background: rgba(0,0,0,0.8); color: white;
  display: flex; align-items: center; justify-content: center;
  z-index: 1000;
  font-size: 1.5rem;
  cursor: pointer;
  ">
  ▶️ Cliquez pour démarrer le live avec son
  </div>

    <video id="liveVideo" autoplay playsinline controls></video>
    @auth
  <div class="video-top-icons" aria-hidden="false">
    <button id="fullscreenBtn" class="token-icon fullscreen-icon" title="Plein écran" type="button">
    ⛶
</button>

      <!-- Default tokens icon -->
      <button id="defaultTokensBtn" class="token-icon" title="Jetons standards" type="button">
        💠
      </button>

      <!-- Model personal tokens icon (gold) -->
      <button id="modelTokensBtn" class="token-icon golden-icon" title="Actions du modèle" type="button">
        ✨
      </button>

      <button id="modelSurpriseTokensBtn" class="token-icon surprise-icon" title="Surprises" type="button">
        🎁
      </button>

      <!-- Menus (remplis via Blade) -->
      <div id="defaultTokenMenu" class="token-menu" aria-hidden="true">
        <div class="menu-title">Jetons standards</div>
        @php $jetonsGlobaux = $jetons->whereNull('modele_id'); @endphp
        @foreach($jetonsGlobaux as $jeton)
        <button class="token-choice"
        data-name="{{ $jeton->nom }}"
        data-cost="{{ $jeton->nombre_de_jetons }}"
        data-description="{{ $jeton->description }}">
        {{ $jeton->nom }} — {{ $jeton->nombre_de_jetons }} {{ $jeton->modele_id ? '✨' : '💠' }}
        </button>
        @endforeach
      </div>

      <div id="modelTokenMenu" class="token-menu" aria-hidden="true">
        <div class="menu-title">Actions de {{ $modele->prenom }}</div>
        @php $jetonsPerso = $jetons->where('modele_id', $modele->id); @endphp
        @foreach($jetonsPerso as $jeton)
        <button class="token-choice"
            data-name="{{ $jeton->nom }}"
            data-cost="{{ $jeton->nombre_de_jetons }}"
            data-description="{{ $jeton->description }}">
            {{ $jeton->nom }} — {{ $jeton->nombre_de_jetons }} ✨
        </button>
        @endforeach
      </div>
      <!-- Menu Surprise -->
      <div id="modelSurpriseTokenMenu" class="token-menu" aria-hidden="true">
          <div class="menu-title">Envoyer une Surprise</div>
          <div class="token-grid">
              <div class="token-item" data-cost="1"><div class="token-emoji">💋</div><div class="token-cost">1</div></div>
              <div class="token-item" data-cost="5"><div class="token-emoji">🍸</div><div class="token-cost">5</div></div>
              <div class="token-item" data-cost="10"><div class="token-emoji">👙</div><div class="token-cost">10</div></div>
              <div class="token-item" data-cost="25"><div class="token-emoji">💄</div><div class="token-cost">25</div></div>
              <div class="token-item" data-cost="50"><div class="token-emoji">👠</div><div class="token-cost">50</div></div>
          </div>
      </div>
    </div>
    @endauth
    <div class="chat-wrapper" id="messages"></div>
    <!-- ICONES JETONS (INSÉRER DANS #videoContainer, après <video>) -->
    @auth
      @if(Auth::user()->role != 'modele') {{-- modèle ne peut pas envoyer --}}
      <form id="chatForm" class="d-flex" onsubmit="sendMessage(event)">
        <input type="text" id="messageInput" class="form-control me-2" placeholder="Tape ton message..." required>
        <button type="submit" class="btn btn-danger">Envoyer</button>
      </form>
      @endif
    @endauth
      </div>
</div>


      @if(!Auth::check())
  <div id="countdownBox" class="text-center mt-2">
    <p class="text-warning fs-5">
      ⏳ Il vous reste <span id="countdown">10</span> secondes de live gratuit.
    </p>
    <p class="text-light small">
      🔒 Connecte-toi ou crée un compte pour continuer à regarder le live.
    </p>
  </div>
@endif
@if(!Auth::check())
<script>
  let seconds = 10;
  const countdownElement = document.getElementById('countdown');

  const countdownInterval = setInterval(() => {
    seconds--;
    countdownElement.textContent = seconds;

    if (seconds <= 0) {
      clearInterval(countdownInterval);
      window.location.href = "{{ route('home') }}";
    }
  }, 1000);
</script>
@endif

      <p class="mt-3">{{ $modele->description }}</p>
    </div>

  </div>
  <!--wss://livebeautyofficial.com  http://localhost:3000/-->

  <script src="https://cdn.socket.io/4.7.2/socket.io.min.js"></script>
<script>
  const socket = io("wss://livebeautyofficial.com", {path: '/socket.io', transports: ["websocket"] });
  const video = document.getElementById("liveVideo");
  const soundMessage = document.getElementById("soundMessage");
const soundSurprise = document.getElementById("soundSurprise")
const peerConnection = new RTCPeerConnection({
  iceServers: [
  { urls: "stun:stun.l.google.com:19302" },
  {
    urls: "turn:livebeautyofficial.com:3478",
    username: "webrtc",
    credential: "password123"
  }
]

});
  let broadcasterId = null;

  // Quand un flux distant arrive, on l'affiche dans la vidéo
  peerConnection.ontrack = event => {
  video.srcObject = event.streams[0];
  // 🔁 Forcer la lecture une fois le flux attaché
  video.muted = true; // Nécessaire pour l'autoplay sans interaction utilisateur
  video.play().catch(err => {
    console.warn("Autoplay bloqué :", err);
  });
};


  // Envoi des candidats ICE au serveur (et au broadcaster)
  peerConnection.onicecandidate = event => {
    if (event.candidate && broadcasterId) {
      socket.emit("candidate", broadcasterId, event.candidate);
    }
  };

  // Dans la partie où vous émettez "watcher"
socket.on("connect", () => {
    socket.emit("watcher", {
        pseudo: "{{ Auth::check() ? Auth::user()->pseudo : 'Anonyme' }}"
        @if(isset($showPriveId))
        , showPriveId: "{{ $showPriveId }}"
        @endif
    });
});

window.onunload = window.onbeforeunload = () => {
    socket.emit("watcher-disconnected");
    socket.close();
    peerConnection.close();
};

  // Indicateur "en train d'écrire"
let typingTimeout;
const messageInputtest = document.getElementById("messageInput");

if (messageInputtest) {
  messageInputtest.addEventListener('keydown', function() {
    if (socket) {
      const payload = {
        pseudo: "{{ Auth::check() ? Auth::user()->pseudo : 'Anonyme' }}",
        isModel: false
      };
      @if(isset($showPriveId))
        payload.showPriveId = "{{ $showPriveId }}";
      @endif
      socket.emit("typing", payload);
    }

    clearTimeout(typingTimeout);
    typingTimeout = setTimeout(() => {
      if (socket) {
        const stopPayload = {};
        @if(isset($showPriveId))
          stopPayload.showPriveId = "{{ $showPriveId }}";
        @endif
        socket.emit("stopTyping", stopPayload);
      }
    }, 1000);
  });
}

let debitInterval = null;
const userJetonsSpan = document.getElementById("userJetons");
const messagesDive = document.getElementById("messages");
let isPrivate = false;

switchPrivateBtn.addEventListener("click", () => {
    if (!isPrivate) {
        // Vérifie si user peut démarrer avant de lancer le show privé
        fetch("{{ route('live.canStart') }}", {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
                "Content-Type": "application/json"
            },
            body: JSON.stringify({ modele_id: "{{ $modele->id }}" })
        })
        .then(res => res.json())
        .then(data => {
            if (!data.canStart) {
                alert(data.message);
                return; // ❌ stop, pas assez de jetons
            }

            // ✅ Lancer le show privée
            socket.emit("switch-to-private", { pseudo: "{{ $modele->prenom ?? 'Modèle' }}" });
            switchPrivateBtn.textContent = "❌ Annuler le show privée";
            isPrivate = true;

            // Début débit auto
            debitInterval = setInterval(() => {
                fetch("{{ route('live.debiter') }}", {
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
                        "Content-Type": "application/json",
                        "Accept": "application/json"
                    },
                    body: JSON.stringify({
                        user_id: "{{ Auth::user()->id }}",
                        modele_id: "{{ $modele->id }}"
                    })
                })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        if (userJetonsSpan) userJetonsSpan.textContent = data.jetons_restants;

                        const bubble = document.createElement("div");
                        bubble.className = "chat-bubble";
                        bubble.style.color = "#FFD740";
                        bubble.innerHTML = data.chat_message;
                        messagesDive.appendChild(bubble);
                        messagesDive.scrollTop = messagesDive.scrollHeight;
                    } else {
                        clearInterval(debitInterval);
                        alert(data.message);
                    }
                });
            }, 60000);

        });
    } else {
        // Annuler le show privée
        socket.emit("cancel-private", { pseudo: "{{ $modele->prenom ?? 'Modèle' }}" });
        switchPrivateBtn.textContent = "🚪 Passer en show privée";
        isPrivate = false;

        if (debitInterval) clearInterval(debitInterval);
    }
});



// Événement de redirection (expulsion des autres users)
socket.on("redirect-dashboard", () => {
    // Rediriger seulement si l’utilisateur n’est pas celui en privé
    if (!isPrivate) {
        window.location.href = "/dashboard";
    }
});


socket.emit("join-public", { pseudo: "{{ Auth::user()->pseudo }}" });


socket.on("typing", (data) => {
    const typingIndicator = document.getElementById("typingIndicator");
    if (!typingIndicator) {
        const indicator = document.createElement("div");
        indicator.id = "typingIndicator";
        indicator.className = 'chat-bubble';
        indicator.innerHTML = `<em>${data.isModel ? "{{ $modele->nom }} {{ $modele->prenom }}" : data.pseudo} : (...)</em>`;
        document.getElementById("messages").appendChild(indicator);
        document.getElementById("messages").scrollTop = document.getElementById("messages").scrollHeight;
    }
});

socket.on("stopTyping", () => {
    const typingIndicator = document.getElementById("typingIndicator");
    if (typingIndicator) {
        typingIndicator.remove();
    }
});
  // Quand le broadcaster envoie une offre SDP
  socket.on("offer", (id, description) => {
    broadcasterId = id;
    peerConnection.setRemoteDescription(description)
      .then(() => peerConnection.createAnswer())
      .then(answer => peerConnection.setLocalDescription(answer))
      .then(() => {
        socket.emit("answer", id, peerConnection.localDescription);
      })
      .catch(e => console.error("Erreur gestion offre WebRTC :", e));
  });

  // Quand le broadcaster envoie un candidat ICE
  socket.on("candidate", (id, candidate) => {
    peerConnection.addIceCandidate(new RTCIceCandidate(candidate))
      .catch(e => console.error("Erreur ajout candidat ICE :", e));
  });

socket.on("show-time", (data) => {
      console.log("📡 show-time reçu côté client:", data);

    if (!data || !data.endTimestamp) return;

    const timerDiv = document.getElementById("privateTimer");
    if (!timerDiv) return;

    timerDiv.style.display = "block";

    let remaining = Math.floor((data.endTimestamp - Date.now()) / 1000);

    function updateTimer() {
    if (remaining <= 0) {
        clearInterval(timerInterval);
        timerDiv.textContent = "⏱️ Terminé";
        timerDiv.style.color = "#ff4d4d";   // rouge vif
        timerDiv.style.fontSize = "1.3rem"; // un peu plus gros
        timerDiv.style.fontWeight = "bold";
        timerDiv.style.textShadow = "0 0 8px rgba(255,0,0,0.8)";
        timerDiv.style.animation = "pulseFinished 1s infinite"; // animation
        return;
    }
    const minutes = String(Math.floor(remaining / 60)).padStart(2, '0');
    const seconds = String(remaining % 60).padStart(2, '0');
    timerDiv.textContent = `${minutes}:${seconds}`;
    remaining--;
}


    updateTimer();
    const timerInterval = setInterval(updateTimer, 1000);
});


  // Quand un nouveau broadcaster arrive, on se re-connecte comme watcher
  // Quand un nouveau broadcaster arrive, on se re-connecte comme watcher
socket.on("broadcaster", () => {
  const payload = {
    pseudo: "{{ Auth::check() ? Auth::user()->pseudo : 'Anonyme' }}"
  };
  @if(isset($showPriveId))
    payload.showPriveId = "{{ $showPriveId }}";
  @endif
  socket.emit("watcher", payload);
});


  // Nettoyage à la fermeture ou rechargement de la page
  window.onunload = window.onbeforeunload = () => {
    socket.close();
    peerConnection.close();
  };

  
  const messageInput = document.getElementById("messageInput");
  const messagesDiv = document.getElementById("messages");

  function sendMessage(e) {
    e.preventDefault();
    const msg = messageInput.value.trim();
    if (!msg.length) return;

    socket.emit("chat-message", {
        pseudo: "{{ Auth::check() ? Auth::user()->pseudo : 'Anonyme' }}",
        message: msg,
        showPriveId: "{{ $showPriveId ?? '' }}"
    });

    messageInput.value = '';
}


const colorsMap = {};

const presetColors = [
  "#FF4081", // rose flashy
  "#00E676", // vert néon
  "#448AFF", // bleu clair
  "#FFD740", // jaune lumineux
  "#FF6D00"  // orange vif
];

function getRandomColorFromSet() {
  const index = Math.floor(Math.random() * presetColors.length);
  return presetColors[index];
}


socket.on("chat-message", data => {
    if (!colorsMap[data.pseudo]) {
        colorsMap[data.pseudo] = getRandomColorFromSet();
    }
    const pseudoColor = colorsMap[data.pseudo];

    let displayName = data.pseudo;
    if (data.pseudo === "{{ $modele->prenom ?? '' }}") {
        displayName = "{{ $modele->nom }} {{ $modele->prenom }}";
    }

    const bubble = document.createElement("div");
    bubble.className = 'chat-bubble';
    bubble.style.color = pseudoColor;

    bubble.innerHTML = `<strong>${displayName}</strong> : ${data.message}`;
    messagesDiv.appendChild(bubble);
    messagesDiv.scrollTop = messagesDiv.scrollHeight;
        if (soundMessage) soundMessage.play().catch(() => {});

});



document.getElementById("fullscreenBtn").addEventListener("click", () => {
    if (document.fullscreenElement || document.webkitFullscreenElement) {
        if (document.exitFullscreen) document.exitFullscreen();
        else if (document.webkitExitFullscreen) document.webkitExitFullscreen();
    } else {
        const container = document.getElementById("videoContainer");
        if (container.requestFullscreen) container.requestFullscreen();
        else if (container.webkitRequestFullscreen) container.webkitRequestFullscreen();
    }
});


// 🎧 Gestion de l'activation audio par clic sur l'overlay
const overlay = document.getElementById("startOverlay");

overlay.addEventListener("click", () => {
  overlay.style.display = "none"; // on cache l'overlay
  video.muted = false;            // on active le son
  video.play().catch(err => {
    console.warn("Erreur lecture vidéo :", err);
  });
});

</script>

<script>
// ✅ 1. Masquer le contenu quand l'onglet est inactif
document.addEventListener("visibilitychange", () => {
    if (document.hidden) {
        document.body.style.display = "none";
    } else {
        document.body.style.display = "block";
    }
});

// ✅ 2. Flouter le contenu quand la fenêtre perd le focus
window.addEventListener("blur", () => {
    document.body.style.filter = "blur(10px)";
});
window.addEventListener("focus", () => {
    document.body.style.filter = "none";
});

// ✅ 3. Bloquer PrintScreen (tentative)
document.addEventListener("keydown", (e) => {
    if (e.key === "PrintScreen") {
        navigator.clipboard.writeText("Capture désactivée");
        alert("La capture d’écran est désactivée !");
        e.preventDefault();
    }
});

// ✅ 4. Empêcher les raccourcis clavier sensibles
document.addEventListener("keydown", (e) => {
    const forbiddenCombos = [
        (e.ctrlKey && e.key.toLowerCase() === 'u'), // Ctrl+U (afficher code source)
        (e.ctrlKey && e.key.toLowerCase() === 's'), // Ctrl+S (sauvegarder)
        (e.ctrlKey && e.key.toLowerCase() === 'c'), // Ctrl+C (copier)
        (e.key === 'F12') // Ouvrir les dev tools
    ];

    if (forbiddenCombos.some(Boolean)) {
        e.preventDefault();
        alert("Cette action est désactivée.");
    }
});
</script>
<x-private-live-popup />

</body>
</html>

<div id="watermark">
  Utilisateur : {{ Auth::check() ? Auth::user()->pseudo : 'Anonyme' }}
</div>

<style>
#watermark {
  position: fixed;
  bottom: 10px;
  right: 10px;
  opacity: 0.3;
  font-size: 12px;
  color: white;
  pointer-events: none;
  z-index: 9999;
}
</style>
<script>
(function(){
    const defaultBtn = document.getElementById('defaultTokensBtn');
    const modelBtn = document.getElementById('modelTokensBtn');
    const defaultMenu = document.getElementById('defaultTokenMenu') || null;
const modelMenu = document.getElementById('modelTokenMenu') || null;
const modelSurpriseTokensBtn = document.getElementById('modelSurpriseTokensBtn') || null;
const modelSurpriseTokenMenu = document.getElementById('modelSurpriseTokenMenu') || null;

const videoContainer = document.getElementById('videoContainer');

   function toggleMenu(menu) {
    [defaultMenu, modelMenu, modelSurpriseTokenMenu].forEach(m => {
        if (m === menu) {
            if (m) m.style.display = (m.style.display === 'flex') ? 'none' : 'flex';
        } else {
            if (m) m.style.display = 'none';
        }
    });
}


    defaultBtn?.addEventListener('click', (e) => { e.stopPropagation(); toggleMenu(defaultMenu); });
    modelBtn?.addEventListener('click', (e) => { e.stopPropagation(); toggleMenu(modelMenu); });
modelSurpriseTokensBtn?.addEventListener('click', (e) => { 
    e.stopPropagation(); 
    toggleMenu(modelSurpriseTokenMenu); 
});

    document.addEventListener('click', () => {
    [defaultMenu, modelMenu, modelSurpriseTokenMenu].forEach(m => {
        if (m) m.style.display = 'none';
    });
});


    function createTokenBubble(name, cost, isGolden) {
        const bubble = document.createElement('div');
        bubble.className = 'token-bubble' + (isGolden ? ' golden' : '');
        bubble.innerText = `${name} — ${cost} ${isGolden ? '✨' : '💠'}`;
        const pct = 10 + Math.random() * 80;
        bubble.style.left = pct + '%';
        videoContainer.appendChild(bubble);
        setTimeout(() => bubble.remove(), 2300);
    }
    
document.querySelectorAll('#modelSurpriseTokenMenu .token-item').forEach(item => {
    item.addEventListener('click', () => {
        const cost = parseInt(item.getAttribute('data-cost'));
        const emoji = item.querySelector('.token-emoji').textContent;
        const modeleId = {{ $modele->id }};
        const pseudo = "{{ Auth::check() ? Auth::user()->pseudo : 'Anonyme' }}";

        fetch("{{ route('use.surprise') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ cost, modele_id: modeleId })
        })
        .then(res => res.json())
        .then(data => {
            if (data.error) {
                alert(data.error);
                return;
            }

            // Bulle locale
            createTokenBubble(`Surprise ${emoji}`, cost, false);

            // Événement temps réel
            socket.emit("surprise-sent", {
                emoji: emoji,
                cost: cost,
                pseudo: pseudo,
                showPriveId: "{{ $showPriveId ?? '' }}"

            });

            // MAJ solde utilisateur
            const soldeElem = document.getElementById("userJetons");
            if (soldeElem) soldeElem.innerText = data.new_balance;
        })
        .catch(err => console.error(err));
    });
        if (soundSurprise) soundSurprise.play().catch(() => {});

});
    function onTokenChoiceClick(e, isGolden) {
    const btn = e.currentTarget;
    const name = btn.dataset.name || 'Jeton';
    const cost = parseInt(btn.dataset.cost || '0');
    const description = btn.dataset.description || '';
    const modeleId = {{ $modele->id }};
    const pseudo = "{{ Auth::check() ? Auth::user()->pseudo : 'Anonyme' }}";

    fetch("{{ route('use.jeton') }}", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ name, cost, modele_id: modeleId })
    })
    .then(res => res.json())
    .then(data => {
        if (data.error) {
            alert(data.error);
            return;
        }

        // bulle locale
        createTokenBubble(data.name, data.cost, isGolden);

        // ✅ inclure pseudo + description
        if (typeof socket !== 'undefined') {
           // Juste avant socket.emit("jeton-sent", ...), ajoutez :
console.log("Envoi jeton-sent:", {
    name: data.name,
    cost: data.cost,
    description: description,
    pseudo: pseudo,
    isGolden: isGolden
});

socket.emit("jeton-sent", {
    name: data.name,
    cost: data.cost,
    description: description,
    pseudo: pseudo,
    isGolden: isGolden,
    showPriveId: "{{ $showPriveId ?? '' }}"
});
        }

        const soldeElem = document.getElementById("userJetons");
        if (soldeElem) soldeElem.innerText = data.new_balance;
    })
    .catch(err => console.error(err));
}



    document.querySelectorAll('#defaultTokenMenu .token-choice').forEach(btn => {
        btn.addEventListener('click', (e) => onTokenChoiceClick(e, false));
    });
    document.querySelectorAll('#modelTokenMenu .token-choice').forEach(btn => {
        btn.addEventListener('click', (e) => onTokenChoiceClick(e, true));
    });

    document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
        [defaultMenu, modelMenu, modelSurpriseTokenMenu].forEach(m => {
            if (m) m.style.display = 'none';
        });
    }
});


    if (typeof socket !== 'undefined') {
    socket.on("jeton-sent", (data) => {
        const message = `Jetons - ${data.pseudo || ''} - ${data.description || ''}`;
        createTokenBubble(message, data.cost, data.isGolden);
            if (soundMessage) soundMessage.play().catch(() => {});

    });
}

})();
// Écoute le clic sur chaque surprise
document.getElementById("backBtn").addEventListener("click", function() {
    // Retourne à la page précédente
    window.history.back();
});

</script>