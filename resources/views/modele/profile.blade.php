@extends('layouts.modele')

@section('title', "Profil de $modele->prenom")

@section('content')
<style>
    :root {
        --red: #e50914;
        --black: #0a0a0a;
        --dark: #1a1a1a;
        --gray: #bbb;
        --gold: #ffc107;
        --white: #fff;
    }

    body {
        background: linear-gradient(145deg, var(--black) 0%, #1c1c1c 100%);
        color: var(--white);
        font-family: 'Poppins', 'Segoe UI', sans-serif;
        overflow-x: hidden;
    }

    .modele-container {
        min-height: 100vh;
        padding-top: 3rem;
        padding-bottom: 4rem;
    }

    /* PHOTO PRINCIPALE — effet vitré & premium */
    .photo-principale-container {
        position: relative;
        border-radius: 1rem;
        overflow: hidden;
        box-shadow: 0 0 50px rgba(229, 9, 20, 0.25);
        transition: all 0.4s ease;
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(12px);
        height: 500px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .photo-principale-container:hover {
        transform: translateY(-4px);
        box-shadow: 0 0 70px rgba(229, 9, 20, 0.35);
    }

    .photo-principale {
        max-width: 100%;
        max-height: 100%;
        border-radius: 1rem;
        object-fit: contain;
    }

    /* MINIATURES */
    .vignettes {
        display: flex;
        flex-wrap: wrap;
        gap: 0.5rem;
        margin-top: 1rem;
    }

    .photo-vignette {
        width: 80px;
        height: 80px;
        border-radius: 0.6rem;
        object-fit: cover;
        border: 2px solid transparent;
        cursor: pointer;
        transition: transform 0.3s ease, border-color 0.3s ease;
    }

    .photo-vignette:hover {
        transform: scale(1.05);
        border-color: var(--gold);
    }

    .photo-vignette.active {
        border-color: var(--red);
        box-shadow: 0 0 12px rgba(229, 9, 20, 0.5);
    }

    /* SECTION INFO */
    .profile-info {
        background: rgba(255, 255, 255, 0.04);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 1rem;
        padding: 2rem;
        backdrop-filter: blur(10px);
        box-shadow: 0 0 25px rgba(229, 9, 20, 0.1);
        transition: all 0.3s ease;
    }

    .profile-info:hover {
        box-shadow: 0 0 40px rgba(229, 9, 20, 0.2);
    }

    .profile-name {
        color: var(--gold);
        font-weight: 700;
        font-size: 2rem;
        text-shadow: 0 0 10px rgba(229, 9, 20, 0.2);
    }

    .profile-desc {
        font-size: 1.05rem;
        line-height: 1.7;
        color: var(--gray);
    }

    .profile-details ul {
        padding: 0;
        list-style: none;
        font-size: 1rem;
    }

    .profile-details li {
        margin-bottom: 0.4rem;
    }

    .section-title {
        color: var(--red);
        font-weight: 600;
        margin-top: 1.8rem;
        margin-bottom: 0.6rem;
        letter-spacing: 0.5px;
        text-transform: uppercase;
        font-size: 1rem;
    }

    hr {
        border: none;
        height: 1px;
        background: linear-gradient(to right, transparent, var(--red), transparent);
        margin: 1rem 0;
    }

    /* LANGUES */
    .lang-list li {
        display: inline-block;
        margin-right: 0.8rem;
        font-size: 1.1rem;
    }

    /* RESPONSIVE */
    @media (max-width: 768px) {
        .photo-principale-container {
            height: 350px;
        }
        .photo-vignette {
            width: 60px;
            height: 60px;
        }
        .profile-info {
            margin-top: 2rem;
        }
    }

    /* === LIGHTBOX (plein écran) === */
.lightbox {
  display: none;
  position: fixed;
  z-index: 9999;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0,0,0,0.95);
  justify-content: center;
  align-items: center;
  backdrop-filter: blur(5px);
  cursor: zoom-out;
}

.lightbox.show {
  display: flex;
}

.lightbox img {
  max-width: 90%;
  max-height: 90%;
  border-radius: 10px;
  box-shadow: 0 0 40px rgba(255,255,255,0.2);
  animation: zoomIn 0.3s ease;
}

@keyframes zoomIn {
  from { transform: scale(0.8); opacity: 0; }
  to { transform: scale(1); opacity: 1; }
}

.lightbox-close {
  position: absolute;
  top: 20px;
  right: 35px;
  font-size: 2.5rem;
  color: #fff;
  cursor: pointer;
  z-index: 10000;
  transition: transform 0.2s ease;
}
.lightbox-close:hover {
  transform: scale(1.2);
  color: #ff0000;
}

.album-card {
  background: linear-gradient(145deg, #1a1a1a, #0d0d0d);
  border: 1px solid rgba(229, 9, 20, 0.3);
  border-radius: 14px;
  cursor: pointer;
  transition: all 0.3s ease;
  color: #fff;
}

.album-card:hover {
  transform: scale(1.05);
  border-color: #e50914;
  box-shadow: 0 0 20px rgba(229, 9, 20, 0.4);
}

.album-card.active {
  border-color: #e50914;
  box-shadow: 0 0 25px rgba(229, 9, 20, 0.6);
}

.album-title {
  color: #fff;
  font-weight: 600;
  margin-bottom: 0.3rem;
}

.album-count {
  color: #fff;
  opacity: 0.9;
  font-size: 0.95rem;
}

</style>

<div class="container modele-container">
    <div class="row gy-4 align-items-start">

        <!-- PHOTO -->
        <div class="col-12 col-md-6">
            @php
                $photos = is_array($modele->photos)
                    ? $modele->photos
                    : json_decode($modele->photos ?? '[]', true);
                $firstPhoto = $photos[0] ?? null;
            @endphp

            @if ($firstPhoto)
                <div class="photo-principale-container">
                    <img id="photoPrincipale"
                         src="{{ asset('storage/' . $firstPhoto) }}"
                         alt="Photo principale de {{ $modele->prenom }}"
                         class="photo-principale" />
                </div>

                <div class="vignettes">
                    @foreach ($photos as $index => $photo)
                        <img src="{{ asset('storage/' . $photo) }}"
                             alt="Photo de {{ $modele->prenom }}"
                             class="photo-vignette {{ $index === 0 ? 'active' : '' }}"
                             onclick="changePhoto(this)" />
                    @endforeach
                </div>
            @else
                <div class="photo-principale-container">
                    <img src="https://via.placeholder.com/600x400?text=Pas+de+photo"
                         class="photo-principale" />
                </div>
            @endif
        </div>

        <!-- INFOS -->
        <div class="col-12 col-md-6">
            <div class="profile-info">
                <h2 class="profile-name">{{ $modele->prenom }}</h2>

                @if($modele->age)
                    <p><strong>{{ $modele->age }} ans</strong></p>
                @endif

                @if($modele->description)
                    <p class="profile-desc">{{ $modele->description }}</p>
                @endif

                <hr>

                @if($modele->taille || $modele->fesse || $modele->poitrine)
                    <h5 class="section-title">Bio</h5>
                    <div class="profile-details">
                        <ul>
                            @if($modele->taille)
                                <li><strong>Taille :</strong> {{ $modele->taille }} cm</li>
                            @endif
                            @if($modele->fesse)
                                <li><strong>Fesses :</strong> {{ $modele->fesse }}</li>
                            @endif
                            @if($modele->poitrine)
                                <li><strong>Poitrine :</strong> {{ $modele->poitrine }}</li>
                            @endif
                        </ul>
                    </div>
                @endif

                @if($modele->services)
                    <h5 class="section-title">Services</h5>
                    <p>{{ $modele->services }}</p>
                @endif

                @php
                    $flags = [
                        'FR' => '🇫🇷 Français',
                        'EN' => '🇬🇧 Anglais',
                        'ES' => '🇪🇸 Espagnol',
                        'IT' => '🇮🇹 Italien',
                        'DE' => '🇩🇪 Allemand',
                        'PT' => '🇵🇹 Portugais',
                        'AR' => '🇸🇦 Arabe',
                        'RU' => '🇷🇺 Russe',
                        'ZH' => '🇨🇳 Chinois',
                        'JP' => '🇯🇵 Japonais'
                    ];

                    $langues = $modele->langue
                        ? array_map('trim', explode(',', strtoupper($modele->langue)))
                        : [];
                @endphp

                @if(!empty($langues))
                    <h5 class="section-title">Langues parlées</h5>
                    <ul class="lang-list list-unstyled">
                        @foreach($langues as $code)
                            <li>{!! $flags[$code] ?? $code !!}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>
</div>
@php
    use App\Models\GalleryPhoto;

    // ✅ Photos triées selon position_photo (ordre croissant)
    $photos = GalleryPhoto::where('modele_id', $modele->id)
                ->whereNotNull('photo_url')
                ->orderBy('position_photo', 'asc')
                ->get();

    // ✅ Vidéos triées selon position_photo
    $videos = GalleryPhoto::where('modele_id', $modele->id)
                ->whereNotNull('video_url')
                ->orderBy('position_photo', 'asc')
                ->get();
@endphp


<style>
/* --- Styles améliorés pour le bouton Acheter --- */
.btn-buy {
    background: linear-gradient(135deg, #28a745, #0f5132);
    border: none;
    color: #fff;
    font-weight: 600;
    padding: 0.5rem 1.4rem;
    border-radius: 25px;
    box-shadow: 0 0 15px rgba(40,167,69,0.4);
    transition: all 0.3s ease;
}
.btn-buy:hover {
    background: linear-gradient(135deg, #34ce57, #145a32);
    box-shadow: 0 0 25px rgba(72,255,100,0.6);
    transform: scale(1.05);
}
.video-locked {
    position: relative;
    overflow: hidden;
    border-radius: 10px;
    background: #000;
}
.video-locked .blur-overlay {
    position: absolute;
    inset: 0;
    backdrop-filter: blur(10px);
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    background: rgba(0, 0, 0, 0.5);
}
.no-right-click {
    -webkit-user-select: none;
    user-select: none;
}

@media (max-width: 767px) {
    .photo-vignette {
        width: 48px;
        height: 48px;
    }
    .photo-principale-container {
        height: 300px;
    }
}
ul.list-unstyled li {
    padding: 0.25rem 0;
    font-size: 1rem;
}
.vignette-locked {
    position: relative;
    display: inline-block;
}
.vignette-locked img {
    filter: blur(6px);
    pointer-events: none;
}
.vignette-locked .overlay-lock {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-size: 1.2rem;
    color: #fff;
    background: rgba(0,0,0,0.6);
    padding: 4px 8px;
    border-radius: 6px;
}

/* --- Galerie premium --- */
.gallery-container {
    margin-top: 3rem;
    background: linear-gradient(145deg, #1a1a1a, #0d0d0d);
    border-radius: 12px;
    padding: 2rem;
    box-shadow: 0 0 25px rgba(40, 167, 69, 0.25);
}
.gallery-title {
    text-align: center;
    font-size: 1.8rem;
    font-weight: 600;
    color: #28a745;
    margin-bottom: 1.5rem;
}
.gallery-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
    gap: 1rem;
}
.gallery-item {
    overflow: hidden;
    border-radius: 10px;
    cursor: pointer;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.gallery-item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.4s ease;
}
.gallery-item:hover {
    transform: scale(1.05);
    box-shadow: 0 0 15px rgba(40, 167, 69, 0.4);
}
.gallery-item:hover img {
    transform: scale(1.1);
}

/* Lightbox */
.lightbox {
    display: none;
    position: fixed;
    z-index: 1050;
    top: 0; left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.9);
    justify-content: center;
    align-items: center;
}
.lightbox img {
    max-width: 90%;
    max-height: 90%;
    border-radius: 8px;
    box-shadow: 0 0 20px rgba(0,0,0,0.8);
}
.lightbox.show {
    display: flex;
}
.lightbox-close {
    position: absolute;
    top: 20px;
    right: 30px;
    font-size: 2rem;
    color: white;
    cursor: pointer;
}
</style>
@php
    use App\Models\Album;

    $albums = Album::where('modele_id', $modele->id)
                ->withCount('photos')
                ->get();
@endphp

@if($albums->count() > 0)
<div class="gallery-container mb-5">
    <h3 class="gallery-title">📁 Albums</h3>
    <div class="row g-4 justify-content-center">
        @foreach($albums as $album)
        <div class="col-6 col-md-3">
            <div class="card album-card text-center shadow-lg"
                 data-album-id="{{ $album->id }}"
                 onclick="filterPhotosByAlbum({{ $album->id }})">
                <div class="card-body">
                    <h5 class="album-title">{{ $album->nom }}</h5>
                    <p class="album-count">{{ $album->photos_count }} photo(s)</p>
                    <span class="badge bg-danger">Voir l'album</span>
                </div>
            </div>
        </div>
        @endforeach

        <!-- Bouton pour tout afficher -->
        <div class="col-6 col-md-3">
            <div class="card album-card text-center shadow-lg"
                 onclick="filterPhotosByAlbum(null)">
                <div class="card-body">
                    <h5 class="album-title text-white">Tous les albums</h5>
                    <p class="album-count text-white">Afficher tout</p>
                    <span class="badge bg-light text-dark">Tout</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

<div class="gallery-container mt-5">
    <h3 class="gallery-title">📸 Galerie Photos</h3>
    <div class="gallery-grid">
        @forelse($photos as $item)
            @php
                $flou = $item->type_flou;
                $blurStyle = match($flou) {
                    'strong' => 'filter: blur(10px);',
                    'soft'   => 'filter: blur(4px);',
                    'pixel'  => 'image-rendering: pixelated; filter: blur(2px);',
                    default  => '',
                };
            @endphp

            <!-- Photo payante -->
<div class="gallery-item text-center position-relative no-right-click"
     data-album-id="{{ $item->album_id ?? '' }}"
     oncontextmenu="return false;">
    <img src="{{ asset('storage/' . $item->photo_url) }}" alt="Photo"
         style="{{ $blurStyle }}" data-path="{{ $item->photo_url }}" />

    @php
    $prixAlbum = $item->album ? $item->album->prix : null;
@endphp

@if($item->payant && $prixAlbum)
    <div class="position-absolute top-50 start-50 translate-middle text-center buy-overlay">
        <span class="badge bg-success mb-2">{{ $prixAlbum }} jetons</span><br>
    </div>
@endif

</div>

        @empty
            <p class="text-muted text-center">Aucune photo disponible.</p>
        @endforelse
    </div>
</div>

@if($videos->count() > 0)
<div class="gallery-container mt-5">
    <h3 class="gallery-title">🎬 Vidéos</h3>
    <div class="gallery-grid">
        @foreach($videos as $video)
            @if($video->payant)
                {{-- ✅ Vidéo payante : miniature floutée --}}
                <div class="gallery-item video-locked no-right-click" oncontextmenu="return false;">
    <video muted preload="metadata" style="width: 100%; height: 100%; object-fit: cover; filter: blur(10px);" 
           data-path="{{ $video->video_url }}">
        <source src="{{ asset('storage/' . $video->video_url) }}" type="video/mp4">
    </video>
    <div class="blur-overlay text-center text-white buy-overlay">
        <span class="badge bg-success mb-2">{{ $video->prix }} jetons</span>
    </div>
</div>

            @else
                {{-- ✅ Vidéo gratuite : visible et lisible --}}
                <div class="gallery-item text-center no-right-click" oncontextmenu="return false;">
                    <video controls
                           controlslist="nodownload noplaybackrate"
                           disablepictureinpicture
                           style="width: 100%; border-radius: 10px;">
                        <source src="{{ asset('storage/' . $video->video_url) }}" type="video/mp4">
                        Votre navigateur ne supporte pas la vidéo.
                    </video>
                </div>
            @endif
        @endforeach
    </div>
</div>
@endif

<script>
// === Sécurité front-end ===
document.addEventListener("contextmenu", e => e.preventDefault());
document.addEventListener("keydown", e => {
    if (e.key === "F12" || (e.ctrlKey && e.shiftKey && ["I","J","C"].includes(e.key))) {
        e.preventDefault();
    }
});
</script>

</div>

<script>
    function changePhoto(img) {
        document.getElementById('photoPrincipale').src = img.src;
        document.querySelectorAll('.photo-vignette').forEach(v => v.classList.remove('active'));
        img.classList.add('active');
    }

    window.addEventListener('DOMContentLoaded', () => {
        const firstVignette = document.querySelector('.photo-vignette');
        if (firstVignette) firstVignette.classList.add('active');
    });
</script>
<script>
    function changePhoto(img) {
        const principale = document.getElementById('photoPrincipale');
        principale.src = img.src;
        document.querySelectorAll('.photo-vignette').forEach(v => v.classList.remove('active'));
        img.classList.add('active');
    }

    document.addEventListener("DOMContentLoaded", () => {
  const lightbox = document.getElementById("lightbox");
  const lightboxImg = document.getElementById("lightboxImage");
  const closeBtn = document.querySelector(".lightbox-close");

  // ✅ Clic sur photo gratuite => agrandir
  document.querySelectorAll(".gallery-item img").forEach(img => {
    const blur = img.style.filter || "";
    const isFlou = blur.includes("blur") || blur.includes("pixel");
    const isPayant = img.closest(".buy-overlay") !== null;

    // On ne permet que les photos non floutées
    if (!isFlou && !isPayant) {
      img.addEventListener("click", () => {
        lightboxImg.src = img.src;
        lightbox.classList.add("show");
      });
    }
  });

  // Fermer le lightbox (clic sur croix ou fond)
  lightbox.addEventListener("click", e => {
    if (e.target === lightbox || e.target === closeBtn) {
      lightbox.classList.remove("show");
    }
  });
});
</script>
<!-- Lightbox -->
<div id="lightbox" class="lightbox">
  <span class="lightbox-close">&times;</span>
  <img id="lightboxImage" src="" alt="Agrandissement photo">
</div>
<script>
function filterPhotosByAlbum(albumId) {
  const allPhotos = document.querySelectorAll('.gallery-item');
  allPhotos.forEach(item => {
    const photoAlbum = item.getAttribute('data-album-id');
    if (!albumId || photoAlbum == albumId) {
      item.style.display = '';
    } else {
      item.style.display = 'none';
    }
  });

  // Gestion visuelle de la sélection d’album
  document.querySelectorAll('.album-card').forEach(card => {
    const id = card.getAttribute('data-album-id');
    if (albumId && id == albumId) {
      card.classList.add('active');
    } else {
      card.classList.remove('active');
    }
  });
}
</script>

@endsection
