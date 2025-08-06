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

    <!-- Jetons Section -->
    <div class="right-jetons">
      <h4 class="mb-4">💎 Choisis ton action avec des jetons</h4>
      @php
  $jetonsPerso = $jetons->where('modele_id', $modele->id);
  $jetonsGlobaux = $jetons->whereNull('modele_id');
@endphp

<!-- Jetons personnalisés du modèle -->
@if($jetonsPerso->count())
  <h5 class="text-white">🎯 Actions personnalisées par {{ $modele->prenom }}</h5>
  @foreach($jetonsPerso as $jeton)
    <div class="jeton-card">
      <div class="jeton-info">
        <span class="jeton-name">{{ $jeton->nom }}</span>
        <span class="jeton-desc">{{ $jeton->description }}</span>
      </div>
      <button class="jeton-btn"
        {{ !$modele->en_ligne || !Auth::check() ? 'disabled' : '' }}>
        {{ $jeton->nombre_de_jetons }} jetons
      </button>
    </div>
  @endforeach
@endif

<!-- Jetons globaux disponibles -->
@if($jetonsGlobaux->count())
  <h5 class="text-white mt-4">✨ Jetons standards disponibles</h5>
  @foreach($jetonsGlobaux as $jeton)
    <div class="jeton-card">
      <div class="jeton-info">
        <span class="jeton-name">{{ $jeton->nom }}</span>
        <span class="jeton-desc">{{ $jeton->description }}</span>
      </div>
      <button class="jeton-btn"
        {{ !$modele->en_ligne || !Auth::check() ? 'disabled' : '' }}>
💠 {{ $jeton->nombre_de_jetons }} jetons requis
      </button>
    </div>
  @endforeach
@endif

@if(!Auth::check())
  <div class="text-warning mt-2 small">🔒 Connecte-toi pour utiliser des jetons.</div>
@endif


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
  // Ne plus faire disparaître le message
// Et plus de background
bubble.className = 'chat-bubble';
bubble.style.color = colorsMap[data.pseudo] || '#fff';
bubble.innerHTML = `<strong>${data.pseudo}</strong> : ${data.message}`;

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
