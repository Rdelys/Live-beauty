<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LIVE BEAUTY</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #121212;
            color: white;
            font-family: 'Arial', sans-serif;
        }

        .navbar {
            background-color: #d6336c;
        }

        .navbar-brand {
            font-size: 2.5rem;
            font-weight: bold;
            letter-spacing: 3px;
        }

        .navbar-brand .live {
            color: white;
        }

        .navbar-brand .beauty {
            color: black;
        }

        .navbar a.nav-link {
            color: white !important;
            font-weight: bold;
        }

        .navbar a.nav-link:hover {
            color: #ffcccb !important;
        }

        .sidebar {
            background-color: #1f1f1f;
            min-height: 100vh;
            padding: 20px;
            overflow-y: auto;
            border-right: 2px solid #333;
        }

        .sidebar h5 {
            color: #ff4d4d;
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 10px 0;
            border-bottom: 1px solid #333;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .sidebar a:hover {
            color: #ff4d4d;
            padding-left: 5px;
        }

        .submenu {
            display: none;
        }

        .submenu a {
            padding-left: 20px;
            font-size: 0.9rem;
            border: none;
        }

        .btn-genre {
            background-color: #d6336c;
            color: white;
            font-weight: bold;
            margin-bottom: 10px;
            width: 100%;
            transition: all 0.3s ease;
        }

        .btn-genre:hover {
            background-color: #ff4d4d;
        }

        .model-card {
    min-height: 370px; /* pour harmoniser si besoin */
    display: flex;
    flex-direction: column;
    justify-content: space-between;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
}


        .model-card:hover {
    transform: scale(1.03); /* Légèrement moins agressif */
    box-shadow: 0 0 15px rgba(255, 0, 0, 0.3);
}

        .model-card img {
            width: 100%;
            height: 250px;
            object-fit: cover;
        }

        .model-name {
            padding: 10px;
            text-align: center;
            font-weight: bold;
            color: #ff4d4d;
            font-size: 1.2rem;
        }

        .vip-badge {
            position: absolute;
            top: 10px;
            left: 10px;
            background-color: gold;
            color: black;
            padding: 5px 10px;
            font-size: 0.8rem;
            border-radius: 5px;
            font-weight: bold;
        }
.model-img {
    width: 100%;
    height: 220px;
    object-fit: contain;
    background-color: #000; /* Ajoute un fond pour les bandes noires */
    border-top-left-radius: 15px;
    border-top-right-radius: 15px;
}

.status-indicator {
    position: absolute;
    top: 10px;
    right: 10px;
    width: 12px;
    height: 12px;
    border-radius: 50%;
    border: 2px solid white;
    z-index: 2;
}
.status-online {
    background-color: #28a745; /* Vert */
}
.status-offline {
    background-color: #dc3545; /* Rouge */
}

#modelDetailModal .modal-content {
    background-color: transparent;
    backdrop-filter: blur(6px);
    box-shadow: 0 0 30px rgba(0,0,0,0.7);
}

#modelDetailModal .modal-body {
    background: rgba(0, 0, 0, 0.7);
    backdrop-filter: blur(4px);
    border-radius: 15px;
    box-shadow: 0 0 30px rgba(255, 255, 255, 0.1);
}



#modal-carousel {
    z-index: 1;
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
    object-fit: cover; /* bien cadré sans étirer */
    filter: blur(4px) brightness(0.4);
    position: absolute;
    top: 0;
    left: 0;
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
                    <li class="nav-item"><a class="nav-link" href="#">Obtenez des Crédits</a></li>
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
<div class="position-relative model-card" style="cursor:pointer;" onclick="afficherDetailModele({{ $modele->id }})">
            <span class="status-indicator {{ $modele->en_ligne ? 'status-online' : 'status-offline' }}"></span>

            @if($modele->en_ligne)
                <span class="vip-badge">VIP</span>
            @endif

            @php
                $photos = is_array($modele->photos) ? $modele->photos : json_decode($modele->photos ?? '[]', true);
    $photos = $photos ?: [];
                $hasVideo = $modele->video_file || $modele->video_link;
            @endphp

            <div id="carousel-{{ $modele->id }}" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach($photos as $index => $photo)
                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
<img src="{{ asset('storage/' . $photo) }}" class="d-block w-100 model-img" alt="Photo {{ $index + 1 }}">
                        </div>
                    @endforeach
                </div>

                @if(count($photos) > 1)
                    <button class="carousel-control-prev" type="button" data-bs-target="#carousel-{{ $modele->id }}" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carousel-{{ $modele->id }}" data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </button>
                @endif
            </div>

            @if($hasVideo)
<div class="d-grid gap-2 p-2">
    <button class="btn btn-outline-warning" onclick="toggleVideo({{ $modele->id }})" id="btn-video-{{ $modele->id }}">🎬 Voir la vidéo</button>
    <button class="btn btn-outline-light d-none" onclick="togglePhotos({{ $modele->id }})" id="btn-photos-{{ $modele->id }}">🖼️ Retour aux photos</button>
</div>
            @endif

            <div class="model-name">{{ $modele->prenom }}</div>

            <!-- Vidéo (masquée par défaut) -->
            <div id="video-{{ $modele->id }}" class="d-none">
                @if($modele->video_file)
                    <video controls style="width:100%; height:250px; object-fit:cover;">
                        <source src="{{ asset('storage/' . $modele->video_file) }}" type="video/mp4">
                        Votre navigateur ne prend pas en charge la vidéo.
                    </video>
                @elseif($modele->video_link)
                    <iframe width="100%" height="250" src="{{ $modele->video_link }}" frameborder="0" allowfullscreen></iframe>
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
<div class="modal fade" id="modelDetailModal" tabindex="-1" aria-hidden="true">
<div class="modal-dialog modal-fullscreen modal-dialog-centered">
    <div class="modal-content pmodal--0 border-0 bg-dark text-white position-relative overflow-hidden">
      <!-- Bouton fermeture -->
<button type="button" class="btn btn-light position-absolute top-0 end-0 m-3 z-2" data-bs-dismiss="modal" aria-label="Fermer">
    <i class="fas fa-times"></i>
</button>

      <!-- Arrière-plan en carrousel -->
      <div id="modal-carousel" class="position-absolute top-0 start-0 w-100 h-100 z-n1 carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner" id="modalCarouselInner"></div>
        <button class="carousel-control-prev" type="button" data-bs-target="#modal-carousel" data-bs-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#modal-carousel" data-bs-slide="next">
          <span class="carousel-control-next-icon"></span>
        </button>
      </div>

      <!-- Contenu superposé -->
      <div class="modal-body bg-black bg-opacity-75 p-4 rounded shadow-lg m-4" id="modelDetailContent" style="max-height:80vh; overflow-y:auto;">
        <!-- Le contenu texte sera injecté ici -->
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

    // Injecter les images dans le carrousel de fond
    const carouselInner = document.getElementById('modalCarouselInner');
    carouselInner.innerHTML = photos.map((photo, index) => `
        <div class="carousel-item ${index === 0 ? 'active' : ''}">
            <img src="/storage/${photo}" alt="photo-${index}">
        </div>
    `).join('');

    // Injecter les détails dans la zone centrale
    const contentHTML = `
        <h4 class="text-warning mb-3">Bio de ${modele.prenom}</h4>
        <p><strong>${modele.age || 'Âge inconnu'} ans</strong> — ${modele.genre || 'Genre'} — ${modele.orientation || ''} — ${modele.langues || ''}</p>
        <p>${modele.description || 'Aucune description disponible.'}</p>
        <hr class="bg-light">
        <h5>Ma bio:</h5>
        <ul class="list-unstyled mb-3">
            <li><strong>Taille:</strong> ${modele.taille || '-'} cm</li>
            <li><strong>Fesses:</strong> ${modele.fesses || '-'}</li>
            <li><strong>Poitrine:</strong> ${modele.poitrine || '-'}</li>
        </ul>
        <h5>Voici ce que je propose en Chat Privé :</h5>
        <p>${modele.services_prives || 'Non précisé'}</p>
    `;
    document.getElementById('modelDetailContent').innerHTML = contentHTML;

    new bootstrap.Modal(document.getElementById('modelDetailModal')).show();
}

    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Modal Connexion -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="POST" action="{{ route('login.submit') }}" class="modal-content bg-dark text-white">
      @csrf
      <div class="modal-header">
        <h5 class="modal-title" id="loginModalLabel">Connexion</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label for="email_login" class="form-label">Email</label>
          <input type="email" class="form-control" name="email" required>
        </div>
        <div class="mb-3">
          <label for="password_login" class="form-label">Mot de passe</label>
          <input type="password" class="form-control" name="password" required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-warning">Se connecter</button>
      </div>
    </form>
  </div>
</div>

<!-- Modal Inscription -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="POST" action="{{ route('register.submit') }}" class="modal-content bg-dark text-white">
      @csrf
      <div class="modal-header">
        <h5 class="modal-title" id="registerModalLabel">Inscription</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div class="mb-2"><input name="nom" class="form-control" placeholder="Nom" required></div>
        <div class="mb-2"><input name="prenoms" class="form-control" placeholder="Prénoms" required></div>
        <div class="mb-2"><input name="age" type="number" class="form-control" placeholder="Âge" required></div>
        <div class="mb-2"><input name="pseudo" class="form-control" placeholder="Pseudo" required></div>
        <div class="mb-2"><input name="departement" class="form-control" placeholder="Département" required></div>
        <div class="mb-2"><input name="email" type="email" class="form-control" placeholder="Email" required></div>
        <div class="mb-2"><input name="password" type="password" class="form-control" placeholder="Mot de passe" required></div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-warning">S’inscrire</button>
      </div>
    </form>
  </div>
</div>
</body>
</html>
