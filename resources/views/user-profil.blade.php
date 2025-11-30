<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil — {{ $user->pseudo }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <style>
        /* -------------------------------
   GLOBAL
--------------------------------*/
body {
    background: #0a0a0a;
    color: #ffffff;
    font-family: "Poppins", sans-serif;
    overflow-x: hidden;
}

/* Effet verre premium */
.glass {
    background: rgba(255, 255, 255, 0.07);
    backdrop-filter: blur(12px);
    border: 1px solid rgba(255, 255, 255, 0.12);
    box-shadow: 0 0 25px rgba(255, 0, 60, 0.15);
    border-radius: 18px;
}

/* Titres premium */
h1, h2, h3, h4 {
    font-weight: 700;
    letter-spacing: 1px;
}

/* -------------------------------
   HEADER PROFILE
--------------------------------*/
.profile-header {
    display: flex;
    align-items: center;
    gap: 25px;
    margin-bottom: 30px;
    padding: 20px;
    border-radius: 20px;
    background: linear-gradient(to right, rgba(255,0,60,0.25), rgba(0,0,0,0.5));
    backdrop-filter: blur(8px);
}

.profile-avatar {
    width: 140px;
    height: 140px;
    border-radius: 50%;
    background: linear-gradient(145deg, #ff003c, #7a001e);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 48px;
    font-weight: bold;
    color: #fff;
    box-shadow: 
        0 0 25px rgba(255,0,60,0.55),
        0 0 60px rgba(255,0,60,0.25);
    border: 3px solid #ff003c;
}

/* -------------------------------
   TOP MENU
--------------------------------*/
.top-menu {
    display: flex;
    gap: 18px;
    margin-bottom: 20px;
}

.top-menu button {
    flex: 1;
    padding: 12px 18px;
    font-size: 1rem;
    font-weight: 600;
    border-radius: 14px;
    border: 2px solid rgba(255,0,60,0.4);
    background: rgba(255,255,255,0.05);
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 12px;
    cursor: pointer;
    transition: 0.25s ease;
}

.top-menu button:hover {
    background: rgba(255,0,60,0.4);
    border-color: #ff003c;
    transform: translateY(-3px);
    box-shadow: 0 0 15px rgba(255,0,60,0.6);
}

.top-menu button.active {
    background: #ff003c;
    border-color: #ffffff;
    box-shadow: 0 0 22px rgba(255,0,60,0.85);
}

/* -------------------------------
   SECTIONS
--------------------------------*/
.section {
    display: none;
    animation: fadeIn .4s ease forwards;
}

.section.active {
    display: block;
}

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

/* -------------------------------
   INFO BLOCK (CARTE PREMIUM)
--------------------------------*/
.info-block {
    padding: 28px;
    margin-top: 20px;
    border-radius: 16px;
    background: rgba(255,255,255,0.05);
    backdrop-filter: blur(8px);
    border: 1px solid rgba(255,255,255,0.12);
    box-shadow: 0 0 30px rgba(255,0,60,0.12);
    transition: 0.3s ease;
}

.info-block:hover {
    transform: translateY(-4px);
    box-shadow: 0 0 40px rgba(255,0,60,0.25);
}

.label {
    font-weight: 700;
    color: #ff335a;
}

/* -------------------------------
   TABLE PREMIUM
--------------------------------*/
.table {
    border-radius: 12px;
    overflow: hidden;
    border: 1px solid rgba(255,255,255,0.15);
}

.table thead {
    background: rgba(255,0,60,0.35);
    color: #fff;
}

.table tbody tr {
    background: rgba(255,255,255,0.03);
    transition: 0.25s ease;
}

.table tbody tr:hover {
    background: rgba(255,0,60,0.22);
}

/* -------------------------------
   FORM PREMIUM
--------------------------------*/
.form-control {
    background: rgba(255,255,255,0.06) !important;
    border: 1px solid rgba(255,255,255,0.18) !important;
    color: #fff !important;
    border-radius: 12px;
}

.form-control:focus {
    border-color: #ff003c !important;
    box-shadow: 0 0 10px rgba(255,0,60,0.5) !important;
}

textarea {
    min-height: 80px;
}

/* -------------------------------
   BUTTONS
--------------------------------*/
.btn-danger {
    background: linear-gradient(135deg, #ff003c, #90001f);
    border: none;
    padding: 12px;
    border-radius: 12px;
    font-weight: 700;
    transition: 0.25s ease;
}

.btn-danger:hover {
    transform: translateY(-3px);
    box-shadow: 0 0 18px rgba(255,0,60,0.6);
}

/* -------------------------------
   BADGES
--------------------------------*/
.badge {
    padding: 7px 10px;
    border-radius: 10px;
}

/* -------------------------------
   RESPONSIVE
--------------------------------*/
@media (max-width: 768px) {

    .profile-header {
        flex-direction: column;
        text-align: center;
        padding: 25px;
    }

    .profile-avatar {
        width: 115px;
        height: 115px;
        font-size: 38px;
    }

    .top-menu {
        flex-direction: column;
        gap: 12px;
    }

    .top-menu button {
        width: 100%;
    }

}
/* ===================================================================
   FIX ULTIME — SELECT SANS FOND BLANC (Chrome, Safari, Android, iOS)
   =================================================================== */
select.form-control,
select {
    background: rgba(255,255,255,0.06) !important;
    color: #fff !important;
    border: 1px solid rgba(255,255,255,0.18) !important;
    border-radius: 12px !important;

    /* Supprime le style natif du navigateur */
    -webkit-appearance: none !important;
    -moz-appearance: none !important;
    appearance: none !important;
}

/* Flèche custom (pour éviter celle blanche d’origine) */
select.form-control {
    background-image: url("data:image/svg+xml;utf8,<svg fill='white' height='14' viewBox='0 0 20 20' width='14' xmlns='http://www.w3.org/2000/svg'><polygon points='0,0 20,0 10,10'/></svg>");
    background-repeat: no-repeat;
    background-position: right 12px center;
    background-size: 12px;
}

/* Option dropdown */
select option {
    background: #111 !important;
    color: #fff !important;
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

        <!-- <button id="btn-settings" onclick="showSection('settings')">
            <i class="fas fa-gear"></i> Paramètres
        </button> -->
    </div>

    <!-- SECTION PROFIL -->
    <div id="profil" class="section active">

        <div class="info-block">
            <p><span class="label">Nom :</span> {{ $user->nom }}</p>
            <p><span class="label">Prénoms :</span> {{ $user->prenoms }}</p>
            <p><span class="label">Âge :</span> {{ $user->age }}</p>
            <p><span class="label">Département :</span> {{ $user->departement }}</p>
            <p><span class="label">Email :</span> {{ $user->email }}</p>
            <p><span class="label">WhatsApp :</span> {{ $user->numero_whatsapp }}</p>
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
        <form action="{{ route('film.store') }}" method="POST">
            @csrf

            <!-- SELECT modèle -->
            <div class="mb-3">
                <label class="label">Modèle :</label>
                <select name="modele_id" class="form-control bg-dark text-white border-secondary" required>
                    <option value="">-- Choisir un modèle --</option>
                    @foreach(\App\Models\Modele::all() as $m)
                        <option value="{{ $m->id }}">{{ $m->pseudo ?? $m->nom }}</option>
                    @endforeach
                </select>
            </div>

            <!-- DETAIL -->

            <div class="mb-3">
                <label class="label">Détail du film :</label>
                <select name="detail" class="form-control bg-dark text-white border-secondary" required>
                    <option value="">-- Choisir un détail prédefinis --</option>
                    @foreach(\App\Models\FilmDescription::all() as $m)
                        <option value="{{ $m->description }}">{{ $m->description ?? $m->description }}</option>
                    @endforeach
                </select>
            </div>

            <!-- MINUTES -->
            <div class="mb-3">
                <label class="label">Minutes :</label>
                <input type="number" name="minutes" id="minutesInput"
                    class="form-control bg-dark text-white border-secondary" min="5" value="5">
            </div>

            <p id="jetonsMessage" class="text-warning fw-bold mt-2">
                5 minutes = 250 jetons
            </p>

            <!-- TYPE ENVOI -->
            <div class="mb-3">
                <label class="label">Type d'envoi :</label>
                <select name="type_envoi" class="form-control bg-dark text-white border-secondary">
                    <option value="whatsapp">Whatsapp</option>
                    <option value="email">Email</option>
                </select>
            </div>

            <button class="btn btn-danger w-100 fw-bold mt-3">
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
                <th>Pseudo </th>
                <th>Email </th>
                <th>Modèle</th>
                <th>Film demandé</th>
                <th>Minutes</th>
                <th>Jetons</th>
                <th>Statut</th>
            </tr>
        </thead>

        <tbody>
            @foreach(\App\Models\Film::where('user_id', $user->id)->latest()->get() as $film)
                <tr>
                    <td>{{ $film->user->pseudo }}</td>
                    <td>{{ $film->user->email }}</td>
                    <td>{{ $film->modele->pseudo ?? $film->modele->nom }}</td>
                    <td>{{ $film->detail }}</td>
                    <td>{{ $film->minutes }}</td>
                    <td>{{ $film->jetons }}</td>
                    <td>
                        @if($film->statut == "en_cours")
                            <span class="badge bg-warning">En cours</span>
                        @elseif($film->statut == "envoye")
                            <span class="badge bg-success">Envoyé</span>
                        @else
                            <span class="badge bg-danger">Terminé</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>

</div>


</div>



    <!-- SECTION PARAMÈTRES
    <div id="settings" class="section">

        <h2 class="fw-bold mb-3" style="color:#ff003c;">
            <i class="fas fa-gear me-2"></i> Paramètres
        </h2>

        <p>Section à configurer ensemble (changement email, mot de passe, notif…)</p>
    </div> -->

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
