@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center mt-5">
    <div class="col-md-8">
      <div class="alert alert-success text-center shadow-lg p-5 rounded bg-dark text-white">
        <h4 class="mb-3">✅ {{ __('Mot de passe modifié avec succès ') }}
!</h4>
       <p>
  {{ __("Vous allez être redirigé vers la page d'accueil dans") }}
  <span id="countdown">5</span>
  {{ __("secondes") }}.
</p>

        <p class="small text-muted">{{ __('Si la redirection ne fonctionne pas') }}
, <a href="{{ url('/') }}" class="text-warning">{{ __('cliquez ici') }}
</a>.</p>
      </div>
    </div>
  </div>
</div>

<script>
  let seconds = 5;
  const countdown = document.getElementById('countdown');
  const interval = setInterval(() => {
    seconds--;
    countdown.textContent = seconds;
    if (seconds <= 0) {
      clearInterval(interval);
      window.location.href = "{{ url('/') }}";
    }
  }, 1000);
</script>
@endsection
