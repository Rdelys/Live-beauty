@extends('layouts.app')

@section('title', 'Politique d’Utilisation')

@section('content')
<div class="container py-5 text-white">
    <h1 class="text-danger">Politique de Confidentialité</h1>
    <p class="text-white">Votre vie privée est importante. Voici comment nous utilisons vos données :</p>

    <h4 class="text-danger mt-5">1. Responsable du traitement</h4>
    <p>LiveBeauty.com</p>

    <h4 class="text-danger mt-4">2. Données collectées</h4>
    <ul>
        <li>Données de connexion</li>
        <li>Historique d’interactions</li>
        <li>Paiements (via prestataires tiers sécurisés)</li>
    </ul>

    <h4 class="text-danger mt-4">3. Utilisation</h4>
    <ul>
        <li>Création et gestion du compte</li>
        <li>Sécurité et amélioration du service</li>
        <li>Envoi de newsletters/promotions si accord donné</li>
    </ul>

    <h4 class="text-danger mt-4">4. Conservation</h4>
    <ul>
        <li>Données supprimées 3 ans après inactivité</li>
        <li>Données fiscales conservées selon la loi</li>
    </ul>

    <h4 class="text-danger mt-4">5. Vos droits</h4>
    <ul>
        <li>Accès, rectification, suppression, opposition</li>
        <li>Contact : <a href="mailto:Contact@livebeautyofficial.com">Contact@livebeautyofficial.com</a></li>
    </ul>

    <h4 class="text-danger mt-4">6. Cookies</h4>
    <p>Utilisés pour assurer le bon fonctionnement du site. Paramétrables via le navigateur.</p>

    <div class="mt-5 border-top border-secondary pt-4">
        <p class="fw-bold text-white">✅ En cochant la case à l’inscription :</p>
        <p class="fst-italic text-white">"J’ai lu et j’accepte les Conditions Générales d’Utilisation et la Politique de Confidentialité", l’utilisateur donne son consentement explicite.</p>
    </div>
</div>
@endsection
