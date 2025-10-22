<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'LiveBeauty - Détail modèle')</title>

    <!-- BOOTSTRAP & ICONS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        :root {
            --red: #e50914;
            --red-dark: #b00610;
            --black: #0a0a0a;
            --white: #ffffff;
            --gray: #cccccc;
        }

        body {
            background: linear-gradient(145deg, var(--black) 0%, #1a1a1a 100%);
            color: var(--white);
            font-family: 'Poppins', 'Segoe UI', sans-serif;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        /* HEADER PREMIUM MINIMAL */
        header {
            text-align: center;
            padding: 3rem 1rem 1rem;
            background: transparent;
        }

        .site-title {
            font-size: 2.6rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 3px;
            color: var(--red);
        }

        /* ICON LINE (pour remplacer les textes) */
        .symbol-line {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 1.2rem;
            margin-top: 1.5rem;
            flex-wrap: wrap;
        }

        .symbol-line i,
        .symbol-line .badge-18 {
            font-size: 1.4rem;
            color: var(--gray);
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 50%;
            width: 48px;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .symbol-line .badge-18 {
            font-size: 0.95rem;
            font-weight: 600;
            color: var(--white);
            background: var(--red);
            border: none;
            box-shadow: 0 0 12px rgba(229, 9, 20, 0.4);
        }

        .symbol-line i:hover,
        .symbol-line .badge-18:hover {
            color: var(--white);
            background: var(--red);
            box-shadow: 0 0 20px rgba(229, 9, 20, 0.6);
            transform: scale(1.1);
        }

        /* MAIN */
        main {
            padding: 3rem 1rem;
            max-width: 1100px;
            margin: 0 auto;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 1rem;
            backdrop-filter: blur(12px);
            padding: 2rem;
            box-shadow: 0 0 40px rgba(229, 9, 20, 0.15);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .glass-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 0 50px rgba(229, 9, 20, 0.25);
        }

        a {
            color: var(--red);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        a:hover {
            color: var(--white);
        }

        /* FOOTER */
        footer {
            background: rgba(0, 0, 0, 0.85);
            color: var(--gray);
            font-size: 0.9rem;
            text-align: center;
            padding: 1.8rem 1rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            margin-top: 4rem;
        }

        footer a {
            color: var(--red);
            font-weight: 500;
        }

        footer a:hover {
            color: var(--white);
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            .site-title {
                font-size: 1.9rem;
            }
            .symbol-line {
                gap: 0.9rem;
            }
            .symbol-line i,
            .symbol-line .badge-18 {
                width: 42px;
                height: 42px;
                font-size: 1.1rem;
            }
        }
    </style>
</head>

<body>

    <!-- HEADER -->
    <header>
        <div class="container">
            <div class="site-title">LiveBeauty</div>

            <!-- LIGNE D’ICÔNES SYMBOLIQUES -->
            <div class="symbol-line">
                <i class="fa-solid fa-gem"></i>
                <i class="fa-solid fa-heart"></i>
                <i class="fa-solid fa-camera"></i>
                <div class="badge-18">18+</div>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-fire"></i>
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
