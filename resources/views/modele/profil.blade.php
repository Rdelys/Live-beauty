<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Profil Modèle</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(to right, #141e30, #243b55);
      color: #fff;
      font-family: 'Poppins', sans-serif;
      min-height: 100vh;
    }

    .container {
      max-width: 800px;
      margin: auto;
      padding: 20px;
    }

    h2 {
      font-weight: 600;
    }

    .nav-tabs {
      border: none;
      justify-content: center;
      margin-top: 30px;
    }

    .nav-tabs .nav-link {
      border: none;
      border-radius: 50px;
      padding: 10px 20px;
      color: #fff;
      background-color: rgba(255, 255, 255, 0.1);
      margin: 0 5px;
      transition: all 0.3s ease-in-out;
    }

    .nav-tabs .nav-link.active {
      background-color: #f44336;
      color: #fff;
    }

    .tab-content {
      background-color: rgba(255, 255, 255, 0.05);
      backdrop-filter: blur(10px);
      padding: 30px;
      border-radius: 15px;
      margin-top: 20px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.3);
      animation: fadeIn 0.5s ease-in-out;
    }

    .btn-logout {
      background-color: #f44336;
      border: none;
      color: white;
      font-weight: 600;
      padding: 10px 20px;
      border-radius: 50px;
      transition: background-color 0.3s;
    }

    .btn-logout:hover {
      background-color: #d32f2f;
    }

    @keyframes fadeIn {
      from {opacity: 0; transform: translateY(10px);}
      to {opacity: 1; transform: translateY(0);}
    }

    @media (max-width: 576px) {
      .nav-tabs .nav-link {
        padding: 8px 12px;
        font-size: 0.9rem;
      }
    }
  </style>
</head>
<body>

  <div class="container text-center">
    <h2 class="text-danger">Bonjour, {{ $modele->prenom }}</h2>

    <ul class="nav nav-tabs" id="profilTab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="profil-tab" data-bs-toggle="tab" data-bs-target="#profil" type="button" role="tab">Profil</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="workspace-tab" data-bs-toggle="tab" data-bs-target="#workspace" type="button" role="tab">WorkSpace</button>
      </li>
    </ul>

    <div class="tab-content" id="profilTabContent">
      <div class="tab-pane fade show active text-start" id="profil" role="tabpanel">
        <p><strong>Nom :</strong> {{ $modele->nom }}</p>
        <p><strong>Email :</strong> {{ $modele->email }}</p>
        <p><strong>Description :</strong> {{ $modele->description }}</p>
      </div>
      <div class="tab-pane fade text-start" id="workspace" role="tabpanel">
  <h5 class="text-white mb-3">🎥 Lancer une session Live Sexy Cam</h5>
  <button class="btn btn-danger mb-2" id="startLiveBtn">Démarrer le Live</button>
  <button class="btn btn-secondary mb-2" id="stopLiveBtn" style="display: none;">Arrêter le Live</button>

  <div id="liveSection" style="display: none;">
    <video id="liveVideo" autoplay muted playsinline class="w-100 rounded border border-light" style="max-height: 400px;"></video>
    <p class="mt-2 text-warning">🔴 En direct - Visible par tous les utilisateurs connectés</p>
  </div>
</div>


    </div>

    <form action="{{ route('modele.logout') }}" method="POST" class="mt-4">
      @csrf
      <button type="submit" class="btn btn-logout">Déconnexion</button>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
const startBtn = document.getElementById('startLiveBtn');
const stopBtn = document.getElementById('stopLiveBtn');
const liveVideo = document.getElementById('liveVideo');
const liveSection = document.getElementById('liveSection');
let mediaStream;

startBtn.addEventListener('click', async () => {
  try {
    mediaStream = await navigator.mediaDevices.getUserMedia({ video: true, audio: true });
    liveVideo.srcObject = mediaStream;
    liveSection.style.display = 'block';
    startBtn.style.display = 'none';
    stopBtn.style.display = 'inline-block';

    // Notifier Laravel que le live démarre
    await fetch('http://localhost:8000/api/live/start', {
      method: 'POST',
      headers: {
        'X-CSRF-TOKEN': '{{ csrf_token() }}',
        'Accept': 'application/json',
        'Content-Type': 'application/json'
      }
    });

    console.log('Live lancé.');
  } catch (error) {
    alert("Erreur caméra : " + error.message);
  }
});

stopBtn.addEventListener('click', async () => {
  if (mediaStream) {
    mediaStream.getTracks().forEach(track => track.stop());
  }

  liveVideo.srcObject = null;
  liveSection.style.display = 'none';
  startBtn.style.display = 'inline-block';
  stopBtn.style.display = 'none';

  // Notifier Laravel que le live s’arrête
  await fetch('http://localhost:8000/api/live/stop', {
    method: 'POST',
    headers: {
      'X-CSRF-TOKEN': '{{ csrf_token() }}',
      'Accept': 'application/json',
      'Content-Type': 'application/json'
    }
  });

  console.log('Live arrêté.');
});
</script>




</body>
</html>
