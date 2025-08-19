<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'LiveBeauty - Détail modèle')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        :root {
            --accent: #ff4d88;
            --accent-hover: #ff1a66;
            --bg-dark: #0d0d0d;
            --bg-card: rgba(255, 255, 255, 0.08);
            --blur: blur(10px);
            --text-light: #f2f2f2;
        }

        body {
            background: linear-gradient(135deg, #0d0d0d 0%, #1a1a1a 100%);
            color: var(--text-light);
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
            padding: 0;
        }

        a {
            color: var(--accent);
            text-decoration: none;
        }

        a:hover {
            color: var(--accent-hover);
        }

        header, footer {
            background: transparent;
            padding: 1rem 0;
            border: none;
        }

        main {
            padding: 2rem 1rem;
            min-height: 80vh;
            max-width: 1200px;
            margin: 0 auto;
        }

        .glass-card {
            background-color: var(--bg-card);
            backdrop-filter: var(--blur);
            border-radius: 1rem;
            padding: 2rem;
            box-shadow: 0 0 30px rgba(255, 77, 136, 0.15);
        }

        footer {
            color: #aaa;
            font-size: 0.85rem;
            text-align: center;
            margin-top: 3rem;
        }
    </style>
</head>
<body>

    <!-- HEADER -->
    <header class="text-center mb-4">
        <div class="container">
            <div class="site-title fs-3 fw-bold" style="color: var(--accent); letter-spacing: 2px;">LiveBeauty</div>
            <p class="site-subtitle small text-muted">Détail du modèle — Divertissement réservé aux +18</p>
        </div>
    </header>

    <!-- MAIN CONTENT -->
    <main>
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer>
        <p class="mb-0">© {{ date('Y') }} LiveBeautyOfficielle.com — Tous droits réservés.</p>
    </footer>

</body>
</html>
