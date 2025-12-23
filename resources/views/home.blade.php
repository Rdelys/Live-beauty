<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Google Search Console Verification -->
<meta name="google-site-verification" content="0Digm1mSx-HnHXXF4w1zNI52tTv6GTFxxI" />
    <!-- META TAGS POUR SEO -->
    <title>@yield('meta_title', 'LIVE BEAUTY - Plateforme de Cams en Direct avec Camgirls Professionnelles')</title>
    
    <meta name="description" content="@yield('meta_description', 'Découvrez LIVE BEAUTY, la plateforme premium de cams en direct avec des camgirls professionnelles. Inscription gratuite, shows privés et publics, galeries photos et vidéos exclusives.')">
    
    <meta name="keywords" content="@yield('meta_keywords', 'cams en direct, live sex, camgirls, modèles webcam, shows privés, adult entertainment, live beauty, webcam models, {{ count($modeles ?? []) }} modèles en ligne')">
    
    <meta name="author" content="LIVE BEAUTY">
    <meta name="robots" content="index, follow, max-image-preview:large">
    <meta name="rating" content="adult">
    <meta name="language" content="{{ app()->getLocale() }}">
    
    <!-- OPEN GRAPH / FACEBOOK -->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="LIVE BEAUTY">
    <meta property="og:title" content="@yield('og_title', 'LIVE BEAUTY - Cams en Direct Premium avec Camgirls')">
    <meta property="og:description" content="@yield('og_description', 'Plateforme de cams en direct avec les plus belles modèles professionnelles. Inscription gratuite, shows exclusifs.')">
    <meta property="og:image" content="@yield('og_image', asset('storage/default-og.jpg'))">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:locale" content="{{ app()->getLocale() }}">
    
    <!-- TWITTER CARD -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('twitter_title', 'LIVE BEAUTY - Cams en Direct')">
    <meta name="twitter:description" content="@yield('twitter_description', 'Découvrez nos camgirls en direct. Shows exclusifs et privés. Inscription gratuite.')">
    <meta name="twitter:image" content="@yield('twitter_image', asset('storage/default-twitter.jpg'))">
    <meta name="twitter:site" content="@livebeautyofficial">
    
    <!-- CANONICAL URL -->
    <link rel="canonical" href="{{ url()->current() }}">
    
  
    <!-- GOOGLE SITE VERIFICATION (à remplacer avec votre code) -->
<meta name="google-site-verification" content="VOTRE_CODE_GOOGLE_SEARCH_CONSOLE">

<!-- BING VERIFICATION -->
<meta name="msvalidate.01" content="VOTRE_CODE_BING">

<!-- YANDEX VERIFICATION -->
<meta name="yandex-verification" content="VOTRE_CODE_YANDEX">

<!-- ADDITIONAL META TAGS -->
<meta name="theme-color" content="#e50914">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="mobile-web-app-capable" content="yes">
<meta name="application-name" content="LIVE BEAUTY">

<!-- POUR ADULT CONTENT -->
<meta name="rating" content="RTA-5042-1996-1400-1577-RTA">
<meta name="RATING" content="RTA-5042-1996-1400-1577-RTA">
<meta http-equiv="PICS-Label" content='(pics-1.1 "http://www.icra.org/pics/vocabularyv03/" l gen true for "https://www.livebeautyofficial.com" r (cz 1 lz 1 nz 1 oz 1 vz 1) "http://www.rsac.org/ratingsv01.html" l gen true for "https://www.livebeautyofficial.com" r (n 1 s 1 v 1 l 1))'>

<!-- GEO TARGETING -->
<meta name="geo.region" content="FR">
<meta name="geo.placename" content="France">
<meta name="geo.position" content="48.8566;2.3522">
<meta name="ICBM" content="48.8566, 2.3522">

<!-- CANONICAL (très important) -->
<link rel="canonical" href="https://www.livebeautyofficial.com">

<!-- ALTERNATE LANGUAGES -->
<link rel="alternate" hreflang="fr" href="https://www.livebeautyofficial.com">
<link rel="alternate" hreflang="en" href="https://www.livebeautyofficial.com/en">
<link rel="alternate" hreflang="x-default" href="https://www.livebeautyofficial.com">

<!-- SCHEMA.ORG ADDITIONAL DATA -->
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "AdultEntertainment",
    "name": "LIVE BEAUTY",
    "url": "https://www.livebeautyofficial.com",
    "logo": "{{ asset('storage/logo.png') }}",
    "image": "{{ asset('storage/default-og.jpg') }}",
    "description": "Plateforme premium de cams en direct avec des camgirls professionnelles. Inscription gratuite, shows privés et publics.",
    "address": {
        "@type": "PostalAddress",
        "addressCountry": "FR"
    },
    "contactPoint": {
        "@type": "ContactPoint",
        "contactType": "customer service",
        "email": "contact@livebeautyofficial.com"
    },
    "audience": {
        "@type": "PeopleAudience",
        "suggestedMinAge": 18
    }
}
</script>

<!-- BREADCRUMB SCHEMA -->
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "BreadcrumbList",
    "itemListElement": [
        {
            "@type": "ListItem",
            "position": 1,
            "name": "Accueil",
            "item": "https://www.livebeautyofficial.com"
        },
        {
            "@type": "ListItem",
            "position": 2,
            "name": "Camgirls en Direct",
            "item": "https://www.livebeautyofficial.com#modeles"
        }
    ]
}
</script>
    <!-- LINKS CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icons/6.6.6/css/flag-icons.min.css">
    
    <!-- VOTRE CSS (inchangé) -->
    <style>
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
    
    /* TRANSITIONS ET ANIMATIONS */
    --transition-fast: 0.25s cubic-bezier(0.4, 0, 0.2, 1);
    --transition-normal: 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    --transition-slow: 0.6s cubic-bezier(0.4, 0, 0.2, 1);
    --transition-bounce: 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.55);
}

/* ===== RESET & BASE ANIMÉ ===== */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    background: radial-gradient(circle at 50% 0%, #0a0a0a 0%, #000 100%);
    color: var(--white-pure);
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
    color: var(--white-pure);
    text-shadow: 0 0 15px var(--red-primary);
    padding: 2px 6px;
    background: #000; /* Fallback solide */
    background: radial-gradient(circle at 50% 0%, #0a0a0a 0%, #000 100%);    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
    animation: textGlow 3s infinite alternate;
}

@keyframes textGlow {
    0%, 100% { text-shadow: 0 0 10px var(--red-primary), 0 0 20px rgba(229, 9, 20, 0.5); }
    50% { text-shadow: 0 0 15px var(--red-neon), 0 0 30px rgba(255, 0, 64, 0.6); }
}

.navbar-brand .beauty {
    color: var(--white-pure);
    background: linear-gradient(135deg, var(--red-primary), var(--red-light));
    padding: 2px 8px;
    border-radius: 6px;
    margin-left: 4px;
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

/* Navigation avec effets spéciaux */
.navbar-nav {
    gap: 0.5rem;
}

.nav-link {
    color: var(--gray-light) !important;
    font-weight: 600;
    font-size: 0.9rem;
    padding: 0.5rem 1rem !important;
    border-radius: var(--radius-sm);
    transition: all var(--transition-fast);
    position: relative;
    overflow: hidden;
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
    font-size: 1.2rem;
    margin-right: 6px;
    transition: var(--transition-bounce);
}

.nav-link:hover i {
    color: var(--red-neon);
    transform: scale(1.2) rotate(10deg);
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
    background: linear-gradient(180deg, rgba(21, 21, 21, 0.95) 0%, rgba(21, 21, 21, 0.85) 100%);
    backdrop-filter: blur(20px) saturate(200%);
    border-right: var(--border-glass);
    padding: 1.2rem 0.8rem;
    height: calc(100vh - 70px);
    position: sticky;
    top: 70px;
    overflow-y: auto;
    scrollbar-width: thin;
    scrollbar-color: var(--red-primary) transparent;
    animation: slideInLeft 0.5s ease-out;
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
    margin-bottom: 0; /* Supprime l'espace en bas */
    padding-bottom: 0; /* Supprime le padding en bas */
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
}

/* Effet de profondeur 3D */
.media-container::before {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(to top, rgba(0,0,0,0.9) 0%, transparent 50%);
    z-index: 2;
    pointer-events: none;
    opacity: 0.8;
}

/* PHOTO DU MODÈLE avec effet de zoom élégant */
.model-photo {
    width: 100%;
    height: 100%;
    object-fit: contain;
    object-position: center center;
    transition: transform var(--transition-slow) ease-out;
    display: block;
    background-color: #000;
    filter: saturate(1.1) contrast(1.05);
    transform-style: preserve-3d;
    will-change: transform;
}

/* MODIFICATION IMPORTANTE : Au hover, l'image grandit au lieu de disparaître */
.model-card:hover .model-photo {
    transform: scale(1.15) translateZ(20px); /* Augmenté de 1.05 à 1.15 pour un effet plus visible */
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
    z-index: 1; /* Placé derrière l'image */
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

/* MODIFICATION : L'image reste visible, la vidéo apparaît en fond */
.media-container:hover .model-video {
    opacity: 0.3; /* Transparence pour voir l'image derrière */
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
}

@media (max-width: 768px) {
    .navbar {
        animation: slideDownMobile 0.4s ease-out;
    }
    
    @keyframes slideDownMobile {
        from { transform: translateY(-50px); opacity: 0; }
        to { transform: translateY(0); opacity: 1; }
    }
    
    .navbar-brand {
        font-size: 1.2rem;
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
        transform: scale(1.05); /* Réduit l'effet de zoom sur mobile */
    }
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
    </style>
</head>

<body>
@if(session('error'))
<div class="alert alert-danger alert-dismissible fade show position-fixed top-0 start-50 translate-middle-x mt-3 shadow-lg"
     role="alert" style="z-index: 1055; min-width: 300px; text-align: center;">
    {{ session('error') }}
</div>
@endif

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show position-fixed top-0 start-50 translate-middle-x mt-3 shadow-lg"
     role="alert" style="z-index: 1055; min-width: 300px; text-align: center;">
    {{ session('success') }}
</div>
@endif

    <!-- Navbar principale -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/"><span class="live">LIVE</span> <span class="beauty">BEAUTY</span></a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar"
                aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="mainNavbar">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link" href="#" data-type="default" title="Modèles">
                    <i class="fas fa-female"></i>
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
            </ul>
                <div class="d-flex align-items-center">
                  @if(Route::has('faq.index'))
        <a class="nav-link" target="_blank" href="{{ route('faq.index') }}">
            <i class="fas fa-question-circle me-1"></i> FAQ
        </a>
@endif
                <a href="mailto:contact@livebeautyofficial.com" class="text-white me-3 fs-4" title="Envoyer un email">
                    <i class="fa-solid fa-envelope"></i>
                </a>
                  <button class="btn btn-light me-2" data-bs-toggle="modal" data-bs-target="#loginModal">{{ __('Connexion') }}
</button>
                <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#registerModal">{{ __('Inscription GRATUITE') }}
</button>

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
                <!-- Menu avec sous-menus repliables -->
            </div>

            <!-- Cartes -->
            <div class="col-md-10 p-4">
                <div class="row g-4">

                    @foreach($modeles as $modele)
    <div class="col-md-4 card-item fille">
    <div class="model-card card-default">
<a href="{{ route('modele.profile', $modele->id) }}" class="d-block text-decoration-none text-light" target="_blank" rel="noopener noreferrer" aria-label="Voir le profil de {{ $modele->prenom }}">
    @php
      $photos = is_array($modele->photos) ? $modele->photos : json_decode($modele->photos ?? '[]', true);
      $photo = $photos[0] ?? null;
      $hasVideo = $modele->video_file || $modele->video_link;
    @endphp

    <div class="media-container">
      {{-- IMAGE PRINCIPALE --}}
      @if($photo)
        <img src="{{ asset('storage/' . $photo) }}" class="model-photo" alt="Photo de {{ $modele->prenom }} - Camgirl sur LIVE BEAUTY" title="{{ $modele->prenom }} - Camgirl professionnelle">
      @else
        <img src="https://via.placeholder.com/300x230?text=Pas+de+photo" class="model-photo" alt="{{ $modele->prenom }} - Camgirl" title="{{ $modele->prenom }}">
      @endif

      {{-- VIDÉO AU HOVER --}}
      @if($hasVideo)
  <div class="model-video">
    @if(!empty($modele->video_file) && is_array($modele->video_file))
      <video muted loop playsinline preload="none">
    <source src="{{ asset('storage/' . $modele->video_file[0]) }}" type="video/mp4">
    Votre navigateur ne supporte pas la vidéo.
  </video>
@elseif(!empty($modele->video_link) && is_array($modele->video_link))
  <iframe
    src="{{ $modele->video_link[0] }}"
    frameborder="0"
    allow="autoplay; encrypted-media"
    allowfullscreen
    style="width: 100%; height: 100%;"
    title="Vidéo de {{ $modele->prenom }}">
  </iframe>
@endif

  </div>
@endif


      {{-- STATUT + NOM --}}
      <div class="status-name">
        <span class="status-dot" style="background-color: {{ $modele->en_ligne ? '#28a745' : '#dc3545' }}"></span>
        <span class="model-name">{{ $modele->prenom }}</span>
      </div>
    </div>
</a>
</div>
<div class="model-card card-photo d-none position-relative">
        @php
            $photos = is_array($modele->photos) ? $modele->photos : json_decode($modele->photos ?? '[]', true);
            $photo = $photos[0] ?? null;
        @endphp

        @if($photo)
            <img src="{{ asset('storage/' . $photo) }}" class="model-photo" alt="Photo de {{ $modele->prenom }} - Galerie camgirl" title="{{ $modele->prenom }} - Photos exclusives">
        @else
            <img src="https://via.placeholder.com/300x230?text=Pas+de+photo" class="model-photo" alt="{{ $modele->prenom }}">
        @endif
<div class="status-name">
    <span class="status-dot" style="background-color: {{ $modele->en_ligne ? '#28a745' : '#dc3545' }}"></span>
    <span class="model-name">{{ $modele->prenom }}</span>
</div>

        <div class="position-absolute bottom-0 end-0 p-2">
          <button class="btn btn-sm btn-light rounded-pill open-gallery" 
              data-media='@json($photos)' 
              data-type="photo"
              data-payant="{{ $modele->mode == 1 ? '1' : '0' }}"
              data-flou="{{ $modele->type_flou ?? 'soft' }}"
              data-prix="{{ $modele->prix_flou ?? 0 }}"
              data-bs-toggle="modal" 
              data-bs-target="#galleryModal" 
              title="Voir la galerie photos de {{ $modele->prenom }}"
              aria-label="Ouvrir galerie photos de {{ $modele->prenom }}">
          <i class="fas fa-camera"></i>
          <span>{{ count($photos) }}</span>
      </button>


    @php
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
@endphp


    @if(count($videos) > 0)
        <button class="btn btn-sm btn-light rounded-pill open-gallery"
        data-media='@json($videos)'
        data-type="video"
        data-payant="{{ $modele->mode == 1 ? '1' : '0' }}"
        data-flou="{{ $modele->type_flou ?? 'soft' }}"
        data-prix="{{ $modele->prix_flou ?? 0 }}"
        data-bs-toggle="modal" 
        data-bs-target="#galleryModal"
        title="Voir les vidéos de {{ $modele->prenom }}"
        aria-label="Ouvrir galerie vidéos de {{ $modele->prenom }}">
    <i class="fas fa-video"></i>
    <span>{{ count($videos) }}</span>
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
<!-- Modal de Détail du Modèle -->
<!-- Modal de Détail du Modèle amélioré -->
<div class="modal fade" id="modelDetailModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered">
    <div class="modal-content bg-dark text-white border-0 rounded-4 shadow-lg">
      
      <!-- Fermer -->
      <button type="button" class="btn btn-light position-absolute top-0 end-0 m-3 z-2" data-bs-dismiss="modal" aria-label="Fermer">
        <i class="fas fa-times"></i>
      </button>

      <div class="modal-body p-4">
  <div class="row g-4">
    <!-- Colonne gauche : photo + miniatures -->
    <div class="col-md-6 d-flex flex-column align-items-center">
      <img id="mainModelImage" src="" alt="Image principale du modèle" class="img-fluid rounded-4 shadow-lg mb-3" style="max-height: 500px; object-fit: cover; width: 100%;">
      <div class="d-flex flex-wrap justify-content-center gap-2" id="thumbnailContainer" style="max-width: 100%;">
        <!-- Miniatures dynamiques -->
      </div>
    </div>

    <!-- Colonne droite : détails -->
    <div class="col-md-6">
      <div id="modelDetailContent" class="bg-black bg-opacity-75 p-4 rounded shadow" style="max-height: 80vh; overflow-y: auto;">
        <!-- Contenu injecté ici -->
      </div>
    </div>
  </div>
</div>


    </div>
  </div>
</div>



    <!-- Script de changement dynamique -->
    <script>
        function afficherCartes(type) {
            let filles = document.querySelectorAll('.card-item.fille');

            if (type === 'fille') {
                filles.forEach(card => card.classList.remove('d-none'));
            }
        }

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
  setInterval(fetchLiveModels, 15000); // actualisation toutes les 15 sec
 const modeles = @json($modeles); // Assure-toi d'avoir passé $modeles depuis le contrôleur

 document.querySelectorAll('.nav-link[data-type]').forEach(link => {
    link.addEventListener('click', function(e) {
        e.preventDefault();
        const type = this.dataset.type;

        document.querySelectorAll('.card-default').forEach(el => el.classList.toggle('d-none', type !== 'default'));
        document.querySelectorAll('.card-photo').forEach(el => el.classList.toggle('d-none', type !== 'photo'));
    });
});

// Ouvrir la modal galerie
document.addEventListener('click', function(e) {
    const btn = e.target.closest('.open-gallery');
    if (!btn) return;

    const media = JSON.parse(btn.dataset.media || '[]');
    const type = btn.dataset.type;
    const galleryInner = document.getElementById('galleryInner');

    const isPayant = btn.dataset.payant === "1";
    const flouType = btn.dataset.flou || "soft";

    galleryInner.innerHTML = media.map((item, i) => {
    let content = '';

    if (type === 'photo') {
        content = `<img src="/storage/${item}" class="d-block w-100" style="object-fit:contain; height:100vh; cursor: zoom-in;" onclick="openFullscreen(this)" alt="Photo exclusive camgirl" title="Cliquez pour agrandir">`;
    } 
    else if (type === 'video') {
        if (item.includes('http') && !item.endsWith('.mp4')) {
            content = `<iframe src="${item}" class="d-block w-100" style="height:100vh;" frameborder="0" allowfullscreen title="Vidéo exclusive camgirl"></iframe>`;
        } else {
            content = `<video src="${item}" controls autoplay class="d-block w-100" style="height:100vh;" title="Vidéo camgirl"></video>`;
        }
    }

    // ✅ Si payant → flouter avec overlay
    if (isPayant) {
        content = `
            <div class="blur-wrapper ${flouType}">
                ${content}
                <div class="blur-overlay d-flex flex-column align-items-center justify-content-center">
                    <div class="fw-bold fs-5">Contenu flouté</div>
                    <div class="small">Prix : ${btn.dataset.prix ?? '??'} €</div>
                </div>
            </div>
        `;
    }

    return `
        <div class="carousel-item ${i === 0 ? 'active' : ''}">
            ${content}
        </div>
    `;
}).join('');


});
document.addEventListener('DOMContentLoaded', function () {
    let alerts = document.querySelectorAll('.alert');
    alerts.forEach(function(alert) {
        setTimeout(() => {
            alert.classList.remove('show');
            alert.classList.add('fade');
            setTimeout(() => alert.remove(), 500); // Supprime après animation
        }, 4000); // Affiché 4 secondes
    });
});


    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
document.addEventListener('DOMContentLoaded', function () {
  // Auto-ouverture de la modal de vérification si on revient de /register
  @if(session('showVerifyModal'))
    const verifyModal = new bootstrap.Modal(document.getElementById('verifyEmailModal'));
    verifyModal.show();
  @endif

  // Gestion des 6 inputs
  const digits = Array.from(document.querySelectorAll('.code-digit'));
  const fullCode = document.getElementById('fullCode');
  const submitBtn = document.getElementById('submitCodeBtn');

  function updateCode() {
    const code = digits.map(i => i.value.replace(/\D/g,'')).join('');
    fullCode.value = code;
    submitBtn.disabled = (code.length !== 6);
  }

  digits.forEach((input, idx) => {
    input.addEventListener('input', (e) => {
      e.target.value = e.target.value.replace(/\D/g,'').slice(0,1);
      if (e.target.value && idx < digits.length - 1) {
        digits[idx + 1].focus();
      }
      updateCode();
    });
    input.addEventListener('keydown', (e) => {
      if (e.key === 'Backspace' && !e.target.value && idx > 0) {
        digits[idx - 1].focus();
      }
    });
  });

  // Focus sur le premier champ à l'ouverture
  const verifyEl = document.getElementById('verifyEmailModal');
  verifyEl.addEventListener('shown.bs.modal', () => digits[0]?.focus());
});
</script>

    <!-- Modal Connexion -->
<!-- Modal Connexion -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="POST" action="{{ route('login.submit') }}" class="modal-content auth-modal">
      @csrf
      <div class="modal-header">
        <h5 class="modal-title">{{ __('Connexion à votre compte') }}</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label class="form-label">{{ __('Email') }}</label>
          <input type="email" name="email" class="form-control" required autocomplete="username" aria-label="Adresse email">
        </div>
        <div class="mb-3">
          <label class="form-label">{{ __('Mot de passe') }}</label>
          <input type="password" name="password" class="form-control" required autocomplete="current-password" aria-label="Mot de passe">
        </div>
        <div class="text-end">
    <a href="#" class="text-light small" data-bs-toggle="modal" data-bs-target="#forgotPasswordModal" data-bs-dismiss="modal">
        {{ __('Mot de passe oublié ') }} ?
    </a>
</div>

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-submit">{{ __('Connexion') }} </button>
      </div>
    </form>
  </div>
</div>
<!-- Modal Mot de passe oublié -->
<div class="modal fade" id="forgotPasswordModal" tabindex="-1" aria-labelledby="forgotPasswordModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="POST" action="{{ route('password.email') }}" class="modal-content auth-modal">
      @csrf
      <div class="modal-header">
        <h5 class="modal-title">{{ __('Réinitialiser le mot de passe') }}</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label class="form-label">{{ __('Adresse Emai') }}l</label>
          <input type="email" name="email" class="form-control" required aria-label="Adresse email pour réinitialisation">
        </div>
        <p class="small">{{ __('Vous recevrez un lien pour réinitialiser votre mot de passe.') }}</p>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-submit">{{ __('Envoyer') }} </button>
      </div>
    </form>
  </div>
</div>
<!-- LOADER PREMIUM -->
<div id="loader-screen" style="
    position: fixed;
    inset:0;
    background-color:#000;
    color:#fff;
    display:flex;
    flex-direction:column;
    justify-content:center;
    align-items:center;
    text-align:center;
    z-index:9999;
    transition: opacity 0.5s ease;
">
    <h1 style="
        font-size:3rem;
        font-weight:800;
        color:red;
        text-transform:uppercase;
        text-shadow:0 0 15px red;
        margin-bottom:2rem;
        animation:pulse 1.5s infinite;
    ">Live Beauty</h1>

    <div style="position:relative; width:100px; height:100px; margin-bottom:2rem;">
        <!-- Cercle -->
        <div style="
            width:100px; height:100px;
            border:8px solid #800000;
            border-top-color:#ff0000;
            border-radius:50%;
            animation: spin 1s linear infinite;
        "></div>
    </div>

    <p style="
        font-size:1.5rem;
        font-weight:bold;
        color:white;
        text-shadow:0 0 10px red;
        animation:pulse 1.5s infinite;
    ">Camgirls</p>
</div>

<style>
@keyframes spin {
    from { transform: rotate(0deg); }
    to   { transform: rotate(360deg); }
}
@keyframes pulse {
    0%, 100% { opacity:1; }
    50% { opacity:0.5; }
}
</style>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const loader = document.getElementById("loader-screen");

    // Vérifie si le loader a déjà été affiché
    if (!localStorage.getItem("loaderShown")) {
        // Affiche loader 1,5s puis cache
        setTimeout(() => {
            loader.style.opacity = "0";
            setTimeout(() => loader.style.display = "none", 500);
        }, 1500);

        // Marque comme affiché
        localStorage.setItem("loaderShown", "true");
    } else {
        // Cache directement si déjà affiché
        loader.style.display = "none";
    }
});
</script>




<!-- Modal Inscription -->
<!-- Modal Inscription -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="POST" action="{{ route('register.submit') }}" class="modal-content auth-modal">
      @csrf
      <div class="modal-header">
        <h5 class="modal-title">{{ __('Créer un compte') }}</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label class="form-label">{{ __('Pseudo') }}</label>
          <input id="pseudo" name="pseudo" class="form-control" required aria-label="Choisir un pseudo">
          <small id="pseudoMessage" class="d-none"></small>
        </div>
        <div class="mb-3">
          <label class="form-label">{{ __('Email') }}</label>
          <input id="email" name="email" type="email" class="form-control" required autocomplete="username" aria-label="Adresse email">
          <small  id="emailMessage" class="d-none"></small>
        </div>
        <div class="mb-3">
          <label class="form-label">{{ __('Mot de passe') }}</label>
          <input name="password" type="password" class="form-control" required autocomplete="new-password" aria-label="Créer un mot de passe">
        </div>
        <div class="form-check mt-3">
          <input class="form-check-input" type="checkbox" id="cguCheck" required>
          <label class="form-check-label" for="cguCheck">
{{ __("J'accepte les") }}
<a href="{{ route('cgu') }}" target="_blank">CGU</a>
{{ __("et la") }}
<a href="{{ route('pu') }}" target="_blank">{{ __("Politique d'Utilisation") }}</a>.
          </label>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-submit">{{ __('Inscription') }}</button>
      </div>
    </form>
  </div>
</div>

<!-- Modal Vérification Email -->
<div class="modal fade" id="verifyEmailModal" tabindex="-1" aria-labelledby="verifyEmailLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="POST" action="{{ route('register.verify') }}" class="modal-content auth-modal">
      @csrf
      <div class="modal-header">
        <h5 class="modal-title" id="verifyEmailLabel">{{ __('Vérification de votre email') }}</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>
      <div class="modal-body">
        <p class="mb-3">
          {{ __('Nous avons envoyé un code à 6 chiffres à') }} <strong>{{ session('registration_data.email') }}</strong>.
          {{ __('Saisissez-le ci-dessous pour valider votre inscription') }}.
        </p>

        <div class="d-flex justify-content-between gap-2 mb-3" style="max-width: 360px; margin:auto;">
          @for($i=1; $i<=6; $i++)
            <input type="text" inputmode="numeric" pattern="[0-9]*" maxlength="1"
                   class="form-control text-center fs-4 code-digit" id="d{{ $i }}" aria-label="Chiffre {{ $i }} du code">
          @endfor
        </div>

        <input type="hidden" name="code" id="fullCode">

        <div class="text-center">
          <button type="submit" class="btn btn-submit" id="submitCodeBtn" disabled>{{ __('Valider') }}</button>
        </div>

        <!--<div class="text-center mt-3">
          <form method="POST" action="{{ route('register.resend') }}" class="d-inline">
    @csrf
    <button type="submit" class="btn btn-link text-white text-decoration-underline p-0" formnovalidate>
        Renvoyer le code
    </button>
</form>

        </div>-->
      </div>
    </form>
  </div>
</div>

<!-- Modal Galerie Photo -->
<div class="modal fade" id="galleryModal" tabindex="-1">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content bg-black border-0">
      <div class="modal-header border-0">
        <h5 class="modal-title text-white"><i class="fas fa-images me-2"></i> {{ __('Galerie') }}</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>
      <div class="modal-body p-0">
        <div id="carouselGallery" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner" id="galleryInner"></div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselGallery" data-bs-slide="prev" aria-label="Précédent">
            <span class="carousel-control-prev-icon"></span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselGallery" data-bs-slide="next" aria-label="Suivant">
            <span class="carousel-control-next-icon"></span>
          </button>
        </div>
      </div>
    </div>
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
</script>

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
  document.querySelectorAll(".media-container").forEach(container => {
    const img = container.querySelector(".model-photo");
    if (img) {
      container.style.setProperty("--photo-bg", `url('${img.src}')`);
    }
  });
});
</script>
<script>
document.addEventListener('DOMContentLoaded', function () {

    // --- Vérif EMAIL ---
    const emailInput = document.getElementById('email');
    const emailMsg = document.getElementById('emailMessage');

    emailInput.addEventListener('input', function () {
        const email = this.value;

        if (email.length < 4) {
            emailMsg.classList.add('d-none');
            return;
        }

        fetch("{{ route('check.email') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: JSON.stringify({ email })
        })
        .then(res => res.json())
        .then(data => {
            if (data.exists) {
                emailMsg.textContent = "Cet email est déjà utilisé ❌";
                emailMsg.classList.remove('d-none', 'text-success');
                emailMsg.classList.add('text-danger');
            } else {
                emailMsg.textContent = "Email disponible ✔️";
                emailMsg.classList.remove('d-none', 'text-danger');
                emailMsg.classList.add('text-success');
            }
        });
    });


    // --- Vérif PSEUDO ---
    const pseudoInput = document.getElementById('pseudo');
    const pseudoMsg = document.getElementById('pseudoMessage');

    pseudoInput.addEventListener('input', function () {
        const pseudo = this.value;

        if (pseudo.length < 3) {
            pseudoMsg.classList.add('d-none');
            return;
        }

        fetch("{{ route('check.pseudo') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: JSON.stringify({ pseudo })
        })
        .then(res => res.json())
        .then(data => {
            if (data.exists) {
                pseudoMsg.textContent = "Ce pseudo est déjà pris ❌";
                pseudoMsg.classList.remove('d-none', 'text-success');
                pseudoMsg.classList.add('text-danger');
            } else {
                pseudoMsg.textContent = "Pseudo disponible ✔️";
                pseudoMsg.classList.remove('d-none', 'text-danger');
                pseudoMsg.classList.add('text-success');
            }
        });
    });

});
</script>

</body>
</html>