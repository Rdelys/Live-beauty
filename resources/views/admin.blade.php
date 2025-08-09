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
  <div class="sidebar">
    <h5><i class="fas fa-user-shield"></i> Admin Panel</h5>
    <a class="menu-link active"><i class="fas fa-tachometer-alt"></i> Tableau de bord</a>

    <a class="menu-link has-submenu"><i class="fas fa-images"></i> Modèles</a>
    <div class="submenu">
      <a class="menu-link"><i class="fas fa-list"></i> Liste des modeles</a>
      <a class="menu-link"><i class="fas fa-plus"></i> Ajout modeles</a>
    </div>

    <a class="menu-link"><i class="fas fa-users"></i> Clients</a>

    <a class="menu-link has-submenu"><i class="fas fa-coins"></i> Jetons</a>
    <div class="submenu">
      <a class="menu-link"><i class="fas fa-list-ul"></i> Liste des jetons</a>
      <a class="menu-link"><i class="fas fa-plus-circle"></i> Ajout de jetons</a>
    </div>
  </div>

  <div class="content">
    <div id="dashboard-content" class="content-section">
  <h2>Tableau de bord</h2>
  <p>Bienvenue dans l'espace d'administration de Live Beauty.</p>

  <!-- Cards displaying the count of models and tokens -->
  <div class="row">
    <!-- Card for Nombre de Modèles -->
    <div class="col-md-6 col-lg-4">
      <div class="card bg-dark text-white">
        <div class="card-body">
          <h5 class="card-title">Nombre de Modèles</h5>
          <p class="card-text">{{ $nombreDeModeles }}</p>
        </div>
      </div>
    </div>

    <!-- Card for Nombre de Jetons -->
    <div class="col-md-6 col-lg-4">
      <div class="card bg-dark text-white">
        <div class="card-body">
          <h5 class="card-title">Nombre de Jetons</h5>
          <p class="card-text">{{ $nombreDeJetons }}</p>
        </div>
      </div>
    </div>

    <!-- Card pour Nombre de Clients -->
<div class="col-md-6 col-lg-4">
  <div class="card bg-dark text-white">
    <div class="card-body">
      <h5 class="card-title">Nombre de Clients</h5>
      <p class="card-text">{{ $nombreDeClients }}</p>
    </div>
  </div>
</div>

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
            @if($modele->video_file)
              <video width="100" controls>
                <source src="{{ asset('storage/' . $modele->video_file) }}" type="video/mp4">
              </video>
            @elseif($modele->video_link)
              <a href="{{ $modele->video_link }}" target="_blank">Lien vidéo</a>
            @else
              Aucune
            @endif
          </td>
          <td>
  @if($modele->photos)
    @php
      $photos = is_string($modele->photos) ? json_decode($modele->photos, true) : $modele->photos;
    @endphp

    @if(!empty($photos))
      @foreach($photos as $photo)
        <img src="{{ asset('storage/' . $photo) }}" width="50" class="me-1 mb-1 rounded zoomable-photo" />
      @endforeach
    @else
      Aucune photo
    @endif

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

  <div class="mb-3">
    <label for="video_link" class="form-label">Lien vidéo (optionnel)</label>
    <input type="url" class="form-control" id="video_link" name="video_link" placeholder="https://..." />
  </div>

  <div class="mb-3">
    <label for="video_file" class="form-label">Fichier vidéo (MP4, WebM, Ogg)</label>
    <input type="file" class="form-control" id="video_file" name="video_file" accept="video/mp4,video/webm,video/ogg" />
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

    <div id="clients-content" class="content-section d-none">
  <h2>Clients</h2>
  <p>Liste des clients enregistrés avec leur nombre de jetons.</p>

  <div class="table-responsive">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Nom</th>
          <th>Prénoms</th>
          <th>Pseudo</th>
          <th>Jetons</th>
          <th>Date de création</th>
        </tr>
      </thead>
      <tbody>
        @foreach($clients as $client)
          <tr>
            <td>{{ $client->nom }}</td>
            <td>{{ $client->prenoms }}</td>
            <td>{{ $client->pseudo }}</td>
            <td>{{ $client->jetons }}</td>
            <td>{{ $client->created_at->format('d/m/Y') }}</td>
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
        "Jetons": document.getElementById("jetons-content"),
        "Liste des modeles": document.getElementById("modeles-content"),
        "Ajout modeles": document.getElementById("ajoute-modeles-content"),
        "Liste des jetons": document.getElementById("liste-jetons-content"),
        "Ajout de jetons": document.getElementById("ajout-jetons-content"),
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

  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</div>
</div>
</div>
<footer class="text-center text-muted mt-4">  
  &copy; 2023 Live Beauty. Tous droits réservés.
</footer>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/js/all.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/js/all.min.js"></script>
<script>    

</body>
</html>
