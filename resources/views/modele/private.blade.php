@extends('layouts.modele')

@section('title', "Profil de $modele->prenom")
@section('content')
<style>
.modele-container {
    background-color: #121212;
    color: #eee;
    min-height: 100vh;
}
.photo-principale-container {
    width: 100%;
    height: 400px;
    border-radius: 6px;
    box-shadow: 0 0 10px rgba(40, 167, 69, 0.6);
    overflow: hidden;
    margin-bottom: 1rem;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #222;
}
.photo-principale {
    max-width: 100%;
    max-height: 100%;
    object-fit: contain;
    border-radius: 6px;
    display: block;
}
.photo-vignette {
    width: 60px;
    height: 60px;
    object-fit: cover;
    border-radius: 4px;
    cursor: pointer;
    border: 2px solid transparent;
    transition: border-color 0.3s ease;
}
.photo-vignette:hover, .photo-vignette.active {
    border-color: #28a745;
}
.btn-private {
    background-color: transparent;
    color: #28a745;
    border: 1px solid #28a745;
    padding: 0.4rem 0.8rem;
    font-size: 0.9rem;
    border-radius: 20px;
    transition: all 0.3s ease;
    text-decoration: none;
}
.btn-private:hover {
    background-color: #28a745;
    color: #fff;
}
.badge-online {
    font-size: 0.75rem;
    padding: 0.25rem 0.5rem;
    background-color: #28a745;
    color: #fff;
    border-radius: 12px;
    margin-left: 0.5rem;
}
.badge-offline {
    font-size: 0.75rem;
    padding: 0.25rem 0.5rem;
    background-color: #6c757d;
    color: #fff;
    border-radius: 12px;
    margin-left: 0.5rem;
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

/* === LIGHTBOX AGRANDISSEMENT === */
.lightbox {
  display: none;
  position: fixed;
  z-index: 9999;
  top: 0; left: 0;
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

.last-connexion-premium {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.45rem 0.9rem;
    margin-top: 0.6rem;
    border-radius: 999px;
    font-size: 0.9rem;
    font-weight: 500;
    color: #eaeaea;
    background: linear-gradient(
        135deg,
        rgba(255, 215, 0, 0.12),
        rgba(229, 9, 20, 0.12)
    );
    border: 1px solid rgba(255, 215, 0, 0.35);
    backdrop-filter: blur(10px);
    box-shadow:
        0 0 18px rgba(255, 193, 7, 0.25),
        inset 0 0 10px rgba(255, 255, 255, 0.05);
}

.last-connexion-premium .lc-icon {
    font-size: 1rem;
}

.last-connexion-premium .lc-label {
    color: #ffc107;
    font-weight: 600;
    letter-spacing: 0.3px;
}

.last-connexion-premium .lc-separator {
    opacity: 0.6;
}

.last-connexion-premium .lc-date {
    color: #ffffff;
    font-weight: 500;
    white-space: nowrap;
}

</style>

<div class="container modele-container py-5">
    <div class="row gy-4">

       <div class="col-12 col-md-6">
    @php
        $photos = is_array($modele->photos) ? $modele->photos : json_decode($modele->photos ?? '[]', true);
        $firstPhoto = $photos[0] ?? null;
    @endphp

    @if ($firstPhoto)
    <div class="photo-principale-container">
        <img id="photoPrincipale"
             src="{{ asset('storage/' . $firstPhoto) }}"
             alt="Photo principale de {{ $modele->prenom }}"
             class="photo-principale" />
    </div>

    {{-- ✅ Affichage direct de toutes les photos, sans flou ni verrou --}}
    <div class="d-flex flex-wrap gap-2">
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
             class="photo-principale rounded shadow" />
    </div>
@endif

</div>


        <div class="col-12 col-md-6">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2 class="mb-0">
                    {{ $modele->prenom }}
                    @if ($modele->en_ligne)
                        <span class="badge-online">{{ __('En ligne') }}</span>
                    @else
                        <span class="badge-offline">{{ __('Hors ligne') }}</span>
                    @endif
                </h2>




                <button class="btn-private"
                        data-bs-toggle="modal"
                        data-bs-target="#showPriveeModal"
                        data-modeleid="{{ $modele->id }}"
                        data-prix="{{ $modele->nombre_jetons_show_privee ?? 0 }}"
                        data-duree="{{ $modele->duree_show_privee ?? 30 }}">
                     {{ __('Show en privé') }}
                </button>

                <span class="badge bg-warning text-dark ms-2">
    {{ $modele->nombre_jetons_show_privee ?? 'ND' }} jetons / {{ $modele->duree_show_privee ?? 'ND' }} min
                </span>
            </div>


            @if($modele->age || $modele->taille)
                <p>
                    @if($modele->age)<strong>{{ $modele->age }} {{ __('ans') }}</strong>@endif
                </p>
            @endif

            @if($modele->description)
                <p>{{ $modele->description }}</p>
            @endif

            <hr class="bg-light">

            @if($modele->taille || $modele->fesse || $modele->poitrine)
                <h5>Bio :</h5>
                <ul class="list-unstyled">
                    @if($modele->taille)<li><strong>{{ __('Taille') }} :</strong> {{ $modele->taille }} cm</li>@endif
                    @if($modele->fesse)<li><strong>{{ __('Fesses') }} :</strong> {{ $modele->fesse }}</li>@endif
                    @if($modele->poitrine)<li><strong>{{ __('Poitrine') }} :</strong> {{ $modele->poitrine }}</li>@endif
                </ul>
            @endif

            @if($modele->services)
                <h5 class="mt-3">{{ __('Ce que je propose') }} :</h5>
                <p>{{ $modele->services }}</p>
            @endif
            @php
  $flags = [
    'FR' => __('Francais'),
    'EN' => __('Anglais'),
    'ES' => __('Espagnol'),
    'IT' => __('Italien'),
    'DE' => __('Allemand'),
    'PT' => __('Portugais'),
    'AR' => __('Arabe'),
    'RU' => __('Russe'),
    'ZH' => __('Chinois'),
    'JP' => __('Japonais')
];


    $langues = $modele->langue 
        ? array_map('trim', explode(',', strtoupper($modele->langue))) 
        : [];
@endphp

@if(!empty($langues))
    <h5 class="mt-3">{{ __('Langues parlées') }} :</h5>
    <ul class="list-unstyled">
        @foreach($langues as $code)
            @if(isset($flags[$code]))
                <li>{!! $flags[$code] !!}</li>
            @else
                <li>{{ $code }}</li>
            @endif
        @endforeach
    </ul>
@endif
                <div class="last-connexion-premium">
    <span class="lc-icon">🕒</span>
    <span class="lc-label">{{ __('Dernière connexion') }}</span>
    <span class="lc-separator">•</span>
    <span class="lc-date">
        {{ optional($modele->derniereConnexion)->created_at?->locale('fr')->translatedFormat('d F Y à H:i') ?? __('Aucune connexion') }} UTC
    </span>
</div>
        </div>
    </div>
    <!-- === Galerie photo premium === -->
    <!-- === Galerie photo & vidéo sécurisée === -->
@php
    use App\Models\GalleryPhoto;

    // ✅ On trie par position_photo (ordre croissant)
    $photos = GalleryPhoto::where('modele_id', $modele->id)
                ->whereNotNull('photo_url')
                ->orderBy('position_photo', 'asc')
                ->get();

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

.album-card {
  background: linear-gradient(145deg, #111, #1b1b1b);
  border: 1px solid rgba(229,9,20,0.3);
  border-radius: 14px;
  transition: all 0.3s ease;
  cursor: pointer;
  color: #fff;
}
.album-card:hover {
  transform: scale(1.05);
  border-color: var(--red);
  box-shadow: 0 0 20px rgba(229,9,20,0.5);
}
.album-card.active {
  border-color: var(--red) !important;
  box-shadow: 0 0 25px rgba(229,9,20,0.6) !important;
}
.album-card h5 {
  color: #fff;
  font-weight: 600;
}
.album-card p {
  color: #fff;
  opacity: 0.9;
}

</style>
    <!-- === ALBUMS === -->
@php
    $albums = \App\Models\Album::where('modele_id', $modele->id)
                ->withCount('photos')
                ->get();

    // 🔥 Liste des albums achetés par l’utilisateur
    $albumsAchetes = auth()->check() ? (auth()->user()->album_id ?? []) : [];
@endphp


@if($albums->count() > 0)
<div class="gallery-container mb-5">
    <h3 class="gallery-title">📁 {{ __('Albums') }}</h3>

    <div class="row g-4 justify-content-center">
        
        @foreach($albums as $album)
@php
    $dejaAchete = in_array($album->id, $albumsAchetes);
@endphp

<div class="col-6 col-md-3">
    <div class="card bg-dark text-center album-card shadow-lg"
         data-album-id="{{ $album->id }}"
         onclick="filterPhotosByAlbum({{ $album->id }})">

        <div class="card-body">

            <!-- Nom album -->
            <h5 class="text-success mb-2">{{ $album->nom }}</h5>

            <!-- Nombre de photos -->
            <p class="text-white-50 mb-2">{{ $album->photos_count }} photo(s)</p>

            <!-- Payant -->
            @if($album->etat === 'payant')

                @if($dejaAchete)
                    <!-- ✔ Album déjà acheté -->
                    <span class="badge bg-success mb-2">Déjà acheté</span>
                @else
                    <!-- 💰 Pas encore acheté -->
                    <span class="badge bg-danger mb-2">
                        {{ $album->prix }} {{ __('jetons') }}
                    </span>

                    <button class="btn btn-buy btn-buy-album mt-2"
                        data-album="{{ $album->id }}"
                        data-prix="{{ $album->prix }}">
                        {{ __('Acheter l’album') }}
                    </button>
                @endif

            @else
                <!-- Gratuit -->
                <span class="badge bg-success">
                    {{ __('Gratuit') }}
                </span>
            @endif

        </div>
    </div>
</div>
@endforeach


        <!-- Afficher tout -->
        <div class="col-6 col-md-3">
            <div class="card bg-secondary text-center album-card shadow-lg"
                 onclick="filterPhotosByAlbum(null)">

                <div class="card-body">
                    <h5 class="text-white mb-2">{{ __('Tous les albums') }}</h5>
                    <span class="badge bg-light text-dark">
                        {{ __('Afficher tout') }}
                    </span>
                </div>
            </div>
        </div>

    </div>
</div>
@endif


<div class="gallery-container mt-5">
    <h3 class="gallery-title">📸 {{ __('Galerie Photos') }}</h3>


    <div class="gallery-grid">
@php
    $albumsAchetes = auth()->check() ? (auth()->user()->album_id ?? []) : [];
@endphp

@forelse($photos as $item)
@php
    $album = $item->album;
    $blurStyle = '';
    $overlay = true; // par défaut, on montre l’overlay

    if ($album && $album->etat === 'payant') {

        // 👉 Vérifier si utilisateur possède l’album
        $dejaAchete = in_array($album->id, $albumsAchetes);

        if ($dejaAchete) {
            // ⚡ Album acheté → aucun flou
            $blurStyle = '';
            $overlay = false;
        } else {
            // ⚠ Album NON acheté → appliquer le flou
            $flou = $album->type_flou ?? 'soft';

            $blurStyle = match($flou) {
                'strong' => 'filter: blur(10px);',
                'soft'   => 'filter: blur(4px);',
                'pixel'  => 'image-rendering: pixelated; filter: blur(2px);',
                default  => '',
            };
        }
    } else {
        // album gratuit → pas de flou
        $overlay = false;
    }
@endphp

<div class="gallery-item text-center position-relative no-right-click"
     data-album-id="{{ $item->album_id }}"
     oncontextmenu="return false;">

    <img src="{{ asset('storage/' . $item->photo_url) }}"
         data-path="{{ $item->photo_url }}"
         style="{{ $blurStyle }}" />

    {{-- Overlay si album payant et NON acheté --}}
    <!-- @if($overlay && $album && $album->etat === 'payant')
        <div class="position-absolute top-50 start-50 translate-middle text-center buy-overlay">
            <span class="badge bg-success mb-2">{{ $album->prix }} {{ __('jetons') }}</span><br>

            <button class="btn btn-buy btn-buy-album"
                    data-album="{{ $album->id }}"
                    data-prix="{{ $album->prix }}">
                Acheter l’album
            </button>
        </div>
    @endif -->

</div>

@empty
    <p class="text-muted text-center">{{ __('Aucune photo disponible') }}.</p>
@endforelse
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
        <span class="badge bg-success mb-2">{{ $video->prix }} {{ __('jetons') }}</span>
        <button class="btn btn-buy btn-buy-detail"
                data-modeleid="{{ $modele->id }}"
                data-path="{{ $video->video_url }}"
                data-prix="{{ $video->prix }}"
                data-type="video">
            Acheter
        </button>
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
                        {{ __('Votre navigateur ne supporte pas la vidéo') }}.
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
document.addEventListener("DOMContentLoaded", () => {
  let prixParTranche = 0;
let dureeTranche = 30;

const showPriveeModal = document.getElementById("showPriveeModal");
showPriveeModal.addEventListener("show.bs.modal", event => {
  const button = event.relatedTarget;
  const modeleId = button.getAttribute("data-modeleid");
  prixParTranche = parseInt(button.getAttribute("data-prix")) || 0;
  dureeTranche = parseInt(button.getAttribute("data-duree")) || 30;

  document.getElementById("modeleId").value = modeleId;
  document.getElementById("coutTotal").value = "0 jetons";
});

function calculerCout() {
  const debut = document.getElementById("heureDebut").value;
  const fin = document.getElementById("heureFin").value;

  if (debut && fin) {
    const [h1, m1] = debut.split(":").map(Number);
    const [h2, m2] = fin.split(":").map(Number);

    let start = h1 * 60 + m1;
    let end = h2 * 60 + m2;

    // 👉 Cas spécial : si l'heure de fin est <= début, on considère que ça passe après minuit
    if (end <= start) {
      end += 24 * 60; // ajoute 24h en minutes
    }

    const dureeMinutes = end - start;

    if (dureeMinutes > 0) {
      const tranches = Math.ceil(dureeMinutes / dureeTranche);
      const total = tranches * prixParTranche;
      document.getElementById("coutTotal").value = total + " jetons";
    } else {
      document.getElementById("coutTotal").value = "Erreur: durée invalide";
    }
  }
}


  document.getElementById("heureDebut").addEventListener("change", calculerCout);
  document.getElementById("heureFin").addEventListener("change", calculerCout);

  // Soumission du formulaire
  // On ne bloque plus la soumission, on laisse Laravel gérer
document.getElementById("showPriveeForm").addEventListener("submit", function() {
  // On peut mettre un petit loader ou un message si tu veux
  console.log("Envoi en cours...");
});

});
</script>

<!-- Modal Show Privée -->
<div class="modal fade" id="showPriveeModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content bg-dark text-white">
      <div class="modal-header">
        <h5 class="modal-title">{{ __('Réserver un Show Privée') }}</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form id="showPriveeForm" method="POST" action="{{ route('show.prive.reserver') }}">
            @csrf
            <input type="hidden" id="modeleId" name="modele_id">

            <div class="mb-3">
                <label class="form-label">{{ __('Date') }}</label>
                <input type="date" class="form-control" id="dateShow" name="date" required>
            </div>

            <div class="row">
                <div class="col">
                    <label class="form-label">{{ __('Heure début') }}</label>
                    <input type="time" class="form-control" id="heureDebut" name="debut" required>
                </div>
                <div class="col">
                    <label class="form-label">{{ __('Heure fin') }}</label>
                    <input type="time" class="form-control" id="heureFin" name="fin" required>
                </div>
            </div>

            <div class="mt-3">
                <label class="form-label">{{ __('Coût total') }}</label>
                <input type="text" class="form-control" id="coutTotal" readonly>
                <!-- champs cachés envoyés au serveur -->
                <input type="hidden" id="coutTotalHidden" name="jetons_total">
                <input type="hidden" id="dureeHidden" name="duree">
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Annuler') }}</button>
        <button type="submit" form="showPriveeForm" class="btn btn-success">{{ __('Confirmer') }}</button>
      </div>
    </div>
  </div>
</div>

<meta name="csrf-token" content="{{ csrf_token() }}">

<script>
document.addEventListener('DOMContentLoaded', () => {
  const csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

  function findMediaElementByPath(path) {
    const selImg = document.querySelectorAll('img[data-path], img');
    for (let el of selImg) {
      if ((el.dataset.path && el.dataset.path === path) || (el.src && el.src.includes(path))) return el;
    }
    const selVid = document.querySelectorAll('video[data-path], video');
    for (let el of selVid) {
      if ((el.dataset.path && el.dataset.path === path) || Array.from(el.querySelectorAll('source')).some(s => s.src.includes(path))) return el;
    }
    return null;
  }

  function unlockMedia(path, type) {
    const media = findMediaElementByPath(path);
    if (!media) return;

    // retire le flou
    media.style.filter = '';
    media.style.removeProperty('filter');

    // si c’est une vidéo
    if (media.tagName.toLowerCase() === 'video') {
      media.setAttribute('controls', ''); 
      media.muted = false;
      try { media.load(); } catch(e) {}
    }

    // supprime overlay
    const overlay = media.closest('.gallery-item')?.querySelector('.buy-overlay');
    if (overlay) overlay.remove();
  }

  async function acheterDetail(modeleId, path, prix, type, btn) {
    try {
      btn.disabled = true;
      btn.innerText = 'Traitement...';

      const resp = await fetch(`/acheter-detail/${modeleId}`, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': csrf,
          'Accept': 'application/json'
        },
        body: JSON.stringify({ photo: path, prix: prix })
      });

      const json = await resp.json();

      if (!resp.ok) {
        const err = json.error || json.message || 'Erreur';
        alert('Achat échoué : ' + err);
        btn.disabled = false;
        btn.innerText = 'Acheter';
        return;
      }

      // succès → maj solde
      if (json.new_balance !== undefined) {
        const span = document.getElementById('userJetons');
        if (span) span.textContent = json.new_balance;
      }

      unlockMedia(path, type);

      // feedback utilisateur — personnalisé selon le type
      // feedback utilisateur — personnalisé selon le type
const message = type === 'video'
    ? 'Vidéo achetée avec succès !'
    : 'Photo achetée avec succès !';

// Ouvre la modal de succès
const successModal = new bootstrap.Modal(document.getElementById('achatSuccessModal'));
successModal.show();


btn.innerText = message.replace('✅ ', ''); // juste "Photo achetée"
btn.classList.add('disabled');
btn.disabled = true;
btn.style.backgroundColor = '#28a745';
btn.style.color = '#fff';

    } catch (e) {
      console.error(e);
      alert('Erreur réseau ou serveur');
      btn.disabled = false;
      btn.innerText = 'Acheter';
    }
  }

  document.querySelectorAll('.btn-buy-detail').forEach(btn => {
    btn.addEventListener('click', (ev) => {
      ev.preventDefault();
      const modeleId = btn.dataset.modeleid;
      const path = btn.dataset.path;
      const prix = parseInt(btn.dataset.prix || 0, 10);
      const type = btn.dataset.type || 'photo';

      if (!modeleId || !path) {
        return alert('Données manquantes pour l\'achat');
      }

      acheterDetail(modeleId, path, prix, type, btn);
    });
  });
});

document.querySelectorAll('.btn-buy-album').forEach(btn => {
    btn.addEventListener('click', async function () {

        const albumId = this.dataset.album;
        const prix = this.dataset.prix;
        const csrf = document.querySelector('meta[name="csrf-token"]').content;

        this.disabled = true;
        this.innerText = "Traitement...";

        const resp = await fetch(`/acheter-album/${albumId}`, {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": csrf,
                "Accept": "application/json",
                "Content-Type": "application/json"
            },
            body: JSON.stringify({})
        });

        const json = await resp.json();

        if (!resp.ok || json.success === false) {
            alert(json.error || "Erreur");
            this.disabled = false;
            this.innerText = "Acheter l’album";
            return;
        }

        // Mise à jour du solde utilisateur
        const span = document.getElementById('userJetons');
        if (span && json.new_balance !== undefined) span.textContent = json.new_balance;

        // Succès
        const successModal = new bootstrap.Modal(document.getElementById('achatSuccessModal'));
        successModal.show();

        this.innerText = "Album acheté";
        this.classList.add('disabled');
    });
});

document.addEventListener("DOMContentLoaded", () => {
  const lightbox = document.getElementById("lightbox");
  const lightboxImg = document.getElementById("lightboxImage");
  const closeBtn = document.querySelector(".lightbox-close");

  // ✅ Ouvre en plein écran les photos non floutées et gratuites
  document.querySelectorAll(".gallery-item img").forEach(img => {
    const style = img.getAttribute("style") || "";
    const isFlou = style.includes("blur(");
    const overlay = img.closest(".gallery-item")?.querySelector(".buy-overlay");
    const isPayant = !!overlay;

    if (!isFlou && !isPayant) {
      img.addEventListener("click", () => {
        lightboxImg.src = img.src;
        lightbox.classList.add("show");
      });
    }
  });

  // ✅ Fermer le lightbox (clic fond noir ou croix)
  lightbox.addEventListener("click", e => {
    if (e.target === lightbox || e.target === closeBtn) {
      lightbox.classList.remove("show");
      lightboxImg.src = "";
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
    // Si albumId est null, on montre tout
    if (!albumId || photoAlbum == albumId) {
      item.style.display = '';
    } else {
      item.style.display = 'none';
    }
  });

  // Effet visuel sur la carte active
  document.querySelectorAll('.album-card').forEach(card => {
    const id = card.getAttribute('data-album-id');
    if (!albumId && !id) {
      card.classList.add('border-success');
    } else if (albumId && id == albumId) {
      card.classList.add('border-success');
      card.style.boxShadow = '0 0 20px rgba(40,167,69,0.5)';
    } else {
      card.classList.remove('border-success');
      card.style.boxShadow = '';
    }
  });
}
</script>
<!-- Modal de succès après achat -->
<div class="modal fade" id="achatSuccessModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content bg-dark text-white text-center p-4" style="border-radius: 12px;">
        
        <div class="mb-3">
            <i class="fas fa-shopping-bag fa-3x text-success"></i>
        </div>

        <h4 class="fw-bold text-success">{{ __('Photo ajoutée à votre galerie privée') }}</h4>
        <p class="mt-2">{{ __('Vous pouvez dès maintenant la retrouver dans votre espace privé') }}.</p>

        <a href="{{ route('achats.mes') }}" class="btn btn-success mt-3 px-4">
            {{ __('Voir ma galerie privée') }}
        </a>

    </div>
  </div>
</div>


@endsection
