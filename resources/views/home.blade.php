<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LIVE BEAUTY</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <style>
       :root {
        --primary: #e91e63;
        --primary-light: #ff80ab;
        --dark-bg: #121212;
        --card-bg: #1e1e1e;
        --glass-bg: rgba(255, 255, 255, 0.05);
        --glass-blur: blur(8px);
        --text-light: #f5f5f5;
        --accent: gold;
        --border-radius: 1rem;

        /* Couleur vert très foncé ajoutée */
        --dark-green: #003300;
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

.navbar-brand .live {
    color: #fff;
}
.navbar-brand .beauty {
    color: #000;
}

.nav-link {
    color: white !important;
    font-weight: 500;
    transition: color 0.3s;
}
.nav-link:hover {
    color: var(--accent) !important;
}

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

.submenu {
    display: none;
}
.submenu a {
    padding-left: 20px;
    font-size: 0.85rem;
    border: none;
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
.btn-genre:hover {
    background-color: var(--primary-light);
}

/* Cartes Modèle */
.model-card {
    border-radius: var(--border-radius);
    background-color: transparent;
    box-shadow: 0 0 15px rgba(255, 255, 255, 0.05);
    position: relative;
    overflow: hidden;
    transition: transform 0.3s ease;
}
.model-card:hover {
    transform: scale(1.01);
}


.model-img {
    width: 100%;
    height: 230px;
    object-fit: cover;
    background: #000;
    border-top-left-radius: var(--border-radius);
    border-top-right-radius: var(--border-radius);
}

/* Nom */
.model-name {
    text-align: center;
padding: 1rem;
color: #ffffff; /* Blanc très pur */
font-weight: bold;
font-size: 1.1rem;
text-shadow: 0 0 6px #66ff66, 0 0 10px #66ff66; /* Vert clair lumineux autour du texte */

}

/* VIP & Status */
.vip-badge {
    position: absolute;
    top: 10px;
    left: 10px;
    background: var(--accent);
    color: black;
    padding: 5px 10px;
    font-size: 0.8rem;
    border-radius: 6px;
    font-weight: bold;
}
.status-indicator {
    position: absolute;
    top: 10px;
    right: 10px;
    width: 12px;
    height: 12px;
    border-radius: 50%;
    border: 2px solid white;
}
.status-online {
    background-color: #28a745;
}
.status-offline {
    background-color: #dc3545;
}

/* Boutons vidéo/photos */
.model-card .btn {
    border-radius: 0.6rem;
    font-size: 0.9rem;
    padding: 0.4rem 1rem;
    margin-top: 0.5rem;
    transition: 0.3s ease;
}

/* Modales */
.modal-content.auth-modal {
    background-color: var(--glass-bg);
    backdrop-filter: var(--glass-blur);
    color: white;
    border-radius: var(--border-radius);
    border: 1px solid rgba(255, 255, 255, 0.1);
    padding: 1.5rem;
    box-shadow: 0 0 25px rgba(255, 255, 255, 0.05);
}

.modal-header, .modal-footer {
    border: none;
    background: transparent;
}

.auth-modal .form-control {
    background-color: #111;
    color: white;
    border: 1px solid #444;
    border-radius: 10px;
}
.auth-modal .form-control:focus {
    background-color: #181818;
    color: white;
    border-color: white;
    box-shadow: none;
}

.auth-modal .btn-submit {
    background-color: #fff;
    color: #000;
    font-weight: bold;
    border-radius: 10px;
    transition: background-color 0.3s ease;
}
.auth-modal .btn-submit:hover {
    background-color: #f1f1f1;
}

/* Carrousel en modal */
#modelDetailModal .modal-content {
    background-color: transparent;
    backdrop-filter: var(--glass-blur);
    box-shadow: 0 0 30px rgba(255, 255, 255, 0.08);
}

#modal-carousel .carousel-item img {
    filter: blur(5px) brightness(0.4);
}

#modelDetailContent {
    background-color: rgba(0, 0, 0, 0.7);
    border-radius: var(--border-radius);
    padding: 2rem;
    max-height: 80vh;
    overflow-y: auto;
    box-shadow: 0 0 20px rgba(255, 255, 255, 0.05);
}
#thumbnailContainer img {
    width: 90px;
    height: 90px;
    object-fit: cover;
    border-radius: 0.6rem;
    border: 2px solid transparent;
    cursor: pointer;
    transition: transform 0.2s, border-color 0.3s;
}
#thumbnailContainer img:hover,
#thumbnailContainer img.active {
    transform: scale(1.05);
    border-color: var(--accent);
}
#modelDetailContent {
    max-height: 80vh; /* ou 70vh selon ta préférence */
    overflow-y: auto;
}
.status-label {
  z-index: 10;
  font-size: 0.85rem;
  font-weight: bold;
}

.media-container {
  position: relative;
  width: 100%;
  height: 300px;
  overflow: hidden;
}

.model-photo {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
}

.model-video {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  opacity: 0;
  z-index: 2;
  transition: opacity 0.4s ease;
  pointer-events: none; /* évite le blocage du clic sur la vidéo */
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

.status-name {
  position: absolute;
  bottom: 5px;
  left: 10px;
  display: flex;
  align-items: center;
  z-index: 3;
  color: white;
  font-weight: bold;
  padding: 4px 10px;
  border-radius: 20px;
}

.status-dot {
  width: 10px;
  height: 10px;
  border-radius: 50%;
  margin-right: 8px;
  background-color: green;
}

.card-photo {
    position: relative;
    border-radius: var(--border-radius);
    background: none; /* retire le fond noir */
    overflow: hidden;
    box-shadow: 0 0 15px rgba(255, 255, 255, 0.05);
    transition: transform 0.3s ease;
}

.card-photo img {
    width: 100%;
    height: 250px;
    object-fit: cover;
    display: block;
    border-radius: var(--border-radius);
}


.card-photo:hover {
    transform: scale(1.01);
}

.card-photo .status-name {
    position: absolute;
    bottom: 5px;
    left: 10px;
    z-index: 2;
    padding: 5px 10px;
    border-radius: 20px;
}

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

.open-gallery-btn i {
    font-size: 1rem;
    margin-bottom: 2px;
}

.open-gallery-btn span {
    font-size: 0.65rem;
    line-height: 1;
}

.open-gallery-btn:hover {
    transform: scale(1.1);
    color: var(--accent);
}


.card-photo .status-name,
.card-photo .open-gallery {
    margin: 0;
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
                <li class="nav-item">
    <a class="nav-link" href="#" data-type="default">Modèles</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="#" data-type="photo">Galerie photo</a>
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
                <div class="d-flex align-items-center">
                    <a href="#" class="text-white me-3 fs-4"><i class="fa-solid fa-heart"></i></a>
                    <a href="#" class="text-white me-3 fs-4"><i class="fa-solid fa-crown"></i></a>
<a href="mailto:contact@livebeautyofficial.com" class="text-white me-3 fs-4" title="Envoyer un email">
    <i class="fa-solid fa-envelope"></i>
</a>
                  <button class="btn btn-light me-2" data-bs-toggle="modal" data-bs-target="#loginModal">Connexion</button>
                <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#registerModal">Inscription GRATUITE</button>
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
                <!-- Menu avec sous-menus repliables -->
            </div>

            <!-- Cartes -->
            <div class="col-md-10 p-4">
                <div class="row g-4">

                    @foreach($modeles as $modele)
    <div class="col-md-4 card-item fille">
    <div class="model-card card-default">
<a href="{{ route('modele.profile', $modele->id) }}" class="d-block text-decoration-none text-light" target="_blank" rel="noopener noreferrer">
    @php
      $photos = is_array($modele->photos) ? $modele->photos : json_decode($modele->photos ?? '[]', true);
      $photo = $photos[0] ?? null;
      $hasVideo = $modele->video_file || $modele->video_link;
    @endphp

    <div class="media-container">
      {{-- IMAGE PRINCIPALE --}}
      @if($photo)
        <img src="{{ asset('storage/' . $photo) }}" class="model-photo" alt="photo">
      @else
        <img src="https://via.placeholder.com/300x230?text=Pas+de+photo" class="model-photo" alt="placeholder">
      @endif

      {{-- VIDÉO AU HOVER --}}
      @if($hasVideo)
  <div class="model-video">
    @if(!empty($modele->video_file) && is_array($modele->video_file))
  <video autoplay muted loop playsinline preload="none">
    <source src="{{ asset('storage/' . $modele->video_file[0]) }}" type="video/mp4">
    Votre navigateur ne supporte pas la vidéo.
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
            <img src="{{ asset('storage/' . $photo) }}" class="model-photo" alt="photo">
        @else
            <img src="https://via.placeholder.com/300x230?text=Pas+de+photo" class="model-photo" alt="placeholder">
        @endif
<div class="status-name">
    <span class="status-dot" style="background-color: {{ $modele->en_ligne ? '#28a745' : '#dc3545' }}"></span>
    <span class="model-name">{{ $modele->prenom }}</span>
</div>

        <div class="position-absolute bottom-0 end-0 p-2">
    <button class="btn btn-sm btn-light rounded-pill open-gallery" 
            data-media='@json($photos)' 
            data-type="photo"
            data-bs-toggle="modal" 
            data-bs-target="#galleryModal" 
            title="Voir les photos">
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
                data-bs-toggle="modal" 
                data-bs-target="#galleryModal"
                title="Voir les vidéos">
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
      <button type="button" class="btn btn-light position-absolute top-0 end-0 m-3 z-2" data-bs-dismiss="modal">
        <i class="fas fa-times"></i>
      </button>

      <div class="modal-body p-4">
  <div class="row g-4">
    <!-- Colonne gauche : photo + miniatures -->
    <div class="col-md-6 d-flex flex-column align-items-center">
      <img id="mainModelImage" src="" alt="Image principale" class="img-fluid rounded-4 shadow-lg mb-3" style="max-height: 500px; object-fit: cover; width: 100%;">
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
      const response = await fetch('/api/live/active'); // à créer en Laravel côté backend
      const lives = await response.json();

      const liveContainer = document.getElementById('activeLives');
      liveContainer.innerHTML = '';

      lives.forEach(model => {
        const link = document.createElement('a');
        link.href = `/live/${model.id}`;
        link.textContent = `🔴 ${model.prenom}`;
        link.classList.add('d-block', 'mb-1');
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

    galleryInner.innerHTML = media.map((item, i) => {
        let content = '';

        if (type === 'photo') {
            content = `<img src="/storage/${item}" class="d-block w-100" style="object-fit:contain; height:100vh;">`;
        } 
        else if (type === 'video') {
            if (item.includes('http') && !item.endsWith('.mp4')) {
                content = `<iframe src="${item}" class="d-block w-100" style="height:100vh;" frameborder="0" allowfullscreen></iframe>`;
            } else {
                content = `<video src="${item}" controls autoplay class="d-block w-100" style="height:100vh;"></video>`;
            }
        }

        return `
            <div class="carousel-item ${i === 0 ? 'active' : ''}">
                ${content}
            </div>
        `;
    }).join('');
});

    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Modal Connexion -->
<!-- Modal Connexion -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="POST" action="{{ route('login.submit') }}" class="modal-content auth-modal">
      @csrf
      <div class="modal-header">
        <h5 class="modal-title">Connexion à votre compte</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label class="form-label">Email</label>
          <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Mot de passe</label>
          <input type="password" name="password" class="form-control" required>
        </div>
        <div class="text-end">
    <a href="#" class="text-light small" data-bs-toggle="modal" data-bs-target="#forgotPasswordModal" data-bs-dismiss="modal">
        Mot de passe oublié ?
    </a>
</div>

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-submit">Connexion</button>
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
        <h5 class="modal-title">Réinitialiser le mot de passe</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label class="form-label">Adresse Email</label>
          <input type="email" name="email" class="form-control" required>
        </div>
        <p class="small">Vous recevrez un lien pour réinitialiser votre mot de passe.</p>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-submit">Envoyer</button>
      </div>
    </form>
  </div>
</div>



<!-- Modal Inscription -->
<!-- Modal Inscription -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="POST" action="{{ route('register.submit') }}" class="modal-content auth-modal">
      @csrf
      <div class="modal-header">
        <h5 class="modal-title">Créer un compte</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label class="form-label">Pseudo</label>
          <input name="pseudo" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Email</label>
          <input name="email" type="email" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Mot de passe</label>
          <input name="password" type="password" class="form-control" required>
        </div>
        <div class="form-check mt-3">
          <input class="form-check-input" type="checkbox" id="cguCheck" required>
          <label class="form-check-label" for="cguCheck">
            J'accepte les <a href="{{ route('cgu') }}" target="_blank">CGU</a> et la <a href="{{ route('pu') }}" target="_blank">Politique d’Utilisation</a>.
          </label>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-submit">Inscription</button>
      </div>
    </form>
  </div>
</div>
<!-- Modal Galerie Photo -->
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

</body>
</html>
