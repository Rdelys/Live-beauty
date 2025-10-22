<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Mes achats premium</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css" rel="stylesheet">

  <style>
    /* === Base === */
    body {
      background: radial-gradient(circle at 20% 20%, #141414 0%, #000 100%);
      color: #f5f5f5;
      font-family: 'Poppins', sans-serif;
      overflow-x: hidden;
    }

    /* === Header === */
    .header-fixed {
      position: sticky;
      top: 0;
      z-index: 1000;
      background: rgba(0,0,0,0.85);
      backdrop-filter: blur(10px);
      padding: 1.2rem 0;
      border-bottom: 1px solid rgba(255,255,255,0.1);
      text-align: center;
    }

    .header-fixed h1 {
      font-weight: 700;
      font-size: 1.9rem;
      background: linear-gradient(90deg, #ff4081, #40c9ff);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      margin-bottom: 0.5rem;
    }

    .filter-select {
      background: rgba(255,255,255,0.08);
      color: #fff;
      border: 1px solid rgba(255,255,255,0.25);
      border-radius: 30px;
      padding: 0.5rem 1.2rem;
      font-size: 1rem;
      cursor: pointer;
      transition: all 0.3s ease;
    }
    .filter-select:hover {
      box-shadow: 0 0 10px rgba(255,255,255,0.25);
    }

    /* === Galerie === */
    .gallery-container {
      padding: 2rem;
      height: calc(100vh - 120px);
      overflow-y: auto;
    }

    .gallery-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
      gap: 1.5rem;
    }

    .gallery-item {
      position: relative;
      overflow: hidden;
      border-radius: 16px;
      background: linear-gradient(145deg, rgba(255,255,255,0.07), rgba(255,255,255,0.02));
      border: 1px solid rgba(255,255,255,0.1);
      transition: all 0.4s ease;
      box-shadow: 0 0 15px rgba(0,0,0,0.6);
    }

    .gallery-item:hover {
      transform: translateY(-6px) scale(1.03);
      box-shadow: 0 0 25px rgba(255,128,171,0.4);
    }

    /* Image et vidéo uniformes */
    .gallery-item img,
    .gallery-item video {
      width: 100%;
      height: 100%;
      object-fit: cover;
      aspect-ratio: 1 / 1;
      border-radius: 16px;
      transition: transform 0.4s ease, filter 0.4s ease;
    }

    .gallery-item:hover img,
    .gallery-item:hover video {
      transform: scale(1.07);
      filter: brightness(1.15);
    }

    /* Icône play sur les vidéos */
    .gallery-item.video::after {
      content: "\f04b";
      font-family: "Font Awesome 6 Free";
      font-weight: 900;
      color: rgba(255,255,255,0.9);
      font-size: 3rem;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      text-shadow: 0 0 20px rgba(0,0,0,0.8);
      pointer-events: none;
      transition: opacity 0.3s;
    }
    .gallery-item:hover::after {
      color: #ff80ab;
    }

    /* === Scrollbar === */
    ::-webkit-scrollbar {
      width: 8px;
    }
    ::-webkit-scrollbar-thumb {
      background: linear-gradient(180deg, #ff80ab, #40c9ff);
      border-radius: 6px;
    }
  </style>
</head>
<body>

  <div class="header-fixed">
    <h1><i class="fas fa-diamond me-2"></i> Mes achats Premium</h1>
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

        {{-- ✅ Cas "global" : toutes les photos & vidéos --}}
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
               class="gallery-item video glightbox modele-{{ $modele->id }}" 
               data-type="video" data-title="{{ $modele->prenom }}">
              <video src="{{ asset('storage/' . $video) }}" muted></video>
            </a>
          @endforeach

          @foreach($videosLink as $link)
            <a href="{{ $link }}" 
               class="gallery-item video glightbox modele-{{ $modele->id }}" 
               data-type="video" data-title="{{ $modele->prenom }}">
              <video src="{{ $link }}" muted></video>
            </a>
          @endforeach

        @else
          {{-- ✅ Cas "détail" : achats individuels --}}
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
        <div class="alert alert-info text-center w-100">
          Vous n’avez encore acheté aucun contenu premium.
        </div>
      @endforelse
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>
  <script>
    const lightbox = GLightbox({
      selector: '.glightbox',
      touchNavigation: true,
      loop: true,
      zoomable: true,
      autoplayVideos: true,
      moreText: 'Fermer'
    });

    const modelFilter = document.getElementById('modelFilter');
    const galleryItems = document.querySelectorAll('.gallery-item');
    modelFilter.addEventListener('change', () => {
      const filter = modelFilter.value;
      galleryItems.forEach(item => {
        item.style.display = (filter === 'all' || item.classList.contains(filter)) ? '' : 'none';
      });
    });
  </script>

</body>
</html>
