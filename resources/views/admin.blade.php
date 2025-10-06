<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <title>Admin - Live Beauty</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
  />
  <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
    rel="stylesheet"
  />
  <style>
   /* GLOBAL */
    body {
      margin: 0;
      font-family: 'Poppins', 'Segoe UI', sans-serif;
      background-color: #1e1e2f;
      color: #f1f1f1;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
      scroll-behavior: smooth;
    }

    a {
      text-decoration: none;
      color: inherit;
    }

    /* SIDEBAR */
  .sidebar {
    width: 250px;
    background-color: #28293e;
    padding: 1.5rem 1rem;
    height: 100vh;
    overflow-y: auto;
    position: fixed;
    top: 0;
    left: 0;
    border-right: 1px solid #333;
    transition: all 0.3s ease-in-out;
    z-index: 1000;
  }

  .sidebar h5 {
    text-align: center;
    font-weight: 600;
    margin-bottom: 2rem;
    color: #e63946;
    font-size: 1.2rem;
  }

.sidebar a {
  display: flex;
  align-items: center;
  gap: 12px;
  padding: 0.8rem 1rem;
  border-radius: 10px;
  margin-bottom: 0.5rem;
  color: #dcdcdc;
  transition: all 0.3s ease;
  font-weight: 500;
}

.sidebar a:hover,
.sidebar a.active {
  background-color: #e63946;
  color: #fff;
  transform: translateX(5px);
  box-shadow: 0 4px 10px rgba(230, 57, 70, 0.2);
}

.submenu {
  max-height: 0;
  overflow: hidden;
  transition: max-height 0.4s ease;
  padding-left: 1rem;
}

.submenu.show {
  max-height: 300px;
}

.submenu a {
  background-color: #32334a;
  padding: 0.6rem 1rem;
  font-size: 0.95rem;
}

/* MAIN CONTENT */
.content {
  margin-left: 250px;
  padding: 2rem 2rem 3rem;
  flex-grow: 1;
  animation: fadeIn 0.6s ease-in-out;
}

.content h2 {
  color: #e63946;
  font-weight: 600;
  margin-bottom: 1rem;
}

/* TABLES */
.table {
  background-color: #222;
  color: #f5f5f5;
  border-color: #444;
}

.table thead {
  background-color: #e63946;
  color: white;
}

/* BUTTONS */
.btn-primary {
  background-color: #e63946;
  border: none;
  transition: background-color 0.3s ease;
}

.btn-primary:hover {
  background-color: #d62839;
}

.btn-danger {
  background-color: #ff4d4f;
  border: none;
}

.btn-danger:hover {
  background-color: #cc3a3b;
}

.btn-success {
  background-color: #28a745;
  border: none;
}

.btn-success:hover {
  background-color: #218838;
}

/* CARDS */
.card {
  border-radius: 1rem;
  border: none;
  box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
  transition: transform 0.2s ease;
}

.card:hover {
  transform: translateY(-5px);
}

.card-title {
  font-weight: 600;
}

/* FORMS */
.form-control {
  background-color: #2e2f44;
  color: #f1f1f1;
  border: 1px solid #444;
  border-radius: 0.5rem;
}

.form-control:focus {
  background-color: #34354f;
  color: #fff;
  border-color: #e63946;
  box-shadow: 0 0 0 0.2rem rgba(230, 57, 70, 0.25);
}

label {
  margin-bottom: 0.5rem;
  font-weight: 500;
}

/* IMAGES / VIDEOS */
.zoomable-photo {
  cursor: zoom-in;
  transition: transform 0.2s ease;
  border-radius: 0.5rem;
}

.zoomable-photo:hover {
  transform: scale(1.1);
}

video {
  border-radius: 0.5rem;
}

/* ANIMATION */
@keyframes fadeIn {
  from {
    opacity: 0;
    transform: translateY(20px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

/* RESPONSIVE */
@media (max-width: 992px) {
  .sidebar {
    width: 100%;
    height: auto;
    position: relative;
    border-right: none;
    border-bottom: 1px solid #444;
  }

  .content {
    margin-left: 0;
    margin-top: 20px;
    padding: 1.5rem;
  }

  .sidebar h5 {
    font-size: 1.1rem;
  }

  .sidebar a {
    justify-content: center;
  }

  .submenu {
    padding-left: 0;
  }

  .submenu a {
    text-align: center;
  }
}

@media (max-width: 992px) {
  .sidebar {
    position: relative;
    width: 100%;
    height: auto;
    padding: 1rem;
  }
}


@media (max-width: 576px) {
  .content {
    padding: 1rem;
  }

  .sidebar a {
    font-size: 0.9rem;
    padding: 0.5rem;
  }

  .table th,
  .table td {
    font-size: 0.85rem;
    padding: 0.5rem;
  }

  .btn,
  .form-control {
    font-size: 0.9rem;
  }

  video {
    width: 100%;
  }

  img.zoomable-photo {
    width: 100% !important;
  }

  .card {
    margin-bottom: 1rem;
  }
}

/* FOOTER */
footer {
  padding: 1rem;
  background-color: #1e1e2f;
  font-size: 0.85rem;
  border-top: 1px solid #333;
}
  footer p {
    margin: 0;
    color: #ccc;
  }
  footer a {
    color: #e63946;
    text-decoration: none;
  }
  footer a:hover {
    text-decoration: underline;
  }
  footer .text-muted {
    color: #aaa !important;
  }
  footer .text-muted a {
    color: #e63946;
  }
  footer .text-muted a:hover {
    text-decoration: underline;
  }
  </style>
</head>
<body>
  <!-- Bouton Hamburger (visible en mobile) -->
<nav class="navbar navbar-dark bg-dark d-lg-none">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mobileMenu">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>
</nav>

<!-- Menu latéral transformé en dropdown mobile -->
<div class="collapse d-lg-block sidebar" id="mobileMenu">
  <h5><i class="fas fa-user-shield"></i> Admin Panel</h5>
  <a class="menu-link active"><i class="fas fa-tachometer-alt"></i> Tableau de bord</a>

  <a class="menu-link has-submenu"><i class="fas fa-images"></i> Modèles</a>
  <div class="submenu">
    <a class="menu-link"><i class="fas fa-list"></i> Liste des modeles</a>
    <a class="menu-link"><i class="fas fa-plus"></i> Ajout modeles</a>
  </div>

  <a class="menu-link"><i class="fas fa-users"></i> Clients</a>
  <a class="menu-link"><i class="fas fa-shopping-cart"></i> Achats photos</a>
  <a class="menu-link"><i class="fas fa-video"></i> Shows privés</a>

  <!--<a class="menu-link has-submenu"><i class="fas fa-coins"></i> Jetons</a>
  <div class="submenu">
    <a class="menu-link"><i class="fas fa-list-ul"></i> Liste des jetons</a>
    <a class="menu-link"><i class="fas fa-plus-circle"></i> Ajout de jetons</a>
  </div>-->

  <a href="#" class="menu-link has-submenu"><i class="fas fa-coins"></i> Jetons Proposés</a>
  <div class="submenu">
    <a href="#" class="menu-link">Liste des jetons proposés</a>
    <a href="#" class="menu-link">Ajout jetons proposés</a>
  </div>
</div>

<div class="content">
  <div id="dashboard-content" class="content-section">
  <h2 class="mb-4 text-white">Tableau de bord</h2>
  <p class="mb-5 text-white">Bienvenue dans l'espace d'administration de Live Beauty.</p>

  <!-- === Cards Row === -->
  <div class="row g-4 mb-5">
    <!-- Card: Nombre de Modèles -->
    <div class="col-md-6 col-lg-4">
      <div class="card bg-dark text-white h-100 shadow-sm border-0">
        <div class="card-body d-flex align-items-center gap-3">
          <div class="icon bg-danger rounded-circle d-flex align-items-center justify-content-center" style="width:60px; height:60px;">
            <i class="fas fa-user-friends fa-2x text-white"></i>
          </div>
          <div>
            <h6 class="mb-2 text-white">Nombre de Modèles</h6>
            <p class="display-5 fw-bold text-danger mb-0">{{ $nombreDeModeles }}</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Card: Nombre de Jetons -->
    <!--<div class="col-md-6 col-lg-4">
      <div class="card bg-dark text-white h-100 shadow-sm border-0">
        <div class="card-body d-flex align-items-center gap-3">
          <div class="icon bg-success rounded-circle d-flex align-items-center justify-content-center" style="width:60px; height:60px;">
            <i class="fas fa-coins fa-2x text-white"></i>
          </div>
          <div>
            <h6 class="mb-2 text-white">Nombre de Jetons</h6>
            <p class="display-5 fw-bold text-success mb-0">{{ $nombreDeJetons }}</p>
          </div>
        </div>
      </div>
    </div>-->

    <div class="col-md-6 col-lg-4">
      <div class="card bg-dark text-white h-100 shadow-sm border-0">
        <div class="card-body d-flex align-items-center gap-3">
          <div class="icon bg-success rounded-circle d-flex align-items-center justify-content-center" style="width:60px; height:60px;">
            <i class="fas fa-coins fa-2x text-white"></i>
          </div>
          <div>
            <h6 class="mb-2 text-white">Nombre de Jetons proposé</h6>
            <p class="display-5 fw-bold text-success mb-0">{{ $nombrejetonsProposes }}</p>
          </div>
        </div>
      </div>
    </div>
    <!-- Card: Nombre de Clients -->
    <div class="col-md-6 col-lg-4">
      <div class="card bg-dark text-white h-100 shadow-sm border-0">
        <div class="card-body d-flex align-items-center gap-3">
          <div class="icon bg-info rounded-circle d-flex align-items-center justify-content-center" style="width:60px; height:60px;">
            <i class="fas fa-users fa-2x text-white"></i>
          </div>
          <div>
            <h6 class="mb-2 text-white">Nombre de Clients</h6>
            <p class="display-5 fw-bold text-info mb-0">{{ $nombreDeClients }}</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Card: Nombre d'Achats Photos -->
    <div class="col-md-6 col-lg-4">
      <div class="card bg-dark text-white h-100 shadow-sm border-0">
        <div class="card-body d-flex align-items-center gap-3">
          <div class="icon bg-warning rounded-circle d-flex align-items-center justify-content-center" style="width:60px; height:60px;">
            <i class="fas fa-shopping-cart fa-2x text-white"></i>
          </div>
          <div>
            <h6 class="mb-2 text-white">Nombre d'Achats Photos</h6>
            <p class="display-5 fw-bold text-warning mb-0">{{ $nombreAchatsPhotos }}</p>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- === Charts Row === -->
  <div class="row g-4">
    <!-- Connexions -->
    <div class="col-lg-4 col-md-6">
      <div class="card bg-dark text-white h-100 p-3 shadow-sm border-0">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h5 class="card-title mb-0 text-white"><i class="fas fa-chart-line me-2 text-danger"></i> Connexions modèles</h5>
          <button class="btn btn-sm btn-primary" onclick="openFullscreen('chart-connections-container')">Plein écran</button>
        </div>
        <div id="chart-connections-container" style="overflow-x:auto; height:350px;">
          <canvas id="chart-connections"></canvas>
          <div class="mt-2 text-center">
            <button class="btn btn-sm btn-secondary" onclick="resetZoom('chart-connections')">🔄 Reset</button>
            <button class="btn btn-sm btn-secondary" onclick="panChart('chart-connections', -50)">⬅️</button>
            <button class="btn btn-sm btn-secondary" onclick="panChart('chart-connections', 50)">➡️</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Jetons -->
    <<div class="col-lg-4 col-md-6">
      <div class="card bg-dark text-white h-100 p-3 shadow-sm border-0">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h5 class="card-title mb-0 text-white"><i class="fas fa-coins me-2 text-success"></i> Jetons achetés</h5>
          <button class="btn btn-sm btn-primary" onclick="openFullscreen('chart-tokens-container')">Plein écran</button>
        </div>
        <div id="chart-tokens-container" style="overflow-x:auto; height:350px;">
          <canvas id="chart-tokens"></canvas>
          <div class="mt-2 text-center">
            <button class="btn btn-sm btn-secondary" onclick="resetZoom('chart-tokens')">🔄 Reset</button>
            <button class="btn btn-sm btn-secondary" onclick="panChart('chart-tokens', -50)">⬅️</button>
            <button class="btn btn-sm btn-secondary" onclick="panChart('chart-tokens', 50)">➡️</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Shows privés -->
    <div class="col-lg-4 col-md-12">
      <div class="card bg-dark text-white h-100 p-3 shadow-sm border-0">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h5 class="card-title mb-0 text-white"><i class="fas fa-video me-2 text-warning"></i> Shows privés</h5>
          <button class="btn btn-sm btn-primary" onclick="openFullscreen('chart-shows-container')">Plein écran</button>
        </div>
        <div id="chart-shows-container" style="overflow-x:auto; height:350px;">
          <canvas id="chart-shows"></canvas>
          <div class="mt-2 text-center">
            <button class="btn btn-sm btn-secondary" onclick="resetZoom('chart-shows')">🔄 Reset</button>
            <button class="btn btn-sm btn-secondary" onclick="panChart('chart-shows', -50)">⬅️</button>
            <button class="btn btn-sm btn-secondary" onclick="panChart('chart-shows', 50)">➡️</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Achats -->
    <div class="col-lg-4 col-md-12">
      <div class="card bg-dark text-white h-100 p-3 shadow-sm border-0">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h5 class="card-title mb-0 text-white"><i class="fas fa-shopping-cart me-2 text-warning"></i> Achats photos</h5>
          <button class="btn btn-sm btn-primary" onclick="openFullscreen('chart-achats-container')">Plein écran</button>
        </div>
        <div id="chart-achats-container" style="overflow-x:auto; height:350px;">
          <canvas id="chart-achats"></canvas>
          <div class="mt-2 text-center">
            <button class="btn btn-sm btn-secondary" onclick="resetZoom('chart-achats')">🔄 Reset</button>
            <button class="btn btn-sm btn-secondary" onclick="panChart('chart-achats', -50)">⬅️</button>
            <button class="btn btn-sm btn-secondary" onclick="panChart('chart-achats', 50)">➡️</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div id="achats-content" class="content-section d-none">
  <h2>Achats de photos</h2>
  <p>Liste des achats effectués par les clients.</p>

  <div class="table-responsive">
    <table class="table table-bordered table-striped align-middle text-center">
      <thead>
        <tr>
          <th>ID</th>
          <th>Client</th>
          <th>Modèle</th>
          <th>Jetons</th>
          <th>Date</th>
        </tr>
      </thead>
      <tbody>
        @foreach($achats as $achat)
          <tr>
            <td>{{ $achat->id }}</td>
            <td>{{ $achat->user->nom }} {{ $achat->user->prenoms }} ({{ $achat->user->pseudo }})</td>
            <td>{{ $achat->modele->nom }} {{ $achat->modele->prenom }}</td>
            <td>{{ $achat->jetons }}</td>
            <td>{{ $achat->created_at->format('d/m/Y H:i') }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>


  <div id="shows-prives-content" class="content-section d-none">
  <h2>Shows privés</h2>
  <p>Liste des shows privés avec leurs statuts.</p>

  <!-- Filtres -->
  <div class="row mb-3" style="color:#ccc !important;">
    <div class="col-md-3">
      <select id="filterEtat" class="form-control">
        <option value="">-- Tous les états --</option>
        <option value="En attente">En attente</option>
        <option value="En cours">En cours</option>
        <option value="En pause">En pause</option>
        <option value="Terminer">Terminé</option>
      </select>
    </div>
    <div class="col-md-2">
      <button class="btn btn-secondary w-100" onclick="resetShowFilters()">Réinitialiser</button>
    </div>
  </div>

<div class="table-responsive" style="overflow-x:auto; max-width:100%;">
  <table class="table table-bordered table-striped align-middle text-center">
    <thead>
      <tr>
        <th style="white-space:nowrap;">ID</th>
        <th style="white-space:nowrap;">Client</th>
        <th style="white-space:nowrap;">Modèle</th>
        <th style="white-space:nowrap;">Date</th>
        <th style="white-space:nowrap;">Début</th>
        <th style="white-space:nowrap;">Fin</th>
        <th style="white-space:nowrap;">Durée</th>
        <th style="white-space:nowrap;">Jetons</th>
        <th style="white-space:nowrap;">État</th>
      </tr>
    </thead>
    <tbody>
      @foreach($shows as $show)
        <tr>
          <td>{{ $show->id }}</td>
          <td>{{ $show->user->nom }} {{ $show->user->prenoms }}</td>
          <td>{{ $show->modele->prenom }}</td>
          <td>{{ $show->date }}</td>
          <td>{{ $show->debut }}</td>
          <td>{{ $show->fin }}</td>
          <td>{{ $show->duree }} min</td>
          <td>{{ $show->jetons_total }}</td>
          <td><span class="badge bg-info">{{ $show->etat }}</span></td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
</div>
    <div id="modeles-content" class="content-section d-none">
  <h2>Modèles</h2>
  <p>Section dédiée aux modèles disponibles.</p>

  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Description</th>
        <th>Vidéo</th>
        <th>Photos</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach($modeles as $modele)
        <tr>
          <td>{{ $modele->nom }}</td>
          <td>{{ $modele->prenom }}</td>
          <td>{{ $modele->description }}</td>
          <td>
    @php
        // Normalisation du champ vidéo fichier
        $videoFiles = $modele->video_file;
        if (is_string($videoFiles)) {
            $decoded = json_decode($videoFiles, true);
            $videoFiles = json_last_error() === JSON_ERROR_NONE ? $decoded : [$videoFiles];
        }
        if (!is_array($videoFiles)) {
            $videoFiles = [$videoFiles];
        }

        // Normalisation du champ vidéo lien
        $videoLinks = $modele->video_link;
        if (is_string($videoLinks)) {
            $decoded = json_decode($videoLinks, true);
            $videoLinks = json_last_error() === JSON_ERROR_NONE ? $decoded : [$videoLinks];
        }
        if (!is_array($videoLinks)) {
            $videoLinks = [$videoLinks];
        }
    @endphp

    {{-- Affichage fichiers vidéos --}}
    @if(!empty($videoFiles) && !empty($videoFiles[0]))
        @foreach($videoFiles as $file)
            @if(is_string($file) && !empty($file))
                <video width="100" controls>
                    <source src="{{ asset('storage/' . $file) }}" type="video/mp4">
                </video>
            @endif
        @endforeach

    {{-- Sinon affichage liens vidéos --}}
    @elseif(!empty($videoLinks) && !empty($videoLinks[0]))
        @foreach($videoLinks as $link)
            @if(is_string($link) && !empty($link))
                <a href="{{ $link }}" target="_blank">Lien vidéo</a><br>
            @endif
        @endforeach

    @else
        Aucune
    @endif
</td>

         <td>
    @php
        // Récupérer les photos en tableau
        $photos = $modele->photos;

        if (is_string($photos)) {
            $decoded = json_decode($photos, true);
            $photos = json_last_error() === JSON_ERROR_NONE ? $decoded : [];
        }

        // S'assurer que c'est bien un tableau
        $photos = is_array($photos) ? $photos : [];
    @endphp

    @if(!empty($photos))
        <div style="display: flex; gap: 5px; flex-wrap: wrap;">
            @foreach($photos as $photo)
                @if(is_string($photo) && !empty($photo))
                    <img src="{{ asset('storage/' . $photo) }}"
                         alt="Photo"
                         style="width: 80px; height: 80px; object-fit: cover; border-radius: 5px;">
                @endif
            @endforeach
        </div>
    @else
        Aucune photo
    @endif
</td>


          <td>
  <a href="{{ route('modeles.edit', $modele->id) }}" class="btn btn-sm btn-primary">Modifier</a>

  <form action="{{ route('modeles.destroy', $modele->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Confirmer la suppression ?')">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
  </form>
</td>

        </tr>
      @endforeach
    </tbody>
  </table>
</div>
<!-- Modal d'image -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content bg-dark text-white">
      <div class="modal-header border-0">
        <h5 class="modal-title" id="imageModalLabel">Aperçu de la photo</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>
      <div class="modal-body text-center">
        <img id="modalImage" src="" class="img-fluid rounded" />
      </div>
    </div>
  </div>
</div>


    <div id="ajoute-modeles-content" class="content-section d-none">
      <h2>Ajout de modèle</h2>
<p>Remplissez le formulaire pour ajouter un nouveau modèle.</p>

<form action="{{ route('modeles.store') }}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="row mb-3">
    <div class="col-md-6">
      <label for="nom" class="form-label">Nom</label>
      <input type="text" class="form-control" id="nom" name="nom" required />
    </div>
    <div class="col-md-6">
      <label for="prenom" class="form-label">Prénom</label>
      <input type="text" class="form-control" id="prenom" name="prenom" required />
    </div>
  </div>

  <div class="mb-3">
    <label for="description" class="form-label">Description</label>
    <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
  </div>

  <div class="row mb-3">
  <div class="col-md-4">
    <label class="form-label">Âge</label>
    <input type="number" name="age" class="form-control" min="18" max="99">
  </div>
  <div class="col-md-4">
    <label class="form-label">Taille (cm)</label>
    <input type="text" name="taille" class="form-control">
  </div>
  <div class="col-md-4">
    <label class="form-label">Silhouette</label>
    <input type="text" name="silhouette" class="form-control">
  </div>
</div>

<div class="row mb-3">
  <div class="col-md-6">
    <label class="form-label">Poitrine</label>
    <input type="text" name="poitrine" class="form-control">
  </div>
  <div class="col-md-6">
    <label class="form-label">Fesse</label>
    <input type="text" name="fesse" class="form-control">
  </div>
</div>

<div class="mb-3">
  <label class="form-label">Langues parlées</label>
  <select name="langue" class="form-control">
    <option value="FR">Francais</option>
    <option value="EN">Anglais</option>
    <option value="DE">Allemand</option>
    <option value="ES">Espagnol</option>
    <option value="IT">Italien</option>
    <option value="PT">Portugais</option>
    <option value="NL">Néerlandais</option>
  </select>
</div>


<div class="mb-3">
  <label class="form-label">Ce qu’elle propose</label>
  <textarea name="services" class="form-control" rows="4" placeholder="Décris ce qu’elle propose..."></textarea>
</div>


  <div class="mb-3">
    <label for="video_link" class="form-label">Lien vidéo (optionnel)</label>
<input type="url" class="form-control" id="video_link" name="video_link[]" placeholder="https://..." />
  </div>

  <div class="mb-3">
    <label for="video_file" class="form-label">Fichier vidéo (MP4, WebM, Ogg)</label>
    <input type="file" class="form-control" id="video_file" name="video_file[]" multiple accept="video/mp4,video/webm,video/ogg" />
  </div>

  <div class="row mb-3">
  <div class="col-md-6">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" name="email" required />
  </div>
  <div class="col-md-6">
    <label for="password" class="form-label">Mot de passe</label>
    <input type="password" class="form-control" id="password" name="password" required />
  </div>
</div>


  <div class="mb-3">
    <label class="form-label">Photos</label>
    <div id="photos-container">
      <div class="d-flex mb-2 align-items-center photo-group">
        <input type="file" name="photos[]" class="form-control me-2" accept="image/*" />
        <button type="button" class="btn btn-success add-photo">+</button>
      </div>
    </div>
  </div>

  <button type="submit" class="btn btn-primary">Ajouter le modèle</button>
</form>

    </div>
<div id="liste-jetons-proposes-content" class="content-section d-none">
  <h2>Liste des jetons proposés</h2>
  <table class="table table-bordered">
    <thead>
      <tr><th>Nom</th><th>Description</th><th>Nombre</th><th>Action</th></tr>
    </thead>
    <tbody>
      @foreach($jetonsProposes as $jp)
      <tr>
        <td>{{ $jp->nom }}</td>
        <td>{{ $jp->description }}</td>
        <td>{{ $jp->nombre_de_jetons }}</td>
        <td>
          <form method="POST" action="{{ route('jetons-proposes.destroy', $jp->id) }}">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger btn-sm">Supprimer</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

<div id="ajout-jetons-proposes-content" class="content-section d-none">
  <h2>Ajouter un jeton proposé</h2>

  <form action="{{ route('jetons-proposes.store') }}" method="POST" id="form-jeton-propose">
    @csrf
    <div class="mb-3">
      <label>Nom</label>
      <input type="text" name="nom" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Description</label>
      <textarea name="description" class="form-control"></textarea>
    </div>
    <div class="mb-3">
      <label>Nombre de jetons</label>
      <input type="number" name="nombre_de_jetons" class="form-control" required>
    </div>

    <!-- Optionnel : template inputs dynamiques (ajout futur) -->
    <button type="submit" class="btn btn-primary">Créer Jeton proposé</button>
  </form>
</div>

    <div id="clients-content" class="content-section d-none">
  <h2>Clients</h2>
  <p>Liste des clients enregistrés avec leur nombre de jetons.</p>
<div class="row mb-3" style="color: #ccc !important;">
  <div class="col-md-2">
    <input type="text" id="filterNom" class="form-control" placeholder="Nom">
  </div>
  <div class="col-md-2">
    <input type="text" id="filterPrenoms" class="form-control" placeholder="Prénom">
  </div>
  <div class="col-md-2">
    <input type="text" id="filterPseudo" class="form-control" placeholder="Pseudo">
  </div>
  <div class="col-md-2">
    <input type="number" id="filterJetons" class="form-control" placeholder="Jetons">
  </div>
  <div class="col-md-2">
    <input type="date" id="filterDate" class="form-control">
  </div>
  <div class="col-md-2">
    <button class="btn btn-secondary w-100" onclick="resetFilters()">Réinitialiser</button>
  </div>
</div>

  <div class="table-responsive">
    <table class="table table-bordered">
      <thead>
<tr>
    <th>
      Nom
      <div class="dropdown d-inline">
        <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
          <i class="fas fa-sort"></i>
        </button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="#" onclick="sortTable(0,'string','asc')">A → Z</a></li>
          <li><a class="dropdown-item" href="#" onclick="sortTable(0,'string','desc')">Z → A</a></li>
        </ul>
      </div>
    </th>
    <th>Prénoms</th>
    <th>Pseudo</th>
    <th>
      Jetons
      <div class="dropdown d-inline">
        <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
          <i class="fas fa-sort"></i>
        </button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="#" onclick="sortTable(3,'number','asc')">Moins → Plus</a></li>
          <li><a class="dropdown-item" href="#" onclick="sortTable(3,'number','desc')">Plus → Moins</a></li>
        </ul>
      </div>
    </th>
    <th>Email</th>
    <th>Banni</th>
    <th>
      Date de création
      <div class="dropdown d-inline">
        <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
          <i class="fas fa-sort"></i>
        </button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="#" onclick="sortTable(6,'date','asc')">Ancien → Récent</a></li>
          <li><a class="dropdown-item" href="#" onclick="sortTable(6,'date','desc')">Récent → Ancien</a></li>
        </ul>
      </div>
    </th>
    <th>Actions</th>
</tr>
</thead>

<tbody>
@foreach($clients as $client)
    <tr>
        <td>{{ $client->nom }}</td>
        <td>{{ $client->prenoms }}</td>
        <td>{{ $client->pseudo }}</td>
        <td>{{ $client->jetons }}</td>
        <td>{{ $client->email }}</td>
        <td>{{ $client->banni ? 'Oui' : 'Non' }}</td>
        <td>{{ $client->created_at->format('d/m/Y') }}</td>
        <td>
            <!-- Bouton Ajouter Jetons -->
            <form action="{{ route('admin.clients.addTokens', $client->id) }}" method="POST" style="display:inline-block;">
                @csrf
                <input type="number" name="jetons" min="1" class="form-control form-control-sm" style="width:80px;display:inline-block;">
                <button type="submit" class="btn btn-success btn-sm">+ Jetons</button>
            </form>
            <!-- Bouton Retirer Jetons -->
            <form action="{{ route('admin.clients.removeTokens', $client->id) }}" method="POST" style="display:inline-block;">
                @csrf
                <input type="number" name="jetons" min="1" class="form-control form-control-sm" style="width:80px;display:inline-block;">
                <button type="submit" class="btn btn-danger btn-sm">- Jetons</button>
            </form>

            <!-- Bouton Bannir/Débloquer -->
            <form action="{{ route('admin.clients.toggleBan', $client->id) }}" method="POST" style="display:inline-block;">
                @csrf
                <button type="submit" class="btn btn-{{ $client->banni ? 'warning' : 'danger' }} btn-sm">
                    {{ $client->banni ? 'Débloquer' : 'Bannir' }}
                </button>
            </form>
        </td>
    </tr>
@endforeach
</tbody>

    </table>
  </div>
</div>


    <div id="jetons-content" class="content-section d-none">
      <h2>Jetons</h2>
      <p>Gestion des types de jetons.</p>
    </div>

    <div id="liste-jetons-content" class="content-section d-none">
      <h2>Liste des jetons</h2>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Nom</th>
            <th>Description</th>
            <th>Nombre de jetons</th>
          </tr>
        </thead>
        <tbody>
@foreach($jetons as $jeton)
    <tr>
        <td>{{ $jeton->nom }}</td>
        <td>{{ $jeton->description }}</td>
        <td>{{ $jeton->nombre_de_jetons }}</td>
    </tr>
@endforeach
</tbody>
      </table>
    </div>

    <div id="ajout-jetons-content" class="content-section d-none">
      <h2>Ajout de jetons</h2>
<form id="form-jetons" action="{{ route('jetons.store') }}" method="POST">
    @csrf
        <div id="jetons-container">
          <div class="jeton-group mb-3 d-flex gap-3 flex-wrap">
            <div class="form-group flex-fill">
              <label>Nom</label>
              <input type="text" name="nom[]" class="form-control" />
            </div>
            <div class="form-group flex-fill">
              <label>Description</label>
              <input type="text" name="description[]" class="form-control" />
            </div>
            <div class="form-group flex-fill">
              <label>Nombre de jetons</label>
              <input type="number" name="nombre_de_jetons[]" class="form-control" />
            </div>
            <button type="button" class="btn btn-success btn-action add-jeton">+</button>
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Envoyer</button>
      </form>
    </div>
  </div>

  <script>
    document.addEventListener("DOMContentLoaded", () => {
      const menuLinks = document.querySelectorAll(".menu-link");
      const sections = {
        "Tableau de bord": document.getElementById("dashboard-content"),
        "Modèles": document.getElementById("modeles-content"),
        "Clients": document.getElementById("clients-content"),
        "Achats": document.getElementById("achats-content"), // ✅ ajout
        "Jetons": document.getElementById("jetons-content"),
        "Liste des modeles": document.getElementById("modeles-content"),
        "Ajout modeles": document.getElementById("ajoute-modeles-content"),
        "Liste des jetons": document.getElementById("liste-jetons-content"),
        "Ajout de jetons": document.getElementById("ajout-jetons-content"),
        "Shows privés": document.getElementById("shows-prives-content"),
 "Liste des jetons proposés": document.getElementById("liste-jetons-proposes-content"),
  "Ajout jetons proposés": document.getElementById("ajout-jetons-proposes-content"),
      };

      menuLinks.forEach(link => {
        link.addEventListener("click", function () {
          const label = this.textContent.trim();
          if (this.classList.contains("has-submenu")) {
            const submenu = this.nextElementSibling;
            submenu.classList.toggle("show");
            return;
          }

          menuLinks.forEach(l => l.classList.remove("active"));
          this.classList.add("active");
          Object.values(sections).forEach(section => section.classList.add("d-none"));
          if (sections[label]) {
            sections[label].classList.remove("d-none");
          }
        });
      });

      document.getElementById("jetons-container").addEventListener("click", function (e) {
        if (e.target.classList.contains("add-jeton")) {
          const group = e.target.closest(".jeton-group");
          const clone = group.cloneNode(true);
          clone.querySelectorAll("input").forEach(i => (i.value = ""));
          const btn = clone.querySelector(".add-jeton");
          btn.classList.remove("add-jeton", "btn-success");
          btn.classList.add("btn-danger", "remove-jeton");
          btn.textContent = "X";
          this.appendChild(clone);
        } else if (e.target.classList.contains("remove-jeton")) {
          e.target.closest(".jeton-group").remove();
        }
      });
    });

    // Gestion des photos dynamiques
document.getElementById("photos-container").addEventListener("click", function (e) {
  if (e.target.classList.contains("add-photo")) {
    const group = e.target.closest(".photo-group");
    const clone = group.cloneNode(true);
    clone.querySelector("input").value = "";
    const btn = clone.querySelector(".add-photo");
    btn.classList.remove("add-photo", "btn-success");
    btn.classList.add("btn-danger", "remove-photo");
    btn.textContent = "X";
    this.appendChild(clone);
  } else if (e.target.classList.contains("remove-photo")) {
    e.target.closest(".photo-group").remove();
  }
});

// Afficher une image en grand via modal
document.addEventListener("click", function(e) {
  if (e.target.matches(".zoomable-photo")) {
    const src = e.target.getAttribute("src");
    const modalImg = document.getElementById("modalImage");
    modalImg.src = src;
    const modal = new bootstrap.Modal(document.getElementById("imageModal"));
    modal.show();
  }
});
document.addEventListener("DOMContentLoaded", () => {
  const rows = document.querySelectorAll("#clients-content tbody tr");

  function filterTable() {
    const nom = document.getElementById("filterNom").value.toLowerCase();
    const prenoms = document.getElementById("filterPrenoms").value.toLowerCase();
    const pseudo = document.getElementById("filterPseudo").value.toLowerCase();
    const jetons = document.getElementById("filterJetons").value;
    const date = document.getElementById("filterDate").value;

    rows.forEach(row => {
      const tdNom = row.cells[0].innerText.toLowerCase();
      const tdPrenoms = row.cells[1].innerText.toLowerCase();
      const tdPseudo = row.cells[2].innerText.toLowerCase();
      const tdJetons = row.cells[3].innerText;
      const tdDate = row.cells[6].innerText.split("/").reverse().join("-"); // transforme en yyyy-mm-dd

      let visible = true;

      if (nom && !tdNom.includes(nom)) visible = false;
      if (prenoms && !tdPrenoms.includes(prenoms)) visible = false;
      if (pseudo && !tdPseudo.includes(pseudo)) visible = false;
      if (jetons && tdJetons != jetons) visible = false;
      if (date && tdDate !== date) visible = false;

      row.style.display = visible ? "" : "none";
    });
  }

  // écouteurs sur les inputs
  ["filterNom","filterPrenoms","filterPseudo","filterJetons","filterDate"].forEach(id => {
    document.getElementById(id).addEventListener("input", filterTable);
  });

  // bouton reset
  window.resetFilters = () => {
    ["filterNom","filterPrenoms","filterPseudo","filterJetons","filterDate"].forEach(id => {
      document.getElementById(id).value = "";
    });
    filterTable();
  };
});

function sortTable(colIndex, type = 'string', dir = 'asc') {
  const table = document.querySelector("#clients-content table tbody");
  const rows = Array.from(table.querySelectorAll("tr")).filter(r => r.style.display !== "none");

  rows.sort((a, b) => {
    let A = a.cells[colIndex].innerText.trim();
    let B = b.cells[colIndex].innerText.trim();

    if (type === 'number') {
      A = parseFloat(A) || 0;
      B = parseFloat(B) || 0;
    } else if (type === 'date') {
      A = new Date(A.split("/").reverse().join("-"));
      B = new Date(B.split("/").reverse().join("-"));
    } else {
      A = A.toLowerCase();
      B = B.toLowerCase();
    }

    if (A < B) return dir === 'asc' ? -1 : 1;
    if (A > B) return dir === 'asc' ? 1 : -1;
    return 0;
  });

  rows.forEach(row => table.appendChild(row));
}

document.addEventListener("DOMContentLoaded", () => {
  const showRows = document.querySelectorAll("#shows-prives-content tbody tr");

  function filterShows() {
    const etat = document.getElementById("filterEtat").value.toLowerCase();

    showRows.forEach(row => {
      const tdEtat = row.cells[8].innerText.toLowerCase();
      let visible = true;

      if (etat && tdEtat !== etat) visible = false;

      row.style.display = visible ? "" : "none";
    });
  }

  document.getElementById("filterEtat").addEventListener("change", filterShows);

  window.resetShowFilters = () => {
    document.getElementById("filterEtat").value = "";
    filterShows();
  };
});

  </script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-zoom@2.0.1/dist/chartjs-plugin-zoom.min.js"></script>

<script>
  async function fetchJson(url) {
  const res = await fetch(url, { headers: { 'Accept': 'application/json' } });
  return res.json();
}

// 1. Connexions des modèles
function renderConnectionsChart(ctx, labels, data) {
  return new Chart(ctx, {
    type: 'line',
    data: {
      labels: labels,
      datasets: [{
        label: "Connexions/jour",
        data: data,
        fill: true,
        tension: 0.3,
        pointRadius: 3,
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        tooltip: {
          callbacks: {
            label: ctx => `📈 ${ctx.raw} connexions`
          }
        },
        zoom: {
    pan: { enabled: true, mode: 'x' },
    zoom: { wheel: { enabled: true }, pinch: { enabled: true }, mode: 'x' }
  }
      },
      scales: {
        x: {
          ticks: { autoSkip: false }
        },
        y: { beginAtZero: true }
      }
    }
  });
}


// 2. Jetons achetés
function renderTokensChart(ctx, labels, data) {
  return new Chart(ctx, {
    type: 'line',
    data: {
      labels: labels,
      datasets: [{
        label: "Jetons/jour",
        data: data,
        borderColor: "rgba(75, 192, 192, 1)",
        backgroundColor: "rgba(75, 192, 192, 0.2)",
        fill: true,
        tension: 0.3,
        pointRadius: 3,
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        tooltip: {
          callbacks: {
            label: ctx => `💰 ${ctx.raw} jetons`
          }
        },
        zoom: {
    pan: { enabled: true, mode: 'x' },
    zoom: { wheel: { enabled: true }, pinch: { enabled: true }, mode: 'x' }
  }
      },
      scales: {
        x: { ticks: { autoSkip: false } },
        y: { beginAtZero: true }
      }
    }
  });
}


// 3. Shows privés
// 3. Shows privés avec jetons
function renderShowsChart(ctx, labels, showsData, jetonsData, details) {
  return new Chart(ctx, {
    type: 'line',
    data: {
      labels: labels,
      datasets: [
        {
          label: "Shows/jour",
          data: showsData,
          borderColor: "rgba(255, 99, 132, 1)",
          backgroundColor: "rgba(255, 99, 132, 0.2)",
          fill: true,
          tension: 0.3,
          pointRadius: 3,
          yAxisID: 'y',
        },
        {
          label: "Jetons dépensés",
          data: jetonsData,
          borderColor: "rgba(54, 162, 235, 1)",
          backgroundColor: "rgba(54, 162, 235, 0.2)",
          fill: true,
          tension: 0.3,
          pointRadius: 3,
          yAxisID: 'y1', // deuxième axe Y
        }
      ]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      interaction: { mode: 'index', intersect: false },
      plugins: {
        tooltip: {
          callbacks: {
            label: function(ctx) {
              if(ctx.dataset.label === "Shows/jour") {
                return `🎬 ${ctx.raw} shows`;
              } else if(ctx.dataset.label === "Jetons dépensés") {
                return `💎 ${ctx.raw} jetons`;
              }
            }
          }
        },
        zoom: {
          pan: { enabled: true, mode: 'x' },
          zoom: { wheel: { enabled: true }, pinch: { enabled: true }, mode: 'x' }
        }
      },
      scales: {
        x: { ticks: { autoSkip: false } },
        y: { 
          beginAtZero: true,
          title: { display: true, text: 'Nombre de shows' },
        },
        y1: { 
          beginAtZero: true,
          position: 'right',
          title: { display: true, text: 'Jetons dépensés' },
          grid: { drawOnChartArea: false }
        }
      }
    }
  });
}

// 4. Achats photos
function renderAchatsChart(ctx, labels, data) {
  return new Chart(ctx, {
    type: 'line',
    data: {
      labels: labels,
      datasets: [{
        label: "Jetons dépensés (achats)",
        data: data,
        borderColor: "rgba(255, 206, 86, 1)",
        backgroundColor: "rgba(255, 206, 86, 0.2)",
        fill: true,
        tension: 0.3,
        pointRadius: 3,
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        tooltip: {
          callbacks: { label: ctx => `🛒 ${ctx.raw} jetons` }
        },
        zoom: {
          pan: { enabled: true, mode: 'x' },
          zoom: { wheel: { enabled: true }, pinch: { enabled: true }, mode: 'x' }
        }
      },
      scales: { y: { beginAtZero: true } }
    }
  });
}



  document.addEventListener('DOMContentLoaded', async () => {
  const base = '/admin';

  // Connexions
  const conn = await fetchJson(base + '/api/model-connections?days=30');
  renderConnectionsChart(
    document.getElementById('chart-connections').getContext('2d'),
    conn.labels, conn.data
  );

  // Jetons achetés
  const tokens = await fetchJson(base + '/api/tokens-purchased?days=30');
  renderTokensChart(
    document.getElementById('chart-tokens').getContext('2d'),
    tokens.labels, tokens.data
  );

  // Shows privés
  const shows = await fetchJson(base + '/api/shows-per-day?days=30');
renderShowsChart(
  document.getElementById('chart-shows').getContext('2d'),
  shows.labels,
  shows.data,
  shows.jetons,
  shows.details
);

// Achats
const achats = await fetchJson(base + '/api/achats-par-jour?days=30');
renderAchatsChart(
  document.getElementById('chart-achats').getContext('2d'),
  achats.labels, achats.data
);


});

function openFullscreen(id) {
  const elem = document.getElementById(id);
  if (elem.requestFullscreen) {
    elem.requestFullscreen();
  } else if (elem.webkitRequestFullscreen) { // Safari
    elem.webkitRequestFullscreen();
  } else if (elem.msRequestFullscreen) { // IE11
    elem.msRequestFullscreen();
  }
}
function resetZoom(chartId) {
  const chart = Chart.getChart(chartId);
  if (chart) {
    chart.resetZoom();
  }
}

function panChart(chartId, amount) {
  const chart = Chart.getChart(chartId);
  if (chart) {
    chart.pan({ x: amount }, undefined, 'default');
  }
}

</script>

</div>
</div>
</div>
<footer class="text-center text-muted mt-4" style="color: #ccc !important;">  
  &copy; {{ date('Y') }} Live Beauty. Tous droits réservés.
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/js/all.min.js"></script>
</body>
</html>
