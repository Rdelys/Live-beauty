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
    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background-color: #121212;
      color: #fff;
      display: flex;
      min-height: 100vh;
    }

    .sidebar {
      width: 240px;
      background-color: #1a1a1a;
      padding: 1rem;
      position: fixed;
      height: 100vh;
      overflow-y: auto;
      border-right: 1px solid #333;
      transition: all 0.3s ease;
    }

    .sidebar h5 {
      text-align: center;
      margin-bottom: 2rem;
      font-weight: bold;
      color: #e53935;
    }

    .sidebar a {
      display: flex;
      align-items: center;
      gap: 10px;
      padding: 0.75rem 1rem;
      margin-bottom: 0.5rem;
      color: #ccc;
      text-decoration: none;
      border-radius: 8px;
      transition: background 0.3s ease, transform 0.2s ease;
      cursor: pointer;
    }

    .sidebar a:hover {
      background-color: #e53935;
      color: white;
      transform: translateX(5px);
    }

    .sidebar a.active {
      background-color: #e53935;
      color: white;
    }

    .submenu {
      max-height: 0;
      overflow: hidden;
      transition: max-height 0.4s ease-in-out;
      padding-left: 1rem;
    }

    .submenu.show {
      max-height: 200px;
    }

    .submenu a {
      background-color: #2a2a2a;
      margin-bottom: 0.25rem;
    }

    .content {
      margin-left: 240px;
      padding: 2rem;
      flex-grow: 1;
      animation: fadeIn 0.6s ease;
    }

    .content h2 {
      color: #e53935;
    }

    .table {
      color: #fff;
      background-color: #222;
      border-color: #444;
    }

    .table thead {
      background-color: #e53935;
    }

    .btn-primary {
      background-color: #e53935;
      border: none;
    }

    .btn-primary:hover {
      background-color: #d32f2f;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(10px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @media (max-width: 768px) {
      .sidebar {
        position: relative;
        width: 100%;
        height: auto;
      }
      .content {
        margin-left: 0;
      }
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
    </div>

    <div id="modeles-content" class="content-section d-none">
      <h2>Modèles</h2>
      <p>Section dédiée aux modèles disponibles.</p>
    </div>

    <div id="clients-content" class="content-section d-none">
      <h2>Clients</h2>
      <p>Liste des clients enregistrés.</p>
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
            <th>Prix</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Jeton Or</td>
            <td>Accès premium complet</td>
            <td>100€</td>
          </tr>
          <tr>
            <td>Jeton Argent</td>
            <td>Accès standard</td>
            <td>50€</td>
          </tr>
        </tbody>
      </table>
    </div>

    <div id="ajout-jetons-content" class="content-section d-none">
      <h2>Ajout de jetons</h2>
      <form id="form-jetons">
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
              <label>Prix (€)</label>
              <input type="number" name="prix[]" class="form-control" />
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
        "Ajout modeles": document.getElementById("modeles-content"),
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

      document.getElementById("form-jetons").addEventListener("submit", e => {
        e.preventDefault();
        alert("Jetons ajoutés !");
      });
    });
  </script>
</body>
</html>
