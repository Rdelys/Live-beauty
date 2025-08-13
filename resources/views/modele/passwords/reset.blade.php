@extends('layouts.app')

@section('content')
<div class="container" style="max-width:420px">
  <h3 class="mb-3 text-center">Réinitialiser le mot de passe (Modèle)</h3>

  <form method="POST" action="{{ route('modele.password.update') }}">
    @csrf
    <input type="hidden" name="token" value="{{ $token }}">
    <div class="mb-3">
      <label class="form-label">Email</label>
      <input type="email" name="email" class="form-control" required>
      @error('email') <div class="text-danger small">{{ $message }}</div> @enderror
    </div>
    <div class="mb-3">
      <label class="form-label">Nouveau mot de passe</label>
      <input type="password" name="password" class="form-control" required>
      @error('password') <div class="text-danger small">{{ $message }}</div> @enderror
    </div>
    <div class="mb-3">
      <label class="form-label">Confirmer le mot de passe</label>
      <input type="password" name="password_confirmation" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success w-100">Mettre à jour</button>
  </form>
</div>
@endsection
