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
       :root {
  --primary: #e50914; /* Rouge premium (Netflix-style) */
  --primary-light: #ff1f3d;
  --dark-bg: #0b0b0b;
  --card-bg: #181818;
  --glass-bg: rgba(255, 255, 255, 0.05);
  --glass-blur: blur(10px);
  --text-light: #f5f5f5;
  --accent: #ff0000;
  --border-radius: 1rem;
  --dark-green: #003300;
  --font-premium: "Poppins", "Segoe UI", sans-serif;
  --shadow-strong: 0 8px 25px rgba(0, 0, 0, 0.6);
  --transition: all 0.3s ease;
}

/* GLOBAL */
body {
  background-color: var(--dark-bg);
  color: var(--text-light);
  font-family: var(--font-premium);
  margin: 0;
  padding: 0;
  overflow-x: hidden;
}

/* NAVBAR */
.navbar {
  background: linear-gradient(90deg, var(--primary-dark, #a40010), var(--primary));
  box-shadow: var(--shadow-strong);
  backdrop-filter: blur(12px);
  transition: var(--transition);
}

.navbar-brand {
  font-size: 2rem;
  font-weight: 700;
  letter-spacing: 2px;
  text-transform: uppercase;
}

.navbar-brand .live {
  color: #fff;
  text-shadow: 0 0 8px var(--accent);
}

.navbar-brand .beauty {
  color: #000;
  background-color: #fff;
  border-radius: 8px;
  padding: 0 6px;
  font-weight: 600;
}

.nav-link {
  color: var(--text-light) !important;
  font-weight: 500;
  transition: var(--transition);
  text-transform: uppercase;
  letter-spacing: 0.5px;
}

.nav-link:hover {
  color: var(--accent) !important;
  transform: scale(1.05);
}

/* SIDEBAR */
.sidebar {
  background-color: var(--card-bg);
  padding: 2rem 1rem;
  min-height: 100vh;
  border-right: 1px solid rgba(255, 255, 255, 0.05);
  overflow-y: auto;
  box-shadow: inset -1px 0 0 rgba(255, 255, 255, 0.05);
}

.sidebar h5 {
  color: var(--primary-light);
  text-transform: uppercase;
  margin-bottom: 1.5rem;
  font-size: 0.85rem;
  letter-spacing: 1px;
  font-weight: 600;
}

.sidebar a {
  display: block;
  color: #bdbdbd;
  padding: 0.6rem 0.8rem;
  border-radius: 8px;
  text-decoration: none;
  transition: var(--transition);
}

.sidebar a:hover {
  background-color: rgba(255, 0, 0, 0.08);
  color: var(--primary-light);
  transform: translateX(6px);
}

.submenu {
  display: none;
}
.submenu a {
  padding-left: 20px;
  font-size: 0.85rem;
  border: none;
}

/* BOUTONS */
.btn-genre {
  background-color: var(--primary);
  color: #fff;
  font-weight: 600;
  width: 100%;
  border-radius: 0.7rem;
  transition: var(--transition);
  border: none;
  box-shadow: 0 0 10px rgba(255, 0, 0, 0.15);
}

.btn-genre:hover {
  background-color: var(--primary-light);
  transform: translateY(-2px);
  box-shadow: 0 0 20px rgba(255, 0, 0, 0.4);
}

/* CARTES MODÈLE */
.model-card {
  border-radius: var(--border-radius);
  background-color: var(--card-bg);
  box-shadow: 0 0 20px rgba(255, 0, 0, 0.08);
  position: relative;
  overflow: hidden;
  transition: var(--transition);
  border: 1px solid rgba(255, 255, 255, 0.05);
}

.model-card:hover {
  transform: translateY(-5px) scale(1.02);
  box-shadow: 0 0 25px rgba(255, 0, 0, 0.25);
}

/* IMAGE DU MODÈLE */
.model-img {
  width: 100%;
  height: 230px;
  object-fit: cover;
  background: #000;
  border-top-left-radius: var(--border-radius);
  border-top-right-radius: var(--border-radius);
  transition: var(--transition);
}

.model-card:hover .model-img {
  filter: brightness(1.05);
  transform: scale(1.05);
}

/* NOM DU MODÈLE */
.model-name {
  text-align: center;
  padding: 1rem;
  color: #fff;
  font-weight: 700;
  font-size: 1.1rem;
  text-transform: capitalize;
  letter-spacing: 0.5px;
  text-shadow: 0 0 10px rgba(255, 0, 0, 0.7),
               0 0 20px rgba(255, 0, 0, 0.5);
  transition: var(--transition);
}

/* RESPONSIVE */
@media (max-width: 992px) {
  .navbar-brand {
    font-size: 1.6rem;
  }
  .sidebar {
    min-height: auto;
    padding: 1.2rem;
  }
  .model-img {
    height: 200px;
  }
}

@media (max-width: 768px) {
  .navbar-brand {
    font-size: 1.4rem;
  }
  .sidebar h5 {
    text-align: center;
  }
  .sidebar a {
    padding: 0.5rem;
    text-align: center;
  }
}

@media (max-width: 576px) {
  .navbar {
    padding: 0.5rem 1rem;
  }
  .model-img {
    height: 180px;
  }
  .model-name {
    font-size: 1rem;
  }
}

/* 🔥 VIP & STATUS */
.vip-badge {
  position: absolute;
  top: 10px;
  left: 10px;
  background: linear-gradient(135deg, #ff0000, #b30000);
  color: #fff;
  padding: 6px 12px;
  font-size: 0.75rem;
  border-radius: 8px;
  font-weight: 700;
  letter-spacing: 0.5px;
  text-transform: uppercase;
  box-shadow: 0 0 10px rgba(255, 0, 0, 0.4);
  z-index: 10;
}

.status-indicator {
  position: absolute;
  top: 10px;
  right: 10px;
  width: 14px;
  height: 14px;
  border-radius: 50%;
  border: 2px solid white;
  box-shadow: 0 0 8px rgba(255, 255, 255, 0.2);
}

.status-online {
  background-color: #28a745;
  box-shadow: 0 0 8px #00ff4c, 0 0 15px #00ff4c;
}

.status-offline {
  background-color: #dc3545;
  box-shadow: 0 0 8px #ff0000, 0 0 15px #b30000;
}

/* 🎥 BOUTONS VIDÉO / PHOTO */
.model-card .btn {
  border-radius: 0.6rem;
  font-size: 0.9rem;
  padding: 0.4rem 1rem;
  margin-top: 0.5rem;
  background: linear-gradient(90deg, #e50914, #ff1a1a);
  color: #fff;
  border: none;
  font-weight: 600;
  transition: all 0.3s ease-in-out;
  box-shadow: 0 4px 15px rgba(255, 0, 0, 0.2);
}

.model-card .btn:hover {
  background: linear-gradient(90deg, #ff3333, #b30000);
  transform: translateY(-2px);
  box-shadow: 0 6px 20px rgba(255, 0, 0, 0.4);
}

/* 💎 MODALES PREMIUM */
.modal-content.auth-modal {
  background: rgba(15, 15, 15, 0.9);
  backdrop-filter: blur(12px);
  color: #fff;
  border-radius: var(--border-radius);
  border: 1px solid rgba(255, 0, 0, 0.3);
  padding: 1.8rem;
  box-shadow: 0 0 25px rgba(255, 0, 0, 0.15);
}

.modal-header,
.modal-footer {
  border: none;
  background: transparent;
}

.auth-modal .form-control {
  background-color: #111;
  color: #fff;
  border: 1px solid rgba(255, 255, 255, 0.2);
  border-radius: 10px;
  transition: 0.3s ease;
}

.auth-modal .form-control:focus {
  background-color: #181818;
  border-color: var(--accent);
  box-shadow: 0 0 10px rgba(255, 0, 0, 0.4);
}

.auth-modal .btn-submit {
  background: linear-gradient(90deg, #ff0000, #b30000);
  color: #fff;
  font-weight: 700;
  border-radius: 10px;
  transition: all 0.3s ease;
  border: none;
}

.auth-modal .btn-submit:hover {
  background: linear-gradient(90deg, #ff1a1a, #800000);
  box-shadow: 0 0 20px rgba(255, 0, 0, 0.5);
  transform: translateY(-2px);
}

/* 🎠 CARROUSEL EN MODAL */
#modelDetailModal .modal-content {
  background: rgba(10, 10, 10, 0.85);
  backdrop-filter: blur(15px);
  box-shadow: 0 0 40px rgba(255, 0, 0, 0.2);
  border: 1px solid rgba(255, 0, 0, 0.2);
}

#modal-carousel .carousel-item img {
  filter: blur(5px) brightness(0.5);
  border-radius: var(--border-radius);
}

#modelDetailContent {
  background-color: rgba(0, 0, 0, 0.85);
  border-radius: var(--border-radius);
  padding: 2rem;
  max-height: 80vh;
  overflow-y: auto;
  box-shadow: 0 0 25px rgba(255, 0, 0, 0.15);
}

/* MINIATURES */
#thumbnailContainer img {
  width: 90px;
  height: 90px;
  object-fit: cover;
  border-radius: 10px;
  border: 2px solid transparent;
  cursor: pointer;
  transition: transform 0.3s, border-color 0.3s;
}

#thumbnailContainer img:hover,
#thumbnailContainer img.active {
  transform: scale(1.08);
  border-color: var(--accent);
}

/* 🖼️ MEDIA CONTAINER */
.media-container {
  position: relative;
  width: 100%;
  aspect-ratio: 4 / 5;
  max-height: 260px;
  border-radius: var(--border-radius);
  overflow: hidden;
  display: flex;
  align-items: center;
  justify-content: center;
  background: #000;
  transition: all 0.3s ease;
}

.media-container::before {
  content: "";
  position: absolute;
  inset: 0;
  background-image: var(--photo-bg);
  background-size: cover;
  background-position: center;
  filter: blur(20px) brightness(0.5);
  transform: scale(1.1);
  z-index: 0;
}

.model-photo {
  position: relative;
  z-index: 1;
  width: 100%;
  height: 100%;
  object-fit: contain;
  border-radius: inherit;
  transition: transform 0.4s ease, filter 0.4s ease;
}

.model-card:hover .model-photo {
  transform: scale(1.05);
  filter: brightness(1.05);
}

/* 🎞️ VIDÉO HOVER */
.model-video {
  position: absolute;
  inset: 0;
  opacity: 0;
  z-index: 2;
  transition: opacity 0.4s ease;
  pointer-events: none;
}

.model-video video,
.model-video iframe {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
}

.media-container:hover .model-video {
  opacity: 1;
}

/* 🔴 STATUS NAME */
.status-name {
  position: absolute;
  bottom: 8px;
  left: 10px;
  display: flex;
  align-items: center;
  z-index: 3;
  color: #fff;
  font-weight: 600;
  padding: 4px 12px;
  border-radius: 20px;
  font-size: 0.9rem;
  letter-spacing: 0.3px;
}

.status-dot {
  width: 10px;
  height: 10px;
  border-radius: 50%;
  margin-right: 8px;
  background-color: #00ff4c;
  box-shadow: 0 0 8px #00ff4c;
}

/* 🖼️ CARD PHOTO */
.card-photo {
  position: relative;
  border-radius: var(--border-radius);
  background: none;
  overflow: hidden;
  box-shadow: 0 0 25px rgba(255, 0, 0, 0.1);
  transition: all 0.3s ease-in-out;
}

.card-photo img {
  width: 100%;
  height: 250px;
  object-fit: cover;
  border-radius: var(--border-radius);
  transition: 0.3s ease;
}

.card-photo:hover {
  transform: translateY(-3px) scale(1.02);
  box-shadow: 0 0 25px rgba(255, 0, 0, 0.3);
}

.card-photo .status-name {
  position: absolute;
  bottom: 5px;
  left: 10px;
  padding: 6px 10px;
  border-radius: 20px;
}

/* 🎯 OPEN GALLERY BUTTON */
.open-gallery-btn {
  background: rgba(255, 0, 0, 0.1);
  border: 1px solid rgba(255, 0, 0, 0.4);
  color: white;
  font-weight: 600;
  font-size: 0.75rem;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  width: 42px;
  height: 42px;
  border-radius: 50%;
  transition: transform 0.3s, color 0.3s, box-shadow 0.3s;
}

.open-gallery-btn:hover {
  transform: scale(1.1);
  color: var(--accent);
  box-shadow: 0 0 10px rgba(255, 0, 0, 0.5);
}

/* 🔒 BLUR WRAPPERS (contenu payant) */
.blur-wrapper {
  position: relative;
  display: inline-block;
  overflow: hidden;
  border-radius: var(--border-radius);
}

.blur-wrapper img,
.blur-wrapper video,
.blur-wrapper iframe {
  filter: blur(12px) brightness(0.6);
  pointer-events: none;
}

.blur-wrapper.soft img,
.blur-wrapper.soft video,
.blur-wrapper.soft iframe {
  filter: blur(8px);
}

.blur-wrapper.strong img,
.blur-wrapper.strong video,
.blur-wrapper.strong iframe {
  filter: blur(20px);
}

.blur-wrapper.pixel img,
.blur-wrapper.pixel video,
.blur-wrapper.pixel iframe {
  image-rendering: pixelated;
  filter: blur(2px);
}

/* OVERLAY PAYANT */
.blur-overlay {
  position: absolute;
  inset: 0;
  background: rgba(0, 0, 0, 0.7);
  color: #fff;
  font-size: 1rem;
  text-align: center;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  font-weight: 600;
  letter-spacing: 0.3px;
  backdrop-filter: blur(6px);
  border-radius: inherit;
}

/* Icônes du menu principal */
    .nav-link i {
      font-size: 1.3rem;
      color: #fff;
      transition: all 0.3s ease;
      text-shadow: 0 0 6px rgba(255, 0, 0, 0.3);
    }

    .nav-link:hover i {
      color: var(--accent);
      transform: scale(1.15);
      text-shadow: 0 0 10px rgba(255, 0, 0, 0.8);
    }

    /* Espacement et alignement */
    .nav-item {
      margin: 0 4px;
    }

    .nav-link {
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 0.4rem 0.6rem;
    }

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

    /* Dropdown Langues */
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

.flag-icon {
    font-size: 1.3rem;
    line-height: 1;
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