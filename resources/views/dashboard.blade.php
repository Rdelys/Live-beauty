<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LIVE BEAUTY - Tableau de bord</title>
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
}

/* Animation "éblouissante" autour du live privé */
.highlight-private-live {
  position: relative;
  font-weight: bold;
  color: #ff80ab !important;
  animation: pulseGlow 1.5s infinite;
}

.highlight-private-live::after {
  content: "⬅ EN COURS EN CE MOMENT !";
  color: gold;
  font-size: 0.9rem;
  margin-left: 8px;
  animation: bounceArrow 1s infinite;
}

@keyframes pulseGlow {
  0% { text-shadow: 0 0 5px #ff4081, 0 0 10px #ff80ab; }
  50% { text-shadow: 0 0 20px #ff4081, 0 0 30px #ff80ab; }
  100% { text-shadow: 0 0 5px #ff4081, 0 0 10px #ff80ab; }
}

@keyframes bounceArrow {
  0%, 100% { transform: translateX(0); }
  50% { transform: translateX(5px); }
}

body {
    background-color: var(--dark-bg);
    color: var(--text-light);
    font-family: 'Segoe UI', sans-serif;
}
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

#modelDetailModal .modal-content {
  background-color: transparent;
  backdrop-filter: blur(6px);
  box-shadow: 0 0 30px rgba(0, 0, 0, 0.7);
}

#modal-carousel .carousel-inner {
  height: 100vh;
  width: 100%;
}
#modal-carousel .carousel-item {
  height: 100%;
  width: 100%;
}
#modal-carousel .carousel-item img {
  height: 100%;
  width: 100%;
  object-fit: cover;
  filter: blur(4px) brightness(0.4);
  position: absolute;
  top: 0;
  left: 0;
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
    height: 230px;
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
            <div class="col-md-10 p-4">
                <div class="row g-4">
                  @foreach($modeles as $modele)
                    <div class="col-md-4 card-item fille">
                    <div class="model-card card-default">
                      <form action="{{ route('favoris.toggle', $modele->id) }}" method="POST" class="position-absolute top-0 end-0 m-2 z-3">
                    @csrf
                    <button type="submit" class="btn btn-sm {{ Auth::user()->favoris->contains($modele->id) ? 'btn-warning' : 'btn-outline-light' }}">
                        @if(Auth::user()->favoris->contains($modele->id))
                            <i class="fas fa-heart text-danger"></i>
                        @else
                            <i class="far fa-heart text-white"></i>
                        @endif
                    </button>
                </form>

<a href="{{ route('modele.private', $modele->id) }}" class="d-block text-decoration-none text-light" target="_blank" rel="noopener noreferrer">
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
        setInterval(fetchLiveModels, 15000);
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
        content = `<img src="/storage/${item}" class="d-block w-100" style="object-fit:contain; height:100vh; cursor: zoom-in;" onclick="openFullscreen(this)">`;
    } 
    else if (type === 'video') {
        if (item.includes('http') && !item.endsWith('.mp4')) {
            content = `<iframe src="${item}" class="d-block w-100" style="height:100vh;" frameborder="0" allowfullscreen></iframe>`;
        } else {
            content = `<video src="${item}" controls autoplay class="d-block w-100" style="height:100vh; cursor: zoom-in;" onclick="openFullscreen(this)"></video>`;
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


<!-- PayPal SDK + Script -->
<script src="https://www.paypal.com/sdk/js?client-id={{ env('PAYPAL_LIVE_CLIENT_ID') }}&currency=EUR"></script>
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
async function fetchPrivateLives() {
    try {
        const response = await fetch('/api/live/private');
        const lives = await response.json();

        const liveContainer = document.getElementById('privateLives');
        liveContainer.innerHTML = '';

        lives.forEach(show => {
            // 🚫 Ignorer les shows terminés
            if (show.etat && show.etat.toLowerCase() === "terminer") return;

            // Génération de l'URL Laravel
            const url = privateLiveUrlTemplate
                .replace(':modeleId', show.modele.id)
                .replace(':showPriveId', show.id);

            const link = document.createElement('a');
            link.href = url;
            link.classList.add('d-block', 'mb-2', 'p-2', 'rounded', 'text-decoration-none');

            if (show.etat && show.etat.toLowerCase() === "en cours") {
                // Prénom du modèle uniquement, en badge
                link.innerHTML = `<span class="badge bg-danger">🔒 ${show.modele.prenom}</span>`;
                link.classList.add("highlight-private-live");
            } else {
                // Formatage heure début et fin (HH:MM)
                const debut = show.debut ? show.debut.substring(0,5) : '—';
                const fin = show.fin ? show.fin.substring(0,5) : '—';
                const date = show.date || '—';

                // Prénom + date + heures dans des badges
                link.innerHTML = `
                    <span class="badge bg-primary">🔒 ${show.modele.prenom}</span>
                    <span class="badge bg-secondary ms-2">${date}</span>
                    <span class="badge bg-info ms-1">Début: ${debut}</span>
                    <span class="badge bg-warning text-dark ms-1">Fin: ${fin}</span>
                `;
            }

            liveContainer.appendChild(link);
        });
    } catch (e) {
        console.error("Erreur de chargement des lives privés", e);
    }
}






fetchPrivateLives();
setInterval(fetchPrivateLives, 15000);

</script>

  
</body>
</html>
