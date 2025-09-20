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

    .photo-vignette:hover,
    .photo-vignette.active {
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
                    <img id="photoPrincipale" src="{{ asset('storage/' . $firstPhoto) }}" alt="Photo principale de {{ $modele->prenom }}" class="photo-principale" />
                </div>

                <div class="d-flex flex-wrap gap-2">
                    @foreach ($photos as $photo)
                        <img src="{{ asset('storage/' . $photo) }}" alt="Photo de {{ $modele->prenom }}" class="photo-vignette" onclick="changePhoto(this)" />
                    @endforeach
                </div>
            @else
                <div class="photo-principale-container">
                    <img src="https://via.placeholder.com/600x400?text=Pas+de+photo" class="photo-principale rounded shadow" />
                </div>
            @endif
        </div>

        <div class="col-12 col-md-6">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2 class="mb-0">
                    {{ $modele->prenom }}
                    @if ($modele->en_ligne)
                        <span class="badge-online">En ligne</span>
                    @else
                        <span class="badge-offline">Hors ligne</span>
                    @endif
                </h2>

                <button class="btn-private"
                        data-bs-toggle="modal"
                        data-bs-target="#showPriveeModal"
                        data-modeleid="{{ $modele->id }}"
                        data-prix="{{ $modele->nombre_jetons_show_privee ?? 0 }}"
                        data-duree="{{ $modele->duree_show_privee ?? 30 }}">
                     Show en privé
                </button>

                <span class="badge bg-warning text-dark ms-2">
    {{ $modele->nombre_jetons_show_privee ?? 'ND' }} jetons / {{ $modele->duree_show_privee ?? 'ND' }} min
                </span>
            </div>


            @if($modele->age || $modele->taille)
                <p>
                    @if($modele->age)<strong>{{ $modele->age }} ans</strong>@endif
                </p>
            @endif

            @if($modele->description)
                <p>{{ $modele->description }}</p>
            @endif

            <hr class="bg-light">

            @if($modele->taille || $modele->fesse || $modele->poitrine)
                <h5>Bio :</h5>
                <ul class="list-unstyled">
                    @if($modele->taille)<li><strong>Taille :</strong> {{ $modele->taille }} cm</li>@endif
                    @if($modele->fesse)<li><strong>Fesses :</strong> {{ $modele->fesse }}</li>@endif
                    @if($modele->poitrine)<li><strong>Poitrine :</strong> {{ $modele->poitrine }}</li>@endif
                </ul>
            @endif

            @if($modele->services)
                <h5 class="mt-3">Ce que je propose :</h5>
                <p>{{ $modele->services }}</p>
            @endif
            @php
    $flags = [
        'FR' => '🇫🇷 Francais',
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
    <h5 class="mt-3">Langues parlées :</h5>
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

        </div>
    </div>
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
        <h5 class="modal-title">Réserver un Show Privée</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form id="showPriveeForm" method="POST" action="{{ route('show.prive.reserver') }}">
            @csrf
            <input type="hidden" id="modeleId" name="modele_id">

            <div class="mb-3">
                <label class="form-label">Date</label>
                <input type="date" class="form-control" id="dateShow" name="date" required>
            </div>

            <div class="row">
                <div class="col">
                    <label class="form-label">Heure début</label>
                    <input type="time" class="form-control" id="heureDebut" name="debut" required>
                </div>
                <div class="col">
                    <label class="form-label">Heure fin</label>
                    <input type="time" class="form-control" id="heureFin" name="fin" required>
                </div>
            </div>

            <div class="mt-3">
                <label class="form-label">Coût total</label>
                <input type="text" class="form-control" id="coutTotal" readonly>
                <!-- champs cachés envoyés au serveur -->
                <input type="hidden" id="coutTotalHidden" name="jetons_total">
                <input type="hidden" id="dureeHidden" name="duree">
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
        <button type="submit" form="showPriveeForm" class="btn btn-success">Confirmer</button>
      </div>
    </div>
  </div>
</div>


@endsection
