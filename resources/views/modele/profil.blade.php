<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Profil Modèle</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <audio id="soundMessage" src="{{ asset('sounds/notificationAction.mp3') }}" preload="auto"></audio>
  <audio id="soundSurprise" src="{{ asset('sounds/cadeau.mp3') }}" preload="auto"></audio>
  <audio id="soundEnter" src="{{ asset('sounds/rentreShow.mp3') }}" preload="auto"></audio>

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
  border-radius: 30px;
  padding: 0.4rem 0.9rem;
  font-size: 0.85rem;
  margin: 0.2rem;
  background: rgba(255, 255, 255, 0.1);
  color: #fff;
  font-weight: 500;
  transition: all 0.3s ease;
}

.nav-tabs .nav-link:hover {
  background-color: rgba(255, 255, 255, 0.2);
}

.nav-tabs .nav-link.active {
  background-color: #f44336;
  color: white;
  box-shadow: 0 3px 10px rgba(244, 67, 54, 0.3);
}

.tab-counter {
  background: #ffc107;
  color: #000;
  border-radius: 20px;
  font-size: 0.7rem;
  font-weight: bold;
  padding: 0.2rem 0.5rem;
  margin-left: 5px;
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
  max-height: 100%;
  border-radius: 12px;
  border: 2px solid #ccc;
  background-color: #000;
}

/* Plein écran */
#videoContainer:fullscreen video,
#videoContainer:-webkit-full-screen video {
  max-height: none !important;
  width: 100% !important;
  height: 100% !important;
  object-fit: cover !important;
  border-radius: 0 !important;
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

#videoContainer {
    position: relative;
}

#videoContainer video {
    display: block;
    width: 100%;
}

#videoContainer:fullscreen video {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

#videoContainer:fullscreen #viewersOverlay,
#videoContainer:fullscreen #messages,
#videoContainer:fullscreen #chatForm {
    position: absolute;
    z-index: 9999;
}

#viewersOverlay {
    font-weight: bold;
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
.chat-wrapper::-webkit-scrollbar {
  display: none; /* Chrome/Safari */
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
  <form action="{{ route('gallery-photo.store', $modele->id) }}" method="POST" enctype="multipart/form-data" class="mb-4">
    @csrf
    <div class="row">
      <div class="col-md-6 mb-3">
        <label class="form-label">Choisir les photos</label>
        <input type="file" name="photos[]" class="form-control" multiple required accept="image/*">
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
    <button class="btn btn-success w-100">Ajouter à la galerie</button>
  </form>

  <!-- Galerie existante -->
  <div class="row">
    @foreach($modele->galleryPhotos->whereNotNull('photo_url') as $photo)
      <div class="col-6 col-md-3 mb-4">
        <div class="card bg-dark text-white border-light">
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
    <video id="liveVideo" autoplay muted playsinline class="w-100 rounded border border-light" style="max-height: 400px;"></video>

    <!-- Overlay spectateurs -->
    <div id="viewersOverlay" style="position:absolute;top:10px;left:10px;z-index:10;color:white;">
        👥 <span id="viewersCount">0</span>
        <div id="viewersList" style="margin-top:5px;font-size:0.85rem;"></div>
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

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.socket.io/4.7.2/socket.io.min.js"></script>
<script>
  document.getElementById("fullscreenBtn")?.addEventListener("click", () => {
    const container = document.getElementById("videoContainer");
    if (container.requestFullscreen) container.requestFullscreen();
    else if (container.webkitRequestFullscreen) container.webkitRequestFullscreen();
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
socket = io("wss://livebeautyofficial.com", {
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


socket.on("chat-message", (data) => {
    const chatWrapper = document.querySelector(".chat-wrapper");
    if (chatWrapper) {
        const bubble = document.createElement("div");
        bubble.classList.add("chat-bubble");
        bubble.innerHTML = `<strong>${data.pseudo}</strong> : ${data.message}`;
        chatWrapper.appendChild(bubble);
        chatWrapper.scrollTop = chatWrapper.scrollHeight;
    }
    if (soundMessage) soundMessage.play().catch(() => {});
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
  <select name="langue" class="form-control">
    <option value="" disabled selected>{{ $modele->langue ? $modele->langue : 'Sélectionnez une langue' }}</option>
    <option value="FR" {{ (old('langue', $modele->langue) == 'FR') ? 'selected' : '' }}>Francais</option>
    <option value="EN" {{ (old('langue', $modele->langue) == 'EN') ? 'selected' : '' }}>Anglais</option>
    <option value="DE" {{ (old('langue', $modele->langue) == 'DE') ? 'selected' : '' }}>Allemand</option>
    <option value="ES" {{ (old('langue', $modele->langue) == 'ES') ? 'selected' : '' }}>Espagnol</option>
    <option value="IT" {{ (old('langue', $modele->langue) == 'IT') ? 'selected' : '' }}>Italien</option>
    <option value="PT" {{ (old('langue', $modele->langue) == 'PT') ? 'selected' : '' }}>Portugais</option>
    <option value="NL" {{ (old('langue', $modele->langue) == 'NL') ? 'selected' : '' }}>Néerlandais</option>
  </select>
</div>
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

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
          <button type="submit" class="btn btn-success">Enregistrer</button>
        </div>
      </form>
    </div>
  </div>
</div>
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

  // === Gestion sélection des jetons proposés ===
  const select = document.getElementById('select-jeton-propose');
  const hiddenInput = document.getElementById('jeton_propose_id'); // Champ caché ajouté dans le formulaire

  if (select) {
    select.addEventListener('change', function() {
      const opt = this.selectedOptions[0];

      // Si aucun jeton proposé sélectionné
      if (!opt || !opt.value) {
        document.querySelector('input[name="nom"]').value = '';
        document.querySelector('textarea[name="description"]').value = '';
        document.querySelector('input[name="nombre_de_jetons"]').value = '';
        if (hiddenInput) hiddenInput.value = '';
        return;
      }

      // Remplissage automatique des champs à partir des data-attributes
      document.querySelector('input[name="nom"]').value = opt.dataset.nom || '';
      document.querySelector('textarea[name="description"]').value = opt.dataset.description || '';
      document.querySelector('input[name="nombre_de_jetons"]').value = opt.dataset.nombre || '';

      // On sauvegarde aussi l'ID du jeton proposé sélectionné
      if (hiddenInput) hiddenInput.value = opt.value;
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


</body>
</html>
