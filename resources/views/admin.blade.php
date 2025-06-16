<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Admin - Live Beauty</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            display: flex;
            font-family: Arial, sans-serif;
        }
        .sidebar {
            width: 220px;
            background-color: #f8f9fa;
            padding: 1rem;
            border-right: 1px solid #dee2e6;
            height: 100vh;
            position: fixed;
        }
        .sidebar a {
            display: block;
            padding: 0.75rem 1rem;
            margin-bottom: 0.5rem;
            color: #333;
            text-decoration: none;
            border-radius: 0.375rem;
        }
        .sidebar a:hover, .sidebar a.active {
            background-color: #e83e8c;
            color: white;
        }
        .content {
            margin-left: 220px;
            padding: 2rem;
            flex-grow: 1;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h5 class="mb-4 text-center">Admin</h5>
        <a href="#" class="active">Tableau de bord</a>
        <a href="#">Modèles</a>
        <a href="#">Clients</a>
    </div>
    <div class="content">
        <div id="dashboard-content" class="content-section">
            <h2>Tableau de bord</h2>
            <p>Bienvenue dans l'espace d'administration de Live Beauty.</p>
        </div>

        <div id="modeles-content" class="content-section d-none">
            <h2>Modèles</h2>
            <p>Voici la section des modèles disponibles.</p>
        </div>

        <div id="clients-content" class="content-section d-none">
            <h2>Clients</h2>
            <p>Liste des clients et informations associées.</p>
        </div>
    </div>
</body>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const links = document.querySelectorAll(".sidebar a");
        const sections = {
            "Tableau de bord": document.getElementById("dashboard-content"),
            "Modèles": document.getElementById("modeles-content"),
            "Clients": document.getElementById("clients-content")
        };

        links.forEach(link => {
            link.addEventListener("click", function (e) {
                e.preventDefault();

                // Activer le lien sélectionné
                links.forEach(l => l.classList.remove("active"));
                this.classList.add("active");

                // Afficher la bonne section
                Object.values(sections).forEach(section => section.classList.add("d-none"));
                const selected = this.textContent.trim();
                if (sections[selected]) {
                    sections[selected].classList.remove("d-none");
                }
            });
        });
    });
</script>

</html>
