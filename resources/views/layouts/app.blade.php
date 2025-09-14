<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'KISAH ROLEPLAY | ROBLOX')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Header Navigation -->
    <header class="header">
        <nav class="navbar">
            <div class="nav-container">
                <!-- Logo -->
                <div class="nav-logo">
                    <img src="{{ asset('images/logo.png') }}" alt="KISAH ROLEPLAY" class="logo-img">
                    <span class="logo-text">KISAH<br>ROLEPLAY</span>
                </div>

                <!-- Navigation Links -->
                <div class="nav-links">
                    <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Beranda</a>
                    <a href="{{ route('leaderboard') }}" class="nav-link {{ request()->routeIs('leaderboard') ? 'active' : '' }}">Leaderboard</a>
                    <a href="{{ route('donation') }}" class="nav-link {{ request()->routeIs('donation') ? 'active' : '' }}">Donasi</a>
                </div>

                <!-- Profile Button -->
                <div class="nav-actions">
                    <a href="{{ route('profile') }}" class="btn-profile">PROFILE</a>
                </div>

                <!-- Mobile Menu Toggle -->
                <div class="mobile-menu-toggle">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </nav>
    </header>

    <!-- Main Content -->
    <main class="main-content">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-content">
                <p>&copy; 2025 KISAH ROLEPLAY. All rights reserved.</p>
                <div class="footer-links">
                    <a href="#" class="footer-link">Privacy Policy</a>
                    <span class="footer-separator">|</span>
                    <a href="#" class="footer-link">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Mobile Menu -->
    <div class="mobile-menu">
        <div class="mobile-menu-content">
            <a href="{{ route('home') }}" class="mobile-nav-link">Beranda</a>
            <a href="{{ route('leaderboard') }}" class="mobile-nav-link">Leaderboard</a>
            <a href="{{ route('donation') }}" class="mobile-nav-link">Donasi</a>
            <a href="{{ route('profile') }}" class="mobile-nav-link">Profile</a>
        </div>
    </div>

    <script>
        // Mobile menu toggle
        document.querySelector('.mobile-menu-toggle').addEventListener('click', function() {
            document.querySelector('.mobile-menu').classList.toggle('active');
            this.classList.toggle('active');
        });
    </script>
</body>
</html>
