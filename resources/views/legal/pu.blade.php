@extends('layouts.app')

@section('title', 'Politique d’Utilisation')

@section('content')
<div class="container py-5 text-white">
    <h1 class="text-danger">{{ __('Politique de Confidentialité') }}</h1>
    <p class="text-white">{{ __('Votre vie privée est importante. Voici comment nous utilisons vos données') }} :</p>

    <h4 class="text-danger mt-5">1. {{ __('Responsable du traitement') }}</h4>
    <p>LiveBeauty.com</p>

    <h4 class="text-danger mt-4">2. {{ __('Données collectées') }}
</h4>
    <ul>
        <li>{{ __('Données de connexion') }}</li>
        <li>{{ __('Historique d’interactions') }}</li>
        <li>{{ __('Paiements (via prestataires tiers sécurisés)') }}</li>
    </ul>

    <h4 class="text-danger mt-4">3. {{ __('Utilisation') }}</h4>
    <ul>
        <li>{{ __('Création et gestion du compte') }}</li>
        <li>{{ __('Sécurité et amélioration du service') }}</li>
        <li>{{ __('Envoi de newsletters/promotions si accord donné') }}</li>
    </ul>

    <h4 class="text-danger mt-4">4. {{ __('Conservation') }}</h4>
    <ul>
        <li>{{ __('Données supprimées 3 ans après inactivité') }}</li>
        <li>{{ __('Données fiscales conservées selon la loi') }}</li>
    </ul>

    <h4 class="text-danger mt-4">5. {{ __('Vos droits') }}</h4>
    <ul>
        <li>{{ __('Accès, rectification, suppression, opposition') }}</li>
        <li>{{ __('Contact') }} : <a href="mailto:Contact@livebeautyofficial.com">Contact@livebeautyofficial.com</a></li>
    </ul>

    <h4 class="text-danger mt-4">6. {{ __('Cookies') }}</h4>
    <p>{{ __('Utilisés pour assurer le bon fonctionnement du site. Paramétrables via le navigateur') }}.</p>

    <div class="mt-5 border-top border-secondary pt-4">
        <p class="fw-bold text-white">✅ {{ __('En cochant la case à l’inscription ') }} :</p>
        <p class="fst-italic text-white">"{{ __('J’ai lu et j’accepte les Conditions Générales d’Utilisation et la Politique de Confidentialité", l’utilisateur donne son consentement explicite') }} .</p>
    </div>
</div>
@endsection
