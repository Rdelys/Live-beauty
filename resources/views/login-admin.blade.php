<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #0d0d16, #1e1e2f, #0f0f1c);
            background-size: 300% 300%;
            animation: gradientMove 12s ease infinite;
            font-family: 'Inter', sans-serif;
        }

        @keyframes gradientMove {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .login-box {
            width: 100%;
            max-width: 390px;
            background: rgba(255, 255, 255, 0.05);
            padding: 35px;
            border-radius: 18px;
            box-shadow: 0 8px 30px rgba(0,0,0,0.4);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255,255,255,0.1);
            animation: fadeIn 0.8s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(15px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .login-title {
            font-size: 1.8rem;
            font-weight: 600;
            text-align: center;
            margin-bottom: 25px;
            color: #ff4d6d;
            letter-spacing: 1px;
            text-shadow: 0 0 8px rgba(255, 77, 109, 0.4);
        }

        .form-label {
            font-weight: 500;
            color: #d7d7d7;
        }

        .form-control {
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.15);
            color: #fff;
            height: 48px;
            border-radius: 12px;
        }

        .form-control:focus {
            background: rgba(255, 255, 255, 0.15);
            border-color: #ff4d6d;
            box-shadow: 0 0 10px rgba(255, 77, 109, 0.3);
            color: #fff;
        }

        .btn-login {
            background: linear-gradient(135deg, #ff1e46, #ff4d6d);
            border: none;
            height: 50px;
            border-radius: 12px;
            font-size: 1.1rem;
            font-weight: 600;
            transition: 0.25s;
            width: 100%;
            color:#fff;
            box-shadow: 0 5px 15px rgba(255, 77, 109, 0.3);
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 7px 25px rgba(255, 77, 109, 0.45);
        }

        .alert {
            border-radius: 12px;
        }

    </style>
</head>
<body>

<div class="login-box">

    <div class="login-title">Admin Login</div>

    @if($errors->any())
        <div class="alert alert-danger text-center py-2">{{ $errors->first() }}</div>
    @endif

    <form method="POST" action="{{ route('admin.login.submit') }}">
        @csrf

        <div class="mb-3">
            <label class="form-label">Identifiant</label>
            <input type="text" name="username" class="form-control" required autofocus>
        </div>

        <div class="mb-3">
            <label class="form-label">Mot de passe</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <button class="btn-login">Se connecter</button>
    </form>
</div>

</body>
</html>
