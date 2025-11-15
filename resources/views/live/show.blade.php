<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Live de {{ $modele->prenom }}</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.socket.io/4.7.2/socket.io.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <audio id="soundMessage" src="{{ asset('sounds/notificationAction.mp3') }}" preload="auto"></audio>
  <audio id="soundSurprise" src="{{ asset('sounds/cadeau.mp3') }}" preload="auto"></audio>

<meta name="csrf-token" content="{{ csrf_token() }}">

  <style>
    #clientCamControls {
  margin-top: 8px;
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 8px;
}

#clientCamControls button {
  width: 46px;
  height: 46px;
  border: none;
  border-radius: 14px;
  background: linear-gradient(135deg, rgba(255,255,255,0.1), rgba(255,255,255,0.05));
  color: rgba(255,255,255,0.85);
  font-size: 18px;
  display: flex;
  align-items: center;
  justify-content: center;
  box-shadow: 0 4px 10px rgba(0,0,0,0.3);
  backdrop-filter: blur(8px);
  cursor: pointer;
  transition: all 0.25s ease;
  position: relative;
  overflow: hidden;
}

#clientCamControls button:disabled {
  opacity: 0.5;
  cursor: not-allowed;
}

#clientCamControls button:not(:disabled):hover {
  background: linear-gradient(135deg, #ff4b2b, #ff416c);
  color: white;
  transform: scale(1.08);
  box-shadow: 0 6px 16px rgba(255,65,108,0.5);
}

#clientCamControls i {
  pointer-events: none;
}

    .fullscreen-icon {
  background: linear-gradient(135deg, #212121, #333);
  color: #e0e0e0;
  box-shadow: 0 0 15px rgba(255,255,255,0.05);
}

.fullscreen-icon:hover {
  background: linear-gradient(135deg, #444, #111);
  box-shadow: 0 0 18px rgba(255,255,255,0.15);
}
@keyframes pulseFinished {
  0%   { transform: scale(1); opacity: 1; }
  50%  { transform: scale(1.2); opacity: 0.8; }
  100% { transform: scale(1); opacity: 1; }
}

    body {
  margin: 0;
  font-family: 'Poppins', sans-serif;
  color: #fff;
  background: linear-gradient(135deg, #0b0014 0%, #22011f 35%, #3a004a 70%, #0b0014 100%);
  background-attachment: fixed;
  background-size: 400% 400%;
  animation: bgSexy 20s ease infinite;
  overflow-x: hidden;
}

@keyframes bgSexy {
  0% { background-position: 0% 50%; }
  50% { background-position: 100% 50%; }
  100% { background-position: 0% 50%; }
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
  background-color: transparent;
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
  top: 14px;
  right: 14px;
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 10px;
  z-index: 1200;
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
/* Base commune aux icônes */
.token-icon {
  width: 50px;
  height: 50px;
  border-radius: 14px;
  border: none;
  background: rgba(25,25,25,0.75);
  color: #fff;
  font-size: 22px;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  transition: all 0.25s ease;
  backdrop-filter: blur(8px);
  box-shadow:
    0 4px 14px rgba(0,0,0,0.5),
    inset 0 0 8px rgba(255,255,255,0.1);
}

/* Effet général au survol */
.token-icon:hover {
  transform: translateY(-4px) scale(1.05);
  filter: brightness(1.2);
}
.token-icon:active { transform: scale(.96); }

/* Gold style for model tokens */
.golden-icon {
  background: linear-gradient(135deg, #ffb300, #ff9800);
  color: #3a2300;
  font-weight: bold;
  box-shadow:
    0 0 15px rgba(255,193,7,0.35),
    inset 0 0 8px rgba(255,255,255,0.25);
  animation: glowGold 3s infinite ease-in-out;
}

@keyframes glowGold {
  0%, 100% { box-shadow: 0 0 15px rgba(255,193,7,0.4); }
  50% { box-shadow: 0 0 25px rgba(255,215,64,0.8); }
}

.golden-icon:hover {
  background: linear-gradient(135deg, #ffd740, #ffb300);
  transform: translateY(-4px) scale(1.1);
}

.surprise-icon {
  background: linear-gradient(135deg, #6a1b9a, #ba68c8);
  color: #fff;
  box-shadow:
    0 0 18px rgba(186,104,200,0.35),
    inset 0 0 8px rgba(255,255,255,0.25);
  animation: pulseViolet 3s infinite ease-in-out;
}

@keyframes pulseViolet {
  0%, 100% { box-shadow: 0 0 15px rgba(186,104,200,0.35); }
  50% { box-shadow: 0 0 30px rgba(186,104,200,0.7); }
}

.surprise-icon:hover {
  background: linear-gradient(135deg, #8e24aa, #ce93d8);
  transform: translateY(-4px) scale(1.1);
  box-shadow: 0 0 25px rgba(206,147,216,0.6);
}

/* === Petites animations au clic === */
.token-icon:active {
  transform: scale(0.95);
  filter: brightness(0.9);
}

/* ==== MENUS TOKENS / SURPRISES PREMIUM ==== */
.token-menu {
  position: absolute;
  top: 56px;
  right: 0;
  min-width: 240px;
  background: rgba(15, 15, 15, 0.85);
  border: 1px solid rgba(255, 255, 255, 0.08);
  border-radius: 14px;
  padding: 12px 10px;
  display: none;
  flex-direction: column;
  gap: 8px;
  z-index: 1150;
  backdrop-filter: blur(16px);
  box-shadow: 0 0 25px rgba(255, 0, 100, 0.25),
              0 0 45px rgba(255, 255, 255, 0.05);
  transform-origin: top right;
  animation: fadeInMenu 0.25s ease-out;
}

@keyframes fadeInMenu {
  from { opacity: 0; transform: scale(0.9) translateY(-8px); }
  to { opacity: 1; transform: scale(1) translateY(0); }
}


.token-menu .menu-title {
  font-size: 0.9rem;
  color: #ffbdf3;
  font-weight: 600;
  letter-spacing: 0.3px;
  padding-bottom: 6px;
  border-bottom: 1px solid rgba(255,255,255,0.05);
  text-align: center;
  text-transform: uppercase;
}

.token-choice {
  background: linear-gradient(135deg, rgba(255,255,255,0.04), rgba(255,255,255,0.02));
  border: 1px solid rgba(255,255,255,0.05);
  color: #fff;
  text-align: left;
  padding: 10px 12px;
  border-radius: 10px;
  cursor: pointer;
  transition: all 0.2s ease;
  font-weight: 500;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.token-choice:hover {
  background: linear-gradient(135deg, #ff4081, #7c4dff);
  color: #fff;
  transform: scale(1.02);
  box-shadow: 0 0 15px rgba(255,64,129,0.4);
}

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
  .video-top-icons {
    top: 10px;
    right: 10px;
    gap: 8px;
  }

  .token-icon {
    width: 42px;
    height: 42px;
    font-size: 18px;
    border-radius: 10px;
  }
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
  background: rgba(255, 255, 255, 0.05);
  border: 1px solid rgba(255, 255, 255, 0.08);
  border-radius: 12px;
  padding: 12px 8px;
  text-align: center;
  cursor: pointer;
  transition: all 0.25s ease;
  box-shadow: 0 4px 15px rgba(0,0,0,0.3);
}

.token-item:hover {
  background: linear-gradient(135deg, #ff4081, #7c4dff);
  transform: translateY(-3px) scale(1.05);
  box-shadow: 0 0 25px rgba(255,64,129,0.35);
}

.token-emoji {
  font-size: 1.9rem;
  margin-bottom: 4px;
  text-shadow: 0 2px 8px rgba(255,255,255,0.25);
}

.token-cost {
  font-size: 0.85rem;
  color: #ccc;
}

@keyframes pulseGlow {
  0%, 100% { box-shadow: 0 0 15px rgba(255,64,129,0.4); }
  50% { box-shadow: 0 0 25px rgba(255,64,129,0.7); }
}

.token-menu.open {
  display: flex !important;
  animation: fadeInMenu 0.25s ease-out forwards;
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

#localPreview {
    position: absolute;
    top: 50px; right: 1050px;
    width: 140px;
    height: 100px;
    object-fit: cover;
    border-radius: 10px;
    border: 2px solid rgba(255,255,255,0.3);
    box-shadow: 0 0 12px rgba(0,0,0,0.4);
    display: none;
    z-index: 10; /* sous les menus et boutons */
  }

  /* Boutons stylisés, verticaux sous Surprise */
  .clientCamBtn {
    background: rgba(0,0,0,0.6);
    color: #fff;
    border: 1px solid rgba(255,255,255,0.4);
    padding: 6px 12px;
    border-radius: 8px;
    font-size: 14px;
    cursor: pointer;
    transition: all 0.2s ease;
    backdrop-filter: blur(6px);
  }

  .clientCamBtn:hover:not(:disabled) {
    background: rgba(255,255,255,0.25);
    transform: translateY(-2px);
  }

  .clientCamBtn:disabled {
    opacity: 0.6;
    cursor: not-allowed;
  }

  .tooltip-text {
    display: none;
    position: absolute;
    top: -30px;
    left: 50%;
    transform: translateX(-50%);
    background: rgba(0,0,0,0.9);
    color: #fff;
    padding: 6px 10px;
    border-radius: 6px;
    font-size: 12px;
    white-space: nowrap;
  }

  .clientCamBtn:hover:disabled .tooltip-text {
    display: block;
  }

  /* ==== MODALE PREMIUM ==== */
.modal-premium {
  background: linear-gradient(135deg, #1a1a1a 0%, #2a2a2a 50%, #000000 100%);
  border-radius: 20px;
  box-shadow: 0 0 30px rgba(255, 64, 129, 0.3);
  overflow: hidden;
  position: relative;
}

.modal-premium h4 {
  font-size: 1.5rem;
  background: linear-gradient(90deg, #ff4081, #ff80ab);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}

.modal-premium .premium-icon {
  font-size: 3rem;
  animation: pulseHeart 2s infinite ease-in-out;
}

@keyframes pulseHeart {
  0%, 100% { transform: scale(1); opacity: 0.9; }
  50% { transform: scale(1.2); opacity: 1; }
}

/* Effet de glow rose doux */
.modal-premium .modal-glow {
  position: absolute;
  top: -50%;
  left: -50%;
  width: 200%;
  height: 200%;
  background: radial-gradient(circle at center, rgba(255,64,129,0.15), transparent 70%);
  z-index: 0;
  animation: rotateGlow 8s linear infinite;
}

@keyframes rotateGlow {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

/* Bouton Quitter */
.btn-premium-quit {
  background: linear-gradient(90deg, #ff4081, #f50057);
  color: #fff;
  border: none;
  border-radius: 50px;
  font-size: 1rem;
  letter-spacing: 0.5px;
  transition: all 0.25s ease;
  box-shadow: 0 0 15px rgba(255, 64, 129, 0.4);
  position: relative;
  z-index: 2;
}

.btn-premium-quit:hover {
  transform: translateY(-2px) scale(1.05);
  box-shadow: 0 0 25px rgba(255, 64, 129, 0.6);
  background: linear-gradient(90deg, #f50057, #ff80ab);
}

@keyframes pulsePause {
  0%, 100% { transform: scale(1); opacity: 1; }
  50% { transform: scale(1.1); opacity: 0.7; }
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
  @auth
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
      @endauth


  <video id="liveVideo" autoplay playsinline controls></video>
  <!-- ✅ Overlay Premium quand la vidéo est en pause -->
<div id="pauseOverlay" style="
  position: absolute;
  top: 0; left: 0; right: 0; bottom: 0;
  background: rgba(0,0,0,0.7);
  display: none;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  text-align: center;
  color: #ff4081;
  font-size: 1.8rem;
  font-weight: 600;
  z-index: 2000;
  cursor: pointer;
  backdrop-filter: blur(6px);
">
  <div style="animation: pulsePause 1.5s infinite;">
    🔒 Live en pause
  </div>
  <div style="font-size:1rem; color:#fff; margin-top:8px; opacity:0.8;">
    Touchez l’écran pour reprendre
  </div>
</div>

    @auth
     <!-- Default tokens icon -->
      <!--<button id="defaultTokensBtn" class="token-icon" title="Jetons standards" type="button">
        💠
      </button>-->

  <div class="video-top-icons" aria-hidden="false">
    <button id="fullscreenBtn" class="token-icon fullscreen-icon" title="Plein écran" type="button">
    ⛶
</button>

     
      <!-- Model personal tokens icon (gold) -->
      <button id="modelTokensBtn" class="token-icon golden-icon" title="Actions du modèle" type="button">
        ✨
      </button>

      <button id="modelSurpriseTokensBtn" class="token-icon surprise-icon" title="Surprises" type="button">
        🎁
      </button>

      <!-- === Client: Camera / Voix Buttons (sous Surprise) === -->
<!-- Inclure Font Awesome (si pas déjà présent dans ta page) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<div id="clientCamControls" style="margin-top:8px; display:flex; flex-direction:column; align-items:center; gap:8px;">

  <button id="clientCameraBtn" disabled title="Vous devez être en show privée"
    style="
      width:46px;
      height:46px;
      border:none;
      border-radius:14px;
      background:linear-gradient(135deg, rgba(255,255,255,0.1), rgba(255,255,255,0.05));
      color:rgba(255,255,255,0.85);
      font-size:18px;
      display:flex;
      align-items:center;
      justify-content:center;
      box-shadow:0 4px 10px rgba(0,0,0,0.3);
      backdrop-filter:blur(8px);
      cursor:pointer;
      transition:all 0.25s ease;
      position:relative;
      overflow:hidden;
    "
    onmouseover="if(!this.disabled){this.style.background='linear-gradient(135deg,#ff4b2b,#ff416c)';this.style.color='white';this.style.transform='scale(1.08)';this.style.boxShadow='0 6px 16px rgba(255,65,108,0.5)'}"
    onmouseout="if(!this.disabled){this.style.background='linear-gradient(135deg,rgba(255,255,255,0.1),rgba(255,255,255,0.05))';this.style.color='rgba(255,255,255,0.85)';this.style.transform='scale(1)';this.style.boxShadow='0 4px 10px rgba(0,0,0,0.3)'}"
  >
    <i class="fa-solid fa-video" style="pointer-events:none;"></i>
  </button>

  <button id="clientAudioBtn" disabled title="Vous devez être en show privée"
    style="
      width:46px;
      height:46px;
      border:none;
      border-radius:14px;
      background:linear-gradient(135deg, rgba(255,255,255,0.1), rgba(255,255,255,0.05));
      color:rgba(255,255,255,0.85);
      font-size:18px;
      display:flex;
      align-items:center;
      justify-content:center;
      box-shadow:0 4px 10px rgba(0,0,0,0.3);
      backdrop-filter:blur(8px);
      cursor:pointer;
      transition:all 0.25s ease;
      position:relative;
      overflow:hidden;
    "
    onmouseover="if(!this.disabled){this.style.background='linear-gradient(135deg,#ff4b2b,#ff416c)';this.style.color='white';this.style.transform='scale(1.08)';this.style.boxShadow='0 6px 16px rgba(255,65,108,0.5)'}"
    onmouseout="if(!this.disabled){this.style.background='linear-gradient(135deg,rgba(255,255,255,0.1),rgba(255,255,255,0.05))';this.style.color='rgba(255,255,255,0.85)';this.style.transform='scale(1)';this.style.boxShadow='0 4px 10px rgba(0,0,0,0.3)'}"
  >
    <i class="fa-solid fa-microphone" style="pointer-events:none;"></i>
  </button>

</div>


<!-- Mini preview locale (en bas à gauche du player) -->
<video id="localPreview" autoplay muted playsinline style="width:160px;height:120px;object-fit:cover;border-radius:8px;display:none;"></video>


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
        <div class="menu-title">Envoyer une Surprise ✨</div>
        <div class="token-grid">
            <div class="token-item" data-cost="1"><div class="token-emoji">💌</div><div class="token-cost">1</div></div>
            <div class="token-item" data-cost="5"><div class="token-emoji">🌹</div><div class="token-cost">5</div></div>
            <div class="token-item" data-cost="10"><div class="token-emoji">🎀</div><div class="token-cost">10</div></div>
            <div class="token-item" data-cost="50"><div class="token-emoji">💎</div><div class="token-cost">50</div></div>
            <div class="token-item" data-cost="100"><div class="token-emoji">💋</div><div class="token-cost">100</div></div>
            <div class="token-item" data-cost="250"><div class="token-emoji">🍸</div><div class="token-cost">250</div></div>
            <div class="token-item" data-cost="500"><div class="token-emoji">🎁</div><div class="token-cost">500</div></div>
            <div class="token-item" data-cost="750"><div class="token-emoji">💄</div><div class="token-cost">750</div></div>
            <div class="token-item" data-cost="1000"><div class="token-emoji">👑</div><div class="token-cost">1000</div></div>
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

    </div>

  </div>

  <!-- Modal confirmation show privé -->
<div class="modal fade" id="confirmPrivateModal" tabindex="-1" aria-labelledby="confirmPrivateLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content bg-dark text-white border-0 rounded-3 shadow">
      <div class="modal-header border-0">
        <h5 class="modal-title" id="confirmPrivateLabel">🎥 Show privé</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>
      <div class="modal-body text-center">
        <p>
          Ce show privé coûte 
          <strong id="privateCost" class="text-warning"></strong> jetons par minute.
        </p>
        <p class="text-info">
          💡 En acceptant, 5 minutes (soit <strong id="privateTotalCost"></strong> jetons) seront débitées immédiatement.
        </p>
        <p>Souhaitez-vous continuer ?</p>
      </div>
      <div class="modal-footer border-0 justify-content-center">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Non</button>
        <button type="button" class="btn btn-danger" id="confirmPrivateYes">Oui</button>
      </div>
    </div>
  </div>
</div>
  <!--wss://livebeautyofficial.com  http://localhost:3000/-->

<script>
  const socket = io("http://localhost:3000", {path: '/socket.io', transports: ["websocket"] });
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


// ✅ Nettoyage moderne sans "unload" (évite les violations Chrome)
window.addEventListener("pagehide", () => {
    try {
        socket.emit("watcher-disconnected");
        socket.close();
        peerConnection.close();
    } catch (e) {
        console.warn("Erreur nettoyage pagehide:", e);
    }
});


// ✅ Activer la protection si c’est une page de show privée existante
@if(isset($showPriveId))
document.addEventListener("DOMContentLoaded", () => {
    console.log("🔒 Protection activée automatiquement pour show privé existant (#{{ $showPriveId }})");
    enablePrivateProtection();
});
@endif


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

// ✅ Sécurisation : vérifier si le bouton et la modale existent
const switchPrivateBtn = document.getElementById("switchPrivateBtn");
const confirmModalEl = document.getElementById("confirmPrivateModal");
const privateCostElem = document.getElementById("privateCost");

let confirmModal = null;
if (confirmModalEl) {
  confirmModal = new bootstrap.Modal(confirmModalEl);
}

// ✅ Si le bouton existe (uniquement pour les utilisateurs connectés)
if (switchPrivateBtn) {
  switchPrivateBtn.addEventListener("click", async () => {
    if (!isPrivate) {
      // 🧱 Protection invités (aucune action sans compte)
      @guest
        alert("🔒 Vous devez être connecté pour démarrer un show privé.");
        return;
      @endguest

      @auth
      try {
        // 🔹 Récupérer le tarif avant d'afficher le modal
        const res = await fetch("{{ route('live.canStart') }}", {
          method: "POST",
          headers: {
            "X-CSRF-TOKEN": document.querySelector('meta[name=\"csrf-token\"]').content,
            "Content-Type": "application/json"
          },
          body: JSON.stringify({ modele_id: "{{ $modele->id }}" })
        });

        if (!res.ok) {
          alert("⚠️ Une erreur est survenue lors de la vérification du show privé.");
          return;
        }

        const data = await res.json().catch(() => null);
        if (!data || !data.canStart) {
          alert(data?.message || "Impossible de démarrer le show privé.");
          return;
        }

        // 🔹 Calcul du coût du show privé
        const coutParMinute = Math.ceil({{ $modele->nombre_jetons_show_privee }} / {{ $modele->duree_show_privee }});
        privateCostElem.textContent = coutParMinute;
        document.getElementById("privateTotalCost").textContent = coutParMinute * 5;

        // 🔹 Ouvrir le modal de confirmation
        confirmModal.show();

        // 🔹 Attendre la confirmation utilisateur
        const confirmBtn = document.getElementById("confirmPrivateYes");
        if (confirmBtn) {
          confirmBtn.onclick = () => {
            confirmModal.hide();
            startPrivateShow();
          };
        }
      } catch (err) {
        console.error("Erreur vérification show privé :", err);
        alert("❌ Erreur inattendue. Réessayez plus tard.");
      }
      @endauth
    } 
    else {
      // 🔹 Annuler le show privé
      socket.emit("cancel-private", { pseudo: "{{ $modele->prenom ?? 'Modèle' }}" });
      switchPrivateBtn.textContent = "🚪 Passer en show privée";
      isPrivate = false;

      if (debitInterval) clearInterval(debitInterval);

      // Arrêt du show côté serveur
      fetch("{{ route('live.stopPrivate') }}", {
        method: "POST",
        headers: {
          "X-CSRF-TOKEN": document.querySelector('meta[name=\"csrf-token\"]').content,
          "Content-Type": "application/json",
          "Accept": "application/json"
        },
        body: JSON.stringify({ modele_id: "{{ $modele->id }}" })
      }).catch(err => console.warn("Erreur stopPrivate :", err));

      disablePrivateProtection();
      onClientCancelPrivate();
    }
  });
}


function startPrivateShow() {
  socket.emit("switch-to-private", { pseudo: "{{ $modele->prenom ?? 'Modèle' }}" });
  switchPrivateBtn.textContent = "❌ Annuler le show privée";
  isPrivate = true;

    enablePrivateProtection();

  // ✅ Appel au backend pour activer le mode privé
  fetch("{{ route('live.startPrivate') }}", {
    method: "POST",
    headers: {
      "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
      "Content-Type": "application/json",
      "Accept": "application/json"
    },
    body: JSON.stringify({
      modele_id: "{{ $modele->id }}"
    })
  })
  .then(res => res.json())
  .then(data => {
    if (data.success) {
      console.log("✅ Mode privé activé :", data.message);
    } else {
      console.warn("⚠️ Impossible d’activer le mode privé :", data);
    }
  })
  .catch(err => console.error("Erreur:", err));

  // 🔁 Début du débit automatique
  @auth
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
  @endauth
}


// 🧩 Protection du show privé : retour / fermeture / refresh
function enablePrivateProtection() {
  // Désactive le bouton retour
  const backBtn = document.getElementById("backBtn");
  if (backBtn) {
    backBtn.disabled = true;
    backBtn.style.opacity = "0.5";
    backBtn.style.cursor = "not-allowed";
    backBtn.title = "Indisponible pendant le show privé";
  }

  // Empêche de quitter sans confirmation
  window.addEventListener("beforeunload", (e) => {
    // ✅ envoi sûr même pendant fermeture
    fetch("{{ route('live.stopPrivate') }}", {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": document.querySelector('meta[name=\"csrf-token\"]').content,
            "Content-Type": "application/json"
        },
        body: JSON.stringify({ modele_id: "{{ $modele->id }}" }),
        keepalive: true
    });

    e.preventDefault();
    e.returnValue = "⚠️ Le show privé va être arrêté si vous quittez la page.";
});


  // Si l’utilisateur revient en arrière dans l’historique
  window.addEventListener("popstate", (e) => {
    e.preventDefault();
    alert("⚠️ Vous ne pouvez pas quitter pendant le show privé !");
    history.pushState(null, null, location.href);
  });
}

function disablePrivateProtection() {
  const backBtn = document.getElementById("backBtn");
  if (backBtn) {
    backBtn.disabled = false;
    backBtn.style.opacity = "1";
    backBtn.style.cursor = "pointer";
    backBtn.title = "";
  }

  window.onbeforeunload = null;
  window.removeEventListener("popstate", () => {});
}




// Événement de redirection (expulsion des autres users)
socket.on("redirect-dashboard", () => {
    // Rediriger seulement si l’utilisateur n’est pas celui en privé
    if (!isPrivate) {
        window.location.href = "/dashboard";
    }
});

// ---------- Variables DOM ----------
const clientCameraBtn = document.getElementById('clientCameraBtn');
const clientAudioBtn  = document.getElementById('clientAudioBtn');
const localPreview    = document.getElementById('localPreview');

// ---------- State ----------
let clientStream = null;
let clientPc = null;
let isAudioEnabled = true;
let isPrivateEnabled = false; // true si le client a passé en show privée
let clientSocketId = null;    // remplie au connect
// si ta blade définit showPriveId (page de show privé), tu peux injecter sa valeur côté serveur:
const showPriveId = typeof SHOW_PRIVE_ID !== 'undefined' ? SHOW_PRIVE_ID : null; // ou remplacer côté Blade

// ---------- Socket.IO (déjà présent sur la page) ----------
socket.on('connect', () => {
  clientSocketId = socket.id;
});

// helper: met à jour l'état des boutons
function updateClientButtonsState() {
  // ✅ Vérifie d’abord que les éléments existent
  if (!window.clientCameraBtn || !window.clientAudioBtn) {
    console.warn("⛔ Boutons caméra/audio non trouvés dans le DOM — fonction ignorée.");
    return;
  }

  if (isPrivateEnabled) {
    clientCameraBtn.removeAttribute('disabled');
    clientCameraBtn.title = "Activer votre caméra";
    clientAudioBtn.removeAttribute('disabled');
    clientAudioBtn.title = "Activer / Désactiver le son de la caméra";

    // Cache les tooltips s’il y en avait
    document.querySelectorAll('#clientCamControls .tooltip-text').forEach(t => {
      t.style.display = 'none';
    });
  } else {
    clientCameraBtn.setAttribute('disabled', 'true');
    clientAudioBtn.setAttribute('disabled', 'true');

    // ✅ Vérifie aussi que le conteneur existe avant d’ajouter des listeners
    const camControls = document.querySelectorAll('#clientCamControls .clientCamBtn');
    if (camControls.length) {
      camControls.forEach(btn => {
        btn.addEventListener('mouseenter', () => {
          const tt = btn.querySelector('.tooltip-text');
          if (tt) tt.style.display = 'block';
        });
        btn.addEventListener('mouseleave', () => {
          const tt = btn.querySelector('.tooltip-text');
          if (tt) tt.style.display = 'none';
        });
      });
    }
  }
}

// ✅ Appelle la fonction seulement quand le DOM est prêt
document.addEventListener("DOMContentLoaded", () => {
  updateClientButtonsState();
});


// si la page est un show privé côté Blade, on active directement
@if(isset($showPriveId))
  isPrivateEnabled = true;
  updateClientButtonsState();
@endif

// si tu as un bouton "Passer en show privée" client-side, écoute le clic
if (switchPrivateBtn) {
  switchPrivateBtn.addEventListener('click', () => {
    isPrivateEnabled = true;
    updateClientButtonsState();
  });
}

// ---------- Signaling listeners (reçoivent du modèle via serveur) ----------
socket.on('client-answer', async (data) => {
  // data: { from: modeleSocketId, description }
  try {
    if (!clientPc) return console.warn('Pas de clientPc pour recevoir answer');
    await clientPc.setRemoteDescription(new RTCSessionDescription(data.description));
    console.log('client: remote description set (answer reçu)');
  } catch (err) {
    console.error('Erreur setRemoteDescription client:', err);
  }
});

socket.on('client-candidate', async (data) => {
  // { to: clientSocketId, candidate }
  if (data.to && data.to !== clientSocketId) return;
  if (!clientPc) return;
  try {
    await clientPc.addIceCandidate(new RTCIceCandidate(data.candidate));
  } catch (e) {
    console.warn('Erreur addIceCandidate client:', e);
  }
});

// si le modèle ou serveur demande d'arrêter la caméra du client
socket.on('client-disconnect', (data) => {
  stopClientCam();
});

// ---------- Start / Stop caméra client ----------
async function startClientCam() {
  if (!isPrivateEnabled) return alert('Vous devez être en show privée pour activer votre caméra.');

  try {
    clientStream = await navigator.mediaDevices.getUserMedia({ video: true, audio: true });
    // preview locale
    localPreview.srcObject = clientStream;
    localPreview.style.display = 'block';

    // create RTCPeerConnection
    clientPc = new RTCPeerConnection({
      iceServers: [
        { urls: "stun:stun.l.google.com:19302" },
        // si tu as un TURN, garde-le ici
        { urls: "turn:livebeautyofficial.com:3478", username: "webrtc", credential: "password123" }
      ]
    });

    // envoyer candidats au modèle via serveur
    clientPc.onicecandidate = event => {
      if (event.candidate) {
        socket.emit('client-candidate', {
          toRoom: isPrivateEnabled && showPriveId ? `prive-${showPriveId}` : 'public',
          candidate: event.candidate,
          from: clientSocketId
        });
      }
    };

    // add tracks
    clientStream.getTracks().forEach(t => clientPc.addTrack(t, clientStream));

    // create offer
    const offer = await clientPc.createOffer();
    await clientPc.setLocalDescription(offer);

    // envoi de l'offer au serveur (qui forwarde au modèle)
    socket.emit('client-offer', {
      showPriveId: showPriveId ?? null,
      offer: clientPc.localDescription,
      from: clientSocketId
    });

    // UI
    clientCameraBtn.innerHTML = '<i class="fa-solid fa-video"></i>';
    clientAudioBtn.innerHTML  = '<i class="fa-solid fa-microphone"></i>';
    isAudioEnabled = true;
  } catch (err) {
    console.error('Erreur startClientCam:', err);
    alert('Impossible d\'accéder à la caméra/micro : ' + (err.message || err));
  }
}

function stopClientCam() {
  try {
    if (clientStream) clientStream.getTracks().forEach(t => t.stop());
    clientStream = null;
    if (clientPc) {
      clientPc.close();
      clientPc = null;
    }
    localPreview.srcObject = null;
    localPreview.style.display = 'none';
    clientCameraBtn.innerHTML = '<i class="fa-solid fa-video"></i>';
    clientAudioBtn.innerHTML  = '<i class="fa-solid fa-microphone"></i>';
    // informer le serveur / modèle
    socket.emit('client-stop', { showPriveId: showPriveId ?? null, from: clientSocketId });
  } catch (e) {
    console.warn(e);
  }
}
// toggle audio local
function toggleClientAudio() {
  if (!clientStream) return alert('Activez d\'abord la caméra (Camera).');
  const audioTrack = clientStream.getAudioTracks()[0];
  if (!audioTrack) return alert('Aucun flux audio trouvé.');
  audioTrack.enabled = !audioTrack.enabled;
  isAudioEnabled = audioTrack.enabled;
  clientAudioBtn.textContent = isAudioEnabled ? '🎤✅' : '🎤🔇';

  // optionnel: avertir le modèle via chat
  socket.emit('chat-message', {
    message: isAudioEnabled ? '🔊 Le client a activé sa voix.' : '🔇 Le client a coupé sa voix.',
    pseudo: '{{ Auth::check() ? Auth::user()->pseudo : "Client" }}'
  });
}

// events boutons
clientCameraBtn?.addEventListener('click', () => {
  if (clientStream) stopClientCam();
  else startClientCam();
});
clientAudioBtn?.addEventListener('click', () => {
  if (!clientStream) return alert('Activez la caméra d\'abord.');
  toggleClientAudio();
});

// Si le client annule le show privé depuis l'UI (ex: bouton "Annuler le show privé")
// il faut forcer stop + désactiver boutons
function onClientCancelPrivate() {
  // stop local camera if any
  stopClientCam();
  isPrivateEnabled = false;
  updateClientButtonsState();
}


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
  window.addEventListener("pagehide", () => {
    try {
        socket.close();
        peerConnection.close();
    } catch (e) {
        console.warn("Erreur fermeture pagehide:", e);
    }
});


  
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


<!-- Modal Premium : modèle a quitté -->
<div class="modal fade" id="modelLeftModal" tabindex="-1" aria-labelledby="modelLeftLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content modal-premium text-center text-white border-0 shadow-lg position-relative overflow-hidden">

      <!-- Glow effect -->
      <div class="modal-glow"></div>

      <div class="modal-body py-5 px-4">
        <div class="premium-icon mb-3">💋</div>
        <h4 class="fw-bold mb-3">La camgirl a terminé le show</h4>
        <p class="text-light opacity-75 mb-4">
          Merci d’avoir participé à ce moment.  
          Vous pouvez quitter le live en toute sécurité.
        </p>
        <button id="quitShowBtn" class="btn-premium-quit px-5 py-2 fw-bold">
          Quitter le live
        </button>
      </div>
    </div>
  </div>
</div>

<script>
/**
 * 📡 Quand le modèle (broadcaster) se déconnecte,
 * on affiche une modale avec un bouton "Quitter".
 */
socket.on("modele-deconnecte", (data) => {
  console.log("⚠️ Le modèle a quitté le show :", data);

  // 1️⃣ Stop vidéo & fermeture connexion WebRTC
  try {
    const liveVideo = document.getElementById("liveVideo");
    if (liveVideo) {
      const stream = liveVideo.srcObject;
      if (stream && stream.getTracks) stream.getTracks().forEach(t => t.stop());
      liveVideo.pause();
      liveVideo.srcObject = null;
      liveVideo.style.filter = "grayscale(70%)";
      liveVideo.style.opacity = "0.7";
    }

    if (typeof peerConnection !== "undefined" && peerConnection) {
      peerConnection.close();
    }

    socket.close();
  } catch (err) {
    console.warn("Erreur cleanup:", err);
  }

  // 2️⃣ Affiche la modale Bootstrap
  const modalEl = document.getElementById("modelLeftModal");
  if (modalEl) {
    const modal = new bootstrap.Modal(modalEl, { backdrop: 'static', keyboard: false });
    modal.show();

    // 3️⃣ Gestion du bouton Quitter
    const quitBtn = document.getElementById("quitShowBtn");
    if (quitBtn) {
      quitBtn.onclick = () => {
        window.location.href = "/dashboard"; // 🔁 redirection (tu peux changer ici)
      };
    }

    // Si la modale se ferme autrement (Esc ou clic), on redirige aussi
    modalEl.addEventListener("hidden.bs.modal", () => {
      window.location.href = "/dashboard";
    });
  } else {
    // Fallback : redirection si la modale est absente
    window.location.href = "/dashboard";
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
    //const defaultBtn = document.getElementById('defaultTokensBtn');
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


    //defaultBtn?.addEventListener('click', (e) => { e.stopPropagation(); toggleMenu(defaultMenu); });
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
        const message = `Jetons - ${data.pseudo || ''} - ${data.name || ''}`;
        createTokenBubble(message, data.cost, data.isGolden);
            if (soundMessage) soundMessage.play().catch(() => {});

    });
}

})();
// Écoute le clic sur chaque surprise
const backBtnEl = document.getElementById("backBtn");
if (backBtnEl) {
  backBtnEl.addEventListener("click", function() {
    window.history.back();
  });
}

// === 🎬 Gestion du message premium quand la vidéo est mise en pause ===
const pauseOverlay = document.getElementById("pauseOverlay");

// Quand la vidéo est mise en pause
video.addEventListener("pause", () => {
  // N'afficher que si la vidéo a déjà été démarrée une première fois
  if (video.currentTime > 0 && !video.ended) {
    pauseOverlay.style.display = "flex";
  }
});

// Quand la vidéo repart
video.addEventListener("play", () => {
  pauseOverlay.style.display = "none";
});

// Reprendre la vidéo si on clique sur le texte
pauseOverlay.addEventListener("click", () => {
  video.play().catch(() => {});
  pauseOverlay.style.display = "none";
});

</script>

