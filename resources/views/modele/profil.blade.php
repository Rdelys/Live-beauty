<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Profil Modèle</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
  background: linear-gradient(135deg, #1e1e2f, #2d2e45);
  color: #fff;
  font-family: 'Poppins', sans-serif;
  min-height: 100vh;
  margin: 0;
  padding: 0;
  overflow-x: hidden;
}

.container {
  max-width: 860px;
  margin: auto;
  padding: 2rem 1rem;
  animation: fadeIn 0.6s ease-in-out;
}

h2, h4, h5 {
  font-weight: 600;
}

.alert {
  border-radius: 10px;
  padding: 1rem;
}

.nav-tabs {
  border: none;
  justify-content: center;
  margin-top: 2rem;
  flex-wrap: wrap;
}

.nav-tabs .nav-link {
  border: none;
  border-radius: 50px;
  padding: 0.6rem 1.5rem;
  margin: 0.3rem;
  font-weight: 500;
  background-color: rgba(255, 255, 255, 0.1);
  color: #fff;
  transition: all 0.3s ease-in-out;
}

.nav-tabs .nav-link.active {
  background-color: #f44336;
  color: #fff;
  box-shadow: 0 4px 12px rgba(244, 67, 54, 0.3);
}

.tab-content {
  background-color: rgba(255, 255, 255, 0.05);
  backdrop-filter: blur(10px);
  padding: 2rem;
  border-radius: 15px;
  margin-top: 1.5rem;
  box-shadow: 0 4px 15px rgba(0,0,0,0.2);
  animation: fadeIn 0.5s ease;
}

.tab-pane p {
  margin-bottom: 0.8rem;
}

.btn-logout {
  background-color: #f44336;
  border: none;
  color: white;
  font-weight: 600;
  padding: 0.7rem 1.5rem;
  border-radius: 50px;
  transition: background-color 0.3s ease;
}

.btn-logout:hover {
  background-color: #d32f2f;
}

.btn-danger,
.btn-secondary,
.btn-success {
  border-radius: 50px;
  padding: 0.6rem 1.2rem;
  font-weight: 500;
  transition: all 0.3s ease;
}

.btn-danger:hover {
  background-color: #c62828;
}

.btn-secondary:hover {
  background-color: #6c757d;
}

.btn-success:hover {
  background-color: #218838;
}

/* VIDEO */
video#liveVideo {
  max-height: 400px;
  border-radius: 12px;
  border: 2px solid #ccc;
  background-color: #000;
}

/* CARDS */
.card {
  border-radius: 15px;
  border: none;
  background-color: #2c2f45;
}

.card-title {
  font-weight: 600;
  color: #f44336;
}

.form-control {
  background-color: #2e3048;
  border: 1px solid #444;
  color: #fff;
  border-radius: 0.5rem;
}

.form-control:focus {
  background-color: #34354f;
  border-color: #f44336;
  box-shadow: 0 0 0 0.2rem rgba(244, 67, 54, 0.25);
  color: #fff;
}

label {
  margin-bottom: 0.5rem;
  font-weight: 500;
}

.list-group-item {
  border-color: #3d3f5a;
  background: transparent;
}

.badge.bg-info {
  font-size: 0.85rem;
}

/* ANIMATIONS */
@keyframes fadeIn {
  from {
    opacity: 0;
    transform: translateY(15px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

/* RESPONSIVE */
@media (max-width: 576px) {
  .nav-tabs .nav-link {
    padding: 0.4rem 0.8rem;
    font-size: 0.85rem;
  }

  .tab-content {
    padding: 1.5rem 1rem;
  }

  .btn,
  .form-control {
    font-size: 0.9rem;
  }

  video#liveVideo {
    max-height: 300px;
  }

  .card-title {
    font-size: 1rem;
  }
}
.chat-wrapper {
  position: absolute;
  bottom: 85px;
  left: 10px;
  right: 10px;
  max-height: 160px;
  overflow-y: auto;
  display: flex;
  flex-direction: column;
  padding: 5px 10px;
  z-index: 999;
  pointer-events: none;
  -webkit-mask-image: linear-gradient(to bottom, transparent, black 20%, black 80%, transparent);
  mask-image: linear-gradient(to bottom, transparent, black 20%, black 80%, transparent);
  scrollbar-width: none; /* Firefox */
}
.chat-wrapper::-webkit-scrollbar {
  display: none; /* Chrome/Safari */
}

.chat-bubble {
  background: transparent !important;
  border: none;
  box-shadow: none;
  padding: 2px 6px;
  font-size: 13.5px;
  color: white;
  margin-bottom: 4px;
  width: fit-content;
  max-width: 90%;
  line-height: 1.4;
  word-break: break-word;
  pointer-events: auto;
  animation: fadeIn 0.3s ease-in-out;
}

@keyframes fadeIn {
  from {
    opacity: 0;
    transform: translateY(5px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}



/*@keyframes fadeOut {
  0% { opacity: 1; transform: translateY(0); }
  80% { opacity: 1; }
  100% { opacity: 0; transform: translateY(-10px); }
}
/* MESSAGES - responsive */
.chat-wrapper {
  max-width: 100%;
}

.chat-bubble {
  max-width: 90%;
  font-size: 0.95rem;
}

/* Extra responsive chat-bubbles */
@media (max-width: 768px) {
  .chat-bubble {
    font-size: 0.85rem;
    padding: 5px 10px;
  }
}

@media (max-width: 480px) {
  .chat-bubble {
    font-size: 0.8rem;
    max-width: 95%;
  }
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
  </style>
</head>
<body>

<div class="container text-center">
    @if(session('success'))
  <div class="alert alert-success">
      {{ session('success') }}
  </div>
  @endif

  @if($errors->any())
  <div class="alert alert-danger">
      {{ $errors->first() }}
  </div>
  @endif

  <h2 class="text-danger">Bonjour, {{ $modele->prenom }}</h2>

  <ul class="nav nav-tabs" id="profilTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="profil-tab" data-bs-toggle="tab" data-bs-target="#profil" type="button" role="tab">Profil</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="workspace-tab" data-bs-toggle="tab" data-bs-target="#workspace" type="button" role="tab">WorkSpace</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="jetons-tab" data-bs-toggle="tab" data-bs-target="#jetons" type="button" role="tab">Jetons</button>
  </li>
  <li class="nav-item" role="presentation">
  <button class="nav-link" id="photos-tab" data-bs-toggle="tab" data-bs-target="#photos" type="button" role="tab">Photos</button>
</li>
<li class="nav-item" role="presentation">
  <button class="nav-link" id="videos-tab" data-bs-toggle="tab" data-bs-target="#videos" type="button" role="tab">Vidéos</button>
</li>


</ul>


<div class="tab-content" id="profilTabContent">
  <div class="tab-pane fade show active text-start" id="profil" role="tabpanel">
    <p><strong>Nom :</strong> {{ $modele->nom }}</p>
    <p><strong>Email :</strong> {{ $modele->email }}</p>
    <p><strong>Description :</strong> {{ $modele->description }}</p>
  </div>

  <div class="tab-pane fade text-start" id="workspace" role="tabpanel">
    <h5 class="text-white mb-3">🎥 Lancer une session Live Sexy Cam</h5>
    <button class="btn btn-danger mb-2" id="startLiveBtn">Démarrer le Live</button>
    <button class="btn btn-secondary mb-2" id="stopLiveBtn" style="display: none;">Arrêter le Live</button>

    <div id="liveSection" style="display: none;">
        <video id="liveVideo" autoplay muted playsinline class="w-100 rounded border border-light" style="max-height: 400px;"></video>
        
        <!-- Ajoutez cette section pour les viewers -->
        <div class="card bg-dark text-white mt-3">
            <div class="card-body">
                <h5 class="card-title">👥 Spectateurs en direct (<span id="viewersCount">0</span>)</h5>
                <div id="viewersList" class="d-flex flex-wrap gap-2">
                    <!-- Les pseudos des viewers apparaîtront ici -->
                </div>
            </div>
        </div>
        
        <div id="chat-overlay" class="mt-3" style="position: relative;">
            <div class="chat-wrapper" id="messages"></div>
            <form id="chatForm" class="d-flex mt-3" onsubmit="sendMessage(event)">
                <input type="text" id="messageInput" class="form-control me-2" placeholder="Tape ton message..." required>
                <button type="submit" class="btn btn-danger">Envoyer</button>
            </form>
        </div>
    </div>
    <p class="mt-2 text-warning">🔴 En direct - Visible par tous les utilisateurs connectés</p>
</div>

  <div class="tab-pane fade text-start" id="jetons" role="tabpanel" aria-labelledby="jetons-tab">
    <h4 class="text-white mb-3">💎 Gestion de vos jetons</h4>
    <div class="card bg-dark text-white mb-4 shadow">
      <div class="card-body">
        <h5 class="card-title">➕ Créer un jeton personnalisé</h5>
          <form action="{{ route('jetons.store') }}" method="POST">
            @csrf
            <div class="mb-3">
              <label class="form-label">Nom du jeton</label>
              <input type="text" name="nom" class="form-control" required placeholder="Ex : Jeton VIP">
            </div>
            <div class="mb-3">
              <label class="form-label">Description</label>
              <textarea name="description" class="form-control" placeholder="Ex : Jeton pour accès spécial"></textarea>
            </div>
            <div class="mb-3">
              <label class="form-label">Quantité</label>
              <input type="number" name="nombre_de_jetons" class="form-control" required placeholder="Ex : 100">
            </div>
          <button type="submit" class="btn btn-success w-100">✅ Créer le jeton</button>
          </form>
      </div>
    </div>

    <div class="card bg-dark text-white shadow">
      <div class="card-body">
        <h5 class="card-title">📦 Mes jetons</h5>
          @if($modele->jetons && count($modele->jetons) > 0)
          <ul class="list-group list-group-flush">
            @foreach($modele->jetons as $jeton)
              <li class="list-group-item bg-transparent d-flex justify-content-between align-items-start text-white border-bottom">
                <div>
                  <strong>{{ $jeton->nom }}</strong><br>
                  <small class="text-muted">{{ $jeton->description }}</small>
                </div>
                <span class="badge bg-info rounded-pill">{{ $jeton->nombre_de_jetons }}</span>
              </li>
            @endforeach
          </ul>
          @else
        <p class="text-muted mt-3">Aucun jeton créé pour le moment.</p>
      @endif
    </div>
  </div>
  
</div>
<div class="tab-pane fade text-start" id="photos" role="tabpanel" aria-labelledby="photos-tab">
  <h4 class="text-white mb-3">📸 Gestion de vos photos</h4>
@php
  $photos = is_array($modele->photos) ? $modele->photos : json_decode($modele->photos, true) ?? [];
@endphp

  {{-- Affichage des photos existantes --}}
@if($photos && count($photos))
    <div class="row">
@foreach($photos as $key => $photo)
        <div class="col-6 col-md-3 mb-4 text-center">
          <img src="{{ asset('storage/' . $photo) }}" class="img-fluid rounded mb-2 border border-light" style="height: 150px; object-fit: cover;">
          <form method="POST" action="{{ route('modele.photo.delete', $key) }}">
            @csrf
            @method('DELETE')
            <button class="btn btn-sm btn-danger">Supprimer</button>
          </form>
        </div>
      @endforeach
    </div>
  @else
    <p class="text-muted">Aucune photo enregistrée.</p>
  @endif

  {{-- Formulaire d’ajout de photos --}}
  <form action="{{ route('modele.photo.upload') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="photos" class="form-label">Ajouter des photos</label>
      <input type="file" name="photos[]" id="photos" class="form-control" multiple accept="image/*" onchange="previewImages(event)">
    </div>
    <div id="preview" class="d-flex flex-wrap gap-2 mb-3"></div>
    <button type="submit" class="btn btn-success">Ajouter les photos</button>
  </form>
</div>
<div class="tab-pane fade text-start" id="videos" role="tabpanel">
  <h4 class="text-white mb-3">🎬 Gestion de vos vidéos</h4>

  {{-- Liens --}}
  @if(!empty($modele->video_link))
    @foreach($modele->video_link as $link)
      <div class="mb-3 ratio ratio-16x9">
        <iframe src="{{ $link }}" frameborder="0" allowfullscreen></iframe>
      </div>
    @endforeach
  @endif

  {{-- Fichiers --}}
  @if(!empty($modele->video_file))
    <div class="row">
      @foreach($modele->video_file as $file)
        <div class="col-md-6 mb-4">
          <video controls class="w-100 rounded border border-light">
            <source src="{{ asset('storage/' . $file) }}" type="video/mp4">
          </video>
        </div>
      @endforeach
    </div>
  @endif

  {{-- Formulaire --}}
<form action="{{ route('modele.video.upload', $modele->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label class="form-label">Ajouter des liens vidéos</label>
      <input type="url" name="video_link[]" class="form-control mb-2">
      <input type="url" name="video_link[]" class="form-control mb-2">
    </div>
    <div class="mb-3">
      <label class="form-label">Ajouter des fichiers vidéos</label>
      <input type="file" name="video_file[]" class="form-control" multiple accept="video/*">
    </div>
    <button type="submit" class="btn btn-success">Ajouter</button>
  </form>
</div>


</div>

    <form action="{{ route('modele.logout') }}" method="POST" class="mt-4">
      @csrf
      <button type="submit" class="btn btn-logout">Déconnexion</button>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.socket.io/4.7.2/socket.io.min.js"></script>
<script>
/* === RÉFÉRENCES DOM === */
const startBtn     = document.getElementById('startLiveBtn');
const stopBtn      = document.getElementById('stopLiveBtn');
const liveVideo    = document.getElementById('liveVideo');
const liveSection  = document.getElementById('liveSection');
const messagesDiv  = document.getElementById("messages");

/* === VARIABLES GLOBALES === */
let socket;
let stream;
const peerConnections = {};

/* === CONNEXION SOCKET.IO (unique) === */
socket = io("https://livebeautyofficial.com/", {
    path: '/socket.io',
    transports: ['websocket']
});

// Indicateur "en train d'écrire"
let typingTimeout;
const messageInput = document.getElementById("messageInput");

messageInput.addEventListener('keydown', function() {
    if (socket) {
        socket.emit("typing", {
            pseudo: "{{ $modele->prenom ?? 'Modèle' }}",
            isModel: true
        });
    }
    
    clearTimeout(typingTimeout);
    typingTimeout = setTimeout(() => {
        if (socket) {
            socket.emit("stopTyping");
        }
    }, 1000);
});

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

// Gestion des viewers
let viewers = {};

socket.on("viewer-connected", (data) => {
    console.log("Viewer connected:", data);
    viewers[data.socketId] = data.pseudo;
    updateViewersDisplay();
});

socket.on("viewer-disconnected", (socketId) => {
    console.log("Viewer disconnected:", socketId);
    delete viewers[socketId];
    updateViewersDisplay();
});

socket.on("current-viewers", (currentViewers) => {
    console.log("Current viewers received:", currentViewers);
    viewers = currentViewers;
    updateViewersDisplay();
});

function updateViewersDisplay() {
    const viewersList = document.getElementById("viewersList");
    const viewersCount = document.getElementById("viewersCount");
    
    viewersList.innerHTML = '';
    viewersCount.textContent = Object.keys(viewers).length;
    
    // Trier les pseudos par ordre alphabétique
    const sortedPseudos = Object.values(viewers).sort((a, b) => a.localeCompare(b));
    
    sortedPseudos.forEach(pseudo => {
        const viewerElement = document.createElement("span");
        viewerElement.className = "badge bg-primary me-1 mb-1";
        viewerElement.textContent = pseudo;
        viewersList.appendChild(viewerElement);
    });
}
/* === AFFICHAGE BULLE JETON === */
function createTokenBubble(text, cost, isGolden) {
    const bubble = document.createElement('div');
    bubble.className = 'token-bubble' + (isGolden ? ' golden' : '');
    bubble.innerText = `${text} — ${cost} ${isGolden ? '✨' : '💠'}`;
    bubble.style.position = 'absolute';
    bubble.style.bottom = '20px';
    bubble.style.left = (10 + Math.random() * 80) + '%';
    bubble.style.color = '#fff';
    bubble.style.fontSize = '16px';
    bubble.style.fontWeight = 'bold';
    bubble.style.animation = 'fadeIn 0.5s ease, fadeOut 2s ease 0.5s forwards';
    const container = liveVideo?.parentElement || document.body;
    container.appendChild(bubble);
    setTimeout(() => bubble.remove(), 2500);
}


socket.on("jeton-sent", (data) => {
    console.log("Données reçues (jeton-sent):", data); // Debug 1
    
    const pseudo = data.pseudo || 'Anonyme';
    const description = data.description || 'Pas de description';
    const cost = data.cost || 0;
    const isGolden = data.isGolden || false;

    console.log("Variables extraites:", { pseudo, description, cost, isGolden }); // Debug 2

    const chatWrapper = document.querySelector(".chat-wrapper");
    if (chatWrapper) {
        const bubble = document.createElement('div');
        bubble.classList.add("chat-bubble");
        bubble.innerHTML = `💎 <strong>${pseudo}</strong>: ${description} (${cost} jetons)`;
        chatWrapper.appendChild(bubble);
        chatWrapper.scrollTop = chatWrapper.scrollHeight;
    }

    createTokenBubble(description, cost, isGolden);
});



socket.on("chat-message", (data) => {
    const chatWrapper = document.querySelector(".chat-wrapper");
    if (chatWrapper) {
        const bubble = document.createElement("div");
        bubble.classList.add("chat-bubble");
        bubble.innerHTML = `<strong>${data.pseudo}</strong> : ${data.message}`;
        chatWrapper.appendChild(bubble);
        chatWrapper.scrollTop = chatWrapper.scrollHeight;
    }
});

/* === LANCER LE LIVE === */
startBtn.addEventListener('click', async () => {
    try {
        // Caméra + micro
        stream = await navigator.mediaDevices.getUserMedia({ video: true, audio: true });
        liveVideo.srcObject = stream;
        liveSection.style.display = 'block';
        startBtn.style.display = 'none';
        stopBtn.style.display = 'inline-block';

        // Informer serveur qu'on est le broadcaster
        socket.emit("broadcaster");
        socket.emit("request-viewers");

        // Gestion des watchers
        socket.on("watcher", id => {
            const pc = new RTCPeerConnection({
                iceServers: [
                    { urls: "stun:stun.l.google.com:19302" },
                    {
                        urls: "turn:livebeautyofficial.com:3478",
                        username: "webrtc",
                        credential: "password123"
                    }
                ]
            });

            peerConnections[id] = pc;
            stream.getTracks().forEach(track => pc.addTrack(track, stream));

            pc.onicecandidate = event => {
                if (event.candidate) {
                    socket.emit("candidate", id, event.candidate);
                }
            };

            pc.createOffer()
              .then(offer => pc.setLocalDescription(offer))
              .then(() => {
                  socket.emit("offer", id, pc.localDescription);
              });
        });

        socket.on("answer", (id, description) => {
            peerConnections[id].setRemoteDescription(description);
        });

        socket.on("candidate", (id, candidate) => {
            peerConnections[id].addIceCandidate(new RTCIceCandidate(candidate));
        });

        socket.on("disconnectPeer", id => {
            if (peerConnections[id]) {
                peerConnections[id].close();
                delete peerConnections[id];
            }
        });

        // Notifier Laravel
        await fetch('/api/live/start', {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        });

    } catch (error) {
        alert("Erreur caméra : " + error.message);
    }
});

/* === ARRÊTER LE LIVE === */
stopBtn.addEventListener('click', async () => {
    if (stream) {
        stream.getTracks().forEach(track => track.stop());
    }

    for (let id in peerConnections) {
        peerConnections[id].close();
        delete peerConnections[id];
    }

    if (socket) socket.disconnect();

    liveVideo.srcObject = null;
    liveSection.style.display = 'none';
    startBtn.style.display = 'inline-block';
    stopBtn.style.display = 'none';

    await fetch('/api/live/stop', {
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    });

    console.log("Live arrêté.");
});

/* === ENVOI MESSAGE CHAT === */
function sendMessage(e) {
    e.preventDefault();
    const msg = document.getElementById("messageInput").value.trim();
    if (!msg) return;

    socket.emit("chat-message", {
        pseudo: "{{ $modele->prenom ?? 'Modèle' }}",
        message: msg
    });

    document.getElementById("messageInput").value = '';
}

/* === PREVIEW IMAGES === */
function previewImages(event) {
    const preview = document.getElementById('preview');
    preview.innerHTML = '';

    const files = event.target.files;
    for (let i = 0; i < files.length; i++) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const img = document.createElement('img');
            img.src = e.target.result;
            img.className = 'rounded border border-light';
            img.style.height = '100px';
            img.style.marginRight = '10px';
            preview.appendChild(img);
        };
        reader.readAsDataURL(files[i]);
    }
}
</script>





</body>
</html>
