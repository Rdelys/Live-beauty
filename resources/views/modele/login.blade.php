<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Connexion Modèle | Live Beauty</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap & Fonts -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

  <style>
    body {
      font-family: 'Poppins', sans-serif;
      margin: 0;
      background: #f9f9f9;
      color: #222;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .container-login {
      display: flex;
      flex-wrap: wrap;
      width: 90%;
      max-width: 1000px;
      background: #ffffff;
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 10px 40px rgba(0,0,0,0.08);
    }

    /* Section gauche */
    .login-left {
      flex: 1;
      background: linear-gradient(135deg, #000000, #2c2c2c);
      color: #fff;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: flex-start;
      padding: 60px;
    }

    .login-left h2 {
      font-weight: 600;
      font-size: 1.9rem;
      margin-bottom: 15px;
    }

    .login-left p {
      font-size: 1rem;
      color: #ddd;
      line-height: 1.6;
      margin-bottom: 25px;
      max-width: 90%;
    }

    .feature {
      display: flex;
      align-items: center;
      margin-bottom: 15px;
      color: #fff;
      font-size: 0.95rem;
    }

    .feature i {
      font-size: 1.2rem;
      color: #e50914;
      margin-right: 10px;
    }

    /* Section droite */
    .login-right {
      flex: 1;
      padding: 60px 50px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      background: #fff;
    }

    .login-right h3 {
      font-weight: 600;
      text-align: center;
      color: #000;
      margin-bottom: 30px;
    }

    .form-label {
      color: #333;
      font-weight: 500;
    }

    .form-control {
      border-radius: 10px;
      border: 1px solid #ccc;
      padding: 12px;
      transition: all 0.3s ease;
    }

    .form-control:focus {
      border-color: #e50914;
      box-shadow: 0 0 6px rgba(229, 9, 20, 0.4);
    }

    .btn-custom {
      background: #e50914;
      border: none;
      border-radius: 10px;
      padding: 12px;
      font-weight: 600;
      color: #fff;
      text-transform: uppercase;
      transition: all 0.3s ease;
      margin-top: 10px;
    }

    .btn-custom:hover {
      background: #c40812;
      transform: translateY(-2px);
      box-shadow: 0 6px 15px rgba(229, 9, 20, 0.3);
    }

    .text-link {
      display: block;
      text-align: center;
      margin-top: 15px;
      color: #444;
      font-size: 0.9rem;
      transition: color 0.3s;
    }

    .text-link:hover {
      color: #e50914;
      text-decoration: none;
    }

    .alert-danger {
      background: #fff0f0;
      border: 1px solid #f5b5b5;
      color: #c9302c;
      border-radius: 8px;
      padding: 8px 12px;
      font-size: 0.9rem;
      margin-top: 5px;
    }

    /* Responsive */
    @media (max-width: 768px) {
      .container-login {
        flex-direction: column;
      }
      .login-left {
        padding: 40px 30px;
        align-items: center;
        text-align: center;
      }
      .login-right {
        padding: 40px 25px;
      }
    }
  </style>
</head>
<body>

  <div class="container-login">
    
    <!-- Colonne gauche -->
    <div class="login-left">
      <h2><i class="fa-solid fa-user-tie me-2"></i>Connexion à votre espace</h2>
      <p>Bienvenue sur <strong>Live Beauty</strong>. Connectez-vous pour accéder à votre espace modèle, gérer votre profil, vos revenus et vos contenus exclusifs.</p>
      
      <div class="feature"><i class="fa-solid fa-star"></i>Gérez vos revenus et statistiques en temps réel</div>
      <div class="feature"><i class="fa-solid fa-photo-film"></i>Gérez vos galeries photo et vidéo</div>
      <div class="feature"><i class="fa-solid fa-video"></i>Lancez vos lives publics et privés</div>
    </div>

    <!-- Colonne droite -->
    <div class="login-right">
      <h3><i class="fa-solid fa-lock me-2 text-danger"></i>Connexion Modèle</h3>
      <form action="{{ route('modele.login.submit') }}" method="POST">
        @csrf
        <div class="mb-3">
          <label class="form-label"><i class="fa-solid fa-envelope me-2 text-danger"></i>Email</label>
          <input type="email" name="email" class="form-control" placeholder="Entrez votre email" required>
        </div>
        <div class="mb-3">
          <label class="form-label"><i class="fa-solid fa-key me-2 text-danger"></i>Mot de passe</label>
          <input type="password" name="password" class="form-control" placeholder="Entrez votre mot de passe" required>
        </div>

        @error('email')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <button type="submit" class="btn btn-custom w-100">Se connecter</button>
        <a class="text-link" href="{{ route('modele.password.request') }}">Mot de passe oublié ?</a>
      </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
