<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Live de {{ $modele->prenom }}</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background: linear-gradient(135deg, #1e1e1e, #2a2a2a);
      color: #fff;
      font-family: 'Segoe UI', sans-serif;
      padding: 2rem 1rem;
    }

    .container-live {
      max-width: 1300px;
      margin: auto;
      display: flex;
      flex-wrap: wrap;
      gap: 2rem;
    }

    .left-live {
      flex: 2;
      background-color: #212121;
      border-radius: 12px;
      padding: 2rem;
      min-width: 320px;
    }

    .right-jetons {
      flex: 1;
      background-color: #212121;
      border-radius: 12px;
      padding: 2rem;
      min-width: 280px;
    }

    video {
      width: 100%;
      max-height: 620px;
      border: 4px solid #e53935;
      border-radius: 12px;
    }

    .badge-live {
      background-color: #e53935;
      padding: 8px 18px;
      color: white;
      font-weight: bold;
      border-radius: 20px;
      display: inline-block;
      margin: 1rem 0;
      font-size: 1rem;
      animation: pulse 1.2s infinite;
    }

    @keyframes pulse {
      0% { opacity: 1; }
      50% { opacity: 0.5; }
      100% { opacity: 1; }
    }

    /* Jetons style premium */
    .jeton-card {
      background: linear-gradient(145deg, #2f2f2f, #1f1f1f);
      border: 1px solid #444;
      border-radius: 16px;
      padding: 1rem 1.2rem;
      margin-bottom: 1.2rem;
      display: flex;
      justify-content: space-between;
      align-items: center;
      transition: transform 0.2s ease;
    }

    .jeton-card:hover {
      transform: scale(1.02);
    }

    .jeton-info {
      display: flex;
      flex-direction: column;
      gap: 4px;
    }

    .jeton-name {
      font-size: 1.1rem;
      font-weight: bold;
      color: #f8f8f8;
    }

    .jeton-desc {
      font-size: 0.85rem;
      color: #ccc;
    }

    .jeton-btn {
      background-color: #ff1744;
      color: #fff;
      border: none;
      border-radius: 8px;
      padding: 0.5rem 1rem;
      font-weight: 600;
      font-size: 0.95rem;
    }

    .jeton-btn:hover {
      background-color: #d50000;
    }

    .jeton-btn:disabled {
      background-color: #666;
      cursor: not-allowed;
    }

    @media (max-width: 768px) {
      .container-live {
        flex-direction: column;
      }

      .left-live, .right-jetons {
        padding: 1.5rem;
      }
    }
  </style>
</head>
<body>
  <div class="container-live">

    <!-- LIVE Section -->
    <div class="left-live">
      <h2>{{ $modele->prenom }} est en Live 🎥</h2>
      <div class="badge-live">🔴 EN DIRECT</div>
      <video id="liveVideo" autoplay playsinline muted></video>
      <p class="mt-3">{{ $modele->description }}</p>
    </div>

    <!-- Jetons Section -->
    <div class="right-jetons">
      <h4 class="mb-4">💎 Choisis ton action avec des jetons</h4>
      @foreach($jetons as $jeton)
  <div class="jeton-card">
    <div class="jeton-info">
      <span class="jeton-name">{{ $jeton->nom }}</span>
      <span class="jeton-desc">{{ $jeton->description }}</span>
    </div>
    <button 
      class="jeton-btn"
      {{ !$modele->en_ligne || !Auth::check() ? 'disabled' : '' }}>
      {{ $jeton->prix }} € 💠
    </button>
  </div>
@endforeach

@if(!Auth::check())
  <div class="text-warning mt-2 small">🔒 Connecte-toi pour utiliser des jetons.</div>
@endif

    </div>

  </div>

  <script>
    async function startLiveView() {
      try {
        const stream = await navigator.mediaDevices.getUserMedia({ video: true, audio: false });
        document.getElementById('liveVideo').srcObject = stream;
      } catch (err) {
        console.error("Erreur caméra :", err);
        alert("Impossible d'accéder à la webcam.");
      }
    }

    startLiveView();
  </script>
</body>
</html>
