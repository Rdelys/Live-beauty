<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Connexion Modèle</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(to right, #141e30, #243b55);
      font-family: 'Poppins', sans-serif;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .login-card {
      background-color: rgba(255, 255, 255, 0.05);
      backdrop-filter: blur(10px);
      border: 1px solid rgba(255, 255, 255, 0.1);
      border-radius: 15px;
      padding: 30px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
      width: 100%;
      max-width: 400px;
      animation: fadeIn 1s ease-in-out;
    }

    .login-card h3 {
      color: #ffffff;
      font-weight: 600;
      margin-bottom: 20px;
      text-align: center;
    }

    .form-label {
      color: #ddd;
    }

    .form-control {
      background-color: rgba(255, 255, 255, 0.1);
      border: none;
      color: #fff;
    }

    .form-control::placeholder {
      color: #aaa;
    }

    .form-control:focus {
      background-color: rgba(255, 255, 255, 0.15);
      border-color: #f44336;
      box-shadow: none;
    }

    .btn-custom {
      background-color: #f44336;
      border: none;
      font-weight: 600;
      transition: background-color 0.3s;
    }

    .btn-custom:hover {
      background-color: #d32f2f;
    }

    .alert-danger {
      margin-top: 10px;
      font-size: 0.9rem;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(-20px); }
      to { opacity: 1; transform: translateY(0); }
    }
  </style>
</head>
<body>

  <div class="login-card">
    <h3>Connexion Modèle</h3>
    <form action="{{ route('modele.login.submit') }}" method="POST">
      @csrf
      <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" placeholder="Entrer votre email" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Mot de passe</label>
        <input type="password" name="password" class="form-control" placeholder="Entrer votre mot de passe" required>
      </div>
      @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
      <button type="submit" class="btn btn-custom w-100 mt-2">Se connecter</button>
    </form>
  </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
