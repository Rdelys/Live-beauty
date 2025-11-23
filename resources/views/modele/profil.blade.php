<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Profil Modèle</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.socket.io/4.8.1/socket.io.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <audio id="soundMessage" src="{{ asset('sounds/notificationAction.mp3') }}" preload="auto"></audio>
  <audio id="soundSurprise" src="{{ asset('sounds/cadeau.mp3') }}" preload="auto"></audio>
  <audio id="soundEnter" src="{{ asset('sounds/rentreShow.mp3') }}" preload="auto"></audio>

  <style>
    /* ============================
   🎀 LIVE BEAUTY PREMIUM STYLE
   Blanc - Rouge - Noir
   Responsive & Professionnel
============================ */
/* Fond du sélecteur */
.choices__inner {
    background-color: #222 !important;
    color: #fff !important;
    border: 1px solid #444 !important;
}

/* Couleur du placeholder */
.choices__input {
    color: #ccc !important;
}

/* Dropdown */
.choices__list--dropdown, 
.choices__list {
    background-color: #222 !important;
    color: #fff !important;
}

/* Item sélectionné (tag) */
.choices__item.choices__item--selectable {
    background-color: #e50914 !important;
    color: #fff !important;
}

/* Option hover */
.choices__list--dropdown .choices__item--selectable:hover {
    background-color: #333 !important;
    color: #fff !important;
}

/* Modal - Thème sombre */
.modal-content {
    background-color: #111 !important;
    color: #fff !important;
    border: 1px solid #333;
}

.modal-header {
    border-bottom: 1px solid #333;
}

.modal-footer {
    border-top: 1px solid #333;
}

/* Inputs sombres */
.modal-content .form-control {
    background-color: #222;
    border: 1px solid #444;
    color: #fff;
}

.modal-content .form-control:focus {
    background-color: #222;
    border-color: #ff4444; /* légèrement rouge pour cohérence */
    box-shadow: none;
    color: #fff;
}

/* Boutons */
.btn-secondary {
    background-color: #333;
    border: 1px solid #444;
    color: #fff;
}

.btn-primary {
    background-color: #0055ff;
    border: 1px solid #0077ff;
}

.btn-close {
    filter: invert(1); /* transforme la croix en blanc */
}


body {
  font-family: 'Poppins', sans-serif;
  background: linear-gradient(135deg, #000000, #1a1a1a);
  color: #fff;
  margin: 0;
  padding: 0;
  min-height: 100vh;
  overflow-x: hidden;
  scroll-behavior: smooth;
}

/* === CONTAINERS === */
.container {
  max-width: 1300px;
  margin: auto;
  padding: 2rem 1rem;
  animation: fadeIn 0.6s ease-in-out;
}

/* === TITRES === */
h1, h2, h3, h4, h5 {
  font-weight: 600;
  color: #fff;
}
.text-danger {
  color: #e50914 !important;
}

/* === NAVIGATION (TABS) === */
.nav-tabs {
  border: none;
  justify-content: center;
  margin-top: 2rem;
  flex-wrap: wrap;
}

.nav-tabs .nav-link {
  background: rgba(255, 255, 255, 0.08);
  color: #fff;
  border: none;
  border-radius: 30px;
  padding: 0.6rem 1.2rem;
  margin: 0.3rem;
  font-weight: 500;
  transition: all 0.3s ease;
}

.nav-tabs .nav-link:hover {
  background: rgba(255, 255, 255, 0.2);
}

.nav-tabs .nav-link.active {
  background: #e50914;
  color: #fff;
  box-shadow: 0 3px 15px rgba(229, 9, 20, 0.4);
}

/* Compteur d’onglets */
.tab-counter {
  background: #fff;
  color: #e50914;
  border-radius: 15px;
  font-size: 0.7rem;
  font-weight: bold;
  padding: 0.2rem 0.5rem;
  margin-left: 5px;
}

/* === CONTENU DES TABS === */
.tab-content {
  background: rgba(255, 255, 255, 0.04);
  backdrop-filter: blur(10px);
  border-radius: 16px;
  margin-top: 2rem;
  padding: 2rem;
  box-shadow: 0 8px 25px rgba(0,0,0,0.3);
  transition: all 0.3s ease;
  animation: fadeIn 0.5s ease;
}

.tab-pane p {
  margin-bottom: 0.8rem;
  font-size: 0.95rem;
}

/* === BOUTONS === */
.btn {
  border-radius: 50px;
  font-weight: 600;
  transition: all 0.3s ease;
}

.btn-danger {
  background: #e50914;
  border: none;
  color: #fff;
}
.btn-danger:hover {
  background: #b4060f;
  transform: translateY(-2px);
  box-shadow: 0 4px 12px rgba(229, 9, 20, 0.4);
}

.btn-success {
  background: #00c853;
  border: none;
}
.btn-success:hover {
  background: #00a943;
  transform: translateY(-2px);
  box-shadow: 0 4px 12px rgba(0, 200, 83, 0.4);
}

.btn-secondary {
  background: #333;
  color: #fff;
  border: none;
}
.btn-secondary:hover {
  background: #444;
  transform: translateY(-2px);
}

/* Bouton principal de statut (Live / Privé) */
.show-status-btn {
  border-radius: 50px;
  font-weight: bold;
  padding: 0.7rem 1.5rem;
  border: none;
  color: #fff;
  letter-spacing: 0.5px;
  transition: all 0.3s ease;
  text-transform: uppercase;
}

.show-status-btn.public {
  background: linear-gradient(135deg, #0f9d58, #00c853);
  animation: pulsePublic 2s infinite;
}
.show-status-btn.private {
  background: linear-gradient(135deg, #e50914, #b71c1c);
  animation: pulsePrivate 2s infinite;
}

/* === ANIMATIONS === */
@keyframes pulsePublic {
  0%, 100% { box-shadow: 0 0 10px #00c853; }
  50% { box-shadow: 0 0 25px #00e676; }
}
@keyframes pulsePrivate {
  0%, 100% { box-shadow: 0 0 10px #e50914; }
  50% { box-shadow: 0 0 25px #ff1744; }
}

@keyframes fadeIn {
  from { opacity: 0; transform: translateY(15px); }
  to { opacity: 1; transform: translateY(0); }
}

/* === FORMULAIRES === */
.form-label {
  font-weight: 500;
  color: #fff;
}
.form-control {
  background: rgba(255,255,255,0.05);
  border: 1px solid rgba(255,255,255,0.15);
  color: #fff;
  border-radius: 10px;
  padding: 0.8rem 1rem;
  transition: all 0.3s ease;
}
.form-control:focus {
  background: rgba(255,255,255,0.1);
  border-color: #e50914;
  box-shadow: 0 0 8px rgba(229, 9, 20, 0.5);
  color: #fff;
}

/* === CARTES === */
.card {
  background: #151515;
  border: 1px solid rgba(255,255,255,0.1);
  border-radius: 15px;
  box-shadow: 0 4px 15px rgba(0,0,0,0.4);
  overflow: hidden;
  transition: all 0.3s ease;
}
.card:hover {
  transform: translateY(-5px);
  box-shadow: 0 8px 25px rgba(0,0,0,0.5);
}
.card-title {
  color: #e50914;
  font-weight: 600;
}

/* === BADGES / LABELS === */
.badge {
  border-radius: 12px;
  font-size: 0.8rem;
  padding: 0.4rem 0.6rem;
}
.badge.bg-success { background: #00c853; }
.badge.bg-danger { background: #e50914; }
.badge.bg-info { background: #03a9f4; color: #000; }

/* === ALERTES === */
.alert {
  border-radius: 12px;
  font-weight: 500;
}
.alert-success {
  background: rgba(0,200,83,0.1);
  border: 1px solid #00c853;
}
.alert-danger {
  background: rgba(229,9,20,0.1);
  border: 1px solid #e50914;
}

/* === VIDÉOS === */
video {
  width: 100%;
  border-radius: 12px;
  background: #000;
  border: 2px solid rgba(255,255,255,0.1);
}
#videoContainer:fullscreen video {
  border-radius: 0;
  object-fit: cover;
}

/* === CHAT === */
.chat-wrapper {
  position: absolute;
  bottom: 85px;
  left: 10px;
  right: 10px;
  max-height: 160px;
  overflow-y: auto;
  display: flex;
  flex-direction: column;
  padding: 8px 12px;
  z-index: 999;
  -webkit-mask-image: linear-gradient(to bottom, transparent, black 15%, black 85%, transparent);
  scrollbar-width: thin;
  scrollbar-color: rgba(255,255,255,0.2) transparent;
}
.chat-wrapper::-webkit-scrollbar {
  width: 5px;
}
.chat-wrapper::-webkit-scrollbar-thumb {
  background: rgba(255,255,255,0.2);
  border-radius: 10px;
}

/* Bulles de chat */
.chat-bubble {
  background: rgba(255,255,255,0.05);
  border: 1px solid rgba(255,255,255,0.08);
  border-radius: 10px;
  color: #fff;
  padding: 8px 12px;
  margin-bottom: 6px;
  font-size: 0.9rem;
  backdrop-filter: blur(6px);
  box-shadow: 0 2px 10px rgba(0,0,0,0.3);
  animation: chatPop 0.25s ease forwards;
  max-width: 90%;
  line-height: 1.4;
}
@keyframes chatPop {
  0% { transform: translateY(6px) scale(0.95); opacity: 0; }
  100% { transform: translateY(0) scale(1); opacity: 1; }
}

/* === RESPONSIVE === */
@media (max-width: 992px) {
  .container { padding: 1.5rem; }
  .tab-content { padding: 1.5rem; }
}
@media (max-width: 768px) {
  .nav-tabs .nav-link {
    font-size: 0.9rem;
    padding: 0.5rem 1rem;
  }
  .chat-bubble {
    font-size: 0.85rem;
  }
}
@media (max-width: 576px) {
  h2 { font-size: 1.3rem; }
  .btn, .form-control { font-size: 0.9rem; }
  .tab-content { padding: 1rem; }
}

.photo-order-badge {
  position: absolute;
  top: 8px;
  left: 8px;
  background: rgba(255, 0, 0, 0.8);
  color: white;
  font-weight: bold;
  border-radius: 50%;
  width: 28px;
  height: 28px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 0.9rem;
  z-index: 10;
  box-shadow: 0 2px 6px rgba(0,0,0,0.3);
}

/* === FIX STYLE DES SELECTS === */
select.form-control,
.form-select {
  background-color: rgba(255, 255, 255, 0.05) !important;
  color: #fff !important;
  border: 1px solid rgba(255, 255, 255, 0.15);
  border-radius: 10px;
  appearance: none;
  -webkit-appearance: none;
  -moz-appearance: none;
  padding-right: 2rem;
  background-image: linear-gradient(45deg, transparent 50%, #e50914 50%), 
                    linear-gradient(135deg, #e50914 50%, transparent 50%);
  background-position: right 1rem top 1.2rem, right 0.9rem top 1.2rem;
  background-size: 8px 8px, 8px 8px;
  background-repeat: no-repeat;
  transition: all 0.3s ease;
}

select.form-control:focus,
.form-select:focus {
  background-color: rgba(255, 255, 255, 0.1) !important;
  border-color: #e50914 !important;
  box-shadow: 0 0 8px rgba(229, 9, 20, 0.5);
  color: #fff !important;
}

/* Options dans le menu déroulant */
select.form-control option,
.form-select option {
  background-color: #111 !important;
  color: #fff !important;
}

/* Désactiver fond blanc par défaut dans Firefox */
select:-moz-focusring {
  color: transparent;
  text-shadow: 0 0 0 #fff;
}
.card.text-center.bg-dark {
  transition: all 0.3s ease;
  border: 1px solid rgba(255,255,255,0.1);
}
.card.text-center.bg-dark:hover {
  border-color: #e50914;
  box-shadow: 0 0 15px rgba(229,9,20,0.4);
  transform: translateY(-5px);
}
.btn-outline-light.btn-sm.mt-2:hover {
  background: #e50914;
  border-color: #e50914;
  color: #fff;
}

#videoContainer video {
    width: 100%;
    height: 100%;
    object-fit: cover;   /*  💥 remplissage total */
}

#videoContainer {
    width: 100%;
    height: 100%;
    max-height: 100vh; /*  💥 en plein écran */
    position: relative;
    background: #000;
}

#videoContainer:fullscreen video,
#videoContainer:-webkit-full-screen video,
#videoContainer:-moz-full-screen video {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 0;
}


/* === BOUTON DÉCONNEXION PREMIUM === */
.btn-logout {
  background: linear-gradient(135deg, #e50914, #b4060f);
  color: #fff;
  font-weight: 600;
  padding: 0.8rem 1.6rem;
  border: none;
  border-radius: 50px;
  letter-spacing: 0.5px;
  text-transform: uppercase;
  box-shadow: 0 4px 15px rgba(229, 9, 20, 0.5);
  transition: all 0.3s ease;
}

.btn-logout:hover {
  background: linear-gradient(135deg, #ff0f1d, #d10010);
  transform: translateY(-3px) scale(1.05);
  box-shadow: 0 6px 18px rgba(255, 0, 20, 0.6);
}

.btn-logout:active {
  transform: scale(0.97);
  box-shadow: 0 2px 10px rgba(229, 9, 20, 0.4);
}

/* === Agrandir la vidéo client === */
#incomingClientVideo.expanded {
    width: 60vw !important;
    height: 45vw !important;
    max-width: 800px;
    max-height: 600px;
    position: absolute;
    top: 50% !important;
    left: 50% !important;
    transform: translate(-50%, -50%);
    z-index: 99999 !important;
    box-shadow: 0 0 25px rgba(255,255,255,0.3);
    border: 2px solid #ff416c;
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
    <button class="nav-link" id="workspaceprive-tab" data-bs-toggle="tab" data-bs-target="#workspaceprive" type="button" role="tab">
      WorkSpace pour show privée
    @if(isset($modele->showPrives) && $modele->showPrives->where('etat', '!=', 'Terminer')->count() > 0)
  <span class="tab-counter">{{ $modele->showPrives->where('etat', '!=', 'Terminer')->count() }}</span>
@endif
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
<li class="nav-item" role="presentation">
  <button class="nav-link" id="gallery-tab" data-bs-toggle="tab" data-bs-target="#gallery" type="button" role="tab">
    📷 Gallery Photo
  </button>
</li>
<li class="nav-item" role="presentation">
  <button class="nav-link" id="gallery-video-tab" data-bs-toggle="tab" data-bs-target="#gallery-video" type="button" role="tab">
    🎬 Gallery Vidéo
  </button>
</li>


</ul>



<div class="tab-content" id="profilTabContent">
  <div class="tab-pane fade text-start" id="gallery-video" role="tabpanel" aria-labelledby="gallery-video-tab">
  <h4 class="text-white mb-3">🎬 Galerie Vidéo</h4>

  <!-- Formulaire d’ajout de vidéos -->
  <form action="{{ route('gallery-photo.storeVideo', $modele->id) }}" method="POST" enctype="multipart/form-data" class="mb-4">
    @csrf
    <div class="row">
      <div class="col-md-6 mb-3">
        <label class="form-label">Choisir les vidéos</label>
        <input type="file" name="videos[]" class="form-control" multiple required accept="video/*">
        <small class="text-muted">Types : mp4, mov, avi, webm — Taille max : 50MB</small>
      </div>

      <div class="col-md-3 mb-3">
        <label class="form-label">Payant ?</label>
        <select name="payant" class="form-control">
          <option value="0">Gratuit</option>
          <option value="1">Payant</option>
        </select>
      </div>

      <div class="col-md-3 mb-3">
        <label class="form-label">Prix (Jetons)</label>
        <input type="number" step="0.01" name="prix" class="form-control" placeholder="Ex: 20">
      </div>

      <div class="col-md-3 mb-3">
        <label class="form-label">Type de flou</label>
        <select name="type_flou" class="form-control">
          <option value="">Aucun</option>
          <option value="soft">Flou doux</option>
          <option value="strong">Flou fort</option>
          <option value="pixel">Pixelisé</option>
        </select>
      </div>
    </div>
    <button class="btn btn-success w-100">Ajouter à la galerie vidéo</button>
  </form>

  <!-- Affichage des vidéos existantes -->
  <div class="row">
    @foreach($modele->galleryPhotos->whereNotNull('video_url') as $item)
      <div class="col-12 col-md-6 mb-4">
        <div class="card bg-dark text-white border-light">
          <video controls class="w-100 rounded" style="height:250px;object-fit:cover;">
            <source src="{{ asset('storage/' . $item->video_url) }}" type="video/mp4">
            Ton navigateur ne supporte pas la balise vidéo.
          </video>

          <div class="card-body text-center">
            @if($item->payant)
              <span class="badge bg-danger">Payant</span>
              <p class="mb-1">💰 {{ $item->prix }} Jetons</p>
              <small>Flou: {{ $item->type_flou ?? 'Aucun' }}</small>
            @else
              <span class="badge bg-success">Gratuit</span>
            @endif
            <br>
            <button class="btn btn-sm btn-warning mt-2"
                    data-bs-toggle="modal"
                    data-bs-target="#editGalleryModal"
                    data-id="{{ $item->id }}"
                    data-type="video"
                    data-payant="{{ $item->payant }}"
                    data-prix="{{ $item->prix }}"
                    data-type_flou="{{ $item->type_flou }}">
              ✏️ Modifier
            </button>

            <form action="{{ route('gallery-photo.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Supprimer cette vidéo ?')">
              @csrf
              @method('DELETE')
              <button class="btn btn-sm btn-danger mt-2">🗑️ Supprimer</button>
            </form>
          </div>
        </div>
      </div>
    @endforeach
  </div>

  @if($modele->galleryPhotos->whereNotNull('video_url')->isEmpty())
    <p class="text-muted text-center">Aucune vidéo dans la galerie.</p>
  @endif
</div>

  <div class="tab-pane fade text-start" id="gallery" role="tabpanel" aria-labelledby="gallery-tab">
  <h4 class="text-white mb-3">📷 Galerie Photo</h4>

  <!-- Formulaire d’ajout -->

    <!-- 📚 Création d’un nouvel album -->
<div class="card bg-dark text-white border-light mb-4 p-3 shadow">
  <h5 class="text-danger mb-3">Créer un nouvel album 📸</h5>
  <!-- dans profil.blade.php — bloc Création d’un nouvel album -->
<form action="{{ route('albums.store', $modele->id) }}" method="POST">
  @csrf
  <div class="row align-items-end">
    <div class="col-md-6 mb-3">
      <label class="form-label">Nom de l’album</label>
      <input type="text" name="nom" class="form-control" required placeholder="Ex : Séance été 2025">
    </div>

    <div class="col-md-3 mb-3">
      <label class="form-label">Prix (Jetons)</label>
      <input type="number" step="0.01" name="prix" class="form-control" placeholder="Ex : 20">
    </div>

    <div class="col-md-3 mb-3">
      <button class="btn btn-danger w-100">➕ Créer l’album</button>
    </div>
  </div>
</form>

</div>

<!-- 🎞️ Liste des albums -->
@if($modele->albums && $modele->albums->count())
  <div class="row g-4 mb-4">
    @foreach($modele->albums as $album)
  <div class="col-6 col-md-3">
    <div class="card text-white text-center bg-dark border-light shadow position-relative">
      <div class="card-body">
        <h5 class="card-title text-danger">{{ $album->nom }}</h5>
        <p class="mb-1">{{ $album->photos->count() }} photo(s)</p>
        @if(!is_null($album->prix))
          <p class="mb-2">💰 {{ $album->prix }} Jetons</p>
        @endif

        <button class="btn btn-outline-light btn-sm mt-2" onclick="filterPhotosByAlbum({{ $album->id }})">Voir les photos</button>

        <!-- Modifier (modal) -->
        <button class="btn btn-sm btn-warning mt-2"
                data-bs-toggle="modal"
                data-bs-target="#editAlbumModal"
                data-id="{{ $album->id }}"
                data-nom="{{ e($album->nom) }}"
                data-prix="{{ $album->prix ?? '' }}">
          ✏️ Modifier
        </button>

        <!-- Supprimer -->
        <form action="{{ route('albums.destroy', $album->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Supprimer l\\'album et toutes ses photos ?')">
          @csrf
          @method('DELETE')
          <button class="btn btn-sm btn-danger mt-2">🗑️ Supprimer</button>
        </form>
      </div>
    </div>
  </div>
@endforeach

    <!-- 🌟 Carte Afficher tout -->
    <div class="col-6 col-md-3">
      <div class="card text-white text-center bg-dark border-light shadow position-relative">
        <div class="card-body">
          <h5 class="card-title text-white">Tous les albums</h5>
          <p class="mb-1">Afficher toutes les photos</p>
          <button class="btn btn-danger btn-sm mt-2" onclick="filterPhotosByAlbum(null)">
            🔁 Afficher tout
          </button>
        </div>
      </div>
    </div>
  </div>
@else
  <p class="text-muted text-center mb-4">Aucun album créé pour le moment.</p>
@endif

  <!-- ---------- Formulaire d’ajout (photos) ---------- -->
<form action="{{ route('gallery-photo.store', $modele->id) }}" method="POST" enctype="multipart/form-data" class="mb-4">
  @csrf

  <div class="row g-3">

    <div class="col-md-6">
      <label class="form-label">Choisir les photos</label>
      <input type="file" name="photos[]" class="form-control" multiple required accept="image/*" >
    </div>

    <!-- === Select Album === -->
    <div class="col-md-3">
      <label class="form-label">Album (optionnel)</label>
      <select name="album_id" id="selectAlbumForUpload" class="form-control">
        <option value="">-- Aucun --</option>
        @foreach($modele->albums as $album)
          <option value="{{ $album->id }}">{{ $album->nom }}</option>
        @endforeach
      </select>
    </div>

    <div class="col-md-3">
      <label class="form-label">Payant ?</label>
      <select name="payant" class="form-control">
        <option value="0">Gratuit</option>
        <option value="1">Payant</option>
      </select>
    </div>

    <div class="col-md-3">
      <label class="form-label">Prix (Jetons)</label>
      <input type="number" step="0.01" name="prix" class="form-control" placeholder="Ex: 20">
    </div>

    <div class="col-md-3">
      <label class="form-label">Type de flou</label>
      <select name="type_flou" class="form-control">
        <option value="">Aucun</option>
        <option value="soft">Flou doux</option>
        <option value="strong">Flou fort</option>
        <option value="pixel">Pixelisé</option>
      </select>
    </div>

  </div>

  <div class="row mt-3">
    <div class="col-md-6">
      <button class="btn btn-success w-100">Ajouter à la galerie</button>
    </div>
  </div>

</form>
<!-- ---------- Fin formulaire d’ajout ---------- -->

<div class="text-end mb-3">
    <button class="btn btn-danger" onclick="deleteSelectedPhotos()">
        🗑️ Supprimer la sélection
    </button>
</div>

  <!-- Galerie existante -->
<div id="galleryScrollable" style="max-height: 620px; overflow-y: auto; padding-right: 10px;">
  <div class="row gallery-sortable" id="gallerySortable">
      @foreach($modele->galleryPhotos->whereNotNull('photo_url')->sortBy('position_photo') as $photo)
      <div class="col-6 col-md-3 mb-4 sortable-item"
        data-id="{{ $photo->id }}"
        data-album-id="{{ $photo->album_id ?? '' }}">
        
        <div class="card bg-dark text-white border-light position-relative">
          <input type="checkbox"
               class="select-photo-checkbox"
               value="{{ $photo->id }}"
               style="position:absolute; top:10px; right:10px; z-index:20; width:20px; height:20px;">

  <!-- 🏷️ Badge d'ordre -->
          <div class="photo-order-badge">{{ $photo->position_photo }}</div>
            <img src="{{ asset('storage/' . $photo->photo_url) }}" class="card-img-top rounded" style="height:200px;object-fit:cover;">
              <div class="card-body text-center">
            @if($photo->payant)
              <span class="badge bg-danger">Payant</span>
              <p class="mb-1">💰 {{ $photo->prix }} Jetons</p>
              <small>Flou: {{ $photo->type_flou ?? 'Aucun' }}</small>
            @else
              <span class="badge bg-success">Gratuit</span>
            @endif
<!-- Bouton Modifier -->
            <button class="btn btn-sm btn-warning mt-2" 
                    data-bs-toggle="modal" 
                    data-bs-target="#editGalleryModal" 
                    data-id="{{ $photo->id }}"
                    data-type="photo"
                    data-payant="{{ $photo->payant }}"
                    data-prix="{{ $photo->prix }}"
                    data-type_flou="{{ $photo->type_flou }}">
              ✏️ Modifier
            </button>

            <form action="{{ route('gallery-photo.destroy', $photo->id) }}" method="POST" onsubmit="return confirm('Supprimer cette photo ?')">
              @csrf
              @method('DELETE')
              <button class="btn btn-sm btn-danger mt-2">🗑️ Supprimer</button>
            </form>
          </div>
        </div>
      </div>
    @endforeach
    </div>

</div>

  @if($modele->galleryPhotos->whereNotNull('photo_url')->isEmpty())
    <p class="text-muted text-center">Aucune photo dans la galerie.</p>
  @endif
</div>


  <div class="tab-pane fade show active text-start" id="profil" role="tabpanel">
    <p><strong>Nom :</strong> {{ $modele->nom }}</p>
    <p><strong>Email :</strong> {{ $modele->email }}</p>
    <p><strong>Description :</strong> {{ $modele->description }}</p>
        <p><strong>Âge :</strong> {{ $modele->age ?? 'Non défini' }}</p>
    <p><strong>Taille :</strong> {{ $modele->taille ?? 'Non définie' }}</p>
    <p><strong>Silhouette :</strong> {{ $modele->silhouette ?? 'Non définie' }}</p>
    <p><strong>Poitrine :</strong> {{ $modele->poitrine ?? 'Non définie' }}</p>
    <p><strong>Fesse :</strong> {{ $modele->fesse ?? 'Non définie' }}</p>
    <p><strong>Langues parlées :</strong> {!! $modele->langue ?? 'Non défini' !!}</p>
    <p><strong>Ce qu’elle propose :</strong> {{ $modele->services ?? 'Non défini' }}</p>

    @if($modele->mode)
      <p><strong>Type de flou :</strong> 
        @switch($modele->type_flou)
          @case('soft') Flou doux @break
          @case('strong') Flou fort @break
          @case('pixel') Pixelisé @break
          @default Non défini
        @endswitch
      </p>

      <p><strong>Prix du flou :</strong> 
        {{ $modele->prix_flou ? number_format($modele->prix_flou, 2, ',', ' ') . ' Jetons' : 'Non défini' }}
      </p>
      <p><strong>Prix du flou (détail) :</strong> 
        {{ $modele->prix_flou_detail ? number_format($modele->prix_flou_detail, 2, ',', ' ') . ' Jetons' : 'Non défini' }}
      </p>
    @endif
    

    <p><strong>Nombre jetons show privée :</strong> {{ $modele->nombre_jetons_show_privee ?? 'Non défini' }}</p>
<p><strong>Durée show privée :</strong> {{ $modele->duree_show_privee ? $modele->duree_show_privee . ' minutes' : 'Non définie' }}</p>

    <!-- Bouton modal -->
    <button class="btn btn-warning mt-3" data-bs-toggle="modal" data-bs-target="#editProfilModal">
        ✏️ Modifier mes infos
    </button>
</div>


  <div class="tab-pane fade text-start" id="workspace" role="tabpanel">
    <h5 class="text-white mb-3">🎥 Lancer une session Live Sexy Cam</h5>
    <div id="showStatusContainer" class="text-center my-3">
    <button id="showStatusBtn" class="btn show-status-btn public">
        🔓 Public
    </button>
</div>

    <button class="btn btn-danger mb-2" id="startLiveBtn">Démarrer le Live</button>
    <button class="btn btn-secondary mb-2" id="stopLiveBtn" style="display: none;">Arrêter le Live</button>
<div id="liveSection" style="display:none;">
<button id="pauseLiveBtn"
  style="position:absolute;top:10px;right:100px;z-index:10;
         background:rgba(0,0,0,0.5);border:none;color:white;
         padding:6px 10px;border-radius:6px;cursor:pointer;">
  ⏸
</button>

<button id="toggleMicBtn" 
  style="position:absolute;top:10px;right:50px;z-index:10;
         background:rgba(0,0,0,0.5);border:none;color:white;
         padding:6px 10px;border-radius:6px;cursor:pointer;">
  🎤🔇
</button>


    <div id="videoContainer" style="position: relative;">
      <button id="fullscreenBtn" 
        style="position:absolute;top:10px;right:10px;z-index:10;background:rgba(0,0,0,0.5);border:none;color:white;padding:6px 10px;border-radius:6px;cursor:pointer;">
    ⛶
</button>
    <video id="liveVideo" autoplay muted playsinline class="w-100 rounded border border-light"></video>

    <!-- Overlay spectateurs -->
    <div id="viewersOverlay" style="position:absolute;top:10px;left:10px;z-index:10;color:white;">
        👥 <span id="viewersCount">0</span>
        <div id="viewersList" style="margin-top:5px;font-size:0.85rem;"></div>
    </div>

    <!-- Small remote client video (arrive quand un client active sa cam) -->
<!-- Miniature du client -->
<div id="incomingClientContainer" 
     style="position:absolute; top:10px; left:10px; z-index:999; display:flex; flex-direction:column; align-items:center; gap:6px;">

  <video id="incomingClientVideo" autoplay playsinline muted
         style="
           width:130px;
           height:95px;
           object-fit:cover;
           border-radius:10px;
           border:1.5px solid rgba(255,255,255,0.25);
           box-shadow:0 4px 10px rgba(0,0,0,0.3);
           background:rgba(0,0,0,0.15);
           backdrop-filter:blur(8px);
           display:none;
           transition:opacity 0.3s ease, transform 0.3s ease;
         ">
  </video>

  <button id="toggleClientViewBtn" 
          style="
            display:none;
            width:40px;
            height:40px;
            border:none;
            border-radius:12px;
            background:linear-gradient(135deg, rgba(255,255,255,0.15), rgba(255,255,255,0.05));
            color:rgba(255,255,255,0.85);
            font-size:16px;
            align-items:center;
            justify-content:center;
            box-shadow:0 4px 10px rgba(0,0,0,0.3);
            backdrop-filter:blur(10px);
            cursor:pointer;
            transition:all 0.25s ease;
          "
          onmouseover="if(!this.disabled){this.style.background='linear-gradient(135deg,#ff4b2b,#ff416c)';this.style.color='white';this.style.transform='scale(1.1)';this.style.boxShadow='0 6px 16px rgba(255,65,108,0.5)'}"
          onmouseout="if(!this.disabled){this.style.background='linear-gradient(135deg,rgba(255,255,255,0.15),rgba(255,255,255,0.05))';this.style.color='rgba(255,255,255,0.85)';this.style.transform='scale(1)';this.style.boxShadow='0 4px 10px rgba(0,0,0,0.3)'}">
    <i class="fa-solid fa-eye-slash" style="pointer-events:none;"></i>
  </button>

</div>




    <!-- Overlay messages -->
    <div class="chat-wrapper" id="messages" style="position:absolute;bottom:70px;left:10px;right:10px;z-index:10;"></div>

    <!-- Overlay formulaire -->
    <form id="chatForm" onsubmit="sendMessage(event)"
          style="position:absolute;bottom:10px;left:10px;right:10px;display:flex;gap:5px;z-index:10;">
        <input type="text" id="messageInput" class="form-control" placeholder="Tape ton message..." required>
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
        {{-- Sélecteur Jeton proposé --}}
          @if(isset($jetonsProposes) && $jetonsProposes->count() > 0)
            <div class="mb-3">
              <label class="form-label">Jetons proposés</label>
              <select id="select-jeton-propose" class="form-control">
                <option value="">-- Choisir un jeton proposé (préremplir) --</option>
                @foreach($jetonsProposes as $jp)
                  <option value="{{ $jp->id }}"
                          data-nom="{{ e($jp->nom) }}"
                          data-description="{{ e($jp->description) }}"
                          data-nombre="{{ $jp->nombre_de_jetons }}">
                    {{ $jp->nom }}
                  </option>
                @endforeach
              </select>
            </div>
          @endif

          <form action="{{ route('jetons.store') }}" method="POST">
            @csrf
              <input type="hidden" name="jeton_propose_id" id="jeton_propose_id">

            <div class="mb-3">
              <label class="form-label">Nom du jeton</label>
              <input type="text" id="jeton_nom" name="nom" class="form-control" required placeholder="Ex : Jeton VIP">
            </div>
            <div class="mb-3">
              <label class="form-label">Description</label>
              <textarea name="description" id="jeton_description" class="form-control" placeholder="Ex : Jeton pour accès spécial"></textarea>
            </div>
            <div class="mb-3">
              <label class="form-label">Quantité</label>
              <input type="number" id="jeton_nombre" name="nombre_de_jetons" class="form-control" required placeholder="Ex : 100">
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
              <li class="list-group-item bg-transparent d-flex justify-content-between align-items-center text-white border-bottom">
                <div>
                  <strong>{{ $jeton->nom }}</strong><br>
                  <small>{{ $jeton->description }}</small>
                </div>
                <div class="d-flex align-items-center gap-2">
                  <span class="badge bg-info rounded-pill">{{ $jeton->nombre_de_jetons }}</span>
                  <form action="{{ route('jetons.destroy', $jeton->id) }}" method="POST" onsubmit="return confirm('Supprimer ce jeton ?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">🗑️</button>
                  </form>
                </div>
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
<div class="tab-pane fade text-start" id="showprive" role="tabpanel" aria-labelledby="showprive-tab">
  
</div>
<div class="tab-pane fade text-start" id="workspaceprive" role="tabpanel">
  <h4 class="text-white mb-3">Mes Shows Privés</h4>

  {{-- Liste des shows privés liés au modèle --}}
  @if(isset($modele->showPrives) && $modele->showPrives->count() > 0)
    <div class="table-responsive">
      <table class="table table-dark table-striped">
        <thead>
          <tr>
            <th>Date</th>
            <th>Début</th>
            <th>Fin</th>
            <th>Durée (min)</th>
            <th>Jetons</th>
            <th>État</th>
          </tr>
        </thead>
        <tbody>
          @foreach($modele->showPrives as $show)
  @if($show->etat !== 'Terminer') {{-- ⚡ masque bien les shows terminés --}}
    <tr>
      <td>{{ $show->date }}</td>
      <td>{{ $show->debut }}</td>
      <td>{{ $show->fin }}</td>
      <td>{{ $show->duree }}</td>
      <td>{{ $show->jetons_total }}</td>
      <td>
        @php
          $badgeClass = match($show->etat) {
              'valide'      => 'success',
              'en_attente'  => 'warning',
              'pause'       => 'info',    // 💡 bleu pour pause
              default       => 'secondary'
          };
        @endphp
        <span class="badge bg-{{ $badgeClass }}">
          {{ ucfirst($show->etat) }}
        </span>
      </td>
    </tr>
  @endif
@endforeach

        </tbody>
      </table>
    </div>
  @else
    <p class="text-muted">Aucun show privé enregistré pour le moment.</p>
  @endif
  <h5 class="text-white mb-3">🎥 Lancer une session Live Privée</h5>

  <!-- Sélection du show privé -->
  @if(isset($modele->showPrives) && $modele->showPrives->count() > 0)
    <form id="startPrivateForm" class="mb-3">
      <label class="form-label text-white">Choisir un show privé programmé :</label>
      <select id="showPriveId" class="form-control" required>
        <option value="">-- Sélectionner --</option>
        @foreach($modele->showPrives as $show)
          @if($show->etat !== 'Terminer')
            <option value="{{ $show->id }}" 
                    data-date="{{ $show->date }}"
                    data-start="{{ $show->debut }}" 
                    data-end="{{ $show->fin }}">
              📅 {{ $show->date }} ({{ $show->debut }} - {{ $show->fin }})
            </option>


          @endif
        @endforeach
      </select>
      <button type="submit" class="btn btn-danger mt-2">🚀 Démarrer le Live Privé</button>
    </form>
  @else
    <p class="text-muted">Aucun show privé programmé disponible.</p>
  @endif
<!-- Chrono -->
<div id="privateTimer" 
     style="position:absolute;top:10px;left:50%;transform:translateX(-50%);
            background:rgba(0,0,0,0.6);color:#fff;padding:6px 12px;
            border-radius:6px;font-weight:bold;z-index:10;">
    00:00
</div>

  <button class="btn btn-secondary mb-2" id="stopPrivateBtn" style="display: none;">Arrêter le Live Privé</button>

  <div id="privateLiveSection" style="display:none; position: relative;">
    <!-- Boutons overlay -->
    <button id="pausePrivateBtn"
      style="position:absolute;top:10px;right:100px;z-index:10;
            background:rgba(0,0,0,0.5);border:none;color:white;
            padding:6px 10px;border-radius:6px;cursor:pointer;">
      ⏸
    </button>
    <button id="togglePrivateMicBtn" 
      style="position:absolute;top:10px;right:50px;z-index:10;
            background:rgba(0,0,0,0.5);border:none;color:white;
            padding:6px 10px;border-radius:6px;cursor:pointer;">
      🎤🔇
    </button>
    <button id="fullscreenPrivateBtn" 
      style="position:absolute;top:10px;right:10px;z-index:10;
            background:rgba(0,0,0,0.5);border:none;color:white;
            padding:6px 10px;border-radius:6px;cursor:pointer;">
      ⛶
    </button>

    <!-- Vidéo -->
    <video id="privateLiveVideo" autoplay muted playsinline class="w-100 rounded border border-light" style="max-height: 400px;"></video>

    <!-- Overlay spectateurs -->
    <div id="privateViewersOverlay" style="position:absolute;top:10px;left:10px;z-index:10;color:white;">
      👥 <span id="privateViewersCount">0</span>
      <div id="privateViewersList" style="margin-top:5px;font-size:0.85rem;"></div>
    </div>

    <!-- Chat privé -->
    <div class="chat-wrapper" id="privateMessages" style="position:absolute;bottom:70px;left:10px;right:10px;z-index:10;"></div>

    <form id="privateChatForm" style="position:absolute;bottom:10px;left:10px;right:10px;display:flex;gap:5px;z-index:10;">
      <input type="text" id="privateMessageInput" class="form-control" placeholder="Tape ton message..." required>
      <button type="submit" class="btn btn-danger">Envoyer</button>
    </form>
  </div>

  <p class="mt-2 text-warning">🔒 En direct - Visible uniquement par le client sélectionné</p>
</div>


</div>

    <form action="{{ route('modele.logout') }}" method="POST" class="mt-4">
      @csrf
      <button type="submit" class="btn btn-logout">Déconnexion</button>
    </form>
  </div>

<script>
  document.getElementById("fullscreenBtn")?.addEventListener("click", () => {
    const container = document.getElementById("videoContainer");

    // Si on est déjà en plein écran → quitter
    if (document.fullscreenElement) {
        document.exitFullscreen();
    } 
    else {
        // Sinon → entrer en plein écran
        if (container.requestFullscreen) container.requestFullscreen();
        else if (container.webkitRequestFullscreen) container.webkitRequestFullscreen();
    }
});


/* === RÉFÉRENCES DOM === */
const startBtn     = document.getElementById('startLiveBtn');
const stopBtn      = document.getElementById('stopLiveBtn');
const liveVideo    = document.getElementById('liveVideo');
const liveSection  = document.getElementById('liveSection');
const messagesDiv  = document.getElementById("messages");
const soundMessage  = document.getElementById("soundMessage");
const soundSurprise = document.getElementById("soundSurprise");
const soundEnter    = document.getElementById("soundEnter");
/* === VARIABLES GLOBALES === */
 /* <!--wss://livebeautyofficial.com  http://localhost:3000/-->*/

let socket;
let stream;
const peerConnections = {};

/* === CONNEXION SOCKET.IO (unique) === */
socket = io("http://localhost:3000/", {
    path: '/socket.io',
    transports: ['websocket']
});

socket.emit("join-public", {
    pseudo: "{{ $modele->prenom }}",
    modeleId: {{ $modele->id }}
});



// Indicateur "en train d'écrire"
let typingTimeout;
const messageInput = document.getElementById("messageInput");

messageInput.addEventListener('keydown', function() {
    if (socket) {
        socket.emit("typing", {
    pseudo: "{{ $modele->prenom ?? 'Modèle' }}",
    modeleId: {{ $modele->id }},
    isModel: true
});

    }
    
    clearTimeout(typingTimeout);
    typingTimeout = setTimeout(() => {
        if (socket) {
socket.emit("stopTyping", {
    modeleId: {{ $modele->id }}
});
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

// Mapping pour plusieurs clients
const incomingClientVideo = document.getElementById('incomingClientVideo');
const stopViewingClientBtn = document.getElementById('stopViewingClientBtn');
const clientPeerConnections = {};

// modèle: réception offre client
socket.on('client-offer', async (data) => {
  const clientId = data.from;
  const pc = new RTCPeerConnection({ iceServers: [{ urls: "stun:stun.l.google.com:19302" }] });
  clientPeerConnections[clientId] = pc;

  pc.ontrack = (event) => {
  incomingClientVideo.srcObject = event.streams[0];
  incomingClientVideo.style.display = 'block';
  toggleClientViewBtn.style.display = 'block'; // ✅ au lieu de stopViewingClientBtn
};

let isClientExpanded = false;

incomingClientVideo.addEventListener("click", () => {
    if (!incomingClientVideo.srcObject) return;

    if (isClientExpanded) {
        incomingClientVideo.classList.remove("expanded");
        isClientExpanded = false;
    } else {
        incomingClientVideo.classList.add("expanded");
        isClientExpanded = true;
    }
});
// === rendre la vidéo client draggable ===
function makeDraggable(el) {
    let offsetX = 0, offsetY = 0, isDown = false;

    el.addEventListener("mousedown", (e) => {
        if (isClientExpanded) return; // pas de drag en mode full
        isDown = true;
        offsetX = el.offsetLeft - e.clientX;
        offsetY = el.offsetTop - e.clientY;
    });

    document.addEventListener("mouseup", () => isDown = false);

    document.addEventListener("mousemove", (e) => {
        if (!isDown) return;
        el.style.left = (e.clientX + offsetX) + "px";
        el.style.top = (e.clientY + offsetY) + "px";
    });
}

makeDraggable(incomingClientVideo);

  pc.onicecandidate = (ev) => {
    if (ev.candidate) socket.emit('client-candidate', { to: clientId, candidate: ev.candidate });
  };

  await pc.setRemoteDescription(new RTCSessionDescription(data.offer));
  const answer = await pc.createAnswer();
  await pc.setLocalDescription(answer);
socket.emit('client-answer', {
    toClientSocketId: clientId,
    description: pc.localDescription,
    modeleId: {{ $modele->id }}
});
});

// model stops viewing -> inform client(s)
stopViewingClientBtn?.addEventListener('click', () => {
  Object.keys(clientPeerConnections).forEach(clientId => {
    clientPeerConnections[clientId]?.close();
    delete clientPeerConnections[clientId];
socket.emit('client-disconnect', {
    to: clientId,
    modeleId: {{ $modele->id }}
});
  });
  incomingClientVideo.srcObject = null;
  incomingClientVideo.style.display = 'none';
  stopViewingClientBtn.style.display = 'none';
});

const toggleClientViewBtn = document.getElementById('toggleClientViewBtn');
let isClientHidden = false;

toggleClientViewBtn?.addEventListener('click', () => {
  if (!incomingClientVideo.srcObject) return; // pas de flux

  if (isClientHidden) {
    // Réafficher la vidéo
    incomingClientVideo.style.display = 'block';
    toggleClientViewBtn.innerHTML = '<i class="fa-solid fa-eye-slash"></i>';
    isClientHidden = false;
  } else {
    // Masquer la vidéo
    incomingClientVideo.style.display = 'none';
    toggleClientViewBtn.innerHTML = '<i class="fa-solid fa-eye"></i>';
    isClientHidden = true;
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
let lastEnterTime = 0;

socket.on("viewer-connected", (data) => {
    console.log("Viewer connected:", data);
    viewers[data.socketId] = data.pseudo;

    // mémorise l'heure de l'entrée
    lastEnterTime = Date.now();

    // stoppe les autres sons
    if (soundSurprise) {
        soundSurprise.pause();
        soundSurprise.currentTime = 0;
    }
    if (soundMessage) {
        soundMessage.pause();
        soundMessage.currentTime = 0;
    }

    // joue uniquement le son d'entrée
    if (soundEnter) soundEnter.play().catch(() => {});

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
    const name = data.name || 'Pas de nom';
    const description = data.description || 'Pas de description';
    const cost = data.cost || 0;
    const isGolden = data.isGolden || false;

    console.log("Variables extraites:", { pseudo, name, description, cost, isGolden }); // Debug 2

    const chatWrapper = document.querySelector(".chat-wrapper");
    if (chatWrapper) {
        const bubble = document.createElement('div');
        bubble.classList.add("chat-bubble");
        bubble.innerHTML = `💎 <strong>${pseudo}</strong>: ${name} (${cost} jetons)`;
        chatWrapper.appendChild(bubble);
        chatWrapper.scrollTop = chatWrapper.scrollHeight;
    }
    if (soundMessage) soundMessage.play().catch(() => {});
    createTokenBubble(name, description, cost, isGolden);
});

socket.on("surprise-sent", (data) => {
    const chatWrapper = document.querySelector(".chat-wrapper");
    if (chatWrapper) {
        const bubble = document.createElement("div");
        bubble.classList.add("chat-bubble");
        bubble.innerHTML = `🎁 <strong>${data.pseudo}</strong> a envoyé ${data.emoji} (${data.cost} jetons)`;
        chatWrapper.appendChild(bubble);
        chatWrapper.scrollTop = chatWrapper.scrollHeight;
    }

    // si le dernier "enter" date de moins d'1 seconde → pas de son cadeau
    if (Date.now() - lastEnterTime > 1000) {
        if (soundSurprise) soundSurprise.play().catch(() => {});
    }

    createTokenBubble(`Surprise ${data.emoji}`, data.cost, false);
});

const showStatusBtn = document.getElementById('showStatusBtn');

  function setShowStatus(isPrivate, pseudo = null) {
    if (isPrivate) {
      showStatusBtn.textContent = `🔒 En privée ${pseudo ? 'avec ' + pseudo : ''}`;
      showStatusBtn.classList.remove('public');
      showStatusBtn.classList.add('private');
    } else {
      showStatusBtn.textContent = '🔓 Public';
      showStatusBtn.classList.remove('private');
      showStatusBtn.classList.add('public');
    }
  }

  // 🟢 Par défaut
  setShowStatus(false);

  // 🛰️ Quand un modèle ou client passe en show privé
  socket.on("switch-to-private", (data) => {
    setShowStatus(true, data?.pseudo);
    console.log("🔒 Le show est passé en privé :", data);
  });

  // 🛰️ Quand le show redevient public
  socket.on("cancel-private", () => {
    setShowStatus(false);
    console.log("🔓 Le show est redevenu public");
  });

socket.on("chat-message", (data) => {
  const chatWrapper = document.querySelector(".chat-wrapper");
  if (chatWrapper) {
      const bubble = document.createElement("div");
      bubble.classList.add("chat-bubble");
      bubble.style.color = data.color || "#fff";
      bubble.innerHTML = `<strong>${data.pseudo}</strong> : ${data.message}`;
      chatWrapper.appendChild(bubble);
      chatWrapper.scrollTop = chatWrapper.scrollHeight;
  }

  // 🔇 Ne joue le son que si le message vient d’un client
  const modelePrenom = "{{ $modele->prenom ?? '' }}".trim();
  if (soundMessage && data.pseudo.trim() !== modelePrenom) {
      soundMessage.play().catch(() => {});
  }
});



const toggleMicBtn = document.getElementById("toggleMicBtn");
let isMicMuted = false;

toggleMicBtn?.addEventListener("click", () => {
    if (!stream) return;

    // On récupère la track audio du flux
    const audioTrack = stream.getAudioTracks()[0];
    if (audioTrack) {
        audioTrack.enabled = !audioTrack.enabled; // toggle mute/unmute
        isMicMuted = !audioTrack.enabled;

        // Change l’icône du bouton
        toggleMicBtn.textContent = isMicMuted ? "🎤🔇" : "🎤✅";

        // 🔴 Envoi automatique d'un message au chat
        socket.emit("chat-message", {
            pseudo: "{{ $modele->prenom ?? 'Modèle' }}",
                modeleId: {{ $modele->id }},

            message: isMicMuted 
                ? "🎤 Le modèle a coupé son micro." 
                : "🎤 Le modèle a réactivé son micro."
        });
    }
});

const pauseLiveBtn = document.getElementById("pauseLiveBtn");
let isPaused = false;

pauseLiveBtn?.addEventListener("click", () => {
    if (!stream) return;

    // On coupe ou réactive toutes les tracks (vidéo + audio)
    stream.getTracks().forEach(track => track.enabled = isPaused);

    isPaused = !isPaused;

    // Change l’icône
    pauseLiveBtn.textContent = isPaused ? "▶️" : "⏸";

    // Envoi automatique au chat
    socket.emit("chat-message", {
        pseudo: "{{ $modele->prenom ?? 'Modèle' }}",
            modeleId: {{ $modele->id }},

        message: isPaused 
            ? "⏸ Le modèle a mis le live en pause." 
            : "▶️ Le modèle a repris le live."
    });
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
socket.emit("broadcaster", {
    modeleId: {{ $modele->id }}
});
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
/* === ARRÊTER LE LIVE === */
stopBtn.addEventListener('click', async () => {
    try {
        // 1) Prévenir les watchers / serveur que le modèle stoppe proprement
        // en fournissant l'id du modèle si tu l'as dans une variable JS (sinon null)
        const modeleId = "{{ $modele->id ?? '' }}"; // blade -> remplace si besoin
        if (socket && socket.connected) {
            socket.emit('modele-stop-live', { modele_id: modeleId });
        }

        // 2) Stopper le flux local
        if (stream) {
            stream.getTracks().forEach(track => track.stop());
        }

        // 3) Fermer toutes les peer connections
        for (let id in peerConnections) {
            peerConnections[id].close();
            delete peerConnections[id];
        }

        // 4) Notifier ton backend Laravel (API) que le live est fini
        await fetch('/api/live/stop', {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        });

        // 5) Déconnecter socket (optionnel) et recharger la page pour permettre relancer
        if (socket && socket.connected) socket.disconnect();

        // Forcer reload pour le modèle (ouvre un nouvel état propre pour relancer)
        window.location.reload(); // ou window.location.href = '/modele/dashboard';
    } catch (err) {
        console.error('Erreur stop live:', err);
        alert("Erreur lors de l'arrêt du live : " + (err.message || err));
    }
});

// Quand le modèle a stoppé proprement (arrêt via bouton)
socket.on('modele-stop-live', (data) => {
  console.log('modele-stop-live reçu', data);
  // si tu veux juste redirect les watchers vers le profil/dashboard
  // window.location.href = `/profil/${data.modele_id}`; // ex
  // sinon reload la page actuelle
  window.location.reload();
});

// Quand le modèle se déconnecte de façon inattendue (server 'disconnect' handler envoie modele-deconnecte)
socket.on('modele-deconnecte', (payload) => {
  console.log('modele-deconnecte reçu', payload);
  // reload / redirect pour actualiser l'interface viewers ou modèle
  window.location.reload();
});


/* === ENVOI MESSAGE CHAT === */
function sendMessage(e) {
    e.preventDefault();
    const msg = document.getElementById("messageInput").value.trim();
    if (!msg) return;

    const color = getRandomColor(); // 🎨 couleur aléatoire

    socket.emit("chat-message", {
        pseudo: "{{ $modele->prenom ?? 'Modèle' }}",
        message: msg,
        color: color,
        modeleId: {{ $modele->id }}
    });

    document.getElementById("messageInput").value = '';
}


// === COULEUR ALÉATOIRE POUR LES MESSAGES ===
// === COULEUR ALÉATOIRE POUR LES MESSAGES (haute visibilité) ===
function getRandomColor() {
    const colors = [
        "#ff1744", // rouge néon
        "#00e5ff", // cyan vif
        "#00ff6a", // vert fluo
        "#ffea00", // jaune vif
        "#d500f9", // violet éclatant
        "#ff6d00", // orange profond
        "#2979ff", // bleu saturé
        "#f50057", // rose punchy
        "#76ff03", // vert lime
        "#18ffff"  // turquoise clair
    ];
    return colors[Math.floor(Math.random() * colors.length)];
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

/* =========================
   WORKSPACE PRIVÉ
========================= */
const startPrivateForm = document.getElementById("startPrivateForm");
const stopPrivateBtn   = document.getElementById("stopPrivateBtn");
const privateLiveVideo = document.getElementById("privateLiveVideo");
const privateLiveSection = document.getElementById("privateLiveSection");
const privateMessagesDiv = document.getElementById("privateMessages");
const privateMessageInput = document.getElementById("privateMessageInput");

let privateSocket;
let privateStream;
let privatePeerConnections = {};
let currentShowPriveId = null;
let privateViewers = {};
let timerInterval; // ✅ global

function startTimer(durationSeconds) {
  const display = document.getElementById("privateTimer");
  let remaining = durationSeconds;

  function updateTimer() {
    const minutes = String(Math.floor(remaining / 60)).padStart(2, '0');
    const seconds = String(remaining % 60).padStart(2, '0');
    display.textContent = `${minutes}:${seconds}`;

    if (remaining <= 0) {
      clearInterval(timerInterval);

      // ✅ NE PAS arrêter le live
      // stopPrivateBtn.click();

      // ✅ Démarrer le débit automatique à la minute
      startDebitLoop();
    }

    remaining--;
  }

  updateTimer();
  timerInterval = setInterval(updateTimer, 1000);
}

let debitInterval;

function startDebitLoop() {
  // ✅ Message automatique côté modèle
  const bubbleStart = document.createElement("div");
  bubbleStart.classList.add("chat-bubble");
  bubbleStart.innerHTML = `⏳ Le chrono est terminé. Début des déductions automatiques par minute...`;
  privateMessagesDiv.appendChild(bubbleStart);
  privateMessagesDiv.scrollTop = privateMessagesDiv.scrollHeight;

  // ✅ Envoi aussi côté client (socket)
  privateSocket?.emit("chat-message", {
    showPriveId: currentShowPriveId,
    pseudo: "Système",
    message: "⏳ Le chrono est terminé. Début des déductions automatiques par minute..."
  });

  debitInterval = setInterval(() => {
    fetch(`/show-prive/debiter/${currentShowPriveId}`, {
      method: "POST",
      headers: {
        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
        "Accept": "application/json"
      }
    })
    .then(r => r.json())
    .then(data => {
      if (data.success) {
        // ✅ Message côté modèle
        const bubble = document.createElement("div");
        bubble.classList.add("chat-bubble");
        bubble.innerHTML = `💎 Débit automatique : -${data.debit} jetons (reste ${data.jetons_restants})`;
        privateMessagesDiv.appendChild(bubble);
        privateMessagesDiv.scrollTop = privateMessagesDiv.scrollHeight;

        // ✅ Message côté client via Socket
        privateSocket?.emit("chat-message", {
          showPriveId: currentShowPriveId,
          pseudo: "Système",
          message: `💎 Débit automatique : -${data.debit} jetons (reste ${data.jetons_restants})`
        });

      } else {
        const bubbleStop = document.createElement("div");
        bubbleStop.classList.add("chat-bubble");
        bubbleStop.innerHTML = `❌ Fin du show : ${data.message}`;
        privateMessagesDiv.appendChild(bubbleStop);
        privateMessagesDiv.scrollTop = privateMessagesDiv.scrollHeight;

        // ✅ Message côté client
        privateSocket?.emit("chat-message", {
          showPriveId: currentShowPriveId,
          pseudo: "Système",
          message: `❌ Fin du show : ${data.message}`
        });

        stopPrivateShow();
      }
    });
  }, 60_000); // toutes les 60 secondes
}



function stopDebitLoop() {
  clearInterval(debitInterval);
}

function stopPrivateShow() {
  stopDebitLoop();

  fetch(`/show-prive/terminer/${currentShowPriveId}`, {
    method: "POST",
    headers: {
      "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
      "Accept": "application/json"
    }
  });

  // Arrêter flux & connexions
  if(privateStream) privateStream.getTracks().forEach(t => t.stop());
  for (let id in privatePeerConnections){
    privatePeerConnections[id].close();
    delete privatePeerConnections[id];
  }
  if(privateSocket) privateSocket.disconnect();

  privateLiveVideo.srcObject = null;
  privateLiveSection.style.display = 'none';
  startPrivateForm.style.display = 'block';
  stopPrivateBtn.style.display = 'none';
  document.getElementById("privateTimer").textContent = "00:00";
}

clearInterval(timerInterval);
document.getElementById("privateTimer").textContent = "00:00";

// === LANCER LIVE PRIVÉ ===
startPrivateForm?.addEventListener("submit", async (e) => {
  e.preventDefault();
  currentShowPriveId = document.getElementById("showPriveId").value;
  if(!currentShowPriveId) return alert("Sélectionnez un show privé.");

  try {
    privateStream = await navigator.mediaDevices.getUserMedia({ video: true, audio: true });
    privateLiveVideo.srcObject = privateStream;
    privateLiveSection.style.display = 'block';
    startPrivateForm.style.display = 'none';
    stopPrivateBtn.style.display = 'inline-block';

    const selectedOption = document.getElementById("showPriveId").selectedOptions[0];
    const dateShow = selectedOption.textContent.match(/\d{4}-\d{2}-\d{2}/)?.[0] || ""; // récupère la date ex: 2025-09-20
    const startTime = selectedOption.dataset.start;
    const endTime   = selectedOption.dataset.end;

    // ⚡ On calcule l'heure réelle de fin
    const endDateTime   = new Date(`${dateShow}T${endTime}`);
    const now           = new Date();

    let diffSeconds = Math.floor((endDateTime - now) / 1000);

    if (diffSeconds > 0) {
      clearInterval(timerInterval);
      startTimer(diffSeconds);
    } else {
      document.getElementById("privateTimer").textContent = "00:00";
      alert("⚠️ Ce show est déjà terminé.");
    }

    await fetch(`/show-prive/demarrer/${currentShowPriveId}`, {
    method: "POST",
    headers: {
      "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
      "Accept": "application/json"
    }
  }).then(r => r.json())
    .then(data => console.log("Show démarré:", data));

    privateSocket = io("wss://livebeautyofficial.com", {
      path: "/socket.io",
      transports: ["websocket"]
    });

    
    // Déclare comme broadcaster privé
const endTimestamp = new Date(`1970-01-01T${endTime}`).getTime();

privateSocket.emit("broadcaster", { 
  showPriveId: currentShowPriveId,
  date: dateShow,          // 👈 ajouté
  startTime: startTime,
  endTime: endTime
});



    // Gestion viewers privés
    privateSocket.on("watcher", id => {
      const pc = new RTCPeerConnection({
        iceServers: [
          { urls: "stun:stun.l.google.com:19302" },
          { urls: "turn:livebeautyofficial.com:3478", username: "webrtc", credential: "password123" }
        ]
      });
      privatePeerConnections[id] = pc;
      privateStream.getTracks().forEach(track => pc.addTrack(track, privateStream));
      pc.onicecandidate = event => {
        if (event.candidate) privateSocket.emit("candidate", id, event.candidate);
      };
      pc.createOffer()
        .then(offer => pc.setLocalDescription(offer))
        .then(() => privateSocket.emit("offer", id, pc.localDescription));
    });

    privateSocket.on("answer", (id, desc) => {
      privatePeerConnections[id].setRemoteDescription(desc);
    });
    privateSocket.on("candidate", (id, candidate) => {
      privatePeerConnections[id].addIceCandidate(new RTCIceCandidate(candidate));
    });
    privateSocket.on("disconnectPeer", id => {
      if(privatePeerConnections[id]){
        privatePeerConnections[id].close();
        delete privatePeerConnections[id];
      }
    });

    /* CHAT PRIVÉ */
    document.getElementById("privateChatForm").addEventListener("submit", (ev) => {
      ev.preventDefault();
      const msg = privateMessageInput.value.trim();
      if (!msg) return;
      privateSocket.emit("chat-message", {
        showPriveId: currentShowPriveId,
            modeleId: {{ $modele->id }},
        pseudo: "{{ $modele->prenom ?? 'Modèle' }}",
        message: msg
      });
      privateMessageInput.value = "";
    });

    privateSocket.on("chat-message", (data) => {
      const bubble = document.createElement("div");
      bubble.classList.add("chat-bubble");
      bubble.innerHTML = `<strong>${data.pseudo}</strong> : ${data.message}`;
      privateMessagesDiv.appendChild(bubble);
      privateMessagesDiv.scrollTop = privateMessagesDiv.scrollHeight;
      soundMessage.play().catch(()=>{});
    });

    /* JETONS */
    privateSocket.on("jeton-sent", (data) => {
      const bubble = document.createElement("div");
      bubble.classList.add("chat-bubble");
      bubble.innerHTML = `💎 <strong>${data.pseudo}</strong>: ${data.name} (${data.cost} jetons)`;
      privateMessagesDiv.appendChild(bubble);
      privateMessagesDiv.scrollTop = privateMessagesDiv.scrollHeight;
      soundMessage.play().catch(()=>{});
      createTokenBubble(data.name, data.cost, data.isGolden);
    });

    /* SURPRISES */
    privateSocket.on("surprise-sent", (data) => {
      const bubble = document.createElement("div");
      bubble.classList.add("chat-bubble");
      bubble.innerHTML = `🎁 <strong>${data.pseudo}</strong> a envoyé ${data.emoji} (${data.cost} jetons)`;
      privateMessagesDiv.appendChild(bubble);
      privateMessagesDiv.scrollTop = privateMessagesDiv.scrollHeight;
      soundSurprise.play().catch(()=>{});
      createTokenBubble(`Surprise ${data.emoji}`, data.cost, false);
    });

    /* VIEWERS */
    privateSocket.on("viewer-connected", (data) => {
  privateViewers[data.socketId] = data.pseudo;
  updatePrivateViewers();
  soundEnter.play().catch(()=>{});

  // 👉 Si le chrono est terminé et qu’on avait suspendu le débit → on relance
  const timerText = document.getElementById("privateTimer")?.textContent || "00:00";
  if (timerText === "00:00" && !debitInterval) {
    startDebitLoop();
    const bubble = document.createElement("div");
    bubble.classList.add("chat-bubble");
    bubble.innerHTML = `▶️ Débit repris : client reconnecté`;
    privateMessagesDiv.appendChild(bubble);
    privateMessagesDiv.scrollTop = privateMessagesDiv.scrollHeight;
  }
});


    privateSocket.on("viewer-disconnected", (socketId) => {
  delete privateViewers[socketId];
  updatePrivateViewers();

  // 👉 Si plus aucun client présent, on stoppe le débit
  if (Object.keys(privateViewers).length === 0) {
    stopDebitLoop();
    const bubble = document.createElement("div");
    bubble.classList.add("chat-bubble");
    bubble.innerHTML = `⏸ Débit suspendu : aucun client connecté`;
    privateMessagesDiv.appendChild(bubble);
    privateMessagesDiv.scrollTop = privateMessagesDiv.scrollHeight;
  }
});


    function updatePrivateViewers() {
      document.getElementById("privateViewersCount").textContent = Object.keys(privateViewers).length;
      const list = document.getElementById("privateViewersList");
      list.innerHTML = "";
      Object.values(privateViewers).forEach(pseudo => {
        const el = document.createElement("span");
        el.className = "badge bg-primary me-1 mb-1";
        el.textContent = pseudo;
        list.appendChild(el);
      });
    }

  } catch(err){
    alert("Erreur caméra : " + err.message);
  }
});

// === STOP LIVE PRIVÉ ===
stopPrivateBtn?.addEventListener("click", () => {
  const timerText = document.getElementById("privateTimer")?.textContent || "00:00";

  // ✅ Si le chrono est terminé (00:00) → on termine complètement le show
  if (timerText === "00:00") {
    stopPrivateShow(); // appelle la fonction qui marque etat = Terminer
    return;
  }

  // ✅ Sinon → on met juste en pause
  if (privateStream) privateStream.getTracks().forEach(t => t.stop());
  for (let id in privatePeerConnections) {
    privatePeerConnections[id].close();
    delete privatePeerConnections[id];
  }
  if (privateSocket) privateSocket.disconnect();

  fetch(`/show-prive/pause/${currentShowPriveId}`, {
    method: "POST",
    headers: {
      "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
      "Accept": "application/json"
    }
  }).then(r => r.json())
    .then(data => console.log("Show mis en pause:", data));

  // 🔴 Réinitialise la vidéo
  privateLiveVideo.srcObject = null;
  privateLiveSection.style.display = 'none';
  startPrivateForm.style.display = 'block';
  stopPrivateBtn.style.display = 'none';

  // ✅ Le chrono est juste arrêté côté front,
  // mais il reprendra correctement au redémarrage
  clearInterval(timerInterval);
});


/* === CONTROLES LIVE PRIVÉ === */
const pausePrivateBtn = document.getElementById("pausePrivateBtn");
const togglePrivateMicBtn = document.getElementById("togglePrivateMicBtn");

let isPrivatePaused = false;
let isPrivateMicMuted = false;

// Bouton pause vidéo privée
pausePrivateBtn?.addEventListener("click", () => {
    if (!privateStream) return;

    privateStream.getVideoTracks().forEach(track => track.enabled = isPrivatePaused);

    isPrivatePaused = !isPrivatePaused;

    pausePrivateBtn.textContent = isPrivatePaused ? "▶️" : "⏸";

    privateSocket?.emit("chat-message", {
        showPriveId: currentShowPriveId,
        pseudo: "{{ $modele->prenom ?? 'Modèle' }}",
        message: isPrivatePaused 
            ? "⏸ Le modèle a mis le live privé en pause." 
            : "▶️ Le modèle a repris le live privé."
    });
});

// Bouton mute micro privé
togglePrivateMicBtn?.addEventListener("click", () => {
    if (!privateStream) return;

    const audioTrack = privateStream.getAudioTracks()[0];
    if (audioTrack) {
        audioTrack.enabled = !audioTrack.enabled;
        isPrivateMicMuted = !audioTrack.enabled;

        togglePrivateMicBtn.textContent = isPrivateMicMuted ? "🎤🔇" : "🎤✅";

        privateSocket?.emit("chat-message", {
            showPriveId: currentShowPriveId,
            pseudo: "{{ $modele->prenom ?? 'Modèle' }}",
            message: isPrivateMicMuted 
                ? "🎤 Le modèle a coupé son micro en privé." 
                : "🎤 Le modèle a réactivé son micro en privé."
        });
    }
});

</script>




<!-- Modal Modification Profil -->
<div class="modal fade" id="editProfilModal" tabindex="-1" aria-labelledby="editProfilModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content bg-dark text-white">
      <div class="modal-header">
        <h5 class="modal-title" id="editProfilModalLabel">Modifier mes informations</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>

      <form method="POST" action="{{ route('modele.update', $modele->id) }}">
        @csrf
        @method('PUT')

        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Nom</label>
            <input type="text" name="nom" value="{{ $modele->nom }}" class="form-control">
          </div>

          <div class="mb-3">
            <label class="form-label">Prénom</label>
            <input type="text" name="prenom" value="{{ $modele->prenom }}" class="form-control">
          </div>

          <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control">{{ $modele->description }}</textarea>
          </div>

          <div class="mb-3">
            <label class="form-label">Âge</label>
            <input type="number" name="age" value="{{ $modele->age ?? '' }}" class="form-control" min="18" max="99">
          </div>

          <div class="mb-3">
            <label class="form-label">Taille (cm)</label>
            <input type="text" name="taille" value="{{ $modele->taille ?? '' }}" class="form-control">
          </div>

          <div class="mb-3">
            <label class="form-label">Silhouette</label>
            <input type="text" name="silhouette" value="{{ $modele->silhouette ?? '' }}" class="form-control">
          </div>

          <div class="mb-3">
            <label class="form-label">Poitrine</label>
            <input type="text" name="poitrine" value="{{ $modele->poitrine ?? '' }}" class="form-control">
          </div>

          <div class="mb-3">
            <label class="form-label">Fesse</label>
            <input type="text" name="fesse" value="{{ $modele->fesse ?? '' }}" class="form-control">
          </div>

          <div class="mb-3">
            <label class="form-label">Langues parlées</label>
            <select id="edit-langue" name="langue[]" class="form-control" multiple>
    @php
        $langues = is_array($modele->langue) 
            ? $modele->langue 
            : explode(',', $modele->langue ?? '');
    @endphp

    <option value="FR" {{ in_array('FR', $langues) ? 'selected' : '' }}>Français</option>
    <option value="EN" {{ in_array('EN', $langues) ? 'selected' : '' }}>Anglais</option>
    <option value="DE" {{ in_array('DE', $langues) ? 'selected' : '' }}>Allemand</option>
    <option value="ES" {{ in_array('ES', $langues) ? 'selected' : '' }}>Espagnol</option>
    <option value="IT" {{ in_array('IT', $langues) ? 'selected' : '' }}>Italien</option>
    <option value="PT" {{ in_array('PT', $langues) ? 'selected' : '' }}>Portugais</option>
    <option value="NL" {{ in_array('NL', $langues) ? 'selected' : '' }}>Néerlandais</option>
</select>

          </div>

          <div class="mb-3">
            <label class="form-label">Ce qu’elle propose</label>
            <textarea name="services" class="form-control" rows="3">{{ $modele->services ?? '' }}</textarea>
          </div>

          <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" value="{{ $modele->email }}" class="form-control">
          </div>

          <div class="mb-3">
            <label class="form-label">Nombre de jetons pour show privée</label>
            <input type="number" name="nombre_jetons_show_privee" value="{{ $modele->nombre_jetons_show_privee ?? '' }}" class="form-control">
          </div>

          <div class="mb-3">
            <label class="form-label">Durée du show privée (minutes)</label>
            <input type="number" name="duree_show_privee" value="{{ $modele->duree_show_privee ?? '' }}" class="form-control">
          </div>
        </div> <!-- FIN modal-body -->

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
          <button type="submit" class="btn btn-success">Enregistrer</button>
        </div>
      </form>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css"/>

<script>
document.addEventListener('DOMContentLoaded', function () {

    // === Initialiser Choices dans le modal ===
    const editLangueSelect = document.getElementById('edit-langue');

    if (editLangueSelect) {
        new Choices(editLangueSelect, {
            removeItemButton: true,
            placeholderValue: 'Sélectionnez les langues',
            searchPlaceholderValue: 'Rechercher...',
            shouldSort: false,
        });
    }

});
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
  // === Gestion mode payant / gratuit ===
  const modeToggle = document.getElementById('modeToggle');
  const paySettings = document.getElementById('paySettings');
  const label = document.getElementById('modeToggleLabel');

  if (modeToggle && paySettings && label) {
    modeToggle.addEventListener('change', function() {
      const checked = this.checked;
      paySettings.style.display = checked ? 'block' : 'none';
      label.textContent = checked ? 'Payant' : 'Gratuit';
    });
  }
});

document.addEventListener('DOMContentLoaded', function() {
    const select = document.getElementById('select-jeton-propose');
    const hiddenInput = document.getElementById('jeton_propose_id');

    if (select) {
        select.addEventListener('change', function() {
            const opt = this.selectedOptions[0];

            if (!opt.value) {
                document.getElementById('jeton_nom').value = '';
                document.getElementById('jeton_description').value = '';
                document.getElementById('jeton_nombre').value = '';
                hiddenInput.value = '';
                return;
            }

            document.getElementById('jeton_nom').value = opt.dataset.nom;
            document.getElementById('jeton_description').value = opt.dataset.description;
            document.getElementById('jeton_nombre').value = opt.dataset.nombre;
            hiddenInput.value = opt.value;
        });
    }
});

</script>
<!-- Modal Modification Photo/Vidéo -->
<div class="modal fade" id="editGalleryModal" tabindex="-1" aria-labelledby="editGalleryModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content bg-dark text-white">
      <div class="modal-header">
        <h5 class="modal-title" id="editGalleryModalLabel">Modifier l’élément</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>

      <form id="editGalleryForm" method="POST" action="">
        @csrf
        @method('PUT')
        <div class="modal-body">
          <input type="hidden" name="type" id="editType">

          <div class="mb-3">
            <label class="form-label">Payant ?</label>
            <select name="payant" id="editPayant" class="form-control">
              <option value="0">Gratuit</option>
              <option value="1">Payant</option>
            </select>
          </div>

          <div class="mb-3">
            <label class="form-label">Prix (Jetons)</label>
            <input type="number" name="prix" id="editPrix" class="form-control" step="0.01">
          </div>

          <div class="mb-3">
            <label class="form-label">Type de flou</label>
            <select name="type_flou" id="editTypeFlou" class="form-control">
              <option value="">Aucun</option>
              <option value="soft">Flou doux</option>
              <option value="strong">Flou fort</option>
              <option value="pixel">Pixelisé</option>
            </select>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
          <button type="submit" class="btn btn-success">💾 Enregistrer</button>
        </div>
      </form>
    </div>
  </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function () {
  const editGalleryModal = document.getElementById('editGalleryModal');
  const form = document.getElementById('editGalleryForm');

  editGalleryModal.addEventListener('show.bs.modal', function (event) {
    const button = event.relatedTarget;
    const id = button.getAttribute('data-id');
    const type = button.getAttribute('data-type');
    const payant = button.getAttribute('data-payant');
    const prix = button.getAttribute('data-prix');
    const typeFlou = button.getAttribute('data-type_flou');

    // Remplissage
    document.getElementById('editType').value = type;
    document.getElementById('editPayant').value = payant;
    document.getElementById('editPrix').value = prix;
    document.getElementById('editTypeFlou').value = typeFlou;

    // Cible du formulaire
    form.action = `/gallery-photo/update/${id}`;
  });
});
</script>

<!-- SortableJS (CDN) -->
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', () => {
  const el = document.getElementById('gallerySortable');
  if (!el) return;

  const sortable = new Sortable(el, {
    animation: 180,
    handle: '.card', // la poignée (ou précise `.card-img-top` si tu veux)
    draggable: '.sortable-item',
    onEnd: function (evt) {
      // rebuild order
      const order = [];
      document.querySelectorAll('.sortable-item').forEach((item, index) => {
        order.push({ id: item.dataset.id, position_photo: index + 1 });
        // update UI immediate
        // met à jour badge et texte "Ordre"
const posSpan = item.querySelector('.photo-position');
const badge = item.querySelector('.photo-order-badge');
if (posSpan) posSpan.textContent = index + 1;
if (badge) badge.textContent = index + 1;

      });

      // POST to server
      fetch("{{ route('gallery-photo.reorder') }}", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          "X-CSRF-TOKEN": document.querySelector('meta[name=\"csrf-token\"]').getAttribute('content'),
          "Accept": "application/json"
        },
        body: JSON.stringify({ order })
      })
      .then(r => r.json())
      .then(data => {
        if (!data.success) {
          console.error('Erreur reorder:', data);
          alert('Impossible d\'enregistrer l\'ordre. Voir console.');
        }
      })
      .catch(err => {
        console.error('Fetch reorder error:', err);
        alert('Erreur réseau lors de l\'enregistrement de l\'ordre.');
      });
    }
  });
});
</script>
<script>
function filterPhotosByAlbum(albumId) {
  const allPhotos = document.querySelectorAll('.sortable-item');
  const albumCards = document.querySelectorAll('.card[data-album-id]');
  
  allPhotos.forEach(item => {
    const photoAlbum = item.getAttribute('data-album-id');
    item.style.display = (!albumId || photoAlbum == albumId) ? '' : 'none';
  });

  // Animation légère pour le filtrage
  allPhotos.forEach(item => {
    item.style.transition = "opacity 0.3s ease";
    item.style.opacity = item.style.display === 'none' ? 0 : 1;
  });
}
</script>

<!-- Modal Edit Album -->
<div class="modal fade" id="editAlbumModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <form id="editAlbumForm" method="POST">
      @csrf
      @method('PUT')
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Modifier l'album</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Nom</label>
            <input type="text" name="nom" id="editAlbumNom" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Prix (Jetons)</label>
            <input type="number" step="0.01" name="prix" id="editAlbumPrix" class="form-control" placeholder="Ex: 20">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
          <button type="submit" class="btn btn-primary">Enregistrer</button>
        </div>
      </div>
    </form>
  </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function () {
  const editAlbumModal = document.getElementById('editAlbumModal');
  const editForm = document.getElementById('editAlbumForm');

  editAlbumModal.addEventListener('show.bs.modal', function (event) {
    const button = event.relatedTarget;
    const id = button.getAttribute('data-id');
    const nom = button.getAttribute('data-nom');
    const prix = button.getAttribute('data-prix');

    document.getElementById('editAlbumNom').value = nom || '';
    document.getElementById('editAlbumPrix').value = prix || '';

    // cible du formulaire -> albums.update
    editForm.action = `/albums/${id}`; // correspond à route albums.update (PUT)
  });
});
</script>
<script>
function deleteSelectedPhotos() {
    const selected = Array.from(document.querySelectorAll('.select-photo-checkbox:checked'))
                          .map(cb => cb.value);

    if (selected.length === 0) {
        alert("Veuillez sélectionner au moins une photo.");
        return;
    }

    if (!confirm("Supprimer " + selected.length + " photo(s) ?")) return;

    fetch("{{ route('gallery-photo.multiple-delete') }}", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": document.querySelector('meta[name=\"csrf-token\"]').content
        },
        body: JSON.stringify({ ids: selected })
    })
    .then(r => r.json())
    .then(data => {
        if (data.success) {
            location.reload();
        } else {
            alert("Erreur lors de la suppression.");
        }
    })
    .catch(err => {
        alert("Erreur réseau.");
        console.error(err);
    });
}
</script>
@include('components.chatbot-modele')

</body>
</html>
