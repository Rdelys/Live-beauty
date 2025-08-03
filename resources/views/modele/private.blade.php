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

                <a href="{{ route('modele.private.show', $modele->id) }}" class="btn-private">Show en privé</a>
            </div>

            <p><strong>{{ $modele->age ?? '-' }} ans</strong> — {{ $modele->genre ?? '-' }} — {{ $modele->orientation ?? '-' }}</p>
            <p>{{ $modele->description ?? 'Aucune description' }}</p>

            <hr class="bg-light">

            <h5>Bio :</h5>
            <ul class="list-unstyled">
                <li><strong>Taille :</strong> {{ $modele->taille ?? '-' }} cm</li>
                <li><strong>Fesses :</strong> {{ $modele->fesses ?? '-' }}</li>
                <li><strong>Poitrine :</strong> {{ $modele->poitrine ?? '-' }}</li>
            </ul>

            <h5 class="mt-3">Ce que je propose :</h5>
            <p>{{ $modele->services_prives ?? 'Non précisé' }}</p>
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
