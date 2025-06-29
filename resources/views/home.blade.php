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
            background-color: #1f1f1f;
            border-radius: 15px;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: pointer;
        }

        .model-card:hover {
            transform: scale(1.05);
            box-shadow: 0 0 20px rgba(255, 0, 0, 0.5);
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
                    <button class="btn btn-light me-2">Connexion</button>
                    <button class="btn btn-warning">Inscription GRATUITE</button>
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

                <!-- Boutons Fille -->
                <button class="btn btn-genre" onclick="afficherCartes('fille')">Filles</button>

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

                    <!-- Cartes Fille -->
                    <div class="col-md-4 card-item fille">
                        <div class="position-relative model-card">
                            <span class="vip-badge">VIP</span>
                            <img src="https://image.made-in-china.com/202f0j00YaMRCnjBLJrS/Push-up-Solid-Bikini-Sexy-Swimsuit-Australia-Sexy-Girl.webp" alt="Fille 1">
                            <div class="model-name">KaylinJann</div>
                        </div>
                    </div>

                    <div class="col-md-4 card-item fille">
                        <div class="position-relative model-card">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQI4wym7GCF2DQBOtarofNNHw7azpMx_A28RA&s" alt="Fille 2">
                            <div class="model-name">Yasmina</div>
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
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
