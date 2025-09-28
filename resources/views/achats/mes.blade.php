<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Mes photos achetées</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css" rel="stylesheet">

  <style>
    body {
      background: #121212;
      color: #fff;
      font-family: 'Segoe UI', sans-serif;
      margin: 0;
      padding: 0;
    }

    /* Header fixe */
    .header-fixed {
      position: sticky;
      top: 0;
      z-index: 1000;
      background: #121212;
      padding: 15px 0;
      backdrop-filter: blur(10px);
      border-bottom: 1px solid rgba(255,255,255,0.1);
      text-align: center;
    }

    .header-fixed h1 {
      margin: 0 0 10px;
      font-weight: 700;
      color: #ff80ab;
    }

    /* Select moderne */
    .filter-select {
      max-width: 250px;
      margin: 0 auto;
      display: block;
      background: rgba(255, 255, 255, 0.1);
      color: #fff;
      border: 1px solid rgba(255,255,255,0.3);
      padding: 8px 15px;
      border-radius: 25px;
      font-weight: 500;
      font-size: 1rem;
      cursor: pointer;
      transition: all 0.3s ease;
      appearance: none;
      -webkit-appearance: none;
      -moz-appearance: none;
      text-align: center;
    }

    .filter-select:hover {
      background: rgba(255, 255, 255, 0.15);
      box-shadow: 0 0 10px rgba(255,255,255,0.3);
    }

    .filter-select option {
      background: #121212;
      color: #fff;
    }

    .filter-select:focus {
      outline: none;
      border-color: #ff80ab;
      box-shadow: 0 0 10px rgba(255,128,171,0.5);
    }

    /* Galerie scrollable */
    .gallery-container {
      padding: 20px;
      height: calc(100vh - 120px); /* hauteur restante après header */
      overflow-y: auto;
    }

    /* Grid 4 colonnes */
    .gallery-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
      gap: 15px;
    }

    .gallery-item {
      position: relative;
      overflow: hidden;
      border-radius: 1rem;
      cursor: pointer;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      background: rgba(255,255,255,0.05);
      backdrop-filter: blur(6px);
    }

    .gallery-item:hover {
      transform: scale(1.05);
      box-shadow: 0 0 20px rgba(255,128,171,0.5);
    }

    .gallery-item img,
    .gallery-item video {
      width: 100%;
      height: 100%;
      object-fit: cover;
      border-radius: 1rem;
      display: block;
    }
  </style>
</head>
<body>

<div class="header-fixed">
  <h1><i class="fas fa-image me-2"></i> Mes photos achetées</h1>
  {{-- Filtre par modèle --}}
  <select id="modelFilter" class="filter-select">
    <option value="all">Tous les modèles</option>
    @foreach($groupes as $modeleId => $achats)
      @php $modele = $achats->first()->modele; @endphp
      <option value="modele-{{ $modele->id }}">{{ $modele->prenom }}</option>
    @endforeach
  </select>
</div>

<div class="gallery-container">
  <div class="gallery-grid" id="gallery">
    @forelse($groupes as $modeleId => $achats)
      @php 
          $modele = $achats->first()->modele; 
          $global = $achats->where('type', 'global')->count() > 0;
          $photos = is_array($modele->photos) ? $modele->photos : json_decode($modele->photos, true) ?? [];
          $videosFile = is_array($modele->video_file) ? $modele->video_file : json_decode($modele->video_file, true) ?? [];
          $videosLink = is_array($modele->video_link) ? $modele->video_link : json_decode($modele->video_link, true) ?? [];
      @endphp

      @if($global)
        @foreach($photos as $photo)
          <a href="{{ asset('storage/' . $photo) }}" 
             class="gallery-item glightbox modele-{{ $modele->id }}" 
             data-type="image" data-title="{{ $modele->prenom }}">
            <img src="{{ asset('storage/' . $photo) }}" alt="Photo {{ $modele->prenom }}">
          </a>
        @endforeach

        @foreach($videosFile as $video)
          <a href="{{ asset('storage/' . $video) }}" 
             class="gallery-item glightbox modele-{{ $modele->id }}" 
             data-type="video" data-title="{{ $modele->prenom }}">
            <video src="{{ asset('storage/' . $video) }}" muted></video>
          </a>
        @endforeach

        @foreach($videosLink as $link)
          <a href="{{ $link }}" 
             class="gallery-item glightbox modele-{{ $modele->id }}" 
             data-type="video" data-title="{{ $modele->prenom }}">
            <video src="{{ $link }}" muted></video>
          </a>
        @endforeach

      @else
        @foreach($achats as $achat)
          @if($achat->type === 'detail' && $achat->photo_path)
            <a href="{{ asset('storage/' . $achat->photo_path) }}" 
               class="gallery-item glightbox modele-{{ $modele->id }}" 
               data-type="image" data-title="{{ $modele->prenom }}">
              <img src="{{ asset('storage/' . $achat->photo_path) }}" alt="Photo {{ $modele->prenom }}">
            </a>
          @endif
        @endforeach
      @endif
    @empty
      <div class="alert alert-info text-center">
        Vous n’avez encore acheté aucune photo.
      </div>
    @endforelse
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>
<script>
  // Initialiser GLightbox
  const lightbox = GLightbox({
    selector: '.glightbox',
    touchNavigation: true,
    loop: true,
    zoomable: true,
    autoplayVideos: false,
    moreText: 'Fermer'
  });

  // Filtrer par modèle
  const modelFilter = document.getElementById('modelFilter');
  const galleryItems = document.querySelectorAll('.gallery-item');

  modelFilter.addEventListener('change', () => {
    const filter = modelFilter.value;
    galleryItems.forEach(item => {
      if(filter === 'all' || item.classList.contains(filter)){
        item.style.display = '';
      } else {
        item.style.display = 'none';
      }
    });
  });
</script>

</body>
</html>
