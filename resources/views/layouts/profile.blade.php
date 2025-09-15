<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Kisah Roleplay')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600;700;900&family=Rajdhani:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <!-- Custom Styles -->
    @yield('styles')
    <link href="{{ asset('css/navbar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/landing-inline.css') }}" rel="stylesheet">
</head>

<body class="cyberpunk-theme">
    <!-- Header Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top cyberpunk-navbar">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('home') }}">
                <div class="nav-logo">
                    <img src="{{ asset('images/k-logo.png') }}" alt="K" class="nav-logo-img">
                    <span class="nav-logo-text">KISAH ROLEPLAY</span>
                </div>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
                            href="{{ route('home') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('leaderboard') ? 'active' : '' }}"
                            href="{{ route('leaderboard') }}">Leaderboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('donasi') ? 'active' : '' }}"
                            href="{{ route('donasi') }}">Donasi</a>
                    </li>
                    @auth
                        <li class="nav-item ms-lg-3">
                            <a class="btn btn-profile {{ request()->routeIs('profile') ? 'active' : '' }}"
                                href="{{ route('profile') }}">PROFILE</a>
                        </li>
                    @else
                        <li class="nav-item ms-lg-3">
                            <a class="btn btn-profile" href="{{ route('login') }}">PROFILE</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="main-content">
        <div class="container py-4">
            @yield('content')
        </div>
    </main>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Alert Animations -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Handle all cyberpunk alerts
            const alerts = document.querySelectorAll('.cyberpunk-alert, .cyberpunk-alert-error');
            alerts.forEach(function(alert) {
                // Add entrance animation class
                alert.style.opacity = '0';
                alert.style.transform = 'translateY(-20px)';

                // Trigger entrance animation
                setTimeout(() => {
                    alert.style.transition = 'all 0.5s ease-out';
                    alert.style.opacity = '1';
                    alert.style.transform = 'translateY(0)';
                }, 100);

                // Set up exit animation after delay
                setTimeout(function() {
                    alert.style.transition = 'all 0.5s ease-in';
                    alert.style.opacity = '0';
                    alert.style.transform = 'translateY(-20px)';

                    // Remove element after animation
                    setTimeout(() => {
                        const bsAlert = new bootstrap.Alert(alert);
                        bsAlert.close();
                    }, 500);
                }, 5000); // 5 seconds before starting exit animation
            });
        });
    </script>

    <!-- Custom Scripts -->
    <script src="{{ asset('js/navbar-scroll.js') }}"></script>
    @yield('scripts')
</body>

</html>
