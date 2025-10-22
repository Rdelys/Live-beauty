<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'LiveBeauty')</title>

    <!-- BOOTSTRAP & ICONS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <style>
        :root {
            --accent: #e50914;
            --accent-hover: #ff1a66;
            --bg-dark: #0a0a0a;
            --bg-gradient: linear-gradient(145deg, #0a0a0a 0%, #1a1a1a 100%);
            --glass-bg: rgba(255, 255, 255, 0.05);
            --text-light: #f2f2f2;
            --text-muted: #aaa;
        }

        body {
            background: var(--bg-gradient);
            color: var(--text-light);
            font-family: 'Poppins', 'Segoe UI', sans-serif;
            margin: 0;
            padding: 0;
        }

        /* HEADER */
        header {
            background: rgba(0, 0, 0, 0.85);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            padding: 2rem 0;
            text-align: center;
            position: relative;
        }

        .site-title {
            font-size: 2.2rem;
            font-weight: 700;
            letter-spacing: 2px;
            color: var(--accent);
            text-transform: uppercase;
        }

        .icon-line {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 0.8rem;
            color: var(--text-muted);
            margin-top: 0.5rem;
        }

        .icon-line i {
            font-size: 1.1rem;
            color: var(--accent);
            transition: transform 0.3s ease, color 0.3s ease;
        }

        .icon-line i:hover {
            color: var(--accent-hover);
            transform: scale(1.2);
        }

        main {
            padding: 4rem 1rem;
            min-height: 70vh;
            max-width: 1200px;
            margin: 0 auto;
        }

        .glass-card {
            background: var(--glass-bg);
            backdrop-filter: blur(12px);
            border-radius: 1rem;
            padding: 2rem;
            box-shadow: 0 0 30px rgba(229, 9, 20, 0.15);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .glass-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 0 45px rgba(229, 9, 20, 0.25);
        }

        footer {
            background: rgba(0, 0, 0, 0.85);
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: var(--text-muted);
            text-align: center;
            padding: 1.5rem 1rem;
            font-size: 0.9rem;
        }

        footer a {
            color: var(--accent);
            text-decoration: none;
            font-weight: 500;
        }

        footer a:hover {
            color: var(--accent-hover);
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            .site-title {
                font-size: 1.7rem;
            }
            .icon-line i {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>

    <!-- HEADER -->
    <header>
        <div class="container">
            <div class="site-title">LiveBeauty</div>

            <!-- Ligne d’icônes pour le glamour -->
            <div class="icon-line">
                <i class="fa-solid fa-crown"></i>
                <i class="fa-solid fa-gem"></i>
                <i class="fa-solid fa-kiss-wink-heart"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-heart"></i>
            </div>

            <!-- Ligne d’icônes pour le +18 -->
            <div class="icon-line mt-2">
                <i class="fa-solid fa-triangle-exclamation"></i>
                <i class="fa-solid fa-fire"></i>
                <i class="fa-solid fa-ban"></i>
                <i class="fa-solid fa-heart-crack"></i>
                <span style="font-weight:600;color:var(--accent);font-size:1rem;">+18</span>
            </div>
        </div>
    </header>

    <!-- MAIN CONTENT -->
    <main>
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer>
        <p class="mb-0">
            © {{ date('Y') }} <strong>LiveBeautyOfficielle.com</strong> — Tous droits réservés.<br>
            <a href="{{ route('cgu') }}">Conditions d’utilisation</a> |
            <a href="{{ route('pu') }}">Politique d’utilisation</a>
        </p>
    </footer>

</body>
</html>
