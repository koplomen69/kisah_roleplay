<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Kisah Roleplay')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600;700;900&family=Rajdhani:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <!-- Custom Styles -->
    @yield('styles')

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Rajdhani', sans-serif;
            background: linear-gradient(135deg, #480018 0%, #4B021B 25%, #4A071D 50%, #98194A 75%, #D77CA8 100%);
            min-height: 100vh;
        }

        /* Navigation */
        .top-nav {
            background: rgba(72, 0, 24, 0.95);
            backdrop-filter: blur(10px);
            border-bottom: 2px solid rgba(215, 124, 168, 0.3);
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .logo {
            font-family: 'Orbitron', monospace;
            font-size: 1.5rem;
            font-weight: 900;
            color: #D77CA8;
            text-decoration: none;
            text-shadow: 0 0 20px rgba(215, 124, 168, 0.5);
        }

        .nav-menu {
            display: flex;
            gap: 30px;
            align-items: center;
        }

        .nav-link {
            color: white;
            text-decoration: none;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.3s ease;
            padding: 8px 16px;
            border-radius: 8px;
        }

        .nav-link:hover {
            color: #D77CA8;
            background: rgba(215, 124, 168, 0.1);
        }

        .profile-btn {
            background: linear-gradient(135deg, #98194A 0%, #D77CA8 100%);
            color: white;
            padding: 10px 20px;
            border-radius: 25px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            box-shadow: 0 0 20px rgba(215, 124, 168, 0.3);
        }

        .profile-btn:hover {
            color: white;
            box-shadow: 0 0 30px rgba(215, 124, 168, 0.5);
            transform: translateY(-2px);
        }

        @media (max-width: 768px) {
            .top-nav {
                padding: 10px 15px;
            }

            .nav-menu {
                gap: 15px;
            }

            .nav-link {
                font-size: 0.9rem;
                padding: 6px 12px;
            }

            .profile-btn {
                padding: 8px 16px;
                font-size: 0.9rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="top-nav">
        <a href="/" class="logo">KISAH ROLEPLAY</a>
        <div class="nav-menu">
            <a href="/beranda" class="nav-link">Beranda</a>
            <a href="/leaderboard" class="nav-link">Leaderboard</a>
            <a href="/donasi" class="nav-link">Donasi</a>
            <a href="/profile" class="nav-link profile-btn">PROFILE</a>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom Scripts -->
    @yield('scripts')
</body>
</html>
