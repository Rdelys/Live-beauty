<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Live de {{ $modele->prenom }}</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
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
  background: none;
  padding: 0;
  border-radius: 0;
  color: white;
  font-size: 0.95rem;
  font-weight: 400;
  text-shadow: 1px 1px 3px rgba(0,0,0,0.8); /* pour bonne lisibilité sur fond vidéo */
  pointer-events: none;
}



/*@keyframes fadeOut {
  0% { opacity: 1; transform: translateY(0); }
  90% { opacity: 1; }
  100% { opacity: 0; transform: translateY(-20px); }
}

/* Chat Form */
#chatForm {
  position: absolute;
  bottom: 10px;
  left: 50%;
  transform: translateX(-50%);
  width: 90%;
  max-width: 600px;
  z-index: 1000;
  background-color: rgba(0,0,0,0.5);
  padding: 10px;
  border-radius: 12px;
  display: flex;
  gap: 10px;
  backdrop-filter: blur(6px);
}
#chatForm input {
  flex: 1;
  border: none;
  border-radius: 8px;
  padding: 8px;
  background-color: rgba(255,255,255,0.1);
  color: #fff;
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
  flex-direction: column; /* ✅ icônes verticales */
  gap: 8px;
  z-index: 1100;
  align-items: center;
  pointer-events: auto;
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

  </style>
</head>
<body>
  <div class="container-live">

    <!-- LIVE Section -->
    <div class="left-live">
      <h2>{{ $modele->prenom }} est en Live 🎥</h2>
      <div class="badge-live">🔴 EN DIRECT</div>
      <button id="fullscreenBtn" class="btn btn-secondary mt-2">🖥️ Plein écran</button>

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
  <div class="chat-wrapper" id="messages"></div>
<!-- ICONES JETONS (INSÉRER DANS #videoContainer, après <video>) -->
  @auth
<div class="video-top-icons" aria-hidden="false">
  <!-- Default tokens icon -->
  <button id="defaultTokensBtn" class="token-icon" title="Jetons standards" type="button">
    💠
  </button>

  <!-- Model personal tokens icon (gold) -->
  <button id="modelTokensBtn" class="token-icon golden-icon" title="Actions du modèle" type="button">
    ✨
  </button>

  <!-- Menus (remplis via Blade) -->
  <div id="defaultTokenMenu" class="token-menu" aria-hidden="true">
    <div class="menu-title">Jetons standards</div>
    @php $jetonsGlobaux = $jetons->whereNull('modele_id'); @endphp
    @foreach($jetonsGlobaux as $jeton)
      <button class="token-choice" data-name="{{ $jeton->nom }}" data-cost="{{ $jeton->nombre_de_jetons }}">
        {{ $jeton->nom }} — {{ $jeton->nombre_de_jetons }} 💠
      </button>
    @endforeach
  </div>

  <div id="modelTokenMenu" class="token-menu" aria-hidden="true">
    <div class="menu-title">Actions de {{ $modele->prenom }}</div>
    @php $jetonsPerso = $jetons->where('modele_id', $modele->id); @endphp
    @foreach($jetonsPerso as $jeton)
      <button class="token-choice" data-name="{{ $jeton->nom }}" data-cost="{{ $jeton->nombre_de_jetons }}">
        {{ $jeton->nom }} — {{ $jeton->nombre_de_jetons }} ✨
      </button>
    @endforeach
  </div>
</div>
@endauth


  @auth
    @if(Auth::user()->role != 'modele') {{-- modèle ne peut pas envoyer --}}
    <form id="chatForm" class="d-flex" onsubmit="sendMessage(event)">
      <input type="text" id="messageInput" class="form-control me-2" placeholder="Tape ton message..." required>
      <button type="submit" class="btn btn-danger">Envoyer</button>
    </form>
    @endif
  @endauth
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

  <script src="https://cdn.socket.io/4.7.2/socket.io.min.js"></script>
<script>
  const socket = io("https://livebeautyofficial.com/", {path: '/socket.io', transports: ["websocket"] });
  const video = document.getElementById("liveVideo");
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

  // Quand la connexion WebSocket est prête, on s'identifie comme watcher
  socket.on("connect", () => {
    socket.emit("watcher");
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

  // Quand un nouveau broadcaster arrive, on se re-connecte comme watcher
  socket.on("broadcaster", () => {
    socket.emit("watcher");
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
    if (msg.length === 0) return;
    socket.emit("chat-message", {
      pseudo: "{{ Auth::check() ? Auth::user()->pseudo : 'Anonyme' }}",
      message: msg
    });
    messageInput.value = '';
  }

const colorsMap = {};

function getRandomColor() {
  const letters = '0123456789ABCDEF';
  let color = '#';
  for (let i = 0; i < 6; i++) color += letters[Math.floor(Math.random() * 16)];
  return color;
}

socket.on("chat-message", data => {
    if (!colorsMap[data.pseudo]) {
        colorsMap[data.pseudo] = getRandomColor();
    }
    const bubble = document.createElement("div");
    bubble.className = 'chat-bubble';
    bubble.style.color = colorsMap[data.pseudo] || '#fff';

    let displayName = data.pseudo;
    if (data.pseudo === "{{ $modele->prenom ?? '' }}") {
        displayName = "{{ $modele->nom }} {{ $modele->prenom }}";
    }

    bubble.innerHTML = `<strong>${displayName}</strong> : ${data.message}`;
    messagesDiv.appendChild(bubble);
    messagesDiv.scrollTop = messagesDiv.scrollHeight;
});


document.getElementById("fullscreenBtn").addEventListener("click", () => {
  const container = document.getElementById("videoContainer");
  if (container.requestFullscreen) {
    container.requestFullscreen();
  } else if (container.webkitRequestFullscreen) {
    container.webkitRequestFullscreen();
  } else if (container.msRequestFullscreen) {
    container.msRequestFullscreen();
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
    // éléments
    const defaultBtn = document.getElementById('defaultTokensBtn');
    const modelBtn = document.getElementById('modelTokensBtn');
    const defaultMenu = document.getElementById('defaultTokenMenu');
    const modelMenu = document.getElementById('modelTokenMenu');
    const videoContainer = document.getElementById('videoContainer');

    // bascule menu (ferme les autres)
    function toggleMenu(menu) {
      [defaultMenu, modelMenu].forEach(m => {
        if (m === menu) m.style.display = (m.style.display === 'flex') ? 'none' : 'flex';
        else m.style.display = 'none';
      });
    }

    defaultBtn?.addEventListener('click', (e) => { e.stopPropagation(); toggleMenu(defaultMenu); });
    modelBtn?.addEventListener('click', (e) => { e.stopPropagation(); toggleMenu(modelMenu); });

    // fermer menus si clic en dehors
    document.addEventListener('click', () => {
      [defaultMenu, modelMenu].forEach(m => m.style.display = 'none');
    });

    // création bulle token
    function createTokenBubble(name, cost, isGolden) {
      const bubble = document.createElement('div');
      bubble.className = 'token-bubble' + (isGolden ? ' golden' : '');
      bubble.innerText = `${name} — ${cost} ${isGolden ? '✨' : '💠'}`;

      // position aléatoire horizontale (entre 10% et 90% du conteneur)
      const pct = 10 + Math.random() * 80;
      bubble.style.left = pct + '%';

      // insérer dans videoContainer
      videoContainer.appendChild(bubble);

      // suppression après animation
      setTimeout(() => {
        bubble.remove();
      }, 2300);
    }

    // quand on clique sur un choix de token
    function onTokenChoiceClick(e, isGolden) {
      const btn = e.currentTarget;
      const name = btn.dataset.name || 'Jeton';
      const cost = btn.dataset.cost || '0';
      createTokenBubble(name, cost, isGolden);

      // fermer menu si tu veux
      [defaultMenu, modelMenu].forEach(m => m.style.display = 'none');

      // ici tu peux aussi émettre socket.io ou appeler une route ajax
      // ex: socket.emit('jeton-sent', { name, cost, modeleId: {{ $modele->id }} });
    }

    // attacher listeners aux boutons générés
    document.querySelectorAll('#defaultTokenMenu .token-choice').forEach(btn => {
      btn.addEventListener('click', (e) => onTokenChoiceClick(e, false));
    });
    document.querySelectorAll('#modelTokenMenu .token-choice').forEach(btn => {
      btn.addEventListener('click', (e) => onTokenChoiceClick(e, true));
    });

    // accessibility : fermer menu avec echap
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape') [defaultMenu, modelMenu].forEach(m => m.style.display = 'none');
    });

  })();
</script>
