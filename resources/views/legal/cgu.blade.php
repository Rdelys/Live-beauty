@extends('layouts.app')

@section('title', 'Conditions Générales d’Utilisation')

@section('content')
<div class="container py-5" style="background-color: #000; color: #fff;">
    <h1 class="text-danger mb-4">{{ __('Conditions Générales d’Utilisation ') }} (CGU)</h1>
    <p class="text-white">{{ __('Dernière mise à jour') }} : 10/07/2025</p>
    <p>{{ __('Bienvenue sur') }} <strong>LiveBeautyOfficielle.com</strong>, {{ __('plateforme de divertissement pour adultes') }}.</p>
    <p>{{ __('En accédant et en utilisant ce site, vous acceptez sans réserve les présentes CGU. Si vous êtes en désaccord avec tout ou partie, veuillez ne pas utiliser ce site') }}.</p>

    <h4 class="text-danger mt-5">1. {{ __('Accès au site') }}</h4>
    <ul>
        <li>{{ __('Réservé aux personnes majeures') }} (18 ans et +)</li>
        <li>{{ __('L’utilisateur s’engage à fournir des informations exactes lors de l’inscription') }}</li>
        <li>{{ __('L’accès est personnel et non transférable') }}</li>
    </ul>

    <h4 class="text-danger mt-4">2. {{ __('Contenu') }}</h4>
    <ul>
        <li>{{ __('Le contenu diffusé (vidéos, photos, chat) est à caractère sensuel ou érotique') }}</li>
        <li>{{ __('Toute reproduction ou diffusion non autorisée est strictement interdite') }}</li>
        <li>{{ __('Les modèles agissent de leur plein gré et dans un cadre légal') }}</li>
    </ul>

    <h4 class="text-danger mt-4">3. {{ __('Comportement des utilisateurs') }}</h4>
    <ul>
        <li>{{ __('Respect mutuel exigé') }}</li>
        <li>{{ __('Toute tentative de harcèlement, menace, incitation à la haine entraîne l’exclusion immédiate') }}</li>
        <li>{{ __('Aucun échange de coordonnées personnelles n’est autorisé') }}</li>
    </ul>

    <h4 class="text-danger mt-4">4. {{ __('Paiements') }}</h4>
    <ul>
        <li>{{ __('Certains services sont payants') }}</li>
        <li>{{ __('Les paiements sont traités par des prestataires sécurisés') }}</li>
        <li>{{ __('Aucun remboursement n’est effectué sauf en cas de dysfonctionnement avéré') }}</li>
    </ul>

    <h4 class="text-danger mt-4">5. {{ __('Responsabilité') }}
</h4>
    <p>{{ __('LiveBeauty n’est pas responsable des interruptions, pertes de données ou dommages indirects liés à l’utilisation du site') }}.</p>

    <h4 class="text-danger mt-4">6. {{ __('Modification des CGU') }}</h4>
    <p>{{ __('LiveBeauty se réserve le droit de modifier à tout moment ces conditions. Les utilisateurs seront notifiés via le site') }}.</p>
</div>
@endsection
