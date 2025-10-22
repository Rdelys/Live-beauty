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

<script>
    function changePhoto(img) {
        const principale = document.getElementById('photoPrincipale');
        principale.src = img.src;
        document.querySelectorAll('.photo-vignette').forEach(v => v.classList.remove('active'));
        img.classList.add('active');
    }
</script>
@endsection
