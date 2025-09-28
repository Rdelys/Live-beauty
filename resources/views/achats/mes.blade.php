<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Mes photos achetées</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

  <style>
    body {
      background: #121212;
      color: #fff;
      font-family: 'Segoe UI', sans-serif;
    }
    .card {
      background: rgba(255,255,255,0.05);
      backdrop-filter: blur(8px);
      border-radius: 1rem;
      border: 1px solid rgba(255,255,255,0.1);
    }
    .card-header {
      font-weight: bold;
      font-size: 1.2rem;
      color: #ff80ab;
    }
    img, video {
      border-radius: 0.8rem;
      transition: transform .3s ease;
      box-shadow: 0 0 10px rgba(0,0,0,0.4);
    }
    img:hover, video:hover {
      transform: scale(1.05);
    }
  </style>
</head>
<body>

<div class="container py-5">
  <h1 class="mb-4 text-center">
    <i class="fas fa-image me-2"></i> Mes photos achetées
  </h1>

  @forelse($groupes as $modeleId => $achats)
    @php 
        $modele = $achats->first()->modele; 
        $global = $achats->where('type', 'global')->count() > 0;

        // ✅ Convertir en tableau pour éviter foreach sur string
        $photos = is_array($modele->photos) ? $modele->photos : json_decode($modele->photos, true) ?? [];
        $videosFile = is_array($modele->video_file) ? $modele->video_file : json_decode($modele->video_file, true) ?? [];
        $videosLink = is_array($modele->video_link) ? $modele->video_link : json_decode($modele->video_link, true) ?? [];
    @endphp

    <div class="card mb-5 shadow-lg">
      <div class="card-header">
        📸 {{ $modele->prenom }}
      </div>
      <div class="card-body">
        <div class="row g-3">

          @if($global)
            {{-- ✅ Tout le contenu débloqué --}}
            @foreach($photos as $photo)
              <div class="col-md-3">
                <img src="{{ asset('storage/' . $photo) }}" class="img-fluid">
              </div>
            @endforeach

            @foreach($videosFile as $video)
              <div class="col-md-4">
                <video src="{{ asset('storage/' . $video) }}" controls class="w-100"></video>
              </div>
            @endforeach

            @foreach($videosLink as $link)
              <div class="col-md-4">
                <video src="{{ $link }}" controls class="w-100"></video>
              </div>
            @endforeach

          @else
            {{-- ✅ Seulement les photos achetées en détail --}}
            @foreach($achats as $achat)
              @if($achat->type === 'detail' && $achat->photo_path)
                <div class="col-md-3">
                  <img src="{{ asset('storage/' . $achat->photo_path) }}" class="img-fluid">
                </div>
              @endif
            @endforeach
          @endif

        </div>
      </div>
    </div>

  @empty
    <div class="alert alert-info text-center">
      Vous n’avez encore acheté aucune photo.
    </div>
  @endforelse
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
