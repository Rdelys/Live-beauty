<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Live de {{ $modele->prenom }}</title>
  <meta name="robots" content="noindex, nofollow">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #000;
      color: white;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      flex-direction: column;
    }
    video {
      max-width: 90%;
      border: 4px solid red;
      border-radius: 10px;
    }
  </style>
</head>
<body>
  <h2>🎥 Live de {{ $modele->prenom }}</h2>
  <video id="viewer" autoplay playsinline controls></video>

  <div id="limitMsg" class="mt-4 text-warning" style="display: none;">
    ⏳ Temps écoulé. Créez un compte ou connectez-vous pour continuer à regarder !
  </div>

  <script>
    const video = document.getElementById('viewer');
    const limitMsg = document.getElementById('limitMsg');

    // Test : flux fictif — à remplacer par une vraie source WebRTC ou hls.js
    video.src = 'https://test-streams.mux.dev/x36xhzz/x36xhzz.m3u8'; // Exemple test

    @guest
      // Si non connecté : bloquer après 2 minutes
      setTimeout(() => {
        video.pause();
        video.src = "";
        limitMsg.style.display = 'block';
      }, 2 * 60 * 1000); // 2 minutes
    @endguest
  </script>
</body>
</html>
