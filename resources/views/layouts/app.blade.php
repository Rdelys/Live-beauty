<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'LiveBeauty')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <style>
        :root {
            --accent: #ff4d88;
            --accent-hover: #ff1a66;
            --bg-dark: #0d0d0d;
            --bg-card: rgba(255, 255, 255, 0.05);
            --blur: blur(8px);
            --text-light: #f2f2f2;
        }

        body {
            background-color: var(--bg-dark);
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
            background: linear-gradient(90deg, #1a1a1a, #0d0d0d);
            padding: 1.5rem 0;
            border-bottom: 1px solid #2c2c2c;
        }

        .site-title {
            font-size: 2rem;
            font-weight: bold;
            letter-spacing: 2px;
            color: var(--accent);
        }

        .site-subtitle {
            font-size: 0.9rem;
            color: #ccc;
        }

        main {
            padding: 4rem 1rem;
            min-height: 70vh;
        }

        .glass-card {
            background-color: var(--bg-card);
            backdrop-filter: var(--blur);
            border-radius: 1rem;
            padding: 2rem;
            box-shadow: 0 0 20px rgba(255, 77, 136, 0.1);
        }

        footer {
            border-top: 1px solid #2c2c2c;
            color: #aaa;
        }
    </style>
</head>
<body>

    <!-- HEADER -->
    <header class="text-center">
        <div class="container">
            <div class="site-title">LiveBeauty</div>
            <p class="site-subtitle">Divertissement pour adultes – réservé aux +18</p>
        </div>
    </header>

    <!-- MAIN CONTENT -->
    <main class="container">
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer class="text-center py-4">
        <p class="small mb-0">© {{ date('Y') }} LiveBeautyOfficielle.com — Tous droits réservés.</p>
    </footer>

</body>
</html>
