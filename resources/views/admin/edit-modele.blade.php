@extends('layouts.app')

@section('content')
<style>
    /* 🌑 Thème Rouge & Noir */
    body {
        background: #0e0e0e;
        color: #f5f5f5;
        font-family: "Poppins", sans-serif;
    }

    .card-premium {
        background: linear-gradient(145deg, #1a1a1a, #111);
        border: none;
        border-radius: 18px;
        box-shadow: 0 8px 30px rgba(255, 0, 0, 0.15);
        padding: 35px;
        transition: all 0.3s ease;
    }

    .card-premium:hover {
        transform: translateY(-4px);
        box-shadow: 0 10px 40px rgba(255, 0, 0, 0.25);
    }

    .card-premium h2 {
        font-weight: 700;
        color: #ff1a1a;
        letter-spacing: 1px;
        margin-bottom: 25px;
        text-align: center;
        text-transform: uppercase;
    }

    label.form-label {
        font-weight: 600;
        color: #f1f1f1;
    }

    .form-control {
        border-radius: 12px;
        border: 1px solid #333;
        background-color: #181818;
        color: #fff;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        border-color: #ff1a1a;
        box-shadow: 0 0 0 0.25rem rgba(255, 26, 26, 0.25);
    }

    /* 🎯 Boutons */
    .btn-primary {
        background: linear-gradient(135deg, #ff1a1a, #cc0000);
        border: none;
        border-radius: 12px;
        font-weight: 600;
        padding: 12px 25px;
        transition: all 0.3s ease;
        color: #fff;
    }

    .btn-primary:hover {
        background: linear-gradient(135deg, #cc0000, #a80000);
        transform: translateY(-2px);
    }

    .btn-secondary {
        background: #333;
        color: #fff;
        border: none;
        border-radius: 12px;
        font-weight: 600;
        padding: 12px 25px;
        transition: all 0.3s ease;
    }

    .btn-secondary:hover {
        background: #444;
        transform: translateY(-2px);
    }

    /* 🎥 Galerie */
    .media-gallery img,
    .media-gallery video {
        border-radius: 10px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border: 2px solid #222;
    }

    .media-gallery img:hover,
    .media-gallery video:hover {
        transform: scale(1.05);
        box-shadow: 0 0 15px rgba(255, 0, 0, 0.4);
    }

    /* 🩸 Séparateurs */
    .section-divider {
        height: 2px;
        background: linear-gradient(to right, transparent, #ff1a1a, transparent);
        margin: 25px 0;
        border-radius: 2px;
    }

    /* 📱 Responsive */
    @media (max-width: 768px) {
        .card-premium {
            padding: 20px;
        }

        h2 {
            font-size: 1.5rem;
        }
    }
</style>

<div class="container mt-5 mb-5">
    <div class="card-premium mx-auto col-12 col-md-10 col-lg-8">
        <h2>🖋️ Modifier le Modèle</h2>

        <form action="{{ route('modeles.update', $modele->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- 🧍 Informations principales --}}
            <div class="row mb-4">
                <div class="col-md-6 mb-3">
                    <label for="nom" class="form-label">Nom</label>
                    <input type="text" id="nom" name="nom" class="form-control"
                           value="{{ old('nom', $modele->nom) }}" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="prenom" class="form-label">Prénom</label>
                    <input type="text" id="prenom" name="prenom" class="form-control"
                           value="{{ old('prenom', $modele->prenom) }}" required>
                </div>
            </div>

            {{-- 📝 Description --}}
            <div class="mb-4">
                <label for="description" class="form-label">Description</label>
                <textarea id="description" name="description" class="form-control" rows="4" required>{{ old('description', $modele->description) }}</textarea>
            </div>

            <div class="section-divider"></div>

            {{-- 🔗 Liens vidéos --}}
            <div class="mb-4">
                <label for="video_link" class="form-label">Ajouter un lien vidéo</label>
                <input type="url" class="form-control" id="video_link" name="video_link[]" placeholder="https://exemple.com/video" />
            </div>

            @if(!empty($modele->video_link))
                <div class="mb-4">
                    <p class="fw-bold text-danger">Liens vidéos actuels :</p>
                    <ul class="list-unstyled ps-3">
                        @foreach((array) $modele->video_link as $link)
                            <li class="mb-2">
                                <a href="{{ $link }}" target="_blank" rel="noopener noreferrer"
                                   class="text-decoration-none text-danger fw-semibold">
                                    🎥 {{ $link }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="section-divider"></div>

            {{-- 🎬 Vidéos --}}
            <div class="mb-4">
                <label for="video_file" class="form-label">Changer / Ajouter des vidéos</label>
                <input type="file" class="form-control" id="video_file" name="video_file[]" accept="video/*" multiple>

                @if(!empty($modele->video_file))
                    <div class="media-gallery d-flex flex-wrap gap-3 mt-3">
                        @foreach((array) $modele->video_file as $video)
                            <video width="180" controls>
                                <source src="{{ asset('storage/' . $video) }}" type="video/mp4">
                            </video>
                        @endforeach
                    </div>
                @endif
            </div>

            <div class="section-divider"></div>

            {{-- 🖼️ Photos --}}
            <div class="mb-4">
                <label class="form-label">Ajouter des photos</label>
                <input type="file" name="photos[]" class="form-control" accept="image/*" multiple>
            </div>

            @if(!empty($modele->photos))
                <div class="media-gallery d-flex flex-wrap gap-3 mb-4">
                    @foreach((array) $modele->photos as $photo)
                        <img src="{{ asset('storage/' . $photo) }}" width="120" alt="Photo du modèle">
                    @endforeach
                </div>
            @endif

            <div class="section-divider"></div>

            {{-- 🔘 Boutons --}}
            <div class="d-flex justify-content-between align-items-center mt-4">
                <button type="submit" class="btn btn-primary px-4">💾 Enregistrer</button>
                <a href="{{ route('admin') }}" class="btn btn-secondary px-4">↩️ Annuler</a>
            </div>
        </form>
    </div>
</div>
@endsection
