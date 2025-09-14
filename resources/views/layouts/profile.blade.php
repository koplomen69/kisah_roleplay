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
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600;700;900&family=Rajdhani:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <!-- Custom Styles -->
    @yield('styles')
    <link href="{{ asset('css/kota-landing.css') }}" rel="stylesheet">
    <link href="{{ asset('css/profile.css') }}" rel="stylesheet">

    <style>
        /* Profile page specific navbar spacing */
        .main-content {
            margin-top: 100px; /* Adjust based on navbar height */
        }

        /* Additional spacing for mobile */
        @media (max-width: 768px) {
            .main-content {
                margin-top: 80px;
            }
        }
    </style>


</head>
<body>
    <!-- Header Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top cyberpunk-navbar">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('leaderboard') ? 'active' : '' }}" href="{{ route('leaderboard') }}">Leaderboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('donasi') ? 'active' : '' }}" href="{{ route('donasi') }}">Donasi</a>
                    </li>
                    @auth
                        <li class="nav-item">
                            <a class="nav-link btn btn-profile {{ request()->routeIs('profile') ? 'active' : '' }}" href="{{ route('profile') }}">PROFILE</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link btn btn-profile" href="{{ route('login') }}">PROFILE</a>
                        </li>
                    @endauth
                </ul>
            </div>

            <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
                <div class="nav-logo">
                    <img src="{{ asset('images/k-logo.png') }}" alt="K" class="nav-logo-img">
                    <span class="nav-logo-text ms-2">KISAH ROLEPLAY</span>
                </div>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
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

    <!-- Custom Scripts -->
    @yield('scripts')
</body>

</html>
