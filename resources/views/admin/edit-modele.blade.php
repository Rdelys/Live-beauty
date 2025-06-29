@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-danger">Modifier le modèle</h2>
    <form action="{{ route('modeles.update', $modele->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" value="{{ $modele->nom }}" required />
            </div>
            <div class="col-md-6">
                <label for="prenom" class="form-label">Prénom</label>
                <input type="text" class="form-control" id="prenom" name="prenom" value="{{ $modele->prenom }}" required />
            </div>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" required>{{ $modele->description }}</textarea>
        </div>

        <div class="mb-3">
            <label for="video_link" class="form-label">Lien vidéo</label>
            <input type="url" class="form-control" id="video_link" name="video_link" value="{{ $modele->video_link }}" />
        </div>

        <div class="mb-3">
            <label for="video_file" class="form-label">Changer la vidéo</label>
            <input type="file" class="form-control" id="video_file" name="video_file" accept="video/*" />
            @if($modele->video_file)
                <p class="mt-2">Vidéo actuelle :</p>
                <video width="200" controls>
                    <source src="{{ asset('storage/' . $modele->video_file) }}" type="video/mp4" />
                </video>
            @endif
        </div>

        <div class="mb-3">
            <label class="form-label">Ajouter des photos</label>
            <input type="file" name="photos[]" class="form-control" accept="image/*" multiple />
        </div>

        @if($modele->photos)
            <div class="mb-3">
                <p>Photos actuelles :</p>
                <div class="d-flex flex-wrap gap-2">
                    @foreach(json_decode($modele->photos, true) as $photo)
                        <img src="{{ asset('storage/' . $photo) }}" width="100" class="rounded zoomable-photo" style="cursor: zoom-in;" />
                    @endforeach
                </div>
            </div>
        @endif

        <button type="submit" class="btn btn-primary">Enregistrer</button>
        <a href="{{ route('admin') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>

<!-- Modal image déjà définie dans admin.blade.php -->
@endsection
