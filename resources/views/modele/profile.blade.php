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
        height: 500px; /* cadre fixe */
        border-radius: 8px;
        box-shadow: 0 0 15px rgba(255, 193, 7, 0.8);
        overflow: hidden; /* pour ne pas dépasser */
        margin-bottom: 1rem;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #222; /* fond sombre derrière l'image */
    }

    .photo-principale {
        max-width: 100%;
        max-height: 100%;
        object-fit: contain; /* affiche toute l'image sans découpe */
        border-radius: 8px;
        display: block;
    }

    /* Vignettes */
    .photo-vignette {
        width: 80px;
        height: 80px;
        object-fit: cover;
        border-radius: 6px;
        cursor: pointer;
        border: 2px solid transparent;
        transition: border-color 0.3s ease;
    }

    .photo-vignette:hover,
    .photo-vignette.active {
        border-color: #ffc107;
    }

    h2.text-warning {
        color: #ffc107 !important;
        font-weight: 700;
        text-shadow: 1px 1px 5px rgba(0,0,0,0.6);
    }

    @media (max-width: 767px) {
        .photo-vignette {
            width: 60px;
            height: 60px;
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
            <h2 class="text-warning">{{ $modele->prenom }}</h2>
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
@endsection
