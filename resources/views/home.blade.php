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
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="filleDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">Filles</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Cams en Direct</a></li>
                            <li><a class="dropdown-item" href="#">Nouveaux Modèles</a></li>
                            <li><a class="dropdown-item" href="#">Promotions <span class="badge bg-warning text-dark">3</span></a></li>
                            <li><a class="dropdown-item" href="#">Top Modèles</a></li>
                        </ul>
                    </li>

                    <li class="nav-item"><a class="nav-link" href="#">Club Elite</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Awards</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Meilleurs Membres</a></li>
                </ul>

                <div class="d-flex align-items-center">
                    <a href="#" class="text-white me-3 fs-4"><i class="fa-solid fa-heart"></i></a>
                    <a href="#" class="text-white me-3 fs-4"><i class="fa-solid fa-crown"></i></a>
                    <a href="#" class="text-white me-3 fs-4"><i class="fa-solid fa-envelope"></i></a>
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
                <h5>Catégories</h5>
                <h5>Lives Actifs</h5>
                <div id="activeLives">
                <!-- Chargement dynamique -->
                </div>
                <!-- Menu avec sous-menus repliables -->
                <a href="#" onclick="toggleMenu(this)">En direct</a>
                <div class="submenu">
                    <a href="#">- VIP</a>
                    <a href="#">- Gratuit</a>
                </div>

                <a href="#" onclick="toggleMenu(this)">Tags en tendance</a>
                <div class="submenu">
                    <a href="#">- Populaire</a>
                    <a href="#">- Nouveaux</a>
                </div>

                <a href="#" onclick="toggleMenu(this)">Type de show</a>
                <div class="submenu">
                    <a href="#">- Privé</a>
                    <a href="#">- Public</a>
                </div>

                <a href="#" onclick="toggleMenu(this)">Prix</a>
                <div class="submenu">
                    <a href="#">- Moins cher</a>
                    <a href="#">- Premium</a>
                </div>

                <a href="#" onclick="toggleMenu(this)">Fétiches</a>
                <div class="submenu">
                    <a href="#">- Pieds</a>
                    <a href="#">- Cosplay</a>
                </div>

                <a href="#">Langue</a>
                <a href="#">Âge</a>
                <a href="#">Origine</a>
                <a href="#">Apparence</a>
                <a href="#">Poitrine</a>
                <a href="#">Fesses</a>
                <a href="#">Taille</a>
                <a href="#">Cheveux</a>
                <a href="#">Région</a>
            </div>

            <!-- Cartes -->
            <div class="col-md-10 p-4">
                <div class="row g-4">

                    @foreach($modeles as $modele)
    <div class="col-md-4 card-item fille">
        <div class="model-card">

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
    @if($modele->video_file)
      <video autoplay muted loop playsinline preload="none">
        <source src="{{ asset('storage/' . $modele->video_file) }}" type="video/mp4">
        Votre navigateur ne supporte pas la vidéo.
      </video>
    @elseif($modele->video_link)
      <iframe
        src="{{ $modele->video_link }}?autoplay=1&mute=1&controls=0&loop=1"
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

  function toggleVideo(id) {
    const carousel = document.getElementById(`carousel-${id}`);
    const video = document.getElementById(`video-${id}`);
    const btnVideo = document.getElementById(`btn-video-${id}`);
    const btnPhotos = document.getElementById(`btn-photos-${id}`);

    if (carousel && video) {
        carousel.classList.add('d-none');
        video.classList.remove('d-none');
        btnVideo.classList.add('d-none');
        btnPhotos.classList.remove('d-none');
    }
}

function togglePhotos(id) {
    const carousel = document.getElementById(`carousel-${id}`);
    const video = document.getElementById(`video-${id}`);
    const btnVideo = document.getElementById(`btn-video-${id}`);
    const btnPhotos = document.getElementById(`btn-photos-${id}`);

    if (carousel && video) {
        video.classList.add('d-none');
        carousel.classList.remove('d-none');
        btnPhotos.classList.add('d-none');
        btnVideo.classList.remove('d-none');
    }
}

 const modeles = @json($modeles); // Assure-toi d'avoir passé $modeles depuis le contrôleur

    function afficherDetailModele(id) {
    const modele = modeles.find(m => m.id === id);
    if (!modele) return;

    let photos = modele.photos;
    try {
        photos = typeof photos === 'string' ? JSON.parse(photos) : photos;
        if (!Array.isArray(photos)) photos = [];
    } catch (e) {
        photos = [];
    }

    const mainImg = document.getElementById('mainModelImage');
    const thumbnails = document.getElementById('thumbnailContainer');

    // Première image affichée par défaut
    if (photos.length > 0) {
        mainImg.src = `/storage/${photos[0]}`;
    } else {
        mainImg.src = 'https://via.placeholder.com/500x300?text=Pas+de+photo';
    }

    // Miniatures
    thumbnails.innerHTML = photos.map((photo, index) => `
        <img src="/storage/${photo}" data-index="${index}" class="${index === 0 ? 'active' : ''}">
    `).join('');

    // Ajouter l'écoute sur les miniatures
    thumbnails.querySelectorAll('img').forEach(img => {
        img.addEventListener('click', function () {
            mainImg.src = this.src;
            thumbnails.querySelectorAll('img').forEach(i => i.classList.remove('active'));
            this.classList.add('active');
        });
    });

    // Détails
    const contentHTML = `
        <h4 class="text-warning mb-3">Bio de ${modele.prenom}</h4>
        <p><strong>${modele.age || 'Âge inconnu'} ans</strong> — ${modele.genre || 'Genre'} — ${modele.orientation || ''} — ${modele.langues || ''}</p>
        <p>${modele.description || 'Aucune description disponible.'}</p>
        <hr class="bg-light">
        <h5>Ma bio :</h5>
        <ul class="list-unstyled mb-3">
            <li><strong>Taille :</strong> ${modele.taille || '-'} cm</li>
            <li><strong>Fesses :</strong> ${modele.fesses || '-'}</li>
            <li><strong>Poitrine :</strong> ${modele.poitrine || '-'}</li>
        </ul>
        <h5>Ce que je propose en Chat Privé :</h5>
        <p>${modele.services_prives || 'Non précisé'}</p>
    `;
    document.getElementById('modelDetailContent').innerHTML = contentHTML;

    // Affiche le modal
    new bootstrap.Modal(document.getElementById('modelDetailModal')).show();
}


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

</body>
</html>
