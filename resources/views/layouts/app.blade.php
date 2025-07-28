<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'LiveBeauty')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #000;
            color: #fff;
            font-family: 'Segoe UI', sans-serif;
        }
        a {
            color: #ff4d4d;
        }
        a:hover {
            color: #ff1a1a;
        }
        header, footer {
            background-color: #111;
            padding: 1rem 0;
        }
    </style>
</head>
<body>

    <!-- HEADER -->
    <header class="text-center border-bottom border-danger">
        <h1 class="text-danger">LiveBeauty</h1>
<p class="text-white">Divertissement pour adultes - réservé aux +18</p>
    </header>

    <!-- MAIN CONTENT -->
    <main class="container py-5">
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer class="text-center mt-5 border-top border-secondary">
        <p class="small text-secondary mb-0">© {{ date('Y') }} LiveBeautyOfficielle.com — Tous droits réservés.</p>
    </footer>

</body>
</html>
