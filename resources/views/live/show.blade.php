<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Live de {{ $modele->prenom }}</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background: #141414;
      color: white;
      font-family: Arial, sans-serif;
      text-align: center;
      padding: 2rem;
    }

    .live-container {
      max-width: 800px;
      margin: 0 auto;
    }

    video {
      width: 100%;
      max-height: 500px;
      border-radius: 15px;
      border: 3px solid #ff4d4d;
    }

    .badge-live {
      background-color: red;
      padding: 5px 15px;
      color: white;
      font-weight: bold;
      border-radius: 50px;
      display: inline-block;
      margin-top: 10px;
      animation: pulse 1s infinite;
    }

    @keyframes pulse {
      0% { box-shadow: 0 0 0 0 rgba(255, 0, 0, 0.7); }
      70% { box-shadow: 0 0 0 10px rgba(255, 0, 0, 0); }
      100% { box-shadow: 0 0 0 0 rgba(255, 0, 0, 0); }
    }
  </style>
</head>
<body>
  <div class="live-container">
    <h2>{{ $modele->prenom }} est en Live 🎥</h2>
    <div class="badge-live">🔴 EN DIRECT</div>

    <!-- Affichage de la webcam en direct -->
    <video id="liveVideo" autoplay playsinline muted></video>

    <p class="mt-4">{{ $modele->description }}</p>
  </div>

  <script>
    async function startLiveView() {
      try {
        const stream = await navigator.mediaDevices.getUserMedia({ video: true, audio: true });
        document.getElementById('liveVideo').srcObject = stream;
      } catch (err) {
        console.error("Erreur lors de l'accès à la webcam :", err);
        alert("Impossible d'accéder à la caméra.");
      }
    }

    startLiveView();
  </script>
</body>
</html>
