@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center mt-5">
    <div class="col-md-6">
      <div class="card bg-dark text-white p-4 shadow-lg rounded">
        <h4 class="mb-4 text-center">{{ __('Réinitialiser le mot de passe') }}
</h4>
        <form method="POST" action="{{ route('password.update') }}">
          @csrf

          <input type="hidden" name="token" value="{{ $token }}">
          <input type="hidden" name="email" value="{{ $email }}">

          <div class="mb-3">
            <label class="form-label">{{ __('Nouveau mot de passe') }}
</label>
            <input type="password" name="password" class="form-control" required>
          </div>

          <div class="mb-3">
            <label class="form-label">{{ __('Confirmer le mot de passe') }}
</label>
            <input type="password" name="password_confirmation" class="form-control" required>
          </div>

          <div class="d-grid">
            <button type="submit" class="btn btn-warning">{{ __('Réinitialiser') }}
</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
