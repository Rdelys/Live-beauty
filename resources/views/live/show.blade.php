<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="UTF-8">
  <title>Live de {{ $modele->prenom }}</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <audio id="soundMessage" src="{{ asset('sounds/notificationAction.mp3') }}" preload="auto"></audio>
  <audio id="soundSurprise" src="{{ asset('sounds/cadeau.mp3') }}" preload="auto"></audio>
<script>
  // place ceci en tout début de <head> ou juste avant tes scripts JS
  window.isPassingToPrivate = false;
</script>
<meta name="csrf-token" content="{{ csrf_token() }}">
@php
    // Récupération des photos, compatible array et collection
    $photos = is_array($modele->photos)
        ? $modele->photos
        : $modele->photos->pluck('image_url')->toArray();

    // Convertir en URLs complètes (storage)
    $photosUrl = [];
    foreach ($photos as $p) {
        if ($p) $photosUrl[] = asset('storage/' . $p);
    }

    // Si aucune photo → fallback
    if (empty($photosUrl)) {
        $photosUrl = [asset('default-bg.jpg')];
    }

@endphp


  <style>
    :root{
  /* couleurs / thèmes */
  --bg-1: #0b0014;
  --bg-2: #3a004a;
  --accent: #ff1744;
  --accent-2: #ff4081;
  --muted: rgba(255,255,255,0.12);
  --glass: rgba(0,0,0,0.35);
  --card: rgba(255,255,255,0.03);
  --soft-border: rgba(255,255,255,0.08);
  --gold-1: #ffd54f;
  --gold-2: #ffb300;

  --radius-lg: 18px;
  --radius-md: 12px;
  --radius-sm: 8px;

  --shadow-1: 0 10px 30px rgba(0,0,0,0.35);
  --shadow-soft: 0 6px 18px rgba(0,0,0,0.35);
  --glass-blur: 12px;

  --font-sans: "Poppins", system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
}

/* ===== Reset / Base ===== */
* { box-sizing: border-box; -webkit-font-smoothing:antialiased; -moz-osx-font-smoothing:grayscale; }
html,body { height:100%; }
/* ===== Slideshow Background ===== */

body {
  margin: 0;
  font-family: var(--font-sans);
  color: #fff;
  background:
    linear-gradient(180deg, rgba(0,0,0,0.65), rgba(0,0,0,0.75)),
    url('{{ asset("fondShow.png") }}') center/cover no-repeat fixed !important;
  background-size: cover !important;
  padding-top: 50px;
      background-attachment: fixed;

}
/* 
#modelTokenMenu .token-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);   
    gap: 10px;
    margin-top: 8px;

    max-height: 240px;                       
    overflow-y: auto;                        
    padding-right: 4px;

    scrollbar-width: thin;
    scrollbar-color: rgba(255,255,255,0.15) transparent;
}

#modelTokenMenu .token-grid::-webkit-scrollbar {
    width: 6px;
}

#modelTokenMenu .token-grid::-webkit-scrollbar-thumb {
    background: rgba(255,255,255,0.18);
    border-radius: 8px;
}

#modelTokenMenu .token-item {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;

    padding: 12px 6px;
    border-radius: 12px;

    background: rgba(255,255,255,0.05);
    border: 1px solid rgba(255,255,255,0.08);

    cursor: pointer;
    transition: transform .18s ease, box-shadow .18s ease;

    color: #fff;
    font-weight: 700;
    text-align: center;
}

#modelTokenMenu .token-item:hover {
    transform: translateY(-4px) scale(1.05);
    background: linear-gradient(135deg,#ff4081,#7c4dff);
    box-shadow: 0 10px 30px rgba(0,0,0,0.45);
}

#modelTokenMenu .token-item .token-emoji {
    font-size: 1.8rem;
    margin-bottom: 4px;
}

#modelTokenMenu .token-item .token-cost {
    font-size: 1.1rem;
    color: #ffd740;
    margin-top: 4px;
}

.fade-in {
    opacity: 0;
    transform: translateY(20px);
    animation: fadeIn 0.8s ease forwards;
} */

/* @keyframes fadeIn {
    to {
        opacity: 1;
        transform: none;
    }
} */

body:hover {
    background-position: center 51%;
    transition: background-position 2s ease;
}

/* .token-icon {
    animation: neonPulse 4s infinite ease-in-out;
} */

@keyframes neonPulse {
    0%, 100% { box-shadow: 0 0 12px rgba(255,64,129,0.25); }
    50%     { box-shadow: 0 0 32px rgba(255,64,129,0.6); }
}

/* subtle animated background */
@keyframes bg-pan { 0%{background-position:0% 50%}50%{background-position:100% 50%}100%{background-position:0% 50%} }

/* ===== Layout container ===== */
.container-live{
  max-width:100%;
  margin: 24px auto;
  display:flex;
  gap:20px;
  align-items:flex-start;
  padding: 0 16px;
}

/* left = video, right = chat column */
.left-live{ flex:3; position:relative; min-width:0; }
#videoContainer{
  height:100vh;
  border-radius:var(--radius-lg);
  padding:14px;
  display:flex;
  align-items:center;
  justify-content:center;
  position:relative;
  overflow:hidden;
}
#videoContainer video{
  width:100%;
  height:100%;
  object-fit:cover;
  border-radius: 14px;
}

/* ===== Chat Column (fixed input at bottom) ===== */
/* BEM-like: #chatColumn is the block */
#chatColumn{
  width:350px;
  background: linear-gradient(180deg, rgba(255,255,255,0.02), rgba(255,255,255,0.01));
  border-radius: 22px;
  border: 1px solid var(--soft-border);
  padding: 18px;
  box-shadow: 0 12px 40px rgba(0,0,0,0.45);
  backdrop-filter: blur(var(--glass-blur));
  display:flex;
  flex-direction:column;
  height:75vh;            /* same height as videoContainer */
  min-height:420px;
  position:relative;
  overflow:hidden;
}

/* align top with video (if page layout requires margin) */
#chatColumn--topFix { margin-top: 270px; } /* optional helper (kept for backward compat) */

/* Elements inside chat column */
#chatColumn .chat__header{
  margin-bottom:8px;
  font-weight:700;
  letter-spacing:0.2px;
}

/* messages area - grows, scrollable */
#messages.chat-wrapper{
  flex:1 1 auto;
  overflow-y:auto;
  padding:12px;
  border-radius:12px;
  background: var(--card);
  border:1px solid rgba(255,255,255,0.03);
  box-shadow: inset 0 0 20px rgba(0,0,0,0.25);
  display:flex;
  flex-direction:column;
  gap:8px;
  scroll-behavior: smooth;
}

/* hide default scrollbar but keep scrolling accessible */
#messages.chat-wrapper::-webkit-scrollbar{ width:8px; }
#messages.chat-wrapper::-webkit-scrollbar-thumb{ background: rgba(255,255,255,0.06); border-radius:8px; }

/* single chat bubble */
.chat-bubble{
  display:inline-block;
  max-width:90%;
  padding:8px 12px;
  border-radius:12px;
  background: rgba(255,255,255,0.06);
  color:#fff;
  font-weight:600;
  word-wrap:break-word;
  box-shadow: 0 2px 10px rgba(0,0,0,0.35);
}

/* typing indicator variant */
#typingIndicator{ opacity:.85; font-style:italic; font-weight:600; }

/* ===== Chat form pinned to bottom ===== */
/* The form is visually fixed inside the chat column (not page-fixed) */
#chatForm{
  flex:0 0 auto;
  display:flex;
  gap:10px;
  align-items:center;
  padding-top:12px;
  border-top: 1px solid rgba(255,255,255,0.03);
  margin-top:12px;
  background: transparent;
}

/* make sure inputs have accessible sizes */
#chatForm input[type="text"],
#chatForm input[type="search"]{
  flex:1 1 auto;
  height:42px;
  padding: 10px 12px;
  border-radius: 10px;
  border: none;
  background: rgba(255,255,255,0.12);
  color: #fff;
  font-size:14px;
  outline: none;
  box-shadow: inset 0 2px 8px rgba(0,0,0,0.35);
}

/* send button */
#chatForm button[type="submit"]{
  flex:0 0 auto;
  height:42px;
  padding: 0 18px;
  border-radius: 10px;
  border:none;
  background: linear-gradient(135deg, var(--accent-2), var(--accent));
  color:#fff;
  font-weight:800;
  box-shadow: 0 6px 18px rgba(255,0,80,0.18);
  cursor:pointer;
  transition: transform .15s ease, box-shadow .15s ease;
}
#chatForm button[type="submit"]:hover{ transform: translateY(-2px); box-shadow: 0 10px 28px rgba(255,0,80,0.24); }

/* if mobile: stack small */
@media (max-width:576px){
  #chatColumn{ width:100%; height:60vh; padding:14px; }
  #chatForm{ gap:8px; }
  #chatForm input{ height:40px; font-size:14px; padding:8px 10px; }
  #chatForm button{ height:40px; padding:0 14px; font-size:14px; }
}

/* ===== Token icons & menus (refactored, no duplication) ===== */
.video-top-icons {
    position: absolute;
    top: 20px;
    right: 20px;

    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 12px; /* espace régulier */

    z-index: 1200;
}
.video-top-icons .token-icon,
#clientCamControls button {
    width: 48px !important;
    height: 48px !important;

    display: flex !important;
    align-items: center !important;
    justify-content: center !important;

    border-radius: 14px !important;
    padding: 0 !important;

    box-shadow: 0 4px 12px rgba(0,0,0,0.45);
}

#clientCamControls {
    display: flex;
    flex-direction: column;
    gap: 12px;
    align-items: center;
}

#clientCamControls button {
    background: rgba(255,255,255,0.12) !important;
    color: white !important;
    border: none !important;
    font-size: 18px;
}

/* .token-icon{
  width:50px; height:50px;
  border-radius:14px;
  display:flex; align-items:center; justify-content:center;
  background: rgba(25,25,25,0.75);
  color:#fff; font-size:22px; border:none;
  cursor:pointer; transition: all .22s ease;
  backdrop-filter: blur(8px);
  box-shadow: 0 4px 14px rgba(0,0,0,0.5), inset 0 0 8px rgba(255,255,255,0.06);
}
.token-icon:hover{ transform: translateY(-4px) scale(1.04); filter:brightness(1.05); }
.fullscreen-icon{ background: linear-gradient(135deg,#212121,#333); color:#e0e0e0; }

.golden-icon{
  background: linear-gradient(135deg, var(--gold-1), var(--gold-2));
  color:#3a2300; font-weight:700;
  box-shadow: 0 0 18px rgba(255,193,7,0.28), inset 0 0 8px rgba(255,255,255,0.12);
  animation: glow-gold 3s infinite ease-in-out;
}
@keyframes glow-gold{ 0%,100%{box-shadow:0 0 15px rgba(255,193,7,0.35)}50%{box-shadow:0 0 28px rgba(255,215,64,0.8)} }
.surprise-icon{ background: linear-gradient(135deg,#6a1b9a,#ba68c8); box-shadow: 0 0 18px rgba(186,104,200,0.28); }

.token-menu{
  position:absolute;
  top:56px; right:0;
  min-width:240px;
  background: rgba(15,15,15,0.88);
  border:1px solid rgba(255,255,255,0.06);
  border-radius:12px;
  padding:10px;
  display:none;
  flex-direction:column; gap:8px;
  z-index:1150;
  backdrop-filter: blur(14px);
  box-shadow: 0 8px 30px rgba(0,0,0,0.6);
  transform-origin: top right;
}
.token-menu.open{ display:flex; animation: menu-in .2s ease both; }
@keyframes menu-in{ from{opacity:0; transform: translateY(-8px) scale(.96)} to{opacity:1; transform:none} }

.token-menu .menu-title{ font-size:0.9rem; color: #ffbdf3; text-align:center; font-weight:600; letter-spacing:.2px; padding-bottom:6px; border-bottom:1px solid rgba(255,255,255,0.04) }
.token-choice{
  display:flex; justify-content:space-between; align-items:center;
  padding:10px; border-radius:8px; cursor:pointer;
  background: linear-gradient(135deg, rgba(255,255,255,0.02), rgba(255,255,255,0.008));
  border:1px solid rgba(255,255,255,0.03);
  transition: all .18s ease;
  font-weight:600;
}
.token-choice:hover{ transform:scale(1.02); background: linear-gradient(135deg,#ff4081,#7c4dff); box-shadow: 0 8px 24px rgba(255,64,129,0.18) }

.token-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);   
    gap: 10px;

    max-height: 240px;                       
    overflow-y: auto;                        
    padding-right: 4px;

    scrollbar-width: thin;                   
    scrollbar-color: rgba(255,255,255,0.15) transparent;
}

.token-grid::-webkit-scrollbar {
    width: 6px;
}

.token-grid::-webkit-scrollbar-thumb {
    background: rgba(255,255,255,0.18);
    border-radius: 8px;
}

.token-item {
    border-radius: 10px;
    padding: 10px 8px;
    text-align: center;
    cursor: pointer;
    background: rgba(255,255,255,0.04);
    border: 1px solid rgba(255,255,255,0.08);
    transition: transform .18s ease, box-shadow .18s ease;
}

.token-item:hover {
    transform: translateY(-4px) scale(1.05);
    box-shadow: 0 10px 28px rgba(255,64,129,0.35);
    background: linear-gradient(135deg,#ff4081,#7c4dff);
}

.token-emoji {
    font-size: 1.8rem;
    margin-bottom: 4px;
}

.token-cost {
    font-weight: 700;
    color: #ffd740;
}
.token-emoji{ font-size:1.8rem; margin-bottom:6px; } */

/* token bubbles that animate above the video */
.token-bubble{
  position:absolute;
  bottom:120px;
  padding:10px 14px;
  border-radius:999px;
  font-weight:700;
  background: rgba(40,40,40,0.78);
  color:#fff;
  z-index:1200;
  pointer-events:none;
  animation: bubble-float 2200ms forwards;
  box-shadow: 0 8px 30px rgba(0,0,0,0.45);
}
.token-bubble.golden{ background: linear-gradient(90deg,var(--gold-1),var(--gold-2)); color:#2b1600; }
@keyframes bubble-float{ 0%{opacity:1; transform:translateY(0) scale(1)} 60%{transform:translateY(-40px) scale(1.02)} 100%{opacity:0; transform:translateY(-110px) scale(.95)} }

/* ===== Misc UI: buttons, overlays, modals ===== */
.btn-premium-quit{
  background: linear-gradient(90deg,#ff4081,#f50057);
  color:#fff; border:none; border-radius:50px; padding:12px 28px; font-weight:700;
  box-shadow: 0 8px 30px rgba(255,64,129,0.2); cursor:pointer;
}
.badge-live{ background:var(--accent); padding:8px 16px; border-radius:20px; font-weight:700; display:inline-block; animation:badge-pulse 1.2s infinite; }
@keyframes badge-pulse{0%{opacity:1}50%{opacity:.6}100%{opacity:1}}

/* pause overlay shown over video when paused */
#pauseOverlay{ position:absolute; inset:0; display:none; align-items:center; justify-content:center; flex-direction:column; background:rgba(0,0,0,0.7); color:var(--accent-2); font-size:1.4rem; z-index:2000; backdrop-filter: blur(6px); }

/* start overlay click to enable audio */
#startOverlay{ position:absolute; inset:0; display:flex; align-items:center; justify-content:center; background: rgba(0,0,0,0.8); z-index:1000; cursor:pointer; font-weight:700; }

/* small watermark */
#watermark{ position:fixed; right:10px; bottom:10px; opacity:.28; font-size:12px; pointer-events:none; z-index:9999 }

/* fullscreen adjustments */
#videoContainer:fullscreen, #videoContainer:-webkit-full-screen{ width:100vw; height:100vh; border-radius:0; padding:0; display:flex; align-items:center; justify-content:center; background:#000; }
#videoContainer:fullscreen .video-top-icons, #videoContainer:-webkit-full-screen .video-top-icons{ top:12px; right:12px; z-index:99999; }

/* mobile responsive layout */
@media (max-width:992px){
  .container-live{ flex-direction:column; gap:14px; }
  .left-live{ order:1; }
  #chatColumn{ order:2; width:100%; height:auto; min-height:220px; margin-top:0; }
  #videoContainer{ height:55vh; }
}

/* small cleanup / utility */
.hidden{ display:none !important; }
.center{ display:flex; align-items:center; justify-content:center; }

/* ===== Accessibility helpers ===== */
button:focus, input:focus{ outline: 3px solid rgba(255,64,129,0.12); outline-offset:2px; }

/* ===== Deprecated / internal compatibility notes =====
- Pour garder compatibilité avec ton HTML Blade existant, on conserve les IDs : #chatColumn, #messages.chat-wrapper, #chatForm, #startOverlay, #pauseOverlay, .video-top-icons, .token-menu, .token-bubble, etc.
- Le formulaire de chat (#chatForm) est positionné naturellement en bas via flex column (il n'est pas "position:fixed" sur la page) — il reste collé au bas du #chatColumn et les messages défilent au-dessus.
*/
#chatColumn {
    margin-top: 250px !important;
}

/* ===== Bouton Retour ===== */
#backBtn {
    background: linear-gradient(135deg, #2c003b, #4a0061);
    color: #fff;
    font-weight: 700;
    border: none;
    padding: 10px 18px;
    border-radius: var(--radius-md);
    box-shadow: 0 6px 16px rgba(0,0,0,0.35),
                inset 0 0 12px rgba(255,255,255,0.05);
    transition: all 0.25s ease;
}
#backBtn:hover:not(:disabled) {
    background: linear-gradient(135deg, #4a0061, #7c1fa1);
    transform: translateY(-2px);
    box-shadow: 0 10px 22px rgba(0,0,0,0.5);
}

/* ===== Badge EN DIRECT ===== */
.badge-live {
    background: linear-gradient(135deg, #ff1744, #ff4081);
    padding: 8px 18px;
    border-radius: 20px;
    font-weight: 800;
    color: #fff;
    letter-spacing: 0.6px;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    box-shadow: 0 6px 16px rgba(255, 64, 129, 0.3),
                inset 0 0 8px rgba(255,255,255,0.15);
    animation: badgePulse 1.4s infinite ease-in-out;
}
@keyframes badgePulse {
    0%,100% { transform:scale(1); opacity:1; }
    50%     { transform:scale(1.05); opacity:0.75; }
}

/* ===== Affichage des jetons ===== */
.jetons-display {
    padding: 8px 14px;
    border-radius: var(--radius-md);
    font-weight: 700;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-size: 1rem;

}
.jetons-display #userJetons {
    color: #ffd740;
    font-weight: 900;
}

/* ===== Timer Privé ===== */
#privateTimer {
    background: linear-gradient(135deg, rgba(0,0,0,0.75), rgba(30,0,60,0.8));
    padding: 8px 16px;
    border-radius: 14px;
    font-weight: 700;
    font-size: 1.1rem;
    color: #ffd740;
    letter-spacing: 1px;
    box-shadow: 0 6px 18px rgba(0,0,0,0.45),
                inset 0 0 12px rgba(255,255,255,0.05);
    border: 1px solid rgba(255,255,255,0.08);
    backdrop-filter: blur(8px);
    animation: timerGlow 2s infinite ease-in-out;
}
@keyframes timerGlow {
    0%,100% { box-shadow: 0 0 12px rgba(255,215,64,0.25); }
    50%     { box-shadow: 0 0 24px rgba(255,215,64,0.55); }
}

/* ============================================
   🌹 MODALS PREMIUM, SEXY & GLASS NEON
   ============================================ */

.modal-premium {
    background: linear-gradient(135deg,
        rgba(255, 255, 255, 0.05),
        rgba(0, 0, 0, 0.55)
    );
    backdrop-filter: blur(18px);
    border-radius: 26px !important;
    border: 1px solid rgba(255,255,255,0.12);
    padding: 0;
    overflow: hidden;
    box-shadow:
        0 12px 45px rgba(0,0,0,0.6),
        inset 0 0 30px rgba(255,255,255,0.05);
    position: relative;
}

/* Effet néon rose autour du modal */
.modal-premium::before {
    content:"";
    position:absolute;
    inset:-3px;
    border-radius:30px;
    background: radial-gradient(circle at 50% 0%,
        rgba(255,64,129,0.45),
        rgba(255,255,255,0) 70%
    );
    filter: blur(14px);
    z-index:-1;
}

/* Glow animé interne très sexy */
.modal-glow {
    position:absolute;
    inset:0;
    background: radial-gradient(circle at 50% 120%,
        rgba(255,0,90,0.28),
        transparent 70%);
    filter: blur(40px);
    opacity: 0.9;
    animation: modalGlow 5s ease-in-out infinite alternate;
}
@keyframes modalGlow {
    0% { opacity: 0.6; transform: scale(1); }
    100% { opacity: 1; transform: scale(1.03); }
}

/* Icône sexy rose */
.premium-icon {
    font-size: 3.6rem;
    background: linear-gradient(135deg, #ff4081, #ff77a9);
    -webkit-background-clip: text;
    color: transparent;
    animation: iconPulse 2s infinite ease-in-out;
}
@keyframes iconPulse {
    0%,100% { transform: scale(1); opacity: 1; }
    50% { transform: scale(1.08); opacity: 0.85; }
}

/* Titre glam */
.modal-premium h4,
.modal-premium h5 {
    color: #ffffff;
    font-weight: 800;
    letter-spacing: 1px;
    text-shadow: 0 0 8px rgba(255, 64, 129, 0.4);
}

/* Texte */
.modal-premium p {
    font-size: 1rem;
    opacity: 0.85;
    line-height: 1.5;
}

/* Boutons premium */
.modal-premium .btn {
    border-radius: 12px;
    padding: 10px 24px;
    font-weight: 700;
    transition: 0.3s;
}

.modal-premium .btn-danger {
    background: linear-gradient(135deg, #ff4081, #ff1744) !important;
    border: none !important;
    box-shadow: 0 8px 20px rgba(255,64,129,0.4);
}
.modal-premium .btn-danger:hover {
    transform: translateY(-3px);
    filter: brightness(1.1);
}

.modal-premium .btn-secondary {
    background: rgba(255,255,255,0.12) !important;
    border: 1px solid rgba(255,255,255,0.22) !important;
}
.modal-premium .btn-secondary:hover {
    background: rgba(255,255,255,0.2) !important;
    transform: translateY(-2px);
}

/* X close blanc premium */
.btn-close-white {
    filter: invert(1) brightness(1.5);
}

/* Animation apparition */
.modal.fade .modal-dialog {
    transform: scale(0.85) translateY(20px);
    opacity: 0;
    transition: 0.35s ease-out;
}
.modal.show .modal-dialog {
    transform: scale(1) translateY(0);
    opacity: 1;
}

/* Assurez-vous que ce style existe */
#chatFloating {
    display: none !important; /* Forcer le masquage par défaut */
}

#videoContainer:fullscreen #chatFloating,
#videoContainer:-webkit-full-screen #chatFloating {
    display: flex !important; /* Afficher seulement en plein écran */
    position: absolute;
    bottom: 20px;
    right: 20px;
    width: 300px;
    max-height: 50vh;
    background: rgba(0,0,0,0.55);
    backdrop-filter: blur(14px);
    border-radius: 16px;
    border: 1px solid rgba(255,255,255,0.12);
    padding: 12px;
    z-index: 999999999;
    flex-direction: column;
    gap: 6px;
    animation: floatIn .25s ease-out;
    cursor: grab;
}

@keyframes floatIn {
    from { transform: translateY(20px); opacity: 0; }
    to   { transform: translateY(0); opacity: 1; }
}

/* draggable indicator */
#chatFloating.dragging {
    opacity: 0.75;
    cursor: grabbing;
}

/* messages */
#chatFloatingMsgs {
    flex: 1;
    overflow-y: auto;
    padding: 8px;
    border-radius: 12px;
    background: rgba(0,0,0,0.35);
}

/* mini input */
#chatFloatingInput {
    display: flex;
    gap: 6px;
}

#chatFloatingInput input {
    flex: 1;
    border-radius: 10px;
    padding: 6px 10px;
    background: rgba(255,255,255,0.15);
    border: none;
    color: #fff;
}

#chatFloatingInput button {
    padding: 6px 12px;
    border-radius: 10px;
    border: none;
    background: linear-gradient(135deg,#ff4081,#ff1744);
    color: white;
    font-weight: 700;
}

/* hide main chat column fullscreen */
#videoContainer:fullscreen ~ #chatColumn,
#videoContainer:-webkit-full-screen ~ #chatColumn {
    display: none !important;
}

/* 🔥 Correction visibilité du texte dans les token-choice
.token-menu .token-choice {
    color: #ffffff !important;       
    text-shadow: 0 0 6px rgba(0,0,0,0.8);  
    font-weight: 700;                 /
}

.token-menu .menu-title {
    color: #ffdbf9 !important;
    text-shadow: 0 0 6px rgba(0,0,0,0.6);
}

.token-choice:hover {
    color: #fff !important;
} */

/* === CARD PREMIUM MODELE === */
.modele-premium-card {
    display: flex;
    align-items: center;
    padding: 18px;
    border-radius: 18px;
    margin-bottom: 20px;
    gap: 16px;
}

.modele-avatar {
    width: 90px;
    height: 90px;
    object-fit: cover;
    border-radius: 16px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.5);
}

.modele-info {
    color: #fff;
}

.modele-name {
    font-size: 1.7rem;
    margin: 0;
    text-shadow: 0 0 10px rgba(0,0,0,0.6);
    font-weight: 700;
}

.modele-tags .tag {
    display: inline-block;
    margin-top: 6px;
    margin-right: 6px;
    padding: 4px 10px;
    background: linear-gradient(135deg, #ff4081, #ff1744);
    border-radius: 12px;
    font-size: 0.85rem;
    font-weight: 700;
    box-shadow: 0 3px 12px rgba(255,64,129,0.35);
}

.modele-details {
    margin-top: 8px;
    opacity: 0.9;
    font-size: 0.9rem;
}

.model-photo {
    width: 110px;
    height: 110px;
    object-fit: cover;
    border-radius: 16px;
box-shadow: 0 0 20px rgba(255,64,129,0.45), 0 0 40px rgba(124,77,255,0.35);
    border: 2px solid rgba(255,255,255,0.15);}

#localPreview {
    position: absolute !important;
    width: 160px !important;
    height: 120px !important;
    top: 15px !important;
    left: 15px !important;
    object-fit: cover !important;
    z-index: 9999 !important;

    /* 🔥 Correction essentielle */
    display: none;
}

#videoContainer::after {
    content: "";
    position: absolute;
    inset: -6px;
    border-radius: inherit;
    background: radial-gradient(circle at 50% 0%, rgba(255,64,129,0.35), transparent 60%);
    filter: blur(18px);
    z-index: -1;
}
.chat-bubble:hover {
    transform: translateY(-2px);
    box-shadow: 0 0 12px rgba(255,64,129,0.4);
}
.chat-bubble {
    border-radius: 18px !important;
}

/* === TOP BAR === */
.top-bar-live {
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: space-between; /* gauche / centre / droite */
    margin-bottom: 15px;

    padding: 10px 16px;
    border-radius: 14px;
}

/* === Bouton Retour === */
.back-btn {
    display: flex;
    align-items: center;
    gap: 6px;
    padding: 8px 14px;
    border: none;
    border-radius: 10px;

    background: linear-gradient(135deg, #2c003b, #4a0061);
    color: #fff;
    font-weight: 700;
    cursor: pointer;

    box-shadow: 0 4px 12px rgba(0,0,0,0.35),
                inset 0 0 10px rgba(255,255,255,0.04);
    transition: all .25s ease;
}

.back-btn:hover {
    background: linear-gradient(135deg, #4a0061, #7c1fa1);
    transform: translateY(-2px);
}

/* === Chrono privé === */
.private-timer {
    padding: 8px 16px;
    border-radius: 10px;

    background: rgba(0,0,0,0.55);
    color: #ffd740;
    font-weight: 800;
    font-size: 1.1rem;
    letter-spacing: 1px;

    border: 1px solid rgba(255,255,255,0.15);
    box-shadow: 0 4px 14px rgba(0,0,0,0.45),
                inset 0 0 12px rgba(255,255,255,0.05);
}

/* === Jetons Display ===
.jetons-display {
    display: flex;
    align-items: center;
    gap: 8px;

    padding: 8px 14px;
    border-radius: 10px;

    background: rgba(255,255,255,0.08);
    border: 1px solid rgba(255,255,255,0.1);
    font-weight: 700;
    color: #ffd740;
    letter-spacing: .3px;

    box-shadow: 0 4px 12px rgba(0,0,0,0.4);
}

.jetons-display i {
    color: #ffd740;
    font-size: 1.2rem;
} */

.top-fixed {
    position: fixed;
    top: 0;
    left: 0;

    width: 100%;
    z-index: 99999;

    padding: 12px 20px;
}

#chatColumn::before {
    content: "";
    position: absolute;
    inset: -4px;
    border-radius: inherit;
    background: radial-gradient(circle, rgba(255,64,129,0.25), transparent 70%);
    filter: blur(18px);
    z-index: -1;
}
@keyframes breathingGlow {
    0% { filter: drop-shadow(0 0 6px #ff4081); }
    50% { filter: drop-shadow(0 0 14px #ff77a9); }
    100% { filter: drop-shadow(0 0 6px #ff4081); }
}

.model-photo {
    animation: breathingGlow 4s infinite ease-in-out;
}

 :root {
      --bg-1: #0b0014;
      --bg-2: #3a004a;
      --accent: #ff1744;
      --accent-2: #ff4081;
      --muted: rgba(255,255,255,0.12);
      --glass: rgba(0,0,0,0.35);
      --card: rgba(255,255,255,0.03);
      --soft-border: rgba(255,255,255,0.08);
      --gold-1: #ffd54f;
      --gold-2: #ffb300;
      --platinum: linear-gradient(135deg, #e5e4e2, #b8b8b8);
      --diamond: linear-gradient(135deg, #b9f2ff, #7bdff2);
      --emerald: linear-gradient(135deg, #50c878, #2e8b57);
      --ruby: linear-gradient(135deg, #e0115f, #9b111e);
      --sapphire: linear-gradient(135deg, #0f52ba, #1e90ff);
      
      --radius-lg: 18px;
      --radius-md: 12px;
      --radius-sm: 8px;
      
      --shadow-1: 0 10px 30px rgba(0,0,0,0.35);
      --shadow-soft: 0 6px 18px rgba(0,0,0,0.35);
      --glass-blur: 12px;
      
      --font-sans: "Poppins", system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
    }

    /* ===== TOKEN ICONS PREMIUM ===== */
    .video-top-icons {
        position: absolute;
        top: 20px;
        right: 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 16px;
        z-index: 1200;
    }

    .token-icon {
        width: 56px !important;
        height: 56px !important;
        border-radius: 16px !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        font-size: 24px !important;
        border: none !important;
        cursor: pointer !important;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1) !important;
        position: relative !important;
        overflow: hidden !important;
        box-shadow: 0 8px 24px rgba(0,0,0,0.4),
                    inset 0 0 16px rgba(255,255,255,0.1) !important;
        backdrop-filter: blur(12px) !important;
    }

    .token-icon::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, 
                   rgba(255,255,255,0.15), 
                   rgba(255,255,255,0.05));
        border-radius: inherit;
        z-index: -1;
    }

    .token-icon:hover {
        transform: translateY(-6px) scale(1.08) !important;
        filter: brightness(1.2) !important;
        box-shadow: 0 12px 32px rgba(0,0,0,0.5),
                    0 0 0 2px rgba(255,255,255,0.1) !important;
    }

    /* Specific icon styles */
    .golden-icon {
        background: linear-gradient(135deg, 
                   var(--gold-1), 
                   var(--gold-2),
                   #ff9800) !important;
        color: #3a2300 !important;
        animation: goldenPulse 3s infinite ease-in-out !important;
    }

    @keyframes goldenPulse {
        0%, 100% { 
            box-shadow: 0 0 20px rgba(255, 193, 7, 0.4),
                        inset 0 0 12px rgba(255,255,255,0.15) !important;
        }
        50% { 
            box-shadow: 0 0 35px rgba(255, 215, 64, 0.7),
                        0 0 0 3px rgba(255,215,64,0.3),
                        inset 0 0 20px rgba(255,255,255,0.2) !important;
        }
    }

    .surprise-icon {
        background: linear-gradient(135deg, 
                   #6a1b9a, 
                   #ba68c8,
                   #e91e63) !important;
        color: white !important;
        animation: surprisePulse 4s infinite alternate !important;
    }

    @keyframes surprisePulse {
        0% { 
            transform: scale(1);
            box-shadow: 0 0 15px rgba(186,104,200,0.3) !important;
        }
        100% { 
            transform: scale(1.05);
            box-shadow: 0 0 25px rgba(233,30,99,0.5) !important;
        }
    }

    .fullscreen-icon {
        background: linear-gradient(135deg, 
                   rgba(255,255,255,0.1), 
                   rgba(255,255,255,0.05)) !important;
        color: #fff !important;
        border: 1px solid rgba(255,255,255,0.15) !important;
    }

    /* ===== TOKEN MENUS PREMIUM ===== */
    .token-menu {
        position: absolute;
        top: 70px;
        right: 0;
        min-width: 260px;
        background: rgba(10, 10, 20, 0.95) !important;
        border: 1px solid rgba(255,255,255,0.1) !important;
        border-radius: 20px !important;
        padding: 16px !important;
        display: none;
        flex-direction: column;
        gap: 10px;
        z-index: 1150;
        backdrop-filter: blur(20px) saturate(180%) !important;
        box-shadow: 0 15px 40px rgba(0,0,0,0.6),
                    0 0 0 1px rgba(255,255,255,0.05) !important;
        transform-origin: top right;
        overflow: hidden;
    }

    .token-menu::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 1px;
        background: linear-gradient(90deg, 
                   transparent, 
                   rgba(255,64,129,0.5), 
                   transparent);
    }

    .token-menu.open {
        display: flex;
        animation: menuSlideIn 0.3s cubic-bezier(0.4, 0, 0.2, 1) both;
    }

    @keyframes menuSlideIn {
        from {
            opacity: 0;
            transform: translateY(-10px) scale(0.95);
        }
        to {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    .token-menu .menu-title {
        font-size: 0.95rem;
        color: #ffdbf9 !important;
        text-align: center;
        font-weight: 700;
        letter-spacing: 0.5px;
        padding-bottom: 10px;
        margin-bottom: 8px;
        border-bottom: 1px solid rgba(255,255,255,0.08);
        text-transform: uppercase;
        text-shadow: 0 0 10px rgba(255, 64, 129, 0.3);
    }

    /* ===== TOKEN GRID PREMIUM ===== */
    .token-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 12px;
        max-height: 260px;
        overflow-y: auto;
        padding: 4px 2px 4px 0;
        margin: 8px 0;
    }

    .token-grid::-webkit-scrollbar {
        width: 5px;
    }

    .token-grid::-webkit-scrollbar-thumb {
        background: rgba(255,255,255,0.15);
        border-radius: 10px;
    }

    .token-item {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 14px 8px;
        border-radius: 14px;
        background: rgba(255,255,255,0.03);
        border: 1px solid rgba(255,255,255,0.08);
        cursor: pointer;
        transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
        min-height: 80px;
    }

    .token-item::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, 
                   rgba(255,64,129,0.1), 
                   rgba(124,77,255,0.1));
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .token-item:hover {
        border-color: rgba(255,64,129,0.4);
        box-shadow: 0 10px 25px rgba(255,64,129,0.25),
                    0 0 0 1px rgba(255,64,129,0.2);
    }

    .token-item:hover::before {
        opacity: 1;
    }

    .token-item .token-name {
        font-size: 0.85rem;
        font-weight: 600;
        color: #fff;
        margin-bottom: 6px;
        text-align: center;
        z-index: 1;
    }

    .token-item .token-cost {
        font-size: 1.1rem;
        font-weight: 800;
        color: #ffd740;
        background: rgba(255, 215, 64, 0.1);
        padding: 4px 10px;
        border-radius: 20px;
        border: 1px solid rgba(255, 215, 64, 0.3);
        z-index: 1;
        transition: all 0.3s ease;
    }

    .token-item:hover .token-cost {
        background: rgba(255, 215, 64, 0.2);
        transform: scale(1.1);
        box-shadow: 0 0 15px rgba(255, 215, 64, 0.3);
    }

    /* Surprise-specific items */
    #modelSurpriseTokenMenu .token-item {
        background: rgba(255,255,255,0.02);
    }

    #modelSurpriseTokenMenu .token-emoji {
        font-size: 2rem;
        margin-bottom: 8px;
        filter: drop-shadow(0 0 8px rgba(255,255,255,0.3));
        z-index: 1;
        transition: transform 0.3s ease;
    }

    .token-item:hover .token-emoji {
        transform: scale(1.2) rotate(5deg);
    }

    /* Token categories by value */
    .token-item[data-cost="1"] .token-emoji { text-shadow: 0 0 10px rgba(255,255,255,0.3); }
    .token-item[data-cost="5"] .token-emoji { text-shadow: 0 0 10px rgba(255,64,129,0.4); }
    .token-item[data-cost="10"] .token-emoji { text-shadow: 0 0 10px rgba(76,175,80,0.4); }
    .token-item[data-cost="50"] .token-emoji { text-shadow: 0 0 10px rgba(33,150,243,0.4); }
    .token-item[data-cost="100"] .token-emoji { text-shadow: 0 0 10px rgba(255,152,0,0.4); }
    .token-item[data-cost="250"] .token-emoji { text-shadow: 0 0 10px rgba(156,39,176,0.4); }
    .token-item[data-cost="500"] .token-emoji { text-shadow: 0 0 10px rgba(244,67,54,0.4); }
    .token-item[data-cost="750"] .token-emoji { text-shadow: 0 0 10px rgba(255,235,59,0.4); }
    .token-item[data-cost="1000"] .token-emoji { text-shadow: 0 0 10px rgba(0,188,212,0.4); }

    /* ===== TOKEN BUBBLES ANIMATION ===== */
    .token-bubble {
        position: absolute;
        bottom: 120px;
        padding: 12px 20px;
        border-radius: 25px;
        font-weight: 800;
        background: linear-gradient(135deg, 
                   rgba(40,40,40,0.9), 
                   rgba(60,60,60,0.8));
        color: #fff;
        z-index: 1200;
        pointer-events: none;
        animation: bubbleFloat 2.5s cubic-bezier(0.4, 0, 0.2, 1) forwards;
        box-shadow: 0 10px 30px rgba(0,0,0,0.5),
                    0 0 0 1px rgba(255,255,255,0.1);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255,255,255,0.15);
        text-shadow: 0 2px 4px rgba(0,0,0,0.5);
        font-size: 1.1rem;
        letter-spacing: 0.5px;
    }

    .token-bubble.golden {
        background: linear-gradient(135deg, 
                   var(--gold-1), 
                   var(--gold-2),
                   #ff9800) !important;
        color: #2b1600 !important;
        box-shadow: 0 10px 30px rgba(255, 193, 7, 0.3),
                    0 0 0 2px rgba(255, 215, 64, 0.3) !important;
        text-shadow: 0 1px 2px rgba(0,0,0,0.2) !important;
    }

    @keyframes bubbleFloat {
        0% { 
            opacity: 0; 
            transform: translateY(0) scale(0.8); 
        }
        20% { 
            opacity: 1; 
            transform: translateY(-20px) scale(1); 
        }
        60% { 
            transform: translateY(-80px) scale(1.05); 
        }
        100% { 
            opacity: 0; 
            transform: translateY(-150px) scale(0.95); 
        }
    }

    /* ===== JETONS DISPLAY ===== */
    .jetons-display {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 10px 18px;
        border-radius: 12px;
        background: rgba(255,255,255,0.05);
        border: 1px solid rgba(255,255,255,0.1);
        font-weight: 700;
        color: #ffd740;
        letter-spacing: .3px;
        box-shadow: 0 6px 16px rgba(0,0,0,0.4),
                    inset 0 0 10px rgba(255,255,255,0.05);
        backdrop-filter: blur(8px);
        position: relative;
        overflow: hidden;
    }

    .jetons-display::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, 
                   rgba(255, 215, 64, 0.1), 
                   transparent 60%);
        z-index: -1;
    }

    .jetons-display i {
        color: #ffd740;
        font-size: 1.3rem;
        text-shadow: 0 0 10px rgba(255, 215, 64, 0.3);
    }

    .jetons-display #userJetons {
        color: #ffd740;
        font-weight: 900;
        font-size: 1.2rem;
        text-shadow: 0 0 8px rgba(255, 215, 64, 0.4);
        animation: countPulse 3s infinite;
    }

    @keyframes countPulse {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.05); }
    }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 768px) {
        .video-top-icons {
            top: 15px;
            right: 15px;
            gap: 12px;
        }
        
        .token-icon {
            width: 48px !important;
            height: 48px !important;
            font-size: 20px !important;
        }
        
        .token-menu {
            min-width: 220px;
            right: -10px;
        }
        
        .token-grid {
            grid-template-columns: repeat(2, 1fr);
            max-height: 200px;
        }
        
        .token-item {
            padding: 10px 6px;
            min-height: 70px;
        }
        
        .token-bubble {
            font-size: 1rem;
            padding: 10px 16px;
        }
    }

    @media (max-width: 480px) {
        .video-top-icons {
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: flex-end;
            gap: 10px;
            top: 10px;
            right: 10px;
        }
        
        .token-icon {
            width: 44px !important;
            height: 44px !important;
        }
        
        .token-menu {
            min-width: 180px;
            right: 0;
        }
        
        .token-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 8px;
        }
    }
  </style>
</head>
@php
    $photo = is_array($modele->photos)
        ? ($modele->photos[0] ?? null)
        : ($modele->photos->first()->image_url ?? null);
@endphp

<body>
        <div class="top-bar-live top-fixed">
    <button id="backBtn" class="back-btn">
        <i class="fa-solid fa-arrow-left"></i> {{ __('Retour') }}
    </button>

    <div id="privateTimer" class="private-timer">00:00</div>

    <div class="jetons-display">
        <i class="fa-solid fa-coins"></i>
        {{ __('Jetons') }} : <span id="userJetons">{{ Auth::user()->jetons ?? 0 }}</span>
    </div>
    
</div>


  <div class="container-live fade-in">
    <!-- LIVE Section -->
    <div class="left-live">
       @auth



                @endauth

      <!-- Bloc Premium Modèle -->

 <!-- @auth
            <div class="jetons-display mb-2">
                💰 Jetons : <span id="userJetons">{{ Auth::user()->jetons }}</span>
            </div>
          @endauth -->
          @if(!Auth::check())
  <div id="countdownBox" class="text-center mt-2">
    <p class="text-warning fs-5">
      ⏳ {{ __('Il vous reste') }} <span id="countdown">2:00</span> {{ __('secondes de live gratuit') }} .
    </p>
    <p class="text-light small">
      🔒 {{ __('Connecte-toi ou crée un compte pour continuer à regarder le live') }}.
    </p>
  </div>
    @endif
    @if(!Auth::check())
    <script>
  let seconds = 120;
  const countdownElement = document.getElementById('countdown');

  const formatTime = (secs) => {
    const m = Math.floor(secs / 60);
    const s = secs % 60;
    return `${m}:${s.toString().padStart(2, '0')}`;
  };

  countdownElement.textContent = formatTime(seconds);

  const countdownInterval = setInterval(() => {
    seconds--;
    countdownElement.textContent = formatTime(seconds);

    if (seconds <= 0) {
      clearInterval(countdownInterval);
      window.location.href = "{{ route('home') }}";
    }
  }, 1000);
</script>
    @endif
<div class="modele-premium-card">
<img src="{{ $photo ? asset('storage/' . $photo) : asset('default.jpg') }}"
     class="model-photo"
     alt="photo">

    <div class="modele-info">
        <h2 class="modele-name">
            {{ $modele->prenom }}
        </h2>

        <div class="modele-tags">
            <span class="tag">🔥 {{ __('En Live') }} </span>
        </div>

        <div class="modele-details">
            <strong>{{ __('Tarif privé') }} :</strong> {{ $modele->nombre_jetons_show_privee }} {{ __('jetons') }}<br>
            <strong>{{ __('Durée') }} :</strong> {{ $modele->duree_show_privee }} min
        </div>
    </div>
   
</div>

      @auth
              @if(Auth::user()->role != 'modele' && !isset($showPriveId))
                  <div class="text-center my-3">
                      <button id="switchPrivateBtn" class="btn btn-danger">
                        🚪 {{ __('Passer en show privée') }}
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
            ▶️ {{ __('Cliquez pour démarrer le live avec son') }} 
            </div>
          @endauth

    <video id="localPreview" autoplay muted playsinline></video>

<canvas id="blurBackground" style="
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
      filter: blur(12px);
      z-index: 1;
  "></canvas>

  <video id="liveVideo" autoplay playsinline controls style="position: relative; z-index: 2;"></video>

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
              🔒 {{ __('Live en pause') }}
            </div>

            <div style="font-size:1rem; color:#fff; margin-top:8px; opacity:0.8;">
              {{ __('Touchez l’écran pour reprendre') }} 
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

              <!-- Menus (remplis via Blade) -->
              <!-- <div id="defaultTokenMenu" class="token-menu" aria-hidden="true">
                <div class="menu-title">{{ __('Jetons standards') }} </div>
                @php $jetonsGlobaux = $jetons->whereNull('modele_id'); @endphp
                @foreach($jetonsGlobaux as $jeton)
                <button class="token-choice"
                data-name="{{ $jeton->nom }}"
                data-cost="{{ $jeton->nombre_de_jetons }}"
                data-description="{{ $jeton->description }}">
                {{ $jeton->nom }} — {{ $jeton->nombre_de_jetons }} {{ $jeton->modele_id ? '✨' : '💠' }}
                </button>
                @endforeach
              </div> -->

              <div id="modelTokenMenu" class="token-menu" aria-hidden="true">
                  <div class="menu-title">Actions de {{ $modele->prenom }}</div>

                  <div class="token-grid"> <!-- AJOUT ICI -->
                      @php 
                          $jetonsPerso = $jetons->where('modele_id', $modele->id); 
                      @endphp

                      @foreach($jetonsPerso as $jeton)
                      <button class="token-item"
                          data-name="{{ $jeton->nom }}"
                          data-cost="{{ $jeton->nombre_de_jetons }}"
                          data-description="{{ $jeton->description }}">
                          <div class="token-name">{{ $jeton->nom }}</div>
                          <div class="token-cost">{{ $jeton->nombre_de_jetons }}</div>

                      </button>
                      @endforeach
                  </div>
              </div>

              <!-- Menu Surprise -->
              <div id="modelSurpriseTokenMenu" class="token-menu" aria-hidden="true">
                <div class="menu-title">{{ __('Envoyer une Surprise') }} ✨</div>
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
          <div id="chatFloating" style="display:none;">
              <div id="chatFloatingMsgs"></div>

              <div id="chatFloatingInput">
                  <input type="text" id="floatingMsgInput" placeholder="Écrire...">
                  <button id="floatingSendBtn">➤</button>
              </div>
          </div>
        </div> 
    </div>       @auth

    <div id="chatColumn">
      <div id="messages" class="chat-wrapper"></div>
        @if(Auth::user()->role != 'modele')
        <form id="chatForm" onsubmit="sendMessage(event)">
            <input type="text" id="messageInput" placeholder="Tape ton message..." required>
            <button type="submit" class="btn btn-danger">{{ __('Envoyer') }}</button>
        </form>
        @endif
    </div>
          @endauth

  </div> 




  <!-- Modal confirmation show privé -->
<div class="modal fade" id="confirmPrivateModal" tabindex="-1" aria-labelledby="confirmPrivateLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content bg-dark text-white border-0 rounded-3 shadow">
      <div class="modal-header border-0">
        <h5 class="modal-title" id="confirmPrivateLabel">🎥 {{ __('Show privé') }}</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>
      <div class="modal-body text-center">
        <p>
          {{ __('Ce show privé coûte ') }}
          <strong id="privateCost" class="text-warning"></strong> {{ __('jetons par minute') }}.
        </p>
        <p class="text-info">
          💡 {{ __('En acceptant, 5 minutes') }}  ( {{ __('soit') }} <strong id="privateTotalCost"></strong> {{ __('jetons') }} ) {{ __('seront débitées immédiatement') }} .
        </p>
        <p> {{ __('Souhaitez-vous continuer') }} ?</p>
      </div>
      <div class="modal-footer border-0 justify-content-center">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Non</button>
        <button type="button" class="btn btn-danger" id="confirmPrivateYes">Oui</button>
      </div>
    </div>
  </div>
</div>
  <!--wss://livebeautyofficial.com  http://localhost:3000/-->
  <script src="https://cdn.socket.io/4.8.1/socket.io.min.js"></script>

<script>
  const socket = io("http://localhost:3000/", {path: '/socket.io', transports: ["websocket"] });

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
    pseudo: "{{ Auth::check() ? Auth::user()->pseudo : 'Anonyme' }}",
    modeleId: {{ $modele->id }},
    @if(isset($showPriveId))
        showPriveId: {{ $showPriveId }},
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
  isModel: false,
  modeleId: {{ $modele->id }}
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
    window.isPassingToPrivate = true; // blocage immédiat
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
            "X-CSRF-TOKEN": document.querySelector('meta[name=\"csrf-token"]').content,
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
    window.isPassingToPrivate = true;

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
      isPassingToPrivate = false; // 🔄 jetons redeviennent normaux

      if (debitInterval) clearInterval(debitInterval);

      // Arrêt du show côté serveur
      fetch("{{ route('live.stopPrivate') }}", {
        method: "POST",
        headers: {
          "X-CSRF-TOKEN": document.querySelector('meta[name=\"csrf-token"]').content,
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
confirmModalEl.addEventListener("hidden.bs.modal", () => {
    if (!isPrivate) window.isPassingToPrivate = false;
}, { once: true });


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
            "X-CSRF-TOKEN": document.querySelector('meta[name=\"csrf-token"]').content,
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
              modeleId: {{ $modele->id }},

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
          modeleId: {{ $modele->id }},

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
socket.emit('client-stop', {
    modeleId: {{ $modele->id }},
    showPriveId: showPriveId ?? null,
    from: clientSocketId
});
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


// Dans la partie socket.on("typing")
socket.on("typing", (data) => {
    // Pour la zone de chat principale (#messages)
    const messagesDiv = document.getElementById("messages");
    const floatingMsgs = document.getElementById("chatFloatingMsgs");
    
    let indicator = document.getElementById("typingIndicator");
    let floatingIndicator = document.getElementById("typingIndicatorFloating");
        updateTypingIndicator(data, true);

    if (!indicator && messagesDiv) {
        indicator = document.createElement("div");
        indicator.id = "typingIndicator";
        indicator.className = 'chat-bubble';
        indicator.innerHTML = `<em>${data.isModel ? "{{ $modele->nom }} {{ $modele->prenom }}" : data.pseudo} : (...)</em>`;
        messagesDiv.appendChild(indicator);
        messagesDiv.scrollTop = messagesDiv.scrollHeight;
    }
    
    // Pour la zone de chat flottante
    if (!floatingIndicator && floatingMsgs) {
        floatingIndicator = document.createElement("div");
        floatingIndicator.id = "typingIndicatorFloating";
        floatingIndicator.className = 'chat-bubble';
        floatingIndicator.style.fontSize = '0.9em';
        floatingIndicator.style.opacity = '0.8';
        floatingIndicator.innerHTML = `<em>${data.isModel ? "{{ $modele->nom }} {{ $modele->prenom }}" : data.pseudo} : (...)</em>`;
        floatingMsgs.appendChild(floatingIndicator);
        floatingMsgs.scrollTop = floatingMsgs.scrollHeight;
    }
});

// Dans la partie socket.on("stopTyping")
socket.on("stopTyping", () => {
    // Supprimer les deux indicateurs
    const typingIndicator = document.getElementById("typingIndicator");
    const floatingIndicator = document.getElementById("typingIndicatorFloating");
        updateTypingIndicator(null, false);

    if (typingIndicator) {
        typingIndicator.remove();
    }
    
    if (floatingIndicator) {
        floatingIndicator.remove();
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
        pseudo: "{{ Auth::check() ? Auth::user()->pseudo : 'Anonyme' }}",
        room: "public-{{ $modele->id }}"
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
            modeleId: {{ $modele->id }},

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
const chatColumn = document.getElementById("chatColumn");
const chatFloating = document.getElementById("chatFloating");
const chatFloatingMsgs = document.getElementById("chatFloatingMsgs");
const floatingInput = document.getElementById("floatingMsgInput");
const floatingSendBtn = document.getElementById("floatingSendBtn");

/* === FULLSCREEN: show floating chat === */
// === FULLSCREEN: show floating chat ===
document.getElementById("fullscreenBtn").addEventListener("click", () => {
    const v = document.getElementById("videoContainer");
    
    if (!document.fullscreenElement) {
        v.requestFullscreen();
        setTimeout(() => {
            chatFloating.style.display = "flex";
        }, 400);
    } else {
        document.exitFullscreen();
        // Masquer le chat flottant quand on quitte le plein écran
        chatFloating.style.display = "none";
    }
});

// === Écouter les changements de mode plein écran ===
document.addEventListener("fullscreenchange", handleFullscreenChange);
document.addEventListener("webkitfullscreenchange", handleFullscreenChange);
document.addEventListener("mozfullscreenchange", handleFullscreenChange);
document.addEventListener("MSFullscreenChange", handleFullscreenChange);

function handleFullscreenChange() {
    if (!document.fullscreenElement && 
        !document.webkitFullscreenElement && 
        !document.mozFullScreenElement && 
        !document.msFullscreenElement) {
        // On a quitté le mode plein écran
        chatFloating.style.display = "none";
    } else {
        // On est entré en mode plein écran
        setTimeout(() => {
            chatFloating.style.display = "flex";
        }, 100);
    }
}

// === Aussi gérer la touche Échap pour quitter le plein écran ===
document.addEventListener("keydown", (e) => {
    if (e.key === "Escape" && 
        (document.fullscreenElement || 
         document.webkitFullscreenElement || 
         document.mozFullScreenElement || 
         document.msFullscreenElement)) {
        // Masquer le chat flottant quand on quitte avec Échap
        setTimeout(() => {
            chatFloating.style.display = "none";
        }, 50);
    }
});
/* === Sync new messages to floating chat === */
function pushToFloating(msgHtml) {
    // Vérifier si c'est un indicateur de frappe
    if (msgHtml.includes('(...)') || msgHtml.includes('typingIndicator')) {
        return; // Ne pas ajouter l'indicateur de frappe via cette méthode
    }
    
    const chatFloatingMsgs = document.getElementById("chatFloatingMsgs");
    if (!chatFloatingMsgs) return;
    
    const div = document.createElement("div");
    div.className = "chat-bubble";
    div.innerHTML = msgHtml;
    chatFloatingMsgs.appendChild(div);
    chatFloatingMsgs.scrollTop = chatFloatingMsgs.scrollHeight;
}

// Fonction pour gérer les indicateurs de frappe dans les deux zones
function updateTypingIndicator(data, isStarting) {
    const messagesDiv = document.getElementById("messages");
    const floatingMsgs = document.getElementById("chatFloatingMsgs");
    
    if (isStarting) {
        // Créer/remplacer dans #messages
        let indicator = document.getElementById("typingIndicator");
        if (!indicator && messagesDiv) {
            indicator = document.createElement("div");
            indicator.id = "typingIndicator";
            indicator.className = 'chat-bubble';
            indicator.innerHTML = `<em>${data.isModel ? "{{ $modele->nom }} {{ $modele->prenom }}" : data.pseudo} : (...)</em>`;
            messagesDiv.appendChild(indicator);
            messagesDiv.scrollTop = messagesDiv.scrollHeight;
        }
        
        // Créer/remplacer dans #chatFloatingMsgs
        let floatingIndicator = document.getElementById("typingIndicatorFloating");
        if (!floatingIndicator && floatingMsgs) {
            floatingIndicator = document.createElement("div");
            floatingIndicator.id = "typingIndicatorFloating";
            floatingIndicator.className = 'chat-bubble';
            floatingIndicator.style.fontSize = '0.9em';
            floatingIndicator.style.opacity = '0.8';
            floatingIndicator.innerHTML = `<em>${data.isModel ? "{{ $modele->nom }} {{ $modele->prenom }}" : data.pseudo} : (...)</em>`;
            floatingMsgs.appendChild(floatingIndicator);
            floatingMsgs.scrollTop = floatingMsgs.scrollHeight;
        }
    } else {
        // Supprimer les deux indicateurs
        const typingIndicator = document.getElementById("typingIndicator");
        const floatingIndicator = document.getElementById("typingIndicatorFloating");
        
        if (typingIndicator) typingIndicator.remove();
        if (floatingIndicator) floatingIndicator.remove();
    }
}

/* Intercepter tes messages existants */
const originalAppend = messagesDiv.appendChild.bind(messagesDiv);
messagesDiv.appendChild = function (node) {
    originalAppend(node.cloneNode(true));
    pushToFloating(node.innerHTML);
};

/* === Send from floating input === */
floatingSendBtn.addEventListener("click", () => {
    const msg = floatingInput.value.trim();
    if (!msg) return;
    messageInput.value = msg; 
    sendMessage(new Event("submit"));
    floatingInput.value = "";
});

/* === DRAGGABLE FLOATING CHAT === */
let drag = false, offsetX = 0, offsetY = 0;

chatFloating.addEventListener("mousedown", (e) => {
    drag = true;
    chatFloating.classList.add("dragging");
    offsetX = e.clientX - chatFloating.offsetLeft;
    offsetY = e.clientY - chatFloating.offsetTop;
});

document.addEventListener("mouseup", () => {
    drag = false;
    chatFloating.classList.remove("dragging");
});

document.addEventListener("mousemove", (e) => {
    if (!drag) return;
    chatFloating.style.left = (e.clientX - offsetX) + "px";
    chatFloating.style.top = (e.clientY - offsetY) + "px";
});

/* === Send message when pressing Enter in floating chat === */
floatingInput.addEventListener("keydown", (e) => {
    if (e.key === "Enter") {
        e.preventDefault(); 
        const msg = floatingInput.value.trim();
        if (!msg) return;

        messageInput.value = msg;   // on réutilise la même fonction
        sendMessage(new Event("submit"));

        floatingInput.value = "";
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
let isPassingToPrivate = false;

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
                    modeleId: {{ $modele->id }},

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
    // UTILISER window.isPassingToPrivate (global)
function onTokenChoiceClick(e, isGolden) {
    const btn = e.currentTarget;
    const name = btn.dataset.name || 'Jeton';
    const cost = parseInt(btn.dataset.cost || '0');
    const description = btn.dataset.description || '';
    const modeleId = {{ $modele->id }};
    const pseudo = "{{ Auth::check() ? Auth::user()->pseudo : 'Anonyme' }}";

    // Protection globale (utilise window.)
    if (window.isPassingToPrivate === true) {
        console.warn("⛔ Jeton bloqué car utilisateur passe en show privée.");
        createTokenBubble(name, cost, isGolden);

        if (typeof socket !== 'undefined') {
            socket.emit("jeton-sent", {
                name,
                cost,
                description,
                pseudo,
                isGolden,
                modeleId: modeleId,
                showPriveId: "{{ $showPriveId ?? '' }}"
            });
        }
        return; // stop : PAS de fetch
    }

    // Normal case → fetch (débit réel)
    fetch("{{ route('use.jeton') }}", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": document.querySelector('meta[name=\"csrf-token\"]').getAttribute('content')
        },
        body: JSON.stringify({ name, cost, modele_id: modeleId })
    })
    .then(res => res.json())
    .then(data => {
        if (data.error) {
            alert(data.error);
            return;
        }

        createTokenBubble(data.name, data.cost, isGolden);

        if (typeof socket !== 'undefined') {
            socket.emit("jeton-sent", {
                name: data.name,
                cost: data.cost,
                description: description,
                pseudo: pseudo,
                isGolden: isGolden,
                modeleId: modeleId,
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


</script>
<script>
function updateTokenVisibility() {
    const tokenCosts = document.querySelectorAll('.token-cost');

    tokenCosts.forEach(cost => {
        if (window.isPassingToPrivate === true) {
            cost.style.display = "none"; // cacher
        } else {
            cost.style.display = "block"; // afficher
        }
    });
}

// Appel initial
updateTokenVisibility();

// Surveille les changements de mode privé
setInterval(updateTokenVisibility, 300);


const constraints = {
  video: { 
    width: { ideal: 3840 },   // résolution horizontale 4K
    height: { ideal: 2160 },  // résolution verticale 4K
    frameRate: { ideal: 120 }  // nombre d'images par seconde
  },
  audio: true
};

navigator.mediaDevices.getUserMedia(constraints)
  .then(stream => {
    const video = document.getElementById('liveVideo');
    video.srcObject = stream;
    video.play();
  })
  .catch(err => console.error('Erreur getUserMedia:', err));

</script>

