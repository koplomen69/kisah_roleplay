@extends('layouts.profile')

@section('title', 'Profile - Kisah Roleplay')

@section('content')
<body>

    <!-- Main Landing Content -->
     <!-- Main Landing Content -->
    <main class="landing-main">
        <div class="container-fluid">
            <div class="row min-vh-100 align-items-center">
                <!-- Left Content -->
                <div class="col-lg-6 col-12">
                    <div class="landing-content">
                        <div class="landing-badge">
                            <i class="fas fa-star me-2"></i>KISAHROLEPLAY
                        </div>

                        <h1 class="landing-title">
                            SELAMAT DATANG DI<br>
                            <span class="title-highlight">DUNIA GELAP</span>
                        </h1>

                        <p class="landing-description">
                            BERGABUNGLAH DALAM PETUALANGAN ROLEPLAY TERBESAR DI INDONESIA.<br>
                            CIPTAKAN KARAKTER UNIKMU DAN JALANI KEHIDUPAN VIRTUAL YANG<br>
                            MENARIK BERSAMA RIBUAN PEMAIN LAINNYA.
                        </p>

                        <div class="landing-buttons">
                            <a href="https://discord.gg/nVKcz4GV" class="btn btn-discord-main" target="_blank">
                                <i class="fab fa-discord me-2"></i>JOIN DISCORD
                            </a>
                            <a href="{{ route('login') }}" class="btn btn-play">
                                MULAI BERMAIN
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Right Logo -->
                <div class="col-lg-6 col-12">
                    <div class="landing-logo-section">
                        <div class="landing-logo text-center">
                            <div class="logo-image-container">
                                <img src="{{ asset('images/k-logo.png') }}" alt="Kisah Roleplay Logo" class="main-logo-img">
                            </div>
                            <div class="logo-text-container">
                                <div class="logo-sub">ROLEPLAY</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Floating particles -->
    <div class="particles">
        <div class="particle" style="left: 10%; animation-delay: 0s;"></div>
        <div class="particle" style="left: 20%; animation-delay: 2s;"></div>
        <div class="particle" style="left: 30%; animation-delay: 4s;"></div>
        <div class="particle" style="left: 40%; animation-delay: 6s;"></div>
        <div class="particle" style="left: 50%; animation-delay: 8s;"></div>
        <div class="particle" style="left: 60%; animation-delay: 10s;"></div>
        <div class="particle" style="left: 70%; animation-delay: 12s;"></div>
        <div class="particle" style="left: 80%; animation-delay: 14s;"></div>
        <div class="particle" style="left: 90%; animation-delay: 16s;"></div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
