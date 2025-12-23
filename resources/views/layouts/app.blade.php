<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <meta name="description" content="LiveBeauty - Plateforme premium">
    <title>@yield('title', 'LiveBeauty')</title>

    <!-- BOOTSTRAP & ICONS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary: #e50914;
            --primary-dark: #b00710;
            --primary-light: #ff4757;
            --secondary: #ffc107;
            --dark: #0a0a0a;
            --dark-light: #1a1a1a;
            --dark-lighter: #2a2a2a;
            --light: #ffffff;
            --light-gray: #f8f9fa;
            --gray: #6c757d;
            --gray-light: #adb5bd;
            --border: rgba(255, 255, 255, 0.1);
            --shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
            --shadow-light: 0 4px 20px rgba(0, 0, 0, 0.1);
            --radius: 12px;
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html, body {
            height: 100%;
        }

        body {
            background: linear-gradient(145deg, var(--dark) 0%, var(--dark-light) 100%);
            color: var(--light);
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            line-height: 1.6;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* HEADER */
        .site-header {
            background: rgba(10, 10, 10, 0.95);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--border);
            padding: 1.5rem 0;
            position: sticky;
            top: 0;
            z-index: 1000;
            transition: var(--transition);
        }

        .site-header.scrolled {
            padding: 1rem 0;
            background: rgba(10, 10, 10, 0.98);
            box-shadow: var(--shadow);
        }

        .header-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .brand-section {
            text-align: center;
            margin-bottom: 1rem;
        }

        .site-title {
            font-family: 'Poppins', sans-serif;
            font-size: 2.8rem;
            font-weight: 800;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            letter-spacing: -0.5px;
            margin: 0;
            line-height: 1.1;
        }

        .site-subtitle {
            font-size: 0.9rem;
            color: var(--gray-light);
            letter-spacing: 3px;
            text-transform: uppercase;
            margin-top: 0.5rem;
            font-weight: 300;
        }

        /* ICONS SECTION */
        .icons-section {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 1.5rem;
            margin-top: 1.5rem;
            flex-wrap: wrap;
        }

        .icon-group {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .icon-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0.5rem;
            color: var(--gray-light);
            transition: var(--transition);
            min-width: 60px;
        }

        .icon-item:hover {
            color: var(--primary);
            transform: translateY(-2px);
        }

        .icon-item i {
            font-size: 1.2rem;
            background: rgba(255, 255, 255, 0.05);
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: var(--transition);
        }

        .icon-item:hover i {
            background: rgba(229, 9, 20, 0.1);
            transform: scale(1.1);
        }

        .icon-label {
            font-size: 0.75rem;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .divider {
            width: 1px;
            height: 30px;
            background: var(--border);
            margin: 0 0.5rem;
        }

        .age-badge {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: white;
            padding: 0.5rem 1.5rem;
            border-radius: 50px;
            font-weight: 700;
            font-size: 0.9rem;
            letter-spacing: 1px;
            box-shadow: 0 4px 15px rgba(229, 9, 20, 0.3);
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        /* MAIN CONTENT */
        .site-main {
            flex: 1;
            padding: 3rem 2rem;
            max-width: 1400px;
            margin: 0 auto;
            width: 100%;
        }

        .content-wrapper {
            animation: fadeIn 0.6s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(15px);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 2.5rem;
            box-shadow: var(--shadow);
            transition: var(--transition);
        }

        .glass-card:hover {
            border-color: rgba(229, 9, 20, 0.3);
            box-shadow: 0 12px 40px rgba(229, 9, 20, 0.15);
        }

        .section-title {
            font-family: 'Poppins', sans-serif;
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--light);
            margin-bottom: 2rem;
            position: relative;
            padding-bottom: 0.75rem;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 60px;
            height: 3px;
            background: linear-gradient(90deg, var(--primary) 0%, var(--primary-light) 100%);
            border-radius: 2px;
        }

        /* FOOTER */
        .site-footer {
            background: rgba(10, 10, 10, 0.98);
            border-top: 1px solid var(--border);
            padding: 2.5rem 0 1.5rem;
            margin-top: auto;
        }

        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .footer-links {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 2rem;
            margin-bottom: 1.5rem;
        }

        .footer-link {
            color: var(--gray-light);
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
            transition: var(--transition);
            position: relative;
        }

        .footer-link:hover {
            color: var(--primary);
        }

        .footer-link::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 1px;
            background: var(--primary);
            transition: width 0.3s ease;
        }

        .footer-link:hover::after {
            width: 100%;
        }

        .footer-divider {
            width: 100%;
            height: 1px;
            background: var(--border);
            margin: 1.5rem 0;
        }

        .footer-info {
            text-align: center;
            color: var(--gray);
            font-size: 0.85rem;
            line-height: 1.6;
        }

        .copyright {
            margin-bottom: 0.5rem;
        }

        .footer-brand {
            color: var(--primary);
            font-weight: 600;
            text-decoration: none;
        }

        .footer-brand:hover {
            color: var(--primary-light);
            text-decoration: underline;
        }

        /* RESPONSIVE DESIGN */
        @media (max-width: 1200px) {
            .header-content,
            .footer-content {
                padding: 0 1.5rem;
            }
            
            .site-main {
                padding: 2.5rem 1.5rem;
            }
        }

        @media (max-width: 992px) {
            .site-title {
                font-size: 2.4rem;
            }
            
            .icons-section {
                gap: 1rem;
            }
            
            .icon-item {
                min-width: 50px;
            }
            
            .glass-card {
                padding: 2rem;
            }
        }

        @media (max-width: 768px) {
            .site-title {
                font-size: 2rem;
            }
            
            .site-subtitle {
                font-size: 0.8rem;
                letter-spacing: 2px;
            }
            
            .icons-section {
                flex-direction: column;
                gap: 1.5rem;
            }
            
            .icon-group {
                justify-content: center;
                flex-wrap: wrap;
            }
            
            .divider {
                display: none;
            }
            
            .age-badge {
                margin-top: 1rem;
            }
            
            .site-main {
                padding: 2rem 1rem;
            }
            
            .glass-card {
                padding: 1.5rem;
            }
            
            .section-title {
                font-size: 1.5rem;
            }
            
            .footer-links {
                flex-direction: column;
                align-items: center;
                gap: 1rem;
            }
        }

        @media (max-width: 576px) {
            .site-title {
                font-size: 1.8rem;
            }
            
            .header-content {
                padding: 0 1rem;
            }
            
            .icon-item {
                min-width: 45px;
            }
            
            .icon-item i {
                width: 36px;
                height: 36px;
                font-size: 1rem;
            }
            
            .icon-label {
                font-size: 0.7rem;
            }
            
            .age-badge {
                padding: 0.4rem 1rem;
                font-size: 0.8rem;
            }
            
            .footer-content {
                padding: 0 1rem;
            }
        }

        @media (max-width: 375px) {
            .site-title {
                font-size: 1.6rem;
            }
            
            .site-subtitle {
                font-size: 0.75rem;
            }
            
            .icon-group {
                gap: 0.5rem;
            }
            
            .icon-item {
                min-width: 40px;
            }
        }

        /* UTILITY CLASSES */
        .text-gradient {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .text-muted {
            color: var(--gray-light);
        }

        .text-center {
            text-align: center;
        }

        .mt-1 { margin-top: 0.5rem; }
        .mt-2 { margin-top: 1rem; }
        .mt-3 { margin-top: 1.5rem; }
        .mt-4 { margin-top: 2rem; }
        .mb-1 { margin-bottom: 0.5rem; }
        .mb-2 { margin-bottom: 1rem; }
        .mb-3 { margin-bottom: 1.5rem; }
        .mb-4 { margin-bottom: 2rem; }

        /* SCROLL BAR STYLING */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: var(--dark);
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(var(--primary), var(--primary-dark));
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(var(--primary-light), var(--primary));
        }
    </style>
</head>
<body>

    <!-- HEADER -->
    <header class="site-header">
        <div class="header-content">
            <!-- BRAND SECTION -->
            <div class="brand-section">
                <h1 class="site-title">LiveBeauty</h1>
                <div class="site-subtitle">Premium Platform</div>
            </div>

            <!-- ICONS SECTION -->
            <div class="icons-section">
                <!-- GLAMOUR ICONS -->
                <div class="icon-group">
                    <div class="icon-item">
                        <i class="fa-solid fa-crown"></i>
                        <span class="icon-label">Premium</span>
                    </div>
                    <div class="icon-item">
                        <i class="fa-solid fa-gem"></i>
                        <span class="icon-label">Luxe</span>
                    </div>
                    <div class="icon-item">
                        <i class="fa-solid fa-star"></i>
                        <span class="icon-label">Élite</span>
                    </div>
                    <div class="icon-item">
                        <i class="fa-solid fa-heart"></i>
                        <span class="icon-label">Passion</span>
                    </div>
                </div>

                <div class="divider"></div>

                <!-- SECURITY ICONS -->
                <div class="icon-group">
                    <div class="icon-item">
                        <i class="fa-solid fa-shield-alt"></i>
                        <span class="icon-label">Sécurisé</span>
                    </div>
                    <div class="icon-item">
                        <i class="fa-solid fa-lock"></i>
                        <span class="icon-label">Privé</span>
                    </div>
                    <div class="icon-item">
                        <i class="fa-solid fa-user-check"></i>
                        <span class="icon-label">Vérifié</span>
                    </div>
                </div>

                <div class="divider"></div>

                <!-- AGE BADGE -->
                <div class="age-badge">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                    <span>ADULTES +18</span>
                </div>
            </div>
        </div>
    </header>

    <!-- MAIN CONTENT -->
    <main class="site-main">
        <div class="content-wrapper">
            @yield('content')
        </div>
    </main>

    <!-- FOOTER -->
    <footer class="site-footer">
        <div class="footer-content">
            <!-- LINKS -->
            <div class="footer-links">
                <a href="{{ route('cgu') }}" class="footer-link">Conditions Générales</a>
                <a href="{{ route('pu') }}" class="footer-link">Politique d'Utilisation</a>
            </div>

            <!-- DIVIDER -->
            <div class="footer-divider"></div>

            <!-- INFO -->
            <div class="footer-info">
                <p class="copyright">
                    © {{ date('Y') }} <a href="/" class="footer-brand">LiveBeautyOfficielle.com</a> — Tous droits réservés
                </p>
                <p class="text-muted">
                    Cette plateforme est réservée aux adultes (+18 ans). Toute utilisation non autorisée est interdite.
                </p>
            </div>
        </div>
    </footer>

    <!-- SCRIPTS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Header scroll effect
        window.addEventListener('scroll', function() {
            const header = document.querySelector('.site-header');
            if (window.scrollY > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Fade in animation on load
        document.addEventListener('DOMContentLoaded', function() {
            document.body.style.opacity = '0';
            document.body.style.transition = 'opacity 0.5s ease';
            
            setTimeout(() => {
                document.body.style.opacity = '1';
            }, 100);
        });

        // Prevent right-click
        document.addEventListener('contextmenu', function(e) {
            e.preventDefault();
        });

        // Prevent keyboard shortcuts for dev tools
        document.addEventListener('keydown', function(e) {
            if (e.key === 'F12' || 
                (e.ctrlKey && e.shiftKey && ['I', 'J', 'C'].includes(e.key)) ||
                (e.ctrlKey && e.key === 'U')) {
                e.preventDefault();
            }
        });
    </script>

</body>
</html>