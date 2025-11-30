<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil — {{ $user->pseudo }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background: #000;
            color: #fff;
            font-family: "Poppins", sans-serif;
            overflow-x: hidden;
        }

        /* --- HEADER DU PROFIL --- */
        .profile-header {
            display: flex;
            align-items: center;
            gap: 25px;
            margin-bottom: 25px;
        }

        .profile-avatar {
            width: 130px;
            height: 130px;
            border-radius: 50%;
            background: linear-gradient(145deg, #ff1a1a, #b30000);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 45px;
            font-weight: bold;
            color: #fff;
            box-shadow: 0 0 20px rgba(255,0,0,0.4);
        }

        /* --- TOP MENU --- */
        .top-menu {
            display: flex;
            gap: 20px;
            margin-top: 15px;
        }

        .top-menu button {
            background: rgba(255,255,255,0.05);
            border: 2px solid rgba(255,0,0,0.4);
            color: #fff;
            padding: 10px 18px;
            font-size: 0.95rem;
            border-radius: 12px;
            display: flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
            transition: all .25s ease;
        }

        .top-menu button i {
            font-size: 1.1rem;
        }

        .top-menu button:hover {
            background: rgba(255,0,0,0.3);
            border-color: #ff1a1a;
            box-shadow: 0 0 15px rgba(255,0,0,0.5);
            transform: translateY(-2px);
        }

        .top-menu button.active {
            background: #ff1a1a;
            border-color: #fff;
            color: #fff;
            box-shadow: 0 0 20px rgba(255,0,0,0.7);
        }

        /* --- CONTENT AREA --- */
        .section {
            display: none;
            animation: fadeIn .35s ease;
        }

        .section.active {
            display: block;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        /* --- BLOCK INFO --- */
        .info-block {
            padding: 25px;
            border-radius: 15px;
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.07);
            margin-top: 20px;
        }

        .label {
            font-weight: 600;
            color: #ff4d4d;
        }

        @media(max-width: 768px) {
            .profile-header {
                flex-direction: column;
                text-align: center;
            }

            .top-menu {
                flex-direction: column;
                width: 100%;
            }

            .top-menu button {
                width: 100%;
                justify-content: center;
            }
        }
    </style>

    <script>
        function showSection(section) {
            document.querySelectorAll('.section').forEach(s => s.classList.remove('active'));
            document.getElementById(section).classList.add('active');

            document.querySelectorAll('.top-menu button').forEach(btn => btn.classList.remove('active'));
            document.getElementById("btn-" + section).classList.add('active');
        }
    </script>

</head>

<body>

<div class="container py-4">

    <!-- HEADER PROFIL -->
    <div class="profile-header">
        <div class="profile-avatar">
            {{ strtoupper(substr($user->pseudo,0,1)) }}
        </div>

        <div>
            <h2 class="fw-bold" style="color:#ff003c">{{ $user->pseudo }}</h2>
            <p>Compte Premium</p>
        </div>
    </div>

    <!-- TOP MENU PREMIUM -->
    <div class="top-menu">
        <button id="btn-profil" class="active" onclick="showSection('profil')">
            <i class="fas fa-user-circle"></i> Profil
        </button>

        <button id="btn-film" onclick="showSection('film')">
            <i class="fas fa-film"></i> Demande Film
        </button>

        <button id="btn-settings" onclick="showSection('settings')">
            <i class="fas fa-gear"></i> Paramètres
        </button>
    </div>

    <!-- SECTION PROFIL -->
    <div id="profil" class="section active">

        <div class="info-block">
            <p><span class="label">Nom :</span> {{ $user->nom }}</p>
            <p><span class="label">Prénoms :</span> {{ $user->prenoms }}</p>
            <p><span class="label">Âge :</span> {{ $user->age }}</p>
            <p><span class="label">Département :</span> {{ $user->departement }}</p>
            <p><span class="label">Email :</span> {{ $user->email }}</p>
            <p><span class="label">Jetons :</span> <i class="fas fa-coins text-warning"></i> {{ $user->jetons }}</p>
        </div>

    </div>

<!-- SECTION DEMANDE FILM -->
<div id="film" class="section">

    <h2 class="fw-bold mb-3" style="color:#ff003c;">
        <i class="fas fa-film me-2"></i> Demande Film
    </h2>

    <div class="info-block">

        <!-- FORMULAIRE -->
        <form>

            <!-- NOM DU MODÈLE -->
            <div class="mb-3">
                <label class="label">Nom du modèle :</label>
                <input type="text" class="form-control bg-dark text-white border-secondary" placeholder="Ex : Sofia / Liza / Chloé...">
            </div>

            <!-- DETAIL DU FILM -->
            <div class="mb-3">
                <label class="label">Détail du film demandé :</label>
                <textarea class="form-control bg-dark text-white border-secondary" rows="3" placeholder="Décris ton film..."></textarea>
            </div>

            <!-- MINUTES (MANUEL) -->
            <div class="mb-3">
                <label class="label">Nombre de minutes :</label>
                <input type="number" id="minutesInput" class="form-control bg-dark text-white border-secondary" min="5" value="5">
            </div>

            <!-- MESSAGE JETONS -->
            <p id="jetonsMessage" class="text-warning fw-bold mt-2">
                5 minutes = 250 jetons
            </p>

            <!-- TYPE D'ENVOI -->
            <div class="mb-3">
                <label class="label">Type d'envoi de la vidéo :</label>

                <select class="form-control bg-dark text-white border-secondary">
                    <option value="whatsapp">Whatsapp</option>
                    <option value="email">Email</option>
                </select>
            </div>

            <!-- BOUTON ENVOYER -->
            <button type="button" class="btn btn-danger w-100 fw-bold mt-3">
                <i class="fas fa-paper-plane me-2"></i> Envoyer la demande
            </button>

        </form>
    </div>

    <!-- LISTE DES DEMANDES (STATIQUE) -->
    <h4 class="mt-4 mb-3" style="color:#ff003c;">Historique des demandes</h4>

    <div class="info-block">

    <table class="table table-dark table-bordered align-middle">
        <thead>
            <tr>
                <th>Pseudo client</th>
                <th>Email client</th>
                <th>Modèle</th>
                <th>Film demandé</th>
                <th>Minutes</th>
                <th>Jetons</th>
                <th>Statut</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td>Petit</td>
                <td>petit@gmail.com</td>
                <td>Sofia</td>
                <td>Vidéo danse sensuelle</td>
                <td>10</td>
                <td>350</td>
                <td><span class="badge bg-warning">En cours</span></td>
            </tr>

            <tr>
                <td>Petit</td>
                <td>petit@gmail.com</td>
                <td>Liza</td>
                <td>Film cosplay sexy</td>
                <td>15</td>
                <td>450</td>
                <td><span class="badge bg-success">Envoyé</span></td>
            </tr>

            <tr>
                <td>Petit</td>
                <td>petit@gmail.com</td>
                <td>Chloé</td>
                <td>Vidéo POV romantique</td>
                <td>20</td>
                <td>550</td>
                <td><span class="badge bg-danger">Terminé</span></td>
            </tr>
        </tbody>
    </table>

</div>


</div>



    <!-- SECTION PARAMÈTRES -->
    <div id="settings" class="section">

        <h2 class="fw-bold mb-3" style="color:#ff003c;">
            <i class="fas fa-gear me-2"></i> Paramètres
        </h2>

        <p>Section à configurer ensemble (changement email, mot de passe, notif…)</p>
    </div>

</div>
<script>
    const minutesInput = document.getElementById('minutesInput');
    const jetonsMessage = document.getElementById('jetonsMessage');

    minutesInput.addEventListener('input', () => {
        let minutes = parseInt(minutesInput.value);

        if (minutes < 5) {
            minutesInput.value = 5;
            minutes = 5;
        }

        let extraMinutes = minutes - 5;
        let jetons = 250 + (extraMinutes * 20);

        jetonsMessage.textContent = `${minutes} minutes = ${jetons} jetons`;
    });
</script>


</body>
</html>
