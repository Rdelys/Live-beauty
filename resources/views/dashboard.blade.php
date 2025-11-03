<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LIVE BEAUTY - Tableau de bord</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <style>

/* 💎 STYLE MODAL PREMIUM */
.premium-modal {
  background: #0d0d0d;
  border: 1px solid #ff0000;
  border-radius: 20px;
  box-shadow: 0 0 25px rgba(255, 0, 0, 0.4);
  color: #fff;
  font-family: 'Poppins', sans-serif;
  letter-spacing: 0.5px;
  animation: fadeInUp 0.4s ease-out;
}

.premium-modal .modal-title {
  color: #ff2a2a;
  text-shadow: 0 0 10px rgba(255, 0, 0, 0.6);
}

.glow-circle {
  width: 80px;
  height: 80px;
  border-radius: 50%;
  border: 2px solid #ff2a2a;
  display: flex;
  align-items: center;
  justify-content: center;
  color: #ff2a2a;
  box-shadow: 0 0 15px rgba(255, 0, 0, 0.6);
  animation: pulseGlow 1.5s infinite alternate;
}

@keyframes pulseGlow {
  from { box-shadow: 0 0 10px rgba(255, 0, 0, 0.4); }
  to { box-shadow: 0 0 25px rgba(255, 0, 0, 0.9); }
}

@keyframes fadeInUp {
  from { opacity: 0; transform: translateY(20px); }
  to { opacity: 1; transform: translateY(0); }
}

:root {
  --primary: #e91e63;
  --primary-light: #ff80ab;
  --dark-bg: #121212;
  --card-bg: #1e1e1e;
  --text-light: #f5f5f5;
  --accent: gold;
  --border-radius: 1rem;
}

body {
  background-color: var(--dark-bg);
  color: var(--text-light);
  font-family: 'Segoe UI', sans-serif;
}

/* Navbar */
.navbar {
  background: linear-gradient(90deg, var(--primary), #c2185b);
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.4);
}
.navbar-brand {
  font-size: 2rem;
  font-weight: bold;
  letter-spacing: 2px;
}
.navbar-brand .live { color: #fff; }
.navbar-brand .beauty { color: #000; }
.nav-link {
  color: white !important;
  font-weight: 500;
  transition: color 0.3s;
}
.nav-link:hover { color: var(--accent) !important; }

/* Sidebar */
.sidebar {
  background-color: #181818;
  padding: 2rem 1rem;
  min-height: 100vh;
  border-right: 1px solid #333;
  overflow-y: auto;
}
.sidebar h5 {
  color: var(--primary-light);
  text-transform: uppercase;
  margin-bottom: 1.2rem;
  font-size: 0.9rem;
  letter-spacing: 1px;
}
.sidebar a {
  display: block;
  color: #ccc;
  padding: 0.5rem 0;
  border-bottom: 1px solid #292929;
  text-decoration: none;
  transition: all 0.3s ease;
}
.sidebar a:hover {
  color: var(--primary-light);
  padding-left: 8px;
}

/* Boutons */
.btn-genre {
  background-color: var(--primary);
  color: white;
  font-weight: bold;
  width: 100%;
  border-radius: 0.7rem;
  transition: background 0.3s ease;
}
.btn-genre:hover { background-color: var(--primary-light); }

/* 🖼️ Cartes Modèle */
.model-card {
  background-color: var(--card-bg);
  border-radius: var(--border-radius);
  overflow: hidden;
  position: relative;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  box-shadow: 0 0 10px rgba(255, 20, 147, 0.15);
}
.model-card:hover {
  transform: scale(1.02);
  box-shadow: 0 0 20px rgba(255, 20, 147, 0.4);
}

/* 🌟 Fond flouté uniforme */
.media-container,
.card-photo {
  position: relative;
  width: 100%;
  aspect-ratio: 4 / 5;
  overflow: hidden;
  border-radius: var(--border-radius);
  display: flex;
  align-items: center;
  justify-content: center;
  background: #111;
}
.media-container::before,
.card-photo::before {
  content: "";
  position: absolute;
  inset: 0;
  background-image: var(--photo-bg);
  background-size: cover;
  background-position: center;
  filter: blur(15px) brightness(0.6);
  transform: scale(1.2);
  z-index: 0;
}

/* Image */
.model-photo {
  position: relative;
  z-index: 1;
  width: 100%;
  height: 100%;
  object-fit: contain;
  object-position: center;
  display: block;
  background: transparent !important;
  transition: transform 0.3s ease-in-out;
  pointer-events: none; /* ✅ permet de cliquer sur les boutons au-dessus */
}

.card-photo .open-gallery,
.card-photo .btn {
  position: relative;
  z-index: 5; /* ✅ au-dessus de la photo */
}


.model-card:hover .model-photo,
.card-photo:hover .model-photo {
  transform: scale(1.04);
}

/* Vidéo au hover */
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
}
.media-container:hover .model-video { opacity: 1; }

/* Nom + statut */
.status-name {
  position: absolute;
  bottom: 10px;
  left: 10px;
  z-index: 3;
  display: flex;
  align-items: center;
  padding: 5px 10px;
  border-radius: 20px;
  background: rgba(0, 0, 0, 0.5);
  backdrop-filter: blur(4px);
}
.status-dot {
  width: 10px;
  height: 10px;
  border-radius: 50%;
  margin-right: 6px;
}

/* Galerie modale */
.carousel-item img,
.carousel-item video {
  object-fit: contain !important;
  background: rgba(0,0,0,0.7);
  max-height: 100vh;
  width: 100%;
}

/* Galerie : boutons */
.open-gallery-btn {
  background: none;
  border: none;
  color: white;
  font-weight: bold;
  font-size: 0.75rem;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  width: 40px;
  height: 40px;
  border-radius: 50%;
  transition: transform 0.2s ease, color 0.2s ease;
}
.open-gallery-btn:hover {
  transform: scale(1.1);
  color: var(--accent);
}

/* 💖 STYLE PREMIUM DU COEUR FAVORIS */
.btn-favori {
  position: relative;
  background: transparent;
  border: none;
  outline: none;
  cursor: pointer;
  transition: transform 0.25s ease;
  z-index: 10;
}

.btn-favori i {
  font-size: 1.6rem;
  color: #bbb;
  filter: drop-shadow(0 0 2px rgba(255, 255, 255, 0.2));
  transition: all 0.35s ease;
}

.btn-favori:hover i {
  color: #ff2a2a;
  transform: scale(1.15);
  filter: drop-shadow(0 0 8px rgba(255, 0, 0, 0.8));
}

/* ❤️ Cœur activé (en favori) */
.btn-favori.active i {
  color: #ff003c;
  text-shadow: 0 0 15px rgba(255, 0, 0, 0.8);
  animation: pulseHeart 1.2s infinite ease-in-out;
}

@keyframes pulseHeart {
  0%, 100% {
    transform: scale(1);
    filter: drop-shadow(0 0 8px rgba(255, 0, 0, 0.6));
  }
  50% {
    transform: scale(1.2);
    filter: drop-shadow(0 0 16px rgba(255, 100, 100, 1));
  }
}

/* 💫 Effet de halo autour du cœur (premium) */
.btn-favori::after {
  content: "";
  position: absolute;
  top: 50%;
  left: 50%;
  width: 38px;
  height: 38px;
  background: radial-gradient(circle, rgba(255,0,0,0.4) 0%, rgba(255,0,0,0) 70%);
  transform: translate(-50%, -50%) scale(0);
  opacity: 0;
  border-radius: 50%;
  transition: all 0.3s ease-out;
  pointer-events: none;
}

.btn-favori.active::after {
  transform: translate(-50%, -50%) scale(1.2);
  opacity: 1;
}

/* Flous payants */
.blur-wrapper { position: relative; overflow: hidden; display: block; }
.blur-wrapper img,
.blur-wrapper video {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
  transition: filter 0.35s ease, transform 0.35s ease;
}
.blur-wrapper.soft img, .blur-wrapper.soft video { filter: blur(12px); }
.blur-wrapper.strong img, .blur-wrapper.strong video { filter: blur(35px); }
.blur-wrapper.hidden img, .blur-wrapper.hidden video {
  filter: blur(60px);
  opacity: 0.8;
}
.blur-wrapper.pixel img {
  filter: blur(5px);
  image-rendering: pixelated;
  transform: scale(1.1);
  opacity: 0.9;
}

/* Overlay payant */
.blur-overlay {
  position: absolute;
  inset: 0;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  z-index: 20;
  background: rgba(0,0,0,0.45);
  color: #fff;
  gap: 8px;
  pointer-events: none;
}
.blur-overlay button {
  pointer-events: auto;
}

.model-card, .card-photo {
  width: 100%;
  max-width: 320px;
  margin: 0 auto;
}
.media-container, .card-photo {
  aspect-ratio: 4 / 5;
  height: auto;
  max-height: 260px;
}
.model-photo {
  object-fit: contain;
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
                          <a class="nav-link" href="#" data-type="default">Modèles</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="#" data-type="photo">Galerie photo</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('achats.mes') }}">
                          <i class="fas fa-image me-1"></i>Mes photos achetées
                        </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="#">Nouveaux Modèles</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="#">Promotions <span class="badge bg-warning text-dark">3</span></a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="#">Top Modèles</a>
                      </li>
                  </ul>
                </ul>

                <div class="d-flex align-items-center">
                    
                    <a href="#" class="text-white me-3 fs-4"><i class="fa-solid fa-heart"></i></a>
                    <a href="#" class="text-white me-3 fs-4"><i class="fa-solid fa-crown"></i></a>
                    <a href="mailto:contact@livebeautyofficial.com" class="text-white me-3 fs-4" title="Envoyer un email">
                        <i class="fa-solid fa-envelope"></i>
                    </a>
                    
                @if(Auth::check())
                    <div class="me-3 text-white fw-bold">
                        <i class="fas fa-coins text-warning me-1"></i>
                        {{ Auth::user()->jetons }} jetons
                    </div>
                @endif
                    <span class="text-white me-3 fw-bold">{{ Auth::user()->nom }} {{ Auth::user()->prenoms }}</span>
                    
                    <button class="btn btn-danger fw-bold rounded-pill me-2" data-bs-toggle="modal" data-bs-target="#achatJetonsModal">
                      <i class="fas fa-coins me-1"></i> Achat Jetons
                    </button>
                    <!-- Icône modifier profil -->
<a href="#" class="text-white fs-5 me-3" data-bs-toggle="modal" data-bs-target="#editProfileModal" title="Modifier mon profil">
    <i class="fas fa-user-cog"></i>
</a>

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
                <h5>Cams en Direct</h5>
                <div id="activeLives">
                <!-- Chargement dynamique -->
                </div>
                <h5>Mes Lives Privés</h5>
                <div id="privateLives"></div>

                <br>
                @if(Auth::check() && Auth::user()->favoris->count() > 0)
    <h5>Mes Favoris</h5>
    @foreach(Auth::user()->favoris as $fav)
        <a href="{{ route('modele.profile', $fav->id) }}">
            ❤️ {{ $fav->prenom }}
        </a>
    @endforeach
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

            {{-- Vidéo au hover --}}
            @if($hasVideo)
              <div class="model-video">
                @if(!empty($modele->video_file) && is_array($modele->video_file))
                  <video autoplay muted loop playsinline preload="none">
                    <source src="{{ asset('storage/' . $modele->video_file[0]) }}" type="video/mp4">
                  </video>
                @elseif(!empty($modele->video_link) && is_array($modele->video_link))
                  <iframe
                    src="{{ $modele->video_link[0] }}?autoplay=1&mute=1&controls=0&loop=1"
                    frameborder="0"
                    allow="autoplay; encrypted-media"
                    allowfullscreen
                    style="width: 100%; height: 100%;">
                  </iframe>
                @endif
              </div>
            @endif

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
          <i class="fas fa-coins me-2"></i> Acheter des Jetons
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
                <h5 class="text-danger fw-bold mb-3">{{ $pack['jetons'] }} <i class="fas fa-fire"></i> Jetons</h5>
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
          <i class="fas fa-user-edit me-2"></i> Modifier mon profil
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>

      <div class="modal-body">
        <div class="mb-3">
          <label class="form-label"><i class="fas fa-user text-danger me-2"></i>Nom</label>
          <input type="text" name="nom" class="form-control bg-dark text-white border-danger" value="{{ $user->nom }}">
        </div>
        <div class="mb-3">
          <label class="form-label"><i class="fas fa-user-friends text-danger me-2"></i>Prénoms</label>
          <input type="text" name="prenoms" class="form-control bg-dark text-white border-danger" value="{{ $user->prenoms }}">
        </div>
        <div class="mb-3">
          <label class="form-label"><i class="fas fa-birthday-cake text-danger me-2"></i>Âge</label>
          <input type="number" name="age" class="form-control bg-dark text-white border-danger" value="{{ $user->age }}">
        </div>
        <div class="mb-3">
          <label class="form-label"><i class="fas fa-user-tag text-danger me-2"></i>Pseudo</label>
          <input type="text" name="pseudo" class="form-control bg-dark text-white border-danger" value="{{ $user->pseudo }}">
        </div>
        <div class="mb-3">
          <label class="form-label"><i class="fas fa-building text-danger me-2"></i>Département</label>
          <input type="text" name="departement" class="form-control bg-dark text-white border-danger" value="{{ $user->departement }}">
        </div>
        <div class="mb-3">
          <label class="form-label"><i class="fas fa-envelope text-danger me-2"></i>Email</label>
          <input type="email" name="email" class="form-control bg-dark text-white border-danger" value="{{ $user->email }}">
        </div>
      </div>

      <div class="modal-footer border-0">
        <button type="submit" class="btn btn-danger w-100 fw-bold rounded-pill">
          <i class="fas fa-save me-2"></i> Enregistrer les modifications
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
          <i class="fas fa-lock me-2"></i> Live privé
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body text-center">
        <p>Souhaitez-vous accéder au live privé ou le décaler ?</p>
      </div>
      <div class="modal-footer border-0 justify-content-center">
        <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Annuler</button>
        <button type="button" class="btn btn-primary rounded-pill" id="btnDecaler">Décaler</button>
        <button type="button" class="btn btn-danger rounded-pill" id="btnAcceder">Accéder</button>
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
          🔒 Ce show est actuellement en <span class="text-danger fw-bold">mode privé</span>.<br>
          Seuls les membres autorisés peuvent y accéder.
        </p>
        <button type="button" class="btn btn-outline-danger px-4" data-bs-dismiss="modal">
          Fermer
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

<script src="https://js.stripe.com/v3/"></script>
<script>
const stripe = Stripe("{{ env('STRIPE_KEY') }}");

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
        <i class="fas fa-credit-card me-2"></i> Payer avec Stripe
      </button>`;
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
        <h5 class="modal-title text-white"><i class="fas fa-images me-2"></i> Galerie</h5>
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
        <h5 class="modal-title fw-bold text-danger"><i class="fas fa-calendar-alt me-2"></i> Décaler le show privé</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label class="form-label">Date</label>
          <input type="date" class="form-control bg-dark text-white border-danger" name="date" id="decaler_date" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Heure de début</label>
          <input type="time" class="form-control bg-dark text-white border-danger" name="debut" id="decaler_debut" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Heure de fin</label>
          <input type="time" class="form-control bg-dark text-white border-danger" name="fin" id="decaler_fin" readonly>
        </div>
      </div>
      <div class="modal-footer border-0">
        <button type="submit" class="btn btn-danger w-100 fw-bold rounded-pill">Enregistrer le nouveau créneau</button>
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

</body>
</html>
