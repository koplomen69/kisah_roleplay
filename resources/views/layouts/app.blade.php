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

</head>
<body>
     <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top cyberpunk-navbar">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <div class="nav-logo">
                    <img src="{{ asset('images/k-logo.png') }}" alt="K" class="nav-logo-img">
                    <span class="nav-logo-text ms-2">KISAH ROLEPLAY</span>
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('leaderboard') }}" class="nav-link {{ request()->routeIs('leaderboard') ? 'active' : '' }}">Leaderboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('donasi') }}" class="nav-link {{ request()->routeIs('donasi') ? 'active' : '' }}">Donasi</a>
                    </li>
                    @auth
                        <li class="nav-item">
                            <a class="nav-link btn btn-profile" href="{{ route('profile') }}">PROFILE</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link btn btn-profile" href="{{ route('login') }}">PROFILE</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
