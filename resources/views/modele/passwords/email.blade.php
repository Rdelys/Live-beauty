@extends('layouts.app')

@section('content')
<div class="container" style="max-width:420px">
  <h3 class="mb-3 text-center">Mot de passe oublié (Modèle)</h3>
  @if (session('status'))
    <div class="alert alert-success">{{ session('status') }}</div>
  @endif
  <form method="POST" action="{{ route('modele.password.email') }}">
    @csrf
    <div class="mb-3">
      <label class="form-label">Email</label>
      <input type="email" name="email" class="form-control" required autofocus>
      @error('email') <div class="text-danger small">{{ $message }}</div> @enderror
    </div>
    <button type="submit" class="btn btn-danger w-100">Envoyer le lien</button>
  </form>
</div>
@endsection
