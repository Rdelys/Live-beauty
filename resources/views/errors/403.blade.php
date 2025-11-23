@extends('layouts.app')

@section('content')
<style>
    .error-container {
        text-align: center;
        padding: 80px 20px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        color: #333;
        max-width: 480px;
        margin: 0 auto;
    }
    .error-icon {
        width: 96px;
        height: 96px;
        margin-bottom: 20px;
        fill: #e74c3c; /* rouge professionnel */
    }
    h1 {
        font-size: 3rem;
        margin-bottom: 15px;
        font-weight: 700;
    }
    p {
        font-size: 1.2rem;
        color: #555;
        margin-bottom: 30px;
    }
    .btn-home {
        display: inline-block;
        padding: 12px 28px;
        background-color: #3498db;
        color: white;
        text-decoration: none;
        border-radius: 6px;
        font-weight: 600;
        box-shadow: 0 4px 8px rgb(52 152 219 / 0.4);
        transition: background-color 0.3s ease;
    }
    .btn-home:hover {
        background-color: #2980b9;
    }
</style>

<div class="error-container" role="alert" aria-labelledby="error-title" aria-describedby="error-desc">
    <svg class="error-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
        <path d="M12 2a5 5 0 0 0-5 5v3H6a2 2 0 0 0-2 2v7a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-7a2 2 0 0 0-2-2h-1V7a5 5 0 0 0-5-5zm-3 5a3 3 0 0 1 6 0v3H9V7zm9 5v7H6v-7h12z"/>
    </svg>

    <h1 id="error-title">403 - {{ __('Accès interdit') }}</h1>
    <p id="error-desc">{{ __(''Malheureusement, l'accès à ce site ou page est interdit pour vous ou votre pays) }}.</p>
    <a href="{{ url('/') }}" class="btn-home" role="button" aria-label="Retour à la page d'accueil">{{ __('Retour à l'accueil') }}</a>
</div>
@endsection
