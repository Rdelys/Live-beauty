@include('components.chatbot')
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>LIVE BEAUTY - Tableau de bord</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icons/6.6.6/css/flag-icons.min.css">

  <style>
    /* ===== STYLE PREMIUM ULTRA-MODERNE - ROUGE/NOIR/BLANC ===== */
/* ===== STYLE PREMIUM ULTRA-MODERNE - ROUGE/NOIR/BLANC ===== */
:root {
    /* PALETTE PREMIUM DYNAMIQUE */
    --red-primary: #e50914;
    --red-dark: #b20710;
    --red-light: #ff1f3d;
    --red-neon: #ff0040;
    --black-dark: #0a0a0a;
    --black-card: #151515;
    --black-light: #1a1a1a;
    --white-pure: #ffffff;
    --gray-light: #f5f5f5;
    --gray-medium: #8a8a8a;
    --gray-dark: #2a2a2a;
    --gold: #ffd700;
    --green-neon: #00ff88;
    --accent: #ff0000;
    
    /* EFFETS PREMIUM AVANCÉS */
    --glow-red: 0 0 20px rgba(229, 9, 20, 0.5);
    --glow-strong: 0 0 35px rgba(229, 9, 20, 0.7);
    --glow-neon: 0 0 25px var(--red-neon);
    --shadow-heavy: 0 10px 40px rgba(0, 0, 0, 0.9);
    --shadow-light: 0 5px 20px rgba(0, 0, 0, 0.4);
    --border-glass: 1px solid rgba(255, 255, 255, 0.12);
    --border-glow: 1px solid rgba(255, 0, 64, 0.3);
    
    /* DIMENSIONS OPTIMISÉES */
    --radius-sm: 8px;
    --radius-md: 12px;
    --radius-lg: 16px;
    --radius-xl: 24px;
    --radius-full: 50px;
    --border-radius: 0.9rem;
    
    /* TRANSITIONS ET ANIMATIONS */
    --transition-fast: 0.25s cubic-bezier(0.4, 0, 0.2, 1);
    --transition-normal: 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    --transition-slow: 0.6s cubic-bezier(0.4, 0, 0.2, 1);
    --transition-bounce: 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    --transition: all 0.3s ease;
}

/* ===== RESET & BASE ANIMÉ ===== */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    background: #000; /* Fallback solide */
    background: radial-gradient(circle at 50% 0%, #0a0a0a 0%, #000 100%);    color: var(--white-pure);
    font-family: 'Inter', 'Segoe UI', system-ui, -apple-system, sans-serif;
    min-height: 100vh;
    overflow-x: hidden;
    line-height: 1.5;
    font-size: 0.95rem;
    animation: fadeInBody 1s ease-out;
}

@keyframes fadeInBody {
    from { opacity: 0; }
    to { opacity: 1; }
}

/* ===== NAVBAR ANIMÉE & GLOW ===== */
.navbar {
    background: linear-gradient(180deg, rgba(10, 10, 10, 0.98) 0%, rgba(10, 10, 10, 0.85) 100%);
    backdrop-filter: blur(25px) saturate(180%);
    border-bottom: var(--border-glow);
    padding: 0.7rem 0;
    box-shadow: 0 8px 40px rgba(229, 9, 20, 0.2);
    position: sticky;
    top: 0;
    z-index: 1000;
    animation: slideDown 0.6s ease-out;
}

@keyframes slideDown {
    from { transform: translateY(-100%); opacity: 0; }
    to { transform: translateY(0); opacity: 1; }
}

.navbar-brand {
    font-size: 1.6rem;
    font-weight: 900;
    letter-spacing: 1px;
    transition: var(--transition-normal);
    position: relative;
    overflow: hidden;
    display: flex;
    align-items: center;
    gap: 6px;
    text-transform: uppercase;
}

.navbar-brand::after {
    content: '';
    position: absolute;
    bottom: -2px;
    left: 0;
    width: 0;
    height: 2px;
    background: linear-gradient(90deg, var(--red-primary), var(--red-neon));
    transition: width var(--transition-normal);
}

.navbar-brand:hover::after {
    width: 100%;
}

.navbar-brand .live {
    color: var(--white-pure) !important;
    text-shadow: 0 0 15px var(--red-primary);
    padding: 2px 6px;
    background: linear-gradient(90deg, var(--red-primary), var(--red-neon));
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
    animation: textGlow 3s infinite alternate;
    font-size: 1.4rem;
    font-weight: 600;
}

.navbar-brand .beauty {
    color: #000;
    background-color: #fff;
    border-radius: 8px;
    padding: 0 10px;
    font-weight: 700;
    font-size: 1.8rem;
    line-height: 1.2;
    box-shadow: var(--glow-red);
    position: relative;
    overflow: hidden;
}

.navbar-brand .beauty::before {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.1), transparent);
    transform: rotate(45deg);
    animation: shine 3s infinite;
}

@keyframes shine {
    0% { transform: translateX(-100%) translateY(-100%) rotate(45deg); }
    100% { transform: translateX(100%) translateY(100%) rotate(45deg); }
}

@keyframes textGlow {
    0%, 100% { text-shadow: 0 0 10px var(--red-primary), 0 0 20px rgba(229, 9, 20, 0.5); }
    50% { text-shadow: 0 0 15px var(--red-neon), 0 0 30px rgba(255, 0, 64, 0.6); }
}

/* Navigation avec effets spéciaux */
.navbar-nav {
    gap: 0.5rem;
}

.nav-link {
    color: var(--gray-light) !important;
    font-weight: 600;
    font-size: 0.82rem;
    padding: 0.5rem 1rem !important;
    border-radius: var(--radius-sm);
    transition: all var(--transition-fast);
    position: relative;
    overflow: hidden;
    text-transform: uppercase;
    letter-spacing: 0.25px;
}

.nav-link::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(229, 9, 20, 0.2), transparent);
    transition: left var(--transition-normal);
}

.nav-link:hover::before {
    left: 100%;
}

.nav-link:hover {
    color: var(--white-pure) !important;
    background: rgba(229, 9, 20, 0.15);
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(229, 9, 20, 0.3);
}

.nav-link i {
    font-size: 1.3rem;
    margin-right: 6px;
    transition: var(--transition-bounce);
    color: #fff;
    text-shadow: 0 0 6px rgba(255, 0, 0, 0.3);
}

.nav-link:hover i {
    color: var(--red-neon);
    transform: scale(1.15) rotate(10deg);
    text-shadow: 0 0 10px rgba(255, 0, 0, 0.8);
}

/* Jetons display */
.jetons-display {
    font-weight: 600;
    color: #ffd966;
    font-size: 0.85rem;
    display: flex;
    align-items: center;
    gap: 4px;
    transition: var(--transition);
}

.jetons-display i {
    transition: all 0.3s ease;
    filter: drop-shadow(0 0 4px rgba(255, 215, 0, 0.3));
}

.jetons-display:hover i {
    transform: rotate(-15deg) scale(1.15);
    filter: drop-shadow(0 0 10px rgba(255, 215, 0, 0.7));
}

/* Bouton achat jetons VIP */
.achat-jetons-icon-vip {
    width: 48px;
    height: 48px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: gold;
    font-size: 1rem;
    background: rgba(255, 255, 255, 0.08);
    border-radius: 50%;
    border: 1px solid rgba(255, 215, 0, 0.4);
    box-shadow: 0 0 12px rgba(255, 215, 0, 0.3);
    animation: pulseGlow 2s infinite ease-in-out;
    transition: all 0.3s ease;
}

.achat-jetons-icon-vip:hover {
    transform: scale(1.1);
    color: #ffcc00;
    box-shadow: 0 0 20px rgba(255, 0, 0, 0.6);
}

@keyframes pulseGlow {
    0%, 100% { box-shadow: 0 0 8px rgba(255, 215, 0, 0.3); }
    50% { box-shadow: 0 0 20px rgba(255, 215, 0, 0.7); }
}

/* Boutons navbar animés */
.navbar .btn {
    font-size: 0.85rem;
    padding: 0.5rem 1.2rem;
    border-radius: var(--radius-md);
    font-weight: 700;
    transition: all var(--transition-bounce);
    position: relative;
    overflow: hidden;
}

.navbar .btn-light {
    background: rgba(255, 255, 255, 0.12);
    border: 1px solid rgba(255, 255, 255, 0.25);
    color: var(--white-pure);
}

.navbar .btn-light:hover {
    background: rgba(255, 255, 255, 0.2);
    transform: translateY(-3px) scale(1.05);
    box-shadow: var(--glow-red);
}

.navbar .btn-warning {
    background: linear-gradient(135deg, var(--red-primary), var(--red-neon));
    border: none;
    color: var(--white-pure);
    box-shadow: var(--glow-red);
    position: relative;
    z-index: 1;
}

.navbar .btn-warning::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, var(--red-neon), var(--red-primary));
    z-index: -1;
    opacity: 0;
    transition: opacity var(--transition-normal);
    border-radius: inherit;
}

.navbar .btn-warning:hover::before {
    opacity: 1;
}

.navbar .btn-warning:hover {
    transform: translateY(-3px) scale(1.05);
    box-shadow: var(--glow-strong);
    animation: pulseBtn 0.5s ease-in-out;
}

@keyframes pulseBtn {
    0%, 100% { transform: translateY(-3px) scale(1.05); }
    50% { transform: translateY(-3px) scale(1.08); }
}

/* ===== SIDEBAR AVEC EFFETS GLASS ===== */
.sidebar {
    background: linear-gradient(180deg, rgba(10, 10, 10, 0.98) 0%, rgba(10, 10, 10, 0.85) 100%);
    backdrop-filter: blur(20px) saturate(200%);
    border-right: var(--border-glass);
    padding: 1.4rem 1rem;
    height: calc(100vh - 70px);
    position: sticky;
    top: 70px;
    overflow-y: auto;
    scrollbar-width: thin;
    scrollbar-color: var(--red-primary) transparent;
    animation: slideInLeft 0.5s ease-out;
    min-height: 100vh;
    box-shadow: inset -1px 0 0 rgba(255, 255, 255, 0.05);
}

@keyframes slideInLeft {
    from { transform: translateX(-100%); opacity: 0; }
    to { transform: translateX(0); opacity: 1; }
}

.sidebar::-webkit-scrollbar {
    width: 4px;
}

.sidebar::-webkit-scrollbar-track {
    background: transparent;
}

.sidebar::-webkit-scrollbar-thumb {
    background: linear-gradient(to bottom, var(--red-primary), var(--red-neon));
    border-radius: var(--radius-full);
}

.sidebar h5 {
    color: var(--red-light);
    font-size: 0.8rem;
    text-transform: uppercase;
    letter-spacing: 1px;
    margin: 1.5rem 0 1rem;
    padding: 0.6rem 0.8rem;
    background: linear-gradient(90deg, rgba(229, 9, 20, 0.15), transparent);
    border-radius: var(--radius-sm);
    border-left: 3px solid var(--red-primary);
    position: relative;
    overflow: hidden;
}

.sidebar h5::after {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
    animation: shimmer 3s infinite;
}

@keyframes shimmer {
    0% { left: -100%; }
    100% { left: 100%; }
}

.sidebar a {
    display: flex;
    align-items: center;
    color: var(--gray-medium);
    text-decoration: none;
    padding: 0.6rem 0.8rem;
    margin: 0.2rem 0;
    border-radius: var(--radius-sm);
    transition: all var(--transition-fast);
    font-size: 0.85rem;
    font-weight: 500;
    position: relative;
}

.sidebar a:hover {
    background: linear-gradient(90deg, rgba(229, 9, 20, 0.2), transparent);
    color: var(--white-pure);
    transform: translateX(8px);
    border-left: 3px solid var(--red-primary);
    box-shadow: 0 4px 12px rgba(229, 9, 20, 0.15);
}

.sidebar a i {
    margin-right: 10px;
    width: 18px;
    text-align: center;
    font-size: 0.9rem;
    transition: var(--transition-bounce);
}

.sidebar a:hover i {
    color: var(--red-neon);
    transform: scale(1.2) rotate(15deg);
}

/* Live models sidebar animés */
#activeLives a {
    color: var(--green-neon);
    font-weight: 700;
    padding: 0.5rem 0.8rem;
    margin: 0.25rem 0;
    background: linear-gradient(90deg, rgba(0, 255, 136, 0.15), transparent);
    border-radius: var(--radius-sm);
    border-left: 3px solid var(--green-neon);
    animation: pulseLive 2s infinite, slideInRight 0.5s ease-out;
    font-size: 0.85rem;
    position: relative;
    overflow: hidden;
}

@keyframes pulseLive {
    0%, 100% { 
        box-shadow: 0 0 10px rgba(0, 255, 136, 0.3);
        transform: translateX(0);
    }
    50% { 
        box-shadow: 0 0 20px rgba(0, 255, 136, 0.6);
        transform: translateX(4px);
    }
}

@keyframes slideInRight {
    from { transform: translateX(-20px); opacity: 0; }
    to { transform: translateX(0); opacity: 1; }
}

/* Titres VIP dans sidebar */
.section-title-vip {
    color: gold;
    font-size: 0.9rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1px;
    text-shadow: 0 0 8px rgba(255, 215, 0, 0.5);
    display: flex;
    align-items: center;
}

.section-title-vip-gold {
    color: #ffeb99;
    text-transform: uppercase;
    font-weight: 700;
    font-size: 0.9rem;
    letter-spacing: 1px;
    display: flex;
    align-items: center;
    text-shadow: 0 0 12px rgba(255, 215, 0, 0.6);
}

.section-title-vip-gold i {
    font-size: 1rem;
    filter: drop-shadow(0 0 6px rgba(255, 215, 0, 0.5));
}

.section-title-favoris {
    color: var(--red-light);
    text-transform: uppercase;
    font-weight: 600;
    letter-spacing: 1px;
    font-size: 0.9rem;
    margin-bottom: 0.8rem;
    display: flex;
    align-items: center;
    text-shadow: 0 0 10px rgba(255, 0, 0, 0.5);
}

.section-title-favoris i {
    font-size: 1rem;
    color: #ff1f3d;
    filter: drop-shadow(0 0 5px rgba(255, 0, 0, 0.5));
}

/* Liens favoris */
.favori-link {
    color: #ccc;
    text-decoration: none;
    font-weight: 500;
    font-size: 0.85rem;
    padding: 0.4rem 0.6rem;
    border-radius: 8px;
    transition: all 0.3s ease;
    position: relative;
    background: rgba(255, 255, 255, 0.02);
    margin-bottom: 4px;
    border: 1px solid rgba(255, 255, 255, 0.05);
    display: flex;
    align-items: center;
}

.favori-link i {
    color: #ff4d4d;
    transition: all 0.3s ease;
    margin-right: 0.5rem;
}

.favori-link:hover {
    background: rgba(255, 0, 0, 0.08);
    color: var(--red-light);
    transform: translateX(5px);
    box-shadow: 0 0 10px rgba(255, 0, 0, 0.3);
}

.favori-link:hover i {
    color: #ff1a1a;
    transform: scale(1.15);
    filter: drop-shadow(0 0 6px rgba(255, 0, 0, 0.6));
}

/* ===== CARTES MODÈLES ULTRA-PREMIUM ===== */
.model-card {
    background: linear-gradient(145deg, rgba(21, 21, 21, 0.95), rgba(10, 10, 10, 0.95));
    border-radius: var(--radius-xl);
    overflow: hidden;
    border: var(--border-glass);
    transition: all var(--transition-normal);
    position: relative;
    height: 100%;
    max-height: 380px;
    min-height: 350px;
    animation: cardFloat 6s ease-in-out infinite;
    animation-play-state: paused;
    margin-bottom: 0;
    padding-bottom: 0;
    box-shadow: 0 0 15px rgba(255, 0, 0, 0.08);
}

.model-card:hover {
    animation-play-state: running;
    transform: translateY(-8px) scale(1.02);
    box-shadow: var(--shadow-heavy), var(--glow-strong);
    border-color: rgba(229, 9, 20, 0.4);
}

@keyframes cardFloat {
    0%, 100% { transform: translateY(0) rotateX(0); }
    50% { transform: translateY(-10px) rotateX(2deg); }
}

/* Container média avec effet parallaxe */
.media-container {
    position: relative;
    width: 100%;
    height: 280px;
    overflow: hidden;
    background: #000;
    display: flex;
    align-items: center;
    justify-content: center;
    perspective: 1000px;
    aspect-ratio: 4 / 5;
    box-shadow: 0 0 15px rgba(255, 0, 0, 0.1);
}

/* Fond flouté uniforme */
.media-container::before,
.card-photo::before {
    content: "";
    position: absolute;
    inset: 0;
    background-image: var(--photo-bg);
    background-size: cover;
    background-position: center;
    filter: blur(15px) brightness(0.55);
    transform: scale(1.2);
    z-index: 0;
    transition: filter 0.3s ease;
}

.card-photo:hover::before,
.media-container:hover::before {
    filter: blur(18px) brightness(0.65);
}

/* PHOTO DU MODÈLE avec effet de zoom élégant */
.model-photo {
    position: relative;
    z-index: 1;
    width: 100%;
    height: 100%;
    object-fit: contain;
    object-position: center;
    transition: transform var(--transition-slow) ease-out;
    display: block;
    background-color: transparent !important;
    filter: saturate(1.1) contrast(1.05);
    transform-style: preserve-3d;
    will-change: transform;
    pointer-events: none;
}

.model-card:hover .model-photo,
.card-photo:hover .model-photo {
    transform: scale(1.15) translateZ(20px);
    filter: saturate(1.3) contrast(1.15) brightness(1.05);
}

/* VIDÉO AU HOVER - MODIFICATION : reste en arrière-plan, ne masque pas l'image */
.model-video {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    opacity: 0;
    z-index: 1;
    transition: opacity var(--transition-normal);
    pointer-events: none;
    background: #000;
    transform-style: preserve-3d;
}

.model-video video,
.model-video iframe {
    width: 100%;
    height: 100%;
    object-fit: contain;
    transform: translateZ(10px);
}

.media-container:hover .model-video {
    opacity: 0.3;
    animation: videoAppear 0.5s ease-out;
}

@keyframes videoAppear {
    from { opacity: 0; transform: scale(0.95); }
    to { opacity: 0.3; transform: scale(1); }
}

/* STATUS DOT - ANIMATION AVANCÉE */
.status-dot {
    display: inline-block;
    width: 12px;
    height: 12px;
    border-radius: 50%;
    margin-right: 8px;
    border: 2px solid rgba(255, 255, 255, 0.95);
    box-shadow: 0 0 15px currentColor;
    flex-shrink: 0;
    position: relative;
    animation: statusPulse 2s infinite;
}

.status-dot[style*="#28a745"],
.status-dot.online {
    background-color: var(--green-neon) !important;
    box-shadow: 0 0 15px var(--green-neon), 0 0 30px rgba(0, 255, 136, 0.5) !important;
    animation: statusPulseOnline 1.5s infinite;
}

.status-dot[style*="#dc3545"],
.status-dot.offline {
    background-color: #ff3333 !important;
    box-shadow: 0 0 15px #ff3333, 0 0 30px rgba(255, 51, 51, 0.5) !important;
    animation: statusPulseOffline 2s infinite;
}

@keyframes statusPulseOnline {
    0%, 100% { 
        transform: scale(1);
        box-shadow: 0 0 15px var(--green-neon), 0 0 30px rgba(0, 255, 136, 0.5);
    }
    50% { 
        transform: scale(1.3);
        box-shadow: 0 0 25px var(--green-neon), 0 0 50px rgba(0, 255, 136, 0.7);
    }
}

@keyframes statusPulseOffline {
    0%, 100% { 
        transform: scale(1);
        box-shadow: 0 0 15px #ff3333, 0 0 30px rgba(255, 51, 51, 0.5);
    }
    50% { 
        transform: scale(1.2);
        box-shadow: 0 0 20px #ff3333, 0 0 40px rgba(255, 51, 51, 0.6);
    }
}

/* Nom et statut avec effet glassmorphism */
.status-name {
    position: absolute;
    bottom: 15px;
    left: 15px;
    z-index: 4;
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 8px 18px;
    max-width: calc(100% - 30px);
    animation: slideUp 0.4s ease-out;
    transform-origin: left bottom;
}

@keyframes slideUp {
    from { transform: translateY(20px) scale(0.9); opacity: 0; }
    to { transform: translateY(0) scale(1); opacity: 1; }
}

.model-name {
    color: var(--white-pure);
    font-size: 1.1rem;
    font-weight: 800;
    text-shadow: 0 2px 8px rgba(0,0,0,0.9);
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    max-width: 150px;
    letter-spacing: 0.3px;
    background: linear-gradient(135deg, var(--white-pure), var(--gray-light));
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
}

/* Badges VIP avec effet doré */
.vip-badge {
    position: absolute;
    top: 15px;
    left: 15px;
    background: linear-gradient(135deg, var(--gold), #ff9800, var(--gold));
    color: #000;
    padding: 5px 12px;
    border-radius: var(--radius-full);
    font-size: 0.75rem;
    font-weight: 900;
    letter-spacing: 0.5px;
    text-transform: uppercase;
    z-index: 4;
    box-shadow: 0 4px 15px rgba(255, 215, 0, 0.4);
    animation: vipShine 3s infinite, badgeBounce 3s infinite;
    transform-origin: center;
}

@keyframes vipShine {
    0%, 100% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
}

@keyframes badgeBounce {
    0%, 100% { transform: translateY(0) rotate(0); }
    50% { transform: translateY(-3px) rotate(2deg); }
}

/* Boutons galerie avec effets spéciaux */
.open-gallery-btn {
    position: absolute;
    bottom: 15px;
    right: 15px;
    background: linear-gradient(135deg, rgba(229, 9, 20, 0.4), rgba(255, 0, 64, 0.3));
    border: 1px solid rgba(229, 9, 20, 0.6);
    color: var(--white-pure);
    width: 36px;
    height: 36px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 4;
    transition: all var(--transition-bounce);
    backdrop-filter: blur(10px);
    font-size: 0.9rem;
    box-shadow: 0 4px 15px rgba(229, 9, 20, 0.3);
}

.open-gallery-btn:hover {
    background: linear-gradient(135deg, var(--red-primary), var(--red-neon));
    transform: scale(1.2) rotate(15deg);
    box-shadow: var(--glow-neon);
    animation: btnSpin 0.5s ease-out;
}

@keyframes btnSpin {
    0% { transform: scale(1) rotate(0); }
    100% { transform: scale(1.2) rotate(15deg); }
}

/* Boutons galerie dans card-photo */
.open-gallery {
    background: linear-gradient(135deg, rgba(229, 9, 20, 0.3), rgba(255, 0, 64, 0.2));
    border: 1px solid rgba(229, 9, 20, 0.5);
    color: var(--white-pure);
    padding: 6px 14px;
    border-radius: var(--radius-full);
    font-size: 0.85rem;
    transition: all var(--transition-bounce);
    display: inline-flex;
    align-items: center;
    gap: 8px;
    margin: 3px;
    backdrop-filter: blur(5px);
}

.open-gallery:hover {
    background: linear-gradient(135deg, var(--red-primary), var(--red-neon));
    transform: translateY(-3px) scale(1.05);
    box-shadow: var(--glow-red);
    animation: btnPulse 0.3s ease-out;
}

@keyframes btnPulse {
    0% { transform: translateY(-3px) scale(1); }
    50% { transform: translateY(-3px) scale(1.1); }
    100% { transform: translateY(-3px) scale(1.05); }
}

.open-gallery i {
    font-size: 0.9rem;
    transition: var(--transition-bounce);
}

.open-gallery:hover i {
    transform: scale(1.2) rotate(10deg);
}

/* ===== BOUTON FAVORI ULTRA-PREMIUM ===== */
.btn-favori {
    position: absolute;
    top: 10px;
    right: 10px;
    background: transparent;
    border: none;
    outline: none;
    cursor: pointer;
    transition: transform 0.25s ease;
    z-index: 10;
}

.btn-favori i {
    font-size: 1.4rem;
    color: #bbb;
    filter: drop-shadow(0 0 2px rgba(255, 255, 255, 0.2));
    transition: all 0.35s ease;
}

.btn-favori:hover i {
    color: #ff2a2a;
    transform: scale(1.1);
    filter: drop-shadow(0 0 8px rgba(255, 0, 0, 0.8));
}

/* ❤️ ACTIVÉ (EN FAVORI) */
.btn-favori.active i {
    color: #ff003c;
    text-shadow: 0 0 10px rgba(255, 0, 0, 0.8);
    animation: pulseHeart 1.2s infinite ease-in-out;
}

@keyframes pulseHeart {
    0%, 100% {
        transform: scale(1);
        filter: drop-shadow(0 0 8px rgba(255, 0, 0, 0.6));
    }
    50% {
        transform: scale(1.2);
        filter: drop-shadow(0 0 16px rgba(255, 80, 80, 1));
    }
}

/* 💫 HALO AUTOUR DU CŒUR (EFFET PREMIUM) */
.btn-favori::after {
    content: "";
    position: absolute;
    top: 50%;
    left: 50%;
    width: 36px;
    height: 36px;
    background: radial-gradient(circle, rgba(255,0,0,0.4) 0%, rgba(255,0,0,0) 70%);
    transform: translate(-50%, -50%) scale(0);
    opacity: 0;
    border-radius: 50%;
    transition: all 0.3s ease-out;
    pointer-events: none;
}

.btn-favori.active::after {
    transform: translate(-50%, -50%) scale(1.15);
    opacity: 1;
}

/* ===== CONTENU FLOUTÉ (PAYANT) ===== */
.blur-wrapper {
    position: relative;
    overflow: hidden;
    display: block;
    border-radius: var(--border-radius);
}

.blur-wrapper img,
.blur-wrapper video {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    transition: filter 0.35s ease, transform 0.35s ease;
}

.blur-wrapper.soft img,
.blur-wrapper.soft video {
    filter: blur(10px);
}

.blur-wrapper.strong img,
.blur-wrapper.strong video {
    filter: blur(30px);
}

.blur-wrapper.hidden img,
.blur-wrapper.hidden video {
    filter: blur(60px);
    opacity: 0.8;
}

.blur-wrapper.pixel img {
    filter: blur(5px);
    image-rendering: pixelated;
    transform: scale(1.1);
    opacity: 0.9;
}

/* OVERLAY PAYANT */
.blur-overlay {
    position: absolute;
    inset: 0;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    z-index: 20;
    background: rgba(0, 0, 0, 0.5);
    color: #fff;
    gap: 8px;
    backdrop-filter: blur(6px);
    border-radius: inherit;
    pointer-events: none;
    font-size: 0.9rem;
    font-weight: 600;
    letter-spacing: 0.3px;
}

.blur-overlay button {
    pointer-events: auto;
}

/* ===== MODALES AVEC EFFETS SPECTACULAIRES ===== */
.modal-content {
    background: linear-gradient(145deg, rgba(15, 15, 15, 0.98), rgba(10, 10, 10, 0.95));
    backdrop-filter: blur(30px) saturate(200%);
    border: var(--border-glow);
    border-radius: var(--radius-xl);
    color: var(--white-pure);
    box-shadow: var(--shadow-heavy), var(--glow-strong);
    animation: modalAppear 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    transform-origin: center;
}

@keyframes modalAppear {
    0% { transform: scale(0.8) rotateX(-10deg); opacity: 0; }
    100% { transform: scale(1) rotateX(0); opacity: 1; }
}

.modal-header {
    border-bottom: 1px solid rgba(255, 255, 255, 0.15);
    padding: 1.2rem 1.5rem;
    background: linear-gradient(90deg, rgba(229, 9, 20, 0.1), transparent);
}

.modal-title {
    color: var(--white-pure);
    font-weight: 800;
    font-size: 1.3rem;
    display: flex;
    align-items: center;
    gap: 10px;
    background: linear-gradient(135deg, var(--white-pure), var(--gray-light));
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
}

.modal-title i {
    color: var(--red-neon);
    animation: iconFloat 2s ease-in-out infinite;
}

@keyframes iconFloat {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-5px); }
}

.btn-close {
    filter: invert(1) brightness(2);
    opacity: 0.8;
    transition: var(--transition-bounce);
    width: 1em;
    height: 1em;
}

.btn-close:hover {
    opacity: 1;
    transform: rotate(90deg) scale(1.1);
}

.modal-body {
    padding: 1.5rem;
    animation: fadeInUp 0.6s ease-out;
}

@keyframes fadeInUp {
    from { transform: translateY(20px); opacity: 0; }
    to { transform: translateY(0); opacity: 1; }
}

/* Formulaires avec effets de focus */
.form-control {
    background: rgba(255, 255, 255, 0.08);
    border: 1px solid rgba(255, 255, 255, 0.15);
    color: var(--white-pure);
    border-radius: var(--radius-md);
    padding: 0.8rem 1rem;
    transition: all var(--transition-normal);
    font-size: 0.95rem;
    backdrop-filter: blur(5px);
}

.form-control:focus {
    background: rgba(255, 255, 255, 0.12);
    border-color: var(--red-primary);
    box-shadow: 0 0 0 3px rgba(229, 9, 20, 0.2), var(--glow-red);
    color: var(--white-pure);
    transform: translateY(-2px);
}

.form-label {
    color: var(--gray-light);
    font-weight: 600;
    margin-bottom: 0.5rem;
    font-size: 0.9rem;
    display: block;
    animation: labelAppear 0.3s ease-out;
}

@keyframes labelAppear {
    from { transform: translateY(-10px); opacity: 0; }
    to { transform: translateY(0); opacity: 1; }
}

/* Boutons modales animés */
.btn-submit {
    background: linear-gradient(135deg, var(--red-primary), var(--red-neon));
    border: none;
    color: var(--white-pure);
    padding: 0.8rem 2rem;
    border-radius: var(--radius-md);
    font-weight: 800;
    letter-spacing: 0.5px;
    transition: all var(--transition-bounce);
    width: 100%;
    font-size: 0.95rem;
    position: relative;
    overflow: hidden;
    box-shadow: var(--glow-red);
}

.btn-submit::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: left var(--transition-normal);
}

.btn-submit:hover::before {
    left: 100%;
}

.btn-submit:hover {
    background: linear-gradient(135deg, var(--red-neon), var(--red-primary));
    transform: translateY(-3px) scale(1.02);
    box-shadow: var(--glow-strong);
    animation: submitPulse 0.5s ease-in-out;
}

@keyframes submitPulse {
    0%, 100% { transform: translateY(-3px) scale(1.02); }
    50% { transform: translateY(-3px) scale(1.05); }
}

.btn-submit:disabled {
    opacity: 0.5;
    cursor: not-allowed;
    transform: none !important;
    animation: none;
}

/* ===== MODALE PREMIUM SHOW PRIVÉ ===== */
.premium-modal {
    background: rgba(15, 15, 15, 0.9);
    backdrop-filter: blur(12px);
    border: 1px solid rgba(255, 0, 0, 0.3);
    border-radius: 0.9rem;
    box-shadow: 0 0 25px rgba(255, 0, 0, 0.25);
    color: #fff;
    font-family: "Poppins", "Segoe UI", sans-serif;
    padding: 1.6rem;
    animation: fadeInUp 0.4s ease-out;
    max-width: 580px;
    margin: auto;
    transition: all 0.3s ease;
    font-size: 0.85rem;
}

.premium-modal .modal-title {
    color: var(--accent);
    text-align: center;
    text-shadow: 0 0 8px rgba(255, 0, 0, 0.6);
    font-weight: 600;
    font-size: 1.2rem;
    margin-bottom: 1.2rem;
}

.glow-circle {
    width: 65px;
    height: 65px;
    border-radius: 50%;
    border: 2px solid var(--accent);
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--accent);
    margin: 0.8rem auto 1.2rem;
    box-shadow: 0 0 12px rgba(255, 0, 0, 0.6);
    animation: pulseGlowModal 1.5s infinite alternate;
    font-size: 0.85rem;
}

@keyframes pulseGlowModal {
    from { box-shadow: 0 0 8px rgba(255, 0, 0, 0.4); }
    to { box-shadow: 0 0 18px rgba(255, 0, 0, 0.9); }
}

/* ===== DROPDOWN LANGUES ===== */
.lang-dropdown .nav-link {
    font-weight: 600;
    cursor: pointer;
    padding: 0.4rem 0.6rem !important;
    border-radius: 8px;
    transition: 0.3s ease;
}

.lang-dropdown .nav-link:hover {
    background-color: rgba(255,255,255,0.1);
}

.lang-dropdown {
    position: relative;
    z-index: 9999;
}

.lang-dropdown .dropdown-menu {
    z-index: 10000 !important;
    position: absolute;
    top: 100%;
    left: auto;
    right: 0;
    min-width: 120px;
}

.dropdown-menu-dark {
    background-color: #111;
    border: 1px solid rgba(255,0,0,0.2);
    border-radius: 12px;
    padding: 0.5rem 0;
}

.dropdown-menu-dark .dropdown-item {
    color: #fff;
    padding: 10px 18px;
    font-weight: 500;
    transition: 0.2s;
}

.dropdown-menu-dark .dropdown-item:hover {
    background-color: rgba(255,0,0,0.25);
    color: #ff4d4d !important;
    transform: translateX(4px);
}

/* ===== STYLE PSEUDO ===== */
.pseudo-styled {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 6px 14px;
    background: #ffffff;
    color: #000;
    font-weight: 700;
    border-radius: 30px;
    border: 2px solid #ff0000;
    text-decoration: none;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 0 8px rgba(255,0,0,0.2);
}

.pseudo-styled i {
    font-size: 1.1rem;
    color: #ff0000;
    transition: all 0.3s ease;
}

.pseudo-styled:hover {
    background: #ff0000;
    color: #fff;
    border-color: #fff;
    transform: scale(1.08);
    box-shadow: 0 0 12px rgba(255,0,0,0.6), 0 0 6px rgba(255,255,255,0.8);
}

.pseudo-styled:hover i {
    color: #fff;
    transform: scale(1.2);
}

.pseudo-styled:active {
    transform: scale(0.95);
}

/* ===== GRILLE AVEC ANIMATIONS ===== */
.container-fluid {
    padding-left: 1rem;
    padding-right: 1rem;
    animation: containerSlide 0.8s ease-out;
}

@keyframes containerSlide {
    from { transform: translateY(30px); opacity: 0; }
    to { transform: translateY(0); opacity: 1; }
}

.row.g-4 {
    --bs-gutter-x: 1rem;
    --bs-gutter-y: 1rem;
}

.col-md-4 {
    padding-left: 0.5rem;
    padding-right: 0.5rem;
    animation: columnAppear 0.6s ease-out;
    animation-fill-mode: both;
}

@keyframes columnAppear {
    from { transform: translateY(20px); opacity: 0; }
    to { transform: translateY(0); opacity: 1; }
}

/* Délais d'animation pour les colonnes */
.col-md-4:nth-child(1) { animation-delay: 0.1s; }
.col-md-4:nth-child(2) { animation-delay: 0.2s; }
.col-md-4:nth-child(3) { animation-delay: 0.3s; }
.col-md-4:nth-child(4) { animation-delay: 0.4s; }
.col-md-4:nth-child(5) { animation-delay: 0.5s; }
.col-md-4:nth-child(6) { animation-delay: 0.6s; }
.col-md-4:nth-child(7) { animation-delay: 0.7s; }
.col-md-4:nth-child(8) { animation-delay: 0.8s; }

/* ===== ALERTES ANIMÉES ===== */
.alert {
    background: linear-gradient(135deg, rgba(229, 9, 20, 0.95), rgba(179, 7, 16, 0.95));
    color: var(--white-pure);
    border: none;
    border-radius: var(--radius-md);
    box-shadow: var(--glow-red);
    backdrop-filter: blur(15px);
    animation: alertSlideIn 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.55), alertPulse 2s infinite;
    padding: 0.8rem 1.2rem;
    font-size: 0.9rem;
    min-width: 300px;
    max-width: 90%;
    transform-origin: top;
}

@keyframes alertSlideIn {
    0% { transform: translateY(-100%) scale(0.8); opacity: 0; }
    100% { transform: translateY(0) scale(1); opacity: 1; }
}

@keyframes alertPulse {
    0%, 100% { box-shadow: var(--glow-red); }
    50% { box-shadow: 0 0 30px rgba(229, 9, 20, 0.8); }
}

.alert-success {
    background: linear-gradient(135deg, rgba(0, 255, 136, 0.95), rgba(0, 200, 100, 0.95));
    animation: alertSlideIn 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.55), alertPulseSuccess 2s infinite;
}

@keyframes alertPulseSuccess {
    0%, 100% { box-shadow: 0 0 20px rgba(0, 255, 136, 0.5); }
    50% { box-shadow: 0 0 35px rgba(0, 255, 136, 0.8); }
}

/* ===== LOADER ULTRA-PREMIUM ===== */
#loader-screen {
    position: fixed;
    inset: 0;
    background: radial-gradient(circle at 50% 50%, #000 0%, #0a0a0a 100%);
    color: var(--white-pure);
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-align: center;
    z-index: 9999;
    animation: loaderFadeOut 0.5s ease-out 1.5s forwards;
}

@keyframes loaderFadeOut {
    to { opacity: 0; visibility: hidden; }
}

#loader-screen h1 {
    font-size: 3.5rem;
    font-weight: 900;
    color: transparent;
    text-transform: uppercase;
    background: linear-gradient(135deg, var(--red-primary), var(--red-neon), var(--red-primary));
    -webkit-background-clip: text;
    background-clip: text;
    background-size: 200% 100%;
    animation: textShimmer 3s infinite linear, loaderTextFloat 3s ease-in-out infinite;
    margin-bottom: 2rem;
    text-shadow: 0 0 30px rgba(229, 9, 20, 0.7);
}

@keyframes textShimmer {
    0% { background-position: 0% 50%; }
    100% { background-position: 200% 50%; }
}

@keyframes loaderTextFloat {
    0%, 100% { transform: translateY(0) scale(1); }
    50% { transform: translateY(-20px) scale(1.05); }
}

#loader-screen .spinner-container {
    position: relative;
    width: 120px;
    height: 120px;
    margin-bottom: 2rem;
}

#loader-screen .spinner {
    width: 120px;
    height: 120px;
    border: 8px solid rgba(229, 9, 20, 0.2);
    border-top: 8px solid var(--red-neon);
    border-radius: 50%;
    animation: spinnerRotate 1.5s linear infinite, spinnerGlow 2s ease-in-out infinite;
    position: absolute;
    top: 0;
    left: 0;
}

#loader-screen .spinner::before {
    content: '';
    position: absolute;
    top: -8px;
    left: -8px;
    right: -8px;
    bottom: -8px;
    border: 4px solid transparent;
    border-top: 4px solid var(--red-primary);
    border-radius: 50%;
    animation: spinnerRotate 2s linear infinite reverse;
}

@keyframes spinnerRotate {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

@keyframes spinnerGlow {
    0%, 100% { box-shadow: 0 0 20px rgba(229, 9, 20, 0.5); }
    50% { box-shadow: 0 0 40px rgba(229, 9, 20, 0.8); }
}

#loader-screen p {
    font-size: 1.8rem;
    font-weight: 700;
    color: transparent;
    background: linear-gradient(135deg, var(--white-pure), var(--gray-light));
    -webkit-background-clip: text;
    background-clip: text;
    text-shadow: 0 0 20px rgba(255, 255, 255, 0.5);
    animation: loaderTextPulse 2s ease-in-out infinite;
}

@keyframes loaderTextPulse {
    0%, 100% { opacity: 1; transform: scale(1); }
    50% { opacity: 0.7; transform: scale(1.1); }
}

/* ===== RESPONSIVE AVEC ANIMATIONS ===== */
@media (max-width: 1200px) {
    .col-md-4 {
        width: 33.333%;
        animation: columnAppearMobile 0.5s ease-out;
    }
    
    @keyframes columnAppearMobile {
        from { transform: translateY(15px); opacity: 0; }
        to { transform: translateY(0); opacity: 1; }
    }
    
    .media-container {
        height: 250px;
    }
    
    .model-card {
        max-height: 350px;
        min-height: 320px;
    }
    
    .model-name {
        font-size: 1rem;
        max-width: 130px;
    }
}

@media (max-width: 992px) {
    .sidebar {
        animation: slideInLeftMobile 0.4s ease-out;
        min-height: auto;
        padding: 1.1rem;
    }
    
    @keyframes slideInLeftMobile {
        from { transform: translateX(-50px); opacity: 0; }
        to { transform: translateX(0); opacity: 1; }
    }
    
    .col-md-4 {
        width: 50%;
    }
    
    .navbar-brand {
        font-size: 1.3rem;
    }
    
    .navbar-brand .beauty {
        font-size: 1.5rem;
    }
    
    .nav-link {
        padding: 0.4rem 0.7rem !important;
        font-size: 0.85rem;
    }
    
    .media-container {
        height: 230px;
    }
    
    .model-card {
        max-height: 330px;
        min-height: 300px;
    }
    
    .status-name {
        padding: 6px 15px;
    }
    
    .premium-modal {
        padding: 1.2rem;
        max-width: 90%;
    }
    
    .premium-modal .modal-title {
        font-size: 1.1rem;
    }
}

@media (max-width: 768px) {
    .navbar {
        animation: slideDownMobile 0.4s ease-out;
        flex-wrap: wrap;
        justify-content: center;
    }
    
    @keyframes slideDownMobile {
        from { transform: translateY(-50px); opacity: 0; }
        to { transform: translateY(0); opacity: 1; }
    }
    
    .navbar-brand {
        font-size: 1.2rem;
    }
    
    .navbar-brand .beauty {
        font-size: 1.3rem;
    }
    
    .navbar-toggler {
        padding: 0.3rem 0.5rem;
        font-size: 0.95rem;
        animation: togglerPulse 2s infinite;
    }
    
    @keyframes togglerPulse {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.05); }
    }
    
    .col-md-4 {
        width: 50%;
    }
    
    .media-container {
        height: 210px;
    }
    
    .model-card {
        max-height: 310px;
        min-height: 280px;
    }
    
    .model-name {
        font-size: 0.95rem;
        max-width: 110px;
    }
    
    .status-dot {
        width: 10px;
        height: 10px;
    }
    
    .modal-dialog {
        margin: 0.5rem;
        animation: modalAppearMobile 0.4s ease-out;
    }
    
    @keyframes modalAppearMobile {
        from { transform: scale(0.9); opacity: 0; }
        to { transform: scale(1); opacity: 1; }
    }
    
    .nav-icons {
        gap: 0.5rem;
    }
    
    .sidebar h5 {
        text-align: center;
    }
    
    .sidebar a {
        text-align: center;
        padding: 0.4rem;
    }
    
    .glow-circle {
        width: 55px;
        height: 55px;
        font-size: 0.75rem;
    }
}

@media (max-width: 576px) {
    :root {
        --radius-md: 10px;
        --radius-lg: 14px;
        --radius-xl: 18px;
    }
    
    .navbar .btn {
        padding: 0.4rem 0.9rem;
        font-size: 0.8rem;
        animation: btnSlideIn 0.5s ease-out;
    }
    
    @keyframes btnSlideIn {
        from { transform: translateX(20px); opacity: 0; }
        to { transform: translateX(0); opacity: 1; }
    }
    
    .sidebar {
        padding: 1rem;
        animation: sidebarSlideUp 0.5s ease-out;
    }
    
    @keyframes sidebarSlideUp {
        from { transform: translateY(50px); opacity: 0; }
        to { transform: translateY(0); opacity: 1; }
    }
    
    .sidebar a {
        padding: 0.5rem;
        font-size: 0.8rem;
    }
    
    .col-md-4 {
        width: 100%;
        animation: columnAppearFull 0.6s ease-out;
    }
    
    @keyframes columnAppearFull {
        from { transform: translateY(30px) scale(0.95); opacity: 0; }
        to { transform: translateY(0) scale(1); opacity: 1; }
    }
    
    .media-container {
        height: 260px;
    }
    
    .model-card {
        max-height: 340px;
        min-height: 310px;
    }
    
    .modal-body {
        padding: 1rem;
        animation: modalBodySlideUp 0.4s ease-out;
    }
    
    @keyframes modalBodySlideUp {
        from { transform: translateY(30px); opacity: 0; }
        to { transform: translateY(0); opacity: 1; }
    }
    
    .code-digit {
        height: 45px;
        width: 45px;
        font-size: 1.1rem;
        animation: digitAppear 0.3s ease-out;
    }
    
    @keyframes digitAppear {
        from { transform: scale(0); opacity: 0; }
        to { transform: scale(1); opacity: 1; }
    }
    
    .alert {
        min-width: 280px;
        font-size: 0.85rem;
        animation: alertSlideInMobile 0.4s ease-out;
    }
    
    @keyframes alertSlideInMobile {
        from { transform: translateY(-30px) scale(0.9); opacity: 0; }
        to { transform: translateY(0) scale(1); opacity: 1; }
    }
    
    .model-name {
        max-width: 180px;
        font-size: 1.05rem;
    }
    
    .premium-modal {
        border-radius: 0.7rem;
        padding: 0.8rem;
    }
    
    .modal-title {
        font-size: 1rem;
    }
    
    body {
        font-size: 0.8rem;
    }
}

@media (max-width: 400px) {
    .navbar-brand {
        font-size: 1.1rem;
    }
    
    .nav-link i {
        font-size: 1.05rem;
        margin-right: 4px;
    }
    
    .media-container {
        height: 240px;
    }
    
    .model-card {
        max-height: 320px;
        min-height: 290px;
    }
    
    .open-gallery-btn {
        width: 32px;
        height: 32px;
        font-size: 0.8rem;
    }
    
    .status-name {
        padding: 5px 12px;
        bottom: 10px;
        left: 10px;
    }
    
    #loader-screen h1 {
        font-size: 2.5rem;
    }
    
    #loader-screen .spinner-container {
        width: 100px;
        height: 100px;
    }
    
    #loader-screen .spinner {
        width: 100px;
        height: 100px;
    }
}

/* ===== UTILITIES AVANCÉES ===== */
.text-gradient-red {
    background: linear-gradient(135deg, var(--red-primary), var(--red-neon));
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
    animation: gradientShift 3s infinite alternate;
}

@keyframes gradientShift {
    0% { background-position: 0% 50%; }
    100% { background-position: 100% 50%; }
}

.glass-effect {
    background: rgba(255, 255, 255, 0.08);
    backdrop-filter: blur(15px) saturate(180%);
    border: var(--border-glass);
    transition: all var(--transition-normal);
}

.glass-effect:hover {
    background: rgba(255, 255, 255, 0.12);
    transform: translateY(-2px);
}

.shadow-red {
    box-shadow: var(--glow-red);
    animation: shadowPulse 2s infinite;
}

@keyframes shadowPulse {
    0%, 100% { box-shadow: var(--glow-red); }
    50% { box-shadow: 0 0 30px rgba(229, 9, 20, 0.8); }
}

.hover-lift {
    transition: transform var(--transition-bounce);
}

.hover-lift:hover {
    transform: translateY(-4px) scale(1.02);
}

/* Scrollbar personnalisée animée */
::-webkit-scrollbar {
    width: 8px;
    height: 8px;
}

::-webkit-scrollbar-track {
    background: linear-gradient(180deg, var(--black-dark), var(--black-card));
    border-radius: var(--radius-full);
}

::-webkit-scrollbar-thumb {
    background: linear-gradient(180deg, var(--red-primary), var(--red-neon));
    border-radius: var(--radius-full);
    animation: scrollbarGlow 2s infinite;
}

::-webkit-scrollbar-thumb:hover {
    background: linear-gradient(180deg, var(--red-neon), var(--red-primary));
    animation: scrollbarGlowHover 1s infinite;
}

@keyframes scrollbarGlow {
    0%, 100% { box-shadow: 0 0 5px rgba(229, 9, 20, 0.5); }
    50% { box-shadow: 0 0 10px rgba(229, 9, 20, 0.8); }
}

@keyframes scrollbarGlowHover {
    0%, 100% { box-shadow: 0 0 10px rgba(255, 0, 64, 0.6); }
    50% { box-shadow: 0 0 20px rgba(255, 0, 64, 0.9); }
}

/* Effet de particules flottantes */
.particle {
    position: absolute;
    background: rgba(229, 9, 20, 0.1);
    border-radius: 50%;
    pointer-events: none;
    animation: floatParticle 20s infinite linear;
}

@keyframes floatParticle {
    0% { transform: translateY(100vh) rotate(0deg); opacity: 0; }
    10% { opacity: 0.5; }
    90% { opacity: 0.5; }
    100% { transform: translateY(-100px) rotate(360deg); opacity: 0; }
}

/* Effet de lumière ambiante */
.ambient-light {
    position: fixed;
    top: 50%;
    left: 50%;
    width: 100vw;
    height: 100vh;
    background: radial-gradient(circle at 50% 50%, rgba(229, 9, 20, 0.05) 0%, transparent 70%);
    pointer-events: none;
    z-index: -1;
    animation: ambientPulse 10s infinite alternate;
}

@keyframes ambientPulse {
    0%, 100% { opacity: 0.3; transform: translate(-50%, -50%) scale(1); }
    50% { opacity: 0.5; transform: translate(-50%, -50%) scale(1.1); }
}

/* Animation de curseur personnalisé */
.custom-cursor {
    position: fixed;
    width: 20px;
    height: 20px;
    border: 2px solid var(--red-neon);
    border-radius: 50%;
    pointer-events: none;
    z-index: 99999;
    mix-blend-mode: difference;
    animation: cursorPulse 2s infinite;
    transition: transform 0.1s;
}

@keyframes cursorPulse {
    0%, 100% { transform: scale(1); opacity: 0.8; }
    50% { transform: scale(1.2); opacity: 1; }
}

/* Effet de saisie de texte */
.typing-effect {
    display: inline-block;
    overflow: hidden;
    white-space: nowrap;
    border-right: 2px solid var(--red-neon);
    animation: typing 3.5s steps(40, end), blink 0.75s step-end infinite;
}

@keyframes typing {
    from { width: 0 }
    to { width: 100% }
}

@keyframes blink {
    from, to { border-color: transparent }
    50% { border-color: var(--red-neon) }
}

/* Effet de vague sur les cartes */
.wave-effect {
    position: relative;
    overflow: hidden;
}

.wave-effect::after {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 5px;
    height: 5px;
    background: rgba(255, 255, 255, 0.4);
    opacity: 0;
    border-radius: 100%;
    transform: scale(1, 1) translate(-50%);
    transform-origin: 50% 50%;
}

.wave-effect:hover::after {
    animation: ripple 1s ease-out;
}

@keyframes ripple {
    0% {
        transform: scale(0, 0);
        opacity: 0.5;
    }
    100% {
        transform: scale(40, 40);
        opacity: 0;
    }
}

/* Classe pour les éléments qui doivent apparaître au scroll */
.reveal-on-scroll {
    opacity: 0;
    transform: translateY(30px);
    transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
}

.reveal-on-scroll.visible {
    opacity: 1;
    transform: translateY(0);
}

/* Animation pour les nouveaux modèles */
.new-model {
    position: relative;
}

.new-model::before {
    content: 'Nouveau';
    position: absolute;
    top: 10px;
    right: 10px;
    background: linear-gradient(135deg, var(--red-neon), var(--red-primary));
    color: white;
    padding: 4px 10px;
    border-radius: var(--radius-full);
    font-size: 0.7rem;
    font-weight: 800;
    z-index: 5;
    animation: newBadgeBounce 2s infinite, newBadgeGlow 2s infinite;
}

@keyframes newBadgeBounce {
    0%, 100% { transform: translateY(0) rotate(0); }
    50% { transform: translateY(-5px) rotate(5deg); }
}

@keyframes newBadgeGlow {
    0%, 100% { box-shadow: 0 0 10px rgba(255, 0, 64, 0.5); }
    50% { box-shadow: 0 0 20px rgba(255, 0, 64, 0.8); }
}

/* Effet de parallaxe pour les images */
.parallax-image {
    transform-style: preserve-3d;
    transition: transform 0.1s ease-out;
    will-change: transform;
}

/* Animation de fond étoilé */
.starry-bg {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    pointer-events: none;
    z-index: -2;
}

.star {
    position: absolute;
    background: white;
    border-radius: 50%;
    animation: twinkle 3s infinite;
}

@keyframes twinkle {
    0%, 100% { opacity: 0.3; transform: scale(1); }
    50% { opacity: 1; transform: scale(1.2); }
}

/* Styles pour supprimer l'espace en bas des cartes */
.card-item {
    margin-bottom: 1rem;
}

.model-card.card-default {
    margin-bottom: 0;
}

.model-card.card-photo {
    margin-bottom: 0;
}

/* Styles supplémentaires pour les boutons */
.btn-achat {
    background: rgba(255, 255, 255, 0.15);
    color: #fff;
    border-radius: 2rem;
    padding: 0.45rem 1rem;
    font-weight: 600;
    font-size: 0.85rem;
    border: 1px solid rgba(255, 255, 255, 0.2);
    transition: var(--transition);
    display: flex;
    align-items: center;
    gap: 0.4rem;
}

.btn-achat:hover {
    background: rgba(255, 255, 255, 0.25);
    color: var(--accent);
    transform: translateY(-2px);
}

/* Styles pour les sections galerie */
.section-modeles,
.section-galerie {
    transition: opacity 0.3s ease;
}

/* Badges pour les lives privés */
.highlight-private-live {
    animation: pulsePrivate 2s infinite;
}

@keyframes pulsePrivate {
    0%, 100% { 
        box-shadow: 0 0 10px rgba(255, 0, 0, 0.3);
        transform: scale(1);
    }
    50% { 
        box-shadow: 0 0 20px rgba(255, 0, 0, 0.6);
        transform: scale(1.05);
    }
}

/* Classe pour le mode sombre/clair
@media (prefers-color-scheme: light) {
    body {
        background: linear-gradient(135deg, #f5f5f5, #ffffff);
        color: #333;
    }
    
    .model-card {
        background: linear-gradient(145deg, #ffffff, #f0f0f0);
        border-color: rgba(0, 0, 0, 0.1);
    }
    
    .model-photo {
        background-color: #f8f8f8;
    }
    
    .status-name {
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.9), rgba(240, 240, 240, 0.8));
        border-color: rgba(0, 0, 0, 0.1);
    }
    
    .model-name {
        background: linear-gradient(135deg, #333, #555);
        -webkit-background-clip: text;
        background-clip: text;
    }
} */

/* Prévention des animations pour les préférences de réduction de mouvement */
@media (prefers-reduced-motion: reduce) {
    *, ::before, ::after {
        animation-duration: 0.01ms !important;
        animation-iteration-count: 1 !important;
        transition-duration: 0.01ms !important;
        scroll-behavior: auto !important;
    }
}

/* Optimisation pour les appareils mobiles */
@media (hover: none) and (pointer: coarse) {
    .model-card:hover {
        transform: none;
        animation-play-state: paused;
    }
    
    .hover-lift:hover {
        transform: none;
    }
    
    .nav-link:hover {
        transform: none;
        background: rgba(229, 9, 20, 0.1);
    }
    
    .model-card:hover .model-photo {
        transform: scale(1.05);
    }
}

/* ===== STYLES MOBILE POUR SIDEBAR REDUCTIBLE ===== */
@media (max-width: 768px) {
    /* Cache le sidebar par défaut sur mobile */
    .sidebar {
        position: fixed !important;
        top: 56px !important; /* Hauteur de la navbar */
        left: -280px; /* Caché à gauche */
        width: 280px;
        height: calc(100vh - 56px) !important;
        z-index: 1000;
        transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        overflow-y: auto;
        background: linear-gradient(180deg, rgba(10, 10, 10, 0.98) 0%, rgba(10, 10, 10, 0.85) 100%) !important;
        backdrop-filter: blur(20px) saturate(200%) !important;
        box-shadow: 2px 0 20px rgba(0, 0, 0, 0.7);
    }

    /* Classe pour afficher le sidebar */
    .sidebar.mobile-open {
        transform: translateX(280px);
    }

    /* Overlay pour le fond quand le sidebar est ouvert */
    .sidebar-overlay {
        display: none;
        position: fixed;
        top: 56px;
        left: 0;
        width: 100%;
        height: calc(100vh - 56px);
        background: rgba(0, 0, 0, 0.8);
        backdrop-filter: blur(5px);
        z-index: 999;
    }

    .sidebar-overlay.active {
        display: block;
    }

    /* Bouton pour ouvrir/fermer le sidebar */
    .sidebar-toggle-btn {
        position: fixed;
        bottom: 20px;
        left: 20px;
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, var(--red-primary), var(--red-neon));
        border: none;
        border-radius: 50%;
        color: white;
        font-size: 1.2rem;
        z-index: 9999;
        box-shadow: var(--glow-red);
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all var(--transition-bounce);
    }

    .sidebar-toggle-btn:hover {
        transform: scale(1.1);
        box-shadow: var(--glow-strong);
    }

    /* Ajustement du contenu principal */
    .col-md-10 {
        width: 100% !important;
        padding: 1rem !important;
    }

    /* La ligne avec sidebar et contenu devient une seule colonne */
    .container-fluid .row {
        flex-direction: column;
    }

    /* Suppression de la colonne sidebar du flux normal */
    .col-md-2 {
        width: 0;
        padding: 0;
        margin: 0;
    }

    /* Ajustement des cartes pour occuper tout l'espace */
    .col-md-4 {
        width: 100%;
        padding-left: 0.25rem;
        padding-right: 0.25rem;
    }

    /* Animation d'apparition des cartes */
    .model-card {
        animation: cardSlideIn 0.5s ease-out;
    }

    @keyframes cardSlideIn {
        from {
            transform: translateY(20px);
            opacity: 0;
        }
        to {
            transform: translateY(0);
            opacity: 1;
        }
    }
}

/* Version tablette (entre 768px et 992px) */
@media (min-width: 769px) and (max-width: 992px) {
    /* Ajustement pour préserver un peu de sidebar */
    .col-md-2 {
        width: 240px;
    }
    
    .col-md-10 {
        width: calc(100% - 240px);
    }
    
    /* Cacher le bouton toggle sur tablette */
    .sidebar-toggle-btn {
        display: none !important;
    }
    
    .sidebar-overlay {
        display: none !important;
    }
}

/* Version mobile très petite */
@media (max-width: 576px) {
    .sidebar {
        width: 85vw;
        left: -85vw;
    }

    .sidebar.mobile-open {
        transform: translateX(85vw);
    }

    .sidebar-toggle-btn {
        bottom: 15px;
        left: 15px;
        width: 45px;
        height: 45px;
        font-size: 1.1rem;
    }
}
  </style>
  </head>
<body>
    <!-- Navbar principale -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><span class="live">LIVE</span> <span class="beauty">BEAUTY</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar"
                aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mainNavbar">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <!-- Menus -->
                    <div class="collapse navbar-collapse" id="mainNavbar">
                      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                      <li class="nav-item">
                        <a class="nav-link" href="#" data-type="default" title="Modèles">
                          <i class="fas fa-female"></i>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#" data-type="photo" title="Galerie photo">
                          <i class="fas fa-camera-retro"></i>
                        </a>
                      </li>

                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('achats.mes') }}" title="Mes photos achetées">
                          <i class="fas fa-shopping-bag"></i>
                        </a>
                      </li>

                      <li class="nav-item">
                          <a class="nav-link" 
                            href="{{ route('user.profil', Auth::user()->id) }}" 
                            title="Mon Profil" 
                            target="_blank">
                              <i class="fas fa-user-circle"></i>
                          </a>
                      </li>

                      <li class="nav-item dropdown lang-dropdown">
    <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown">
        <span class="fi fi-{{ app()->getLocale() == 'fr' ? 'fr' : 'gb' }} me-2"></span>
    </a>

    <ul class="dropdown-menu dropdown-menu-dark shadow-lg">
        <li>
            <a class="dropdown-item d-flex align-items-center" href="{{ route('lang.switch','fr') }}">
                <span class="fi fi-fr me-2"></span></a>
        </li>
        <li>
            <a class="dropdown-item d-flex align-items-center" href="{{ route('lang.switch','en') }}">
                <span class="fi fi-gb me-2"></span></a>
        </li>
    </ul>
</li>
                      <!-- <li class="nav-item">
                          <a class="nav-link" href="#">Nouveaux Modèles</a>
                      </li> -->
                      <!-- <li class="nav-item">
                          <a class="nav-link" href="#">Promotions <span class="badge bg-warning text-dark">3</span></a>
                      </li> -->
                      <!-- <li class="nav-item">
                          <a class="nav-link" href="#">Top Modèles</a>
                      </li> -->
                  </ul>
                </ul>
                <div class="d-flex align-items-center">
                    <!-- <a href="#" class="text-white me-3 fs-4"><i class="fa-solid fa-heart"></i></a>
                    <a href="#" class="text-white me-3 fs-4"><i class="fa-solid fa-crown"></i></a> -->
                    <a href="mailto:contact@livebeautyofficial.com" class="text-white me-3 fs-4" title="Envoyer un email">
                        <i class="fa-solid fa-envelope"></i>
                    </a>
                @if(Auth::check())
                    <div class="me-3 text-white fw-bold d-flex align-items-center jetons-display">
                      <i class="fas fa-coins text-warning me-2"></i>
                      <span>{{ Auth::user()->jetons }}</span>
                    </div>
                @endif
                    <!-- <span class="text-white me-3 fw-bold">{{ Auth::user()->nom }} {{ Auth::user()->prenoms }}</span> -->
                                        <span class="text-white me-3 fw-bold">{{ Auth::user()->pseudo }}</span>


                    <button class="btn btn-dark rounded-circle me-2 achat-jetons-icon-vip"
                            data-bs-toggle="modal" data-bs-target="#achatJetonsModal"
                            title="Acheter des jetons">
                      <i class="fas fa-coins"></i>
                    </button>
                    <!-- Icône modifier profil -->
                    <a href="#" class="text-white fs-5 me-3" data-bs-toggle="modal" data-bs-target="#editProfileModal" title="Modifier mon profil">
                        <i class="fas fa-user-cog"></i>
                    </a>
                    @if(Route::has('faq.index'))
                            <a class="nav-link" target="_blank" href="{{ route('faq.index') }}">
                                <i class="fas fa-question-circle me-1"></i> FAQ
                            </a>
                    @endif
                    <!-- Icône déconnexion -->
                    <a href="{{ route('logout') }}" class="text-white fs-5 me-2" title="Déconnexion">
                        <i class="fas fa-power-off"></i>
                    </a>
              </div>
            </div>
        </div>
    </nav>
    <!-- Contenu principal -->
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-2 sidebar">
                <h5 class="section-title-vip">
                  <i class="fas fa-star me-2 text-warning"></i> {{ __('Cams en Direct') }}
                </h5>
                <div id="activeLives">
                <!-- Chargement dynamique -->
                </div>
                <h5 class="section-title-vip-gold">
                  <i class="fas fa-lock text-warning me-2"></i>
                  {{ __('Lives Privés VIP') }}
                </h5>
                <div id="privateLives"></div>

                <br>
                @if(Auth::check() && Auth::user()->favoris->count() > 0)
                  <div class="favoris-section mt-4">
                    <h5 class="section-title-favoris">
                      <i class="fas fa-heart text-danger me-2"></i> {{ __('Mes Favoris') }}
                    </h5>

                    @foreach(Auth::user()->favoris as $fav)
                      <a href="{{ route('modele.profile', $fav->id) }}" class="favori-link d-flex align-items-center">
                        <i class="fas fa-heart me-2"></i>
                        <span>{{ $fav->prenom }}</span>
                      </a>
                    @endforeach
                  </div>
                @endif

            </div>

            <!-- Cartes -->
<div class="col-lg-9 col-md-10 mx-auto p-3">
                <!-- SECTION MODÈLES -->
<div class="row g-4 section-modeles">
  @foreach($modeles as $modele)
    @php
      $dejaAcheteGlobal = in_array($modele->id, $achatsGlobal ?? []);
      $photos = is_array($modele->photos) ? $modele->photos : json_decode($modele->photos ?? '[]', true);
      $photo = $photos[0] ?? null;
      $hasVideo = $modele->video_file || $modele->video_link;
    @endphp

    <div class="col-md-4 card-item fille">
      <div class="model-card card-default">
        {{-- Bouton favoris --}}
        <form action="{{ route('favoris.toggle', $modele->id) }}" method="POST"
      class="position-absolute top-0 end-0 m-2 z-3">
        @csrf
        <button type="submit"
                class="btn-favori {{ Auth::user()->favoris->contains($modele->id) ? 'active' : '' }}"
                title="{{ Auth::user()->favoris->contains($modele->id) ? 'Retirer des favoris' : 'Ajouter aux favoris' }}">
          <i class="{{ Auth::user()->favoris->contains($modele->id) ? 'fas' : 'far' }} fa-heart"></i>
        </button>
      </form>


        {{-- Lien vers le profil --}}
        <a href="{{ route('modele.private', $modele->id) }}" class="d-block text-decoration-none text-light" target="_blank" rel="noopener noreferrer">
          <div class="media-container">
            @if($photo)
              <img src="{{ asset('storage/' . $photo) }}" class="model-photo" alt="photo">
            @else
              <img src="https://via.placeholder.com/300x230?text=Pas+de+photo" class="model-photo" alt="placeholder">
            @endif

            <!-- {{-- Vidéo au hover --}}
            @if($hasVideo)
              <div class="model-video">
                @if(!empty($modele->video_file) && is_array($modele->video_file))
                  <video muted playsinline preload="none"
                        onmouseenter="this.play()" onmouseleave="this.pause()">
                      <source src="{{ asset('storage/' . $modele->video_file[0]) }}">
                  </video>

                @elseif(!empty($modele->video_link) && is_array($modele->video_link))
                  <iframe
                    src="{{ $modele->video_link[0] }}?mute=1&controls=0&loop=1
"
                    frameborder="0"
                    allow="autoplay; encrypted-media"
                    allowfullscreen
                    style="width: 100%; height: 100%;">
                  </iframe>
                @endif
              </div>
            @endif -->

            {{-- Statut + Nom --}}
            <div class="status-name">
              <span class="status-dot" style="background-color: {{ $modele->en_ligne ? '#28a745' : '#dc3545' }}"></span>
              <span class="model-name">{{ $modele->prenom }}</span>
            </div>
          </div>
        </a>
      </div>
    </div>
  @endforeach
</div>

<!-- SECTION GALERIE PHOTOS -->
<!-- SECTION GALERIE (image de card = photo du modèle, contenu modal = gallery_photos) -->
<div class="row g-4 section-galerie d-none">
  @foreach($modeles as $modele)
    @php
      // --- Image principale du modèle ---
      $photos = is_array($modele->photos)
        ? $modele->photos
        : json_decode($modele->photos ?? '[]', true);
      $photo = $photos[0] ?? null;

      $videos = [];
      if (!empty($modele->video_file) && is_array($modele->video_file)) {
        foreach ($modele->video_file as $file) {
          $videos[] = asset('storage/' . $file);
        }
      }
      if (!empty($modele->video_link) && is_array($modele->video_link)) {
        foreach ($modele->video_link as $link) {
          $videos[] = $link;
        }
      }

      // --- Données depuis gallery_photos ---
      $gallery = $modele->galleryPhotos ?? $modele->galleryPhotos()->get();
      $photoItems = $gallery->whereNotNull('photo_url')->values();
      $videoItems = $gallery->whereNotNull('video_url')->values();

      // --- Sauter les modèles sans contenu galerie ---
      if ($photoItems->isEmpty() && $videoItems->isEmpty()) {
        continue;
      }
    @endphp

    <div class="col-md-4">
      <div class="model-card card-photo position-relative">

        {{-- ✅ Image du modèle (pas celle de gallery_photo) --}}
        @if($photo)
          <img src="{{ asset('storage/' . $photo) }}" class="model-photo" alt="photo du modèle">
        @else
          <img src="https://via.placeholder.com/300x230?text=Pas+de+photo" class="model-photo" alt="placeholder">
        @endif

        <div class="status-name">
          <span class="status-dot" style="background-color: {{ $modele->en_ligne ? '#28a745' : '#dc3545' }}"></span>
          <span class="model-name">{{ $modele->prenom }}</span>
        </div>

        {{-- ✅ Boutons galerie photo / vidéo --}}
        <div class="position-absolute bottom-0 end-0 p-2 d-flex gap-2">
          @if($photoItems->count() > 0)
            <button class="btn btn-sm btn-light rounded-pill open-gallery"
              data-modele="{{ $modele->id }}"
              data-type="photo"
              data-bs-toggle="modal"
              data-bs-target="#galleryModal">
              <i class="fas fa-camera"></i>
              <span>{{ $photoItems->count() }}</span>
            </button>
          @endif

          @if($videoItems->count() > 0)
            <button class="btn btn-sm btn-light rounded-pill open-gallery"
              data-modele="{{ $modele->id }}"
              data-type="video"
              data-bs-toggle="modal"
              data-bs-target="#galleryModal">
              <i class="fas fa-video"></i>
              <span>{{ $videoItems->count() }}</span>
            </button>
          @endif
        </div>

      </div>
    </div>
  @endforeach
</div>


            </div>

        </div>
    </div>
<!-- Modal Détail Modèle (version améliorée) -->
    <!-- JS -->
    <script>
        function toggleMenu(element) {
            let submenu = element.nextElementSibling;
            if (submenu && submenu.classList.contains('submenu')) {
                submenu.style.display = submenu.style.display === 'block' ? 'none' : 'block';
            }
        }

        async function fetchLiveModels() {
          try {
              const response = await fetch('/api/live/active');
              const lives = await response.json();

              const liveContainer = document.getElementById('activeLives');
              liveContainer.innerHTML = '';

              lives.forEach(model => {
                  const link = document.createElement('a');
                  link.classList.add('d-block', 'mb-1', 'fw-bold');

                  if (model.prive) {
                      // 🟢 Show privé
                      link.textContent = `🟢 ${model.prenom} (en show privé)`;
                      link.style.color = 'limegreen';
                      link.href = '#'; // empêche la navigation

                      link.addEventListener('click', (e) => {
                          e.preventDefault();
                          // 👉 ouvre le modal
                          const modal = new bootstrap.Modal(document.getElementById('privateShowModal'));
                          modal.show();
                      });
                  } else {
                      // 🟢 Show public
                      link.textContent = `🟢 ${model.prenom}`;
                      link.style.color = 'limegreen';
                      link.href = `/live/${model.id}`;
                  }

                  liveContainer.appendChild(link);
              });
          } catch (e) {
              console.error("Erreur de chargement des lives", e);
          }
      }




        fetchLiveModels();
        setInterval(fetchLiveModels, 15000);
        document.querySelectorAll('.nav-link[data-type]').forEach(link => {
          link.addEventListener('click', function(e) {
            e.preventDefault();
            const type = this.dataset.type;

            document.querySelector('.section-modeles').classList.toggle('d-none', type !== 'default');
            document.querySelector('.section-galerie').classList.toggle('d-none', type !== 'photo');
          });
        });


// Ouvrir la modal galerie
document.addEventListener('click', async function(e) {
  const btn = e.target.closest('.open-gallery');
  if (!btn) return;

  const modeleId = btn.dataset.modele;
  const type = btn.dataset.type;
  const isPayant = btn.dataset.payant === "1";
  const flouType = btn.dataset.flou || "soft";
  const prixGlobal = btn.dataset.prixGlobal || 0;
  const prixDetail = btn.dataset.prixDetail || 0;
  const dejaAcheteGlobal = btn.dataset.dejaachete === "1";
  const dejaAcheteDetail = JSON.parse(btn.dataset.dejaachetedetail || "[]");

  // 🔄 Récupère les médias depuis la table gallery_photos
  const res = await fetch(`/api/modele/${modeleId}/gallery`);
  const data = await res.json();

  const mediaList = type === "photo"
      ? data.photos.map(p => ({ url: p.photo_url, payant: p.payant, prix: p.prix, flou: p.type_flou }))
      : data.videos.map(v => ({ url: v.video_url, payant: v.payant, prix: v.prix, flou: v.type_flou }));

  const galleryInner = document.getElementById('galleryInner');
  galleryInner.innerHTML = mediaList.map((item, i) => {
    let content = '';

    // Type média
    if (type === 'photo') {
      content = `<img src="/storage/${item.url}" class="d-block w-100" style="object-fit:contain; height:100vh;">`;
    } else {
      content = `<video src="/storage/${item.url}" controls autoplay class="d-block w-100" style="height:100vh;"></video>`;
    }

    // Conditions flou/payant
    // ✅ Pas de flou si gratuit (payant = 0 ou "0") ou déjà acheté
const dejaAchete = dejaAcheteGlobal || dejaAcheteDetail.includes(item.url);
if (item.payant == 0 || item.payant === "0" || dejaAchete) {
  return `<div class="carousel-item ${i === 0 ? 'active' : ''}">${content}</div>`;
}


    // Flouté
    return `
      <div class="carousel-item ${i === 0 ? 'active' : ''}">
        <div class="blur-wrapper ${item.flou || flouType}">
          ${content}
          <div class="blur-overlay d-flex flex-column align-items-center justify-content-center">
            <div class="fw-bold fs-5">Contenu flouté</div>
            <div class="small mb-2">Prix : ${item.prix ?? prixDetail} jetons</div>
            <button class="btn btn-warning fw-bold acheter-photo"
                    data-modele="${modeleId}"
                    data-photo="${item.url}"
                    data-prix="${item.prix ?? prixDetail}">
                🔑 Débloquer
            </button>
          </div>
        </div>
      </div>
    `;
  }).join('');
});



// Achat d'une photo (detail)
document.addEventListener("click", function(e) {
  const btn = e.target.closest('.acheter-photo');
  if (!btn) return;

  const modeleId = btn.dataset.modele;
  const prix     = btn.dataset.prix;
  const photo    = btn.dataset.photo;

  fetch(`/acheter/photo/detail/${modeleId}`, {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
      "X-CSRF-TOKEN": "{{ csrf_token() }}"
    },
    body: JSON.stringify({ prix: prix, photo: photo })
  })
  .then(async res => {
    if (!res.ok) {
      const text = await res.text();
      throw new Error(`Erreur serveur (${res.status}): ${text}`);
    }
    return res.json();
  })
  .then(data => {
    if (data.success) {
      alert("✅ Photo débloquée !");
      // Retirer le flou sur la photo dans le carousel
      const wrap = btn.closest(".blur-wrapper");
      if (wrap) {
        wrap.classList.remove("blur-wrapper", "soft", "strong", "pixel");
        const overlay = wrap.querySelector(".blur-overlay");
        if (overlay) overlay.remove();
      }
      // Mettre à jour les boutons open-gallery pour ce modèle (dataset)
      document.querySelectorAll(`.open-gallery[data-modele="${modeleId}"]`).forEach(openBtn => {
        const arr = JSON.parse(openBtn.dataset.dejaachetedetail || "[]");
        if (!arr.includes(photo)) arr.push(photo);
        openBtn.dataset.dejaachetedetail = JSON.stringify(arr);
      });
    } else {
      alert(data.error || "Erreur lors de l'achat.");
    }
  })
  .catch(err => {
    console.error("Erreur fetch:", err);
    alert("❌ Une erreur est survenue. Voir console.");
  });
});

// Achat global (toute la galerie)
document.addEventListener("click", function(e) {
  const btn = e.target.closest('.acheter-global');
  if (!btn) return;

  const modeleId = btn.dataset.modele;
  const prix     = btn.dataset.prix;

  fetch(`/acheter/photo/${modeleId}`, {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
      "X-CSRF-TOKEN": "{{ csrf_token() }}"
    },
    body: JSON.stringify({ prix: prix })
  })
  .then(res => res.json())
  .then(data => {
    if (data.success) {
      alert("✅ Galerie débloquée !");
      // Débloquer visuellement tous les éléments floutés du carousel
      document.querySelectorAll(".blur-wrapper").forEach(el => {
        el.classList.remove("blur-wrapper", "soft", "strong", "pixel");
      });
      document.querySelectorAll(".blur-overlay").forEach(el => el.remove());
      // Mettre à jour les boutons open-gallery pour ce modèle
      document.querySelectorAll(`.open-gallery[data-modele="${modeleId}"]`).forEach(openBtn => {
        openBtn.dataset.dejaachete = "1";
      });
    } else {
      alert(data.error || "Erreur lors de l'achat global.");
    }
  })
  .catch(err => {
    console.error("Erreur achat global:", err);
    alert("❌ Une erreur est survenue. Voir console.");
  });
});




    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
 <!-- Modal Achat Jetons -->
<div class="modal fade" id="achatJetonsModal" tabindex="-1" aria-labelledby="achatJetonsLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content text-white" style="background: #0d0d0d; border-radius: 20px; border: 2px solid #d6336c;">
      <div class="modal-header border-0">
        <h4 class="modal-title text-danger fw-bold" id="achatJetonsLabel">
          <i class="fas fa-coins me-2"></i> {{ __('Acheter des Jetons') }}
        </h4>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>
      <div class="modal-body">
        <div class="row g-4 text-center">

          @php
            $packs = [
              ['jetons' => 30, 'prix' => '5.49'],
              ['jetons' => 60, 'prix' => '9.99'],
              ['jetons' => 130, 'prix' => '19.99'],
              ['jetons' => 300, 'prix' => '44.99'],
              ['jetons' => 700, 'prix' => '99.99'],
            ];
          @endphp

          @foreach($packs as $pack)
          <div class="col-md-4">
            <div class="card h-100 border-0 shadow-lg"
              style="background: linear-gradient(to bottom right, #1a1a1a, #000); border-radius: 15px;">
              <div class="card-body d-flex flex-column justify-content-between">
                <h5 class="text-danger fw-bold mb-3">{{ $pack['jetons'] }} <i class="fas fa-fire"></i> {{ __('Jetons') }}
</h5>
                <p class="fs-4 text-white-50 mb-4">{{ $pack['prix'] }} €</p>
                <div id="paypal-button-container-{{ $pack['jetons'] }}"></div>
              </div>
            </div>
          </div>
          @endforeach

        </div>
      </div>
    </div>
  </div>
</div>
@php
    $user = Auth::user();
@endphp

<div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="POST" action="{{ route('profile.update') }}" class="modal-content" style="background-color: #0d0d0d; color: #fff; border: 2px solid #d6336c; border-radius: 15px;">
      @csrf
      @method('PUT')

      <div class="modal-header border-0">
        <h5 class="modal-title fw-bold text-danger">
          <i class="fas fa-user-edit me-2"></i> {{ __('Modifier mon profil') }}
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>

      <div class="modal-body">
        <div class="mb-3">
          <label class="form-label"><i class="fas fa-user text-danger me-2"></i>{{ __('Nom') }}</label>
          <input type="text" name="nom" class="form-control bg-dark text-white border-danger" value="{{ $user->nom }}">
        </div>
        <div class="mb-3">
          <label class="form-label"><i class="fas fa-user-friends text-danger me-2"></i>{{ __('Prénoms') }}</label>
          <input type="text" name="prenoms" class="form-control bg-dark text-white border-danger" value="{{ $user->prenoms }}">
        </div>
        <div class="mb-3">
          <label class="form-label"><i class="fas fa-birthday-cake text-danger me-2"></i>{{ __('Âge') }}</label>
          <input type="number" name="age" class="form-control bg-dark text-white border-danger" value="{{ $user->age }}">
        </div>
        <div class="mb-3">
          <label class="form-label"><i class="fas fa-user-tag text-danger me-2"></i>{{ __('Pseudo') }}</label>
          <input type="text" name="pseudo" class="form-control bg-dark text-white border-danger" value="{{ $user->pseudo }}">
        </div>
        <div class="mb-3">
          <label class="form-label"><i class="fas fa-building text-danger me-2"></i>{{ __('Département') }}</label>
          <input type="text" name="departement" class="form-control bg-dark text-white border-danger" value="{{ $user->departement }}">
        </div>
        <div class="mb-3">
          <label class="form-label"><i class="fas fa-envelope text-danger me-2"></i>{{ __('Email') }}</label>
          <input type="email" name="email" class="form-control bg-dark text-white border-danger" value="{{ $user->email }}">
        </div>
        <div class="mb-3">
          <label class="form-label"><i class="fas fa-envelope text-danger me-2"></i>{{ __('WhatsApp') }}</label>
          <input type="text" name="numero_whatsapp" class="form-control bg-dark text-white border-danger" value="{{ $user->numero_whatsapp }}">
        </div>
      </div>

      <div class="modal-footer border-0">
        <button type="submit" class="btn btn-danger w-100 fw-bold rounded-pill">
          <i class="fas fa-save me-2"></i> {{ __('Enregistrer les modifications') }}
        </button>
      </div>
    </form>
  </div>
</div>

<div class="modal fade" id="privateLiveConfirmModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content text-white" style="background:#1a1a1a; border-radius:15px; border:2px solid #d6336c;">
      <div class="modal-header border-0">
        <h5 class="modal-title fw-bold text-danger">
          <i class="fas fa-lock me-2"></i> {{ __('Live privé') }}
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body text-center">
        <p>{{ __('Souhaitez-vous accéder au live privé ou le décaler ?') }}</p>
      </div>
      <div class="modal-footer border-0 justify-content-center">
        <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">{{ __('Annuler') }}</button>
        <button type="button" class="btn btn-primary rounded-pill" id="btnDecaler">{{ __('Décaler') }}</button>
        <button type="button" class="btn btn-danger rounded-pill" id="btnAcceder">{{ __('Accéder') }}</button>
      </div>
    </div>
  </div>
</div>

<!-- 💎 MODAL PREMIUM SHOW PRIVÉ -->
<div class="modal fade" id="privateShowModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content premium-modal text-center p-4">
      <div class="modal-body">
        <div class="glow-circle mx-auto mb-3">
          <i class="fa-solid fa-eye-slash fa-2x"></i>
        </div>
        <h4 class="modal-title mb-3 text-uppercase fw-bold">Show Privé</h4>
        <p class="text-light mb-4">
          🔒 {{ __('Ce show est actuellement en') }} <span class="text-danger fw-bold"> {{ __('mode privé') }}</span>.<br>
          {{ __('Seuls les membres autorisés peuvent y accéder') }}.
        </p>
        <button type="button" class="btn btn-outline-danger px-4" data-bs-dismiss="modal">
          {{ __('Fermer') }}
        </button>
      </div>
    </div>
  </div>
</div>




<!-- PayPal SDK + Script 
@if(app()->environment('local'))
    {{-- Environnement local -> Sandbox --}}
    <script src="https://www.paypal.com/sdk/js?client-id={{ env('PAYPAL_SANDBOX_CLIENT_ID') }}&currency=EUR"></script>
@else
    {{-- Environnement prod -> Live --}}
    <script src="https://www.paypal.com/sdk/js?client-id={{ env('PAYPAL_LIVE_CLIENT_ID') }}&currency=EUR"></script>
@endif
<script>
  const packs = [
    { jetons: 30, price: '5.49' },
    { jetons: 60, price: '9.99' },
    { jetons: 130, price: '19.99' },
    { jetons: 300, price: '44.99' },
    { jetons: 700, price: '99.99' },
  ];

  packs.forEach(pack => {
    paypal.Buttons({
      style: {
        color: 'gold',
        shape: 'pill',
        label: 'pay'
      },
      createOrder: (data, actions) => {
        return actions.order.create({
          purchase_units: [{
            amount: { value: pack.price }
          }]
        });
      },
      onApprove: (data, actions) => {
        return actions.order.capture().then(function(details) {
          fetch(`/acheter/jetons`, {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ nombre: pack.jetons })
          })
          .then(res => res.json())
          .then(data => {
            if (data.success) {
              alert('🎉 Jetons ajoutés avec succès !');
              location.reload();
            }
          });
        });
      }
    }).render(`#paypal-button-container-${pack.jetons}`);
  });


</script>-->
<!-- Modal Crypto Payment Details -->
<div class="modal fade" id="cryptoPaymentModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content premium-modal">
      <div class="modal-body text-center">
        <div class="glow-circle mx-auto mb-3">
          <i class="fab fa-bitcoin fa-2x"></i>
        </div>
        <h4 class="modal-title mb-3">Paiement Crypto</h4>
        <p>Veuillez envoyer <span class="text-warning fw-bold" id="cryptoAmount"></span> à l'adresse suivante:</p>
        <div class="bg-dark p-3 rounded mb-3">
          <code id="cryptoAddress" class="text-break"></code>
        </div>
        <p class="text-muted small">Le paiement sera confirmé automatiquement après 2 confirmations réseau.</p>
        <button type="button" class="btn btn-outline-danger px-4" data-bs-dismiss="modal">
          Fermer
        </button>
      </div>
    </div>
  </div>
</div>
<script src="https://js.stripe.com/v3/"></script>
<script>
const stripe = Stripe("{{ config('services.stripe.key') }}");

const packs = [
  { jetons: 30, prix: 5.49 },
  { jetons: 60, prix: 9.99 },
  { jetons: 130, prix: 19.99 },
  { jetons: 300, prix: 44.99 },
  { jetons: 700, prix: 99.99 },
];

packs.forEach(pack => {
  const container = document.getElementById(`paypal-button-container-${pack.jetons}`);
  if (container) {
    container.innerHTML = `
      <button class="btn btn-danger w-100 fw-bold rounded-pill acheter-stripe" 
              data-pack='${JSON.stringify(pack)}'>
        <i class="fas fa-credit-card me-2"></i>Stripe
      </button>
      <button class="btn btn-outline-warning acheter-crypto"
        data-pack='${JSON.stringify(pack)}'>
  <i class="fab fa-bitcoin"></i> Crypto
</button>`;
  }
});

document.addEventListener('click', async e => {
  const btn = e.target.closest('.acheter-crypto');
  if (!btn) return;

  const pack = JSON.parse(btn.dataset.pack);
  
  // Désactiver le bouton pendant le traitement
  btn.disabled = true;
  const originalHTML = btn.innerHTML;
  btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Traitement...';

  try {
    const res = await fetch('/crypto/create', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': '{{ csrf_token() }}'
      },
      body: JSON.stringify({ pack: pack })
    });

    const data = await res.json();

    if (!res.ok) {
      throw new Error(data.error || 'Erreur lors de la création du paiement');
    }

    if (data.invoice_url) {
      window.location.href = data.invoice_url;
    } else if (data.pay_address) {
      // Alternative: afficher les détails de paiement
      const modal = new bootstrap.Modal(document.getElementById('cryptoPaymentModal'));
      document.getElementById('cryptoAmount').textContent = data.pay_amount;
      document.getElementById('cryptoAddress').textContent = data.pay_address;
      modal.show();
    } else {
      alert('URL de paiement non disponible');
    }
  } catch (error) {
    console.error('Erreur:', error);
    alert('Erreur: ' + error.message);
  } finally {
    btn.disabled = false;
    btn.innerHTML = originalHTML;
  }
});

document.addEventListener('click', async e => {
  const btn = e.target.closest('.acheter-stripe');
  if (!btn) return;

  const pack = JSON.parse(btn.dataset.pack);

  const res = await fetch("{{ route('stripe.create') }}", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
      "X-CSRF-TOKEN": "{{ csrf_token() }}"
    },
    body: JSON.stringify({ pack })
  });

  const data = await res.json();

  const result = await stripe.redirectToCheckout({ sessionId: data.id });
  if (result.error) alert(result.error.message);
});
</script>


<div class="modal fade" id="galleryModal" tabindex="-1">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content bg-black border-0">
      <div class="modal-header border-0">
        <h5 class="modal-title text-white"><i class="fas fa-images me-2"></i> {{ __('Galerie') }}
</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body p-0">
        <div id="carouselGallery" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner" id="galleryInner"></div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselGallery" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselGallery" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
          </button>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="decalerLiveModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <form id="decalerLiveForm" class="modal-content" style="background:#1a1a1a; color:#fff; border-radius:15px; border:2px solid #d6336c;">
      @csrf
      <input type="hidden" name="show_id" id="decaler_show_id">
      <div class="modal-header border-0">
        <h5 class="modal-title fw-bold text-danger"><i class="fas fa-calendar-alt me-2"></i> {{ __('Décaler le show privé') }}
</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label class="form-label">{{ __('Date') }}</label>
          <input type="date" class="form-control bg-dark text-white border-danger" name="date" id="decaler_date" required>
        </div>
        <div class="mb-3">
          <label class="form-label">{{ __('Heure de début') }}</label>
          <input type="time" class="form-control bg-dark text-white border-danger" name="debut" id="decaler_debut" required>
        </div>
        <div class="mb-3">
          <label class="form-label">{{ __('Heure de fin') }}</label>
          <input type="time" class="form-control bg-dark text-white border-danger" name="fin" id="decaler_fin" readonly>
        </div>
      </div>
      <div class="modal-footer border-0">
        <button type="submit" class="btn btn-danger w-100 fw-bold rounded-pill">{{ __('Enregistrer le nouveau créneau') }}</button>
      </div>
    </form>
  </div>
</div>

<script>
function openFullscreen(element) {
    if (element.requestFullscreen) {
        element.requestFullscreen();
    } else if (element.webkitRequestFullscreen) { // Safari
        element.webkitRequestFullscreen();
    } else if (element.msRequestFullscreen) { // IE11
        element.msRequestFullscreen();
    }
}
const privateLiveUrlTemplate = "{{ route('live.private.show', ['modeleId' => ':modeleId', 'showPriveId' => ':showPriveId']) }}";
function formatDateTime(dateString, timeString) {
    const months = [
        "Janvier", "Février", "Mars", "Avril", "Mai", "Juin",
        "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"
    ];
    if (!dateString) return '—';

    const dateObj = new Date(dateString + (timeString ? 'T' + timeString : 'T00:00'));
    const day = dateObj.getDate();
    const month = months[dateObj.getMonth()];
    const year = dateObj.getFullYear();

    return `${day} ${month} ${year}`;
}

let selectedLiveUrl = null; // stocke temporairement l'URL du live

async function fetchPrivateLives() {
    try {
        const response = await fetch('/api/live/private');
        const lives = await response.json();

        const liveContainer = document.getElementById('privateLives');
        liveContainer.innerHTML = '';

        // Filtrer les shows terminés
        const activeLives = lives.filter(show => !(show.etat && show.etat.toLowerCase() === "terminer"));

        // ✅ Si aucun show privé -> afficher un message et sortir
        if (activeLives.length === 0) {
            liveContainer.innerHTML = `<span class="text-muted fst-italic">Aucun show privé disponible</span>`;
            return;
        }

        // Vérifier s’il existe un live en cours
        const hasLiveEnCours = activeLives.some(show => show.etat && show.etat.toLowerCase() === "en cours");

        // Bouton pour réduire/ouvrir
        const toggleBtn = document.createElement('button');
        toggleBtn.classList.add("btn", "btn-sm", "btn-outline-light", "mb-2", "w-100");
        toggleBtn.setAttribute("data-bs-toggle", "collapse");
        toggleBtn.setAttribute("data-bs-target", "#collapsePrivateLives");
        toggleBtn.setAttribute("aria-expanded", "false");
        toggleBtn.setAttribute("aria-controls", "collapsePrivateLives");

        if (hasLiveEnCours) {
            toggleBtn.innerHTML = `Shows privés (${activeLives.length}) 
                <span class="ms-2 badge bg-danger">EN COURS 🔥</span>`;
            toggleBtn.classList.add("highlight-private-live");
        } else {
            toggleBtn.innerText = `Shows privés (${activeLives.length})`;
        }

        liveContainer.appendChild(toggleBtn);

        // Conteneur collapsible
        const collapseDiv = document.createElement('div');
        collapseDiv.classList.add("collapse");
        collapseDiv.id = "collapsePrivateLives";
        liveContainer.appendChild(collapseDiv);

        // Boucle sur les shows actifs
        activeLives.forEach(show => {
            const isEnCours = show.etat && show.etat.toLowerCase() === "en cours";
            const url = privateLiveUrlTemplate
                .replace(':modeleId', show.modele.id)
                .replace(':showPriveId', show.id);

            const wrapper = document.createElement('a');
            wrapper.href = "#"; 
            wrapper.classList.add('d-block', 'mb-2', 'p-2', 'rounded', 'text-decoration-none');

            if (isEnCours) {
                wrapper.innerHTML = `<span class="badge bg-danger">🔒 ${show.modele.prenom}</span>`;
                wrapper.classList.add("highlight-private-live");

                wrapper.addEventListener("click", e => {
                    e.preventDefault();
                    selectedLiveUrl = url;
                    const modal = new bootstrap.Modal(document.getElementById('privateLiveConfirmModal'));
                    modal.show();
                });

            } else {
                const debut = show.debut ? show.debut.substring(0,5) : '—';
                const fin = show.fin ? show.fin.substring(0,5) : '—';
                const date = formatDateTime(show.date);

                wrapper.innerHTML = `
                    <span class="badge bg-primary">🔒 ${show.modele.prenom}</span>
                    <span class="badge bg-secondary ms-2">${date}</span>
                    <span class="badge bg-info ms-1">Début: ${debut}</span>
                    <span class="badge bg-warning text-dark ms-1">Fin: ${fin}</span>
                `;
            }

            collapseDiv.appendChild(wrapper);
        });

    } catch (e) {
        console.error("Erreur de chargement des lives privés", e);
        document.getElementById('privateLives').innerHTML =
            `<span class="text-danger">Impossible de charger les shows privés</span>`;
    }
}


// Bouton Accéder
document.getElementById('btnAcceder').addEventListener('click', () => {
    if (selectedLiveUrl) {
        window.location.href = selectedLiveUrl;
    }
});

// Bouton Décaler (on traitera après)
const decalerModal = new bootstrap.Modal(document.getElementById('decalerLiveModal'));
let showDureeMinutes = 0; // durée du show en minutes

document.getElementById('btnDecaler').addEventListener('click', async () => {
    if (!selectedLiveUrl) return;

    // Récupération de l'ID du show depuis l'URL
    const urlParts = selectedLiveUrl.split('/');
    const showId = urlParts[urlParts.length - 1];

    document.getElementById('decaler_show_id').value = showId;

    // Récupérer la durée du show depuis l'API
    const response = await fetch(`/api/showprive/${showId}`);
    const show = await response.json();
    showDureeMinutes = show.duree;

    const today = new Date().toISOString().split('T')[0];
    document.getElementById('decaler_date').value = show.date;
    document.getElementById('decaler_date').setAttribute('min', today);

    document.getElementById('decaler_debut').value = show.debut;
    updateFin();

    decalerModal.show();
});

// Calcul automatique de l'heure de fin
document.getElementById('decaler_debut').addEventListener('input', updateFin);
document.getElementById('decaler_date').addEventListener('change', () => {
    const selectedDate = document.getElementById('decaler_date').value;
    const today = new Date().toISOString().split('T')[0];
    const debutInput = document.getElementById('decaler_debut');
    if (selectedDate === today) {
        const now = new Date();
        const minTime = now.toTimeString().substring(0,5);
        if (debutInput.value < minTime) debutInput.value = minTime;
        debutInput.setAttribute('min', minTime);
    } else {
        debutInput.removeAttribute('min');
    }
    updateFin();
});

function updateFin() {
    const debut = document.getElementById('decaler_debut').value;
    if (!debut || !showDureeMinutes) return;

    const [h, m] = debut.split(':').map(Number);
    const finDate = new Date();
    finDate.setHours(h);
    finDate.setMinutes(m + showDureeMinutes);

    const finH = String(finDate.getHours()).padStart(2, '0');
    const finM = String(finDate.getMinutes()).padStart(2, '0');

    document.getElementById('decaler_fin').value = `${finH}:${finM}`;
}

// Soumission du formulaire
document.getElementById('decalerLiveForm').addEventListener('submit', async (e) => {
    e.preventDefault();
    const form = e.target;
    const data = {
        date: form.date.value,
        debut: form.debut.value,
        fin: form.fin.value,
        _token: form._token.value
    };

    const showId = form.show_id.value;
    const res = await fetch(`/showprive/${showId}/decaler`, {
        method: 'POST',
        headers: {'Content-Type':'application/json'},
        body: JSON.stringify(data)
    });

    const result = await res.json();
    if (result.success) {
        alert('📅 Show privé décalé avec succès !');
        decalerModal.hide();
        fetchPrivateLives(); // rafraîchit la liste
    } else {
        alert(result.message || 'Erreur lors du décalage.');
    }
});
fetchPrivateLives();
setInterval(fetchPrivateLives, 15000);

</script>

  <!-- Modal confirmation accès -->

<x-private-live-popup />
<script>
// Bloquer le clic droit et le drag sur les images floutées
document.addEventListener("contextmenu", function(e) {
    if (e.target.closest(".blur-wrapper")) {
        e.preventDefault();
    }
});

document.addEventListener("dragstart", function(e) {
    if (e.target.closest(".blur-wrapper")) {
        e.preventDefault();
    }
});
</script>
<script>
document.addEventListener("DOMContentLoaded", () => {
  document.querySelectorAll(".media-container, .card-photo").forEach(container => {
    const img = container.querySelector(".model-photo");
    if (img) {
      container.style.setProperty("--photo-bg", `url('${img.src}')`);
    }
  });
});
</script>
<script>
document.addEventListener('DOMContentLoaded', () => {
  document.querySelectorAll('.btn-favori').forEach(btn => {
    btn.addEventListener('click', (e) => {
      const icon = btn.querySelector('i');
      icon.classList.add('fa-bounce');
      setTimeout(() => icon.classList.remove('fa-bounce'), 600);
    });
  });
});
</script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Créer le bouton toggle
    const toggleBtn = document.createElement('button');
    toggleBtn.className = 'sidebar-toggle-btn';
    toggleBtn.innerHTML = '<i class="fas fa-bars"></i>';
    toggleBtn.setAttribute('aria-label', 'Ouvrir/fermer le menu');
    document.body.appendChild(toggleBtn);

    // Créer l'overlay
    const overlay = document.createElement('div');
    overlay.className = 'sidebar-overlay';
    document.body.appendChild(overlay);

    // Récupérer le sidebar
    const sidebar = document.querySelector('.sidebar');

    // Fonction pour ouvrir/fermer
    function toggleSidebar() {
        sidebar.classList.toggle('mobile-open');
        overlay.classList.toggle('active');
        
        // Changer l'icône
        if (sidebar.classList.contains('mobile-open')) {
            toggleBtn.innerHTML = '<i class="fas fa-times"></i>';
            toggleBtn.style.left = '20px)'; // Déplacer le bouton avec le sidebar
        } else {
            toggleBtn.innerHTML = '<i class="fas fa-bars"></i>';
            toggleBtn.style.left = '20px';
        }
    }

    // Événements
    toggleBtn.addEventListener('click', toggleSidebar);
    overlay.addEventListener('click', toggleSidebar);

    // Fermer le sidebar si on clique sur un lien (optionnel)
    sidebar.addEventListener('click', function(e) {
        if (e.target.tagName === 'A' && window.innerWidth <= 768) {
            toggleSidebar();
        }
    });

    // Ajuster la position du bouton sur resize
    window.addEventListener('resize', function() {
        if (window.innerWidth > 768) {
            // Cacher le bouton et overlay sur desktop
            toggleBtn.style.display = 'none';
            overlay.classList.remove('active');
            sidebar.classList.remove('mobile-open');
            sidebar.style.transform = 'none';
        } else {
            toggleBtn.style.display = 'flex';
        }
    });

    // Initialiser l'affichage du bouton
    if (window.innerWidth <= 768) {
        toggleBtn.style.display = 'flex';
    } else {
        toggleBtn.style.display = 'none';
    }
});
</script>
</body>
</html>
