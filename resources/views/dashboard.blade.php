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
                          <a class="nav-link" href="#">Modèles galeries</a>
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
                    <a href="#" class="text-white me-3 fs-4"><i class="fa-solid fa-envelope"></i></a>
                    
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
                <h5>Catégories</h5>
                <h7>Cams en Direct</h5>
                <div id="activeLives">
                <!-- Chargement dynamique -->
                </div>
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
<script src="https://www.paypal.com/sdk/js?client-id={{ env('PAYPAL_SANDBOX_CLIENT_ID') }}&currency=EUR"></script>
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


</body>
</html>
