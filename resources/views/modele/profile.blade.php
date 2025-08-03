@extends('layouts.app')

@section('content')
<div class="container py-5 text-white">
    <div class="row g-4">
        <div class="col-md-6">
            @php
                $photos = is_array($modele->photos) ? $modele->photos : json_decode($modele->photos ?? '[]', true);
            @endphp

            @if (!empty($photos))
                <img src="{{ asset('storage/' . $photos[0]) }}" class="img-fluid rounded shadow mb-3" style="object-fit: cover; width: 100%; max-height: 500px;" />
                <div class="d-flex flex-wrap gap-2">
                    @foreach ($photos as $photo)
                        <img src="{{ asset('storage/' . $photo) }}" class="rounded" style="width: 80px; height: 80px; object-fit: cover;">
                    @endforeach
                </div>
            @else
                <img src="https://via.placeholder.com/600x400?text=Pas+de+photo" class="img-fluid rounded shadow" />
            @endif
        </div>

        <div class="col-md-6">
            <h2 class="text-warning">{{ $modele->prenom }}</h2>
            <p><strong>{{ $modele->age ?? '-' }} ans</strong> — {{ $modele->genre ?? '-' }} — {{ $modele->orientation ?? '' }}</p>
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
@endsection
