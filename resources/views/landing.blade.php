@extends('layouts.profile')

@section('title', 'Profile - Kisah Roleplay')

@section('content')
<body>

    <!-- Main Landing Content -->
    <main class="landing-main">
        <div class="container-fluid">
            <div class="row min-vh-100 align-items-center">
                <div class="col-12">
                    <div class="row align-items-center">
                        <!-- Left Content -->
                        <div class="col-lg-8 col-12">
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
                        <div class="col-lg-4 col-12 d-flex align-items-start justify-content-center">
                            <div class="landing-logo-floating">
                                <div class="logo-combined-container-inline d-flex align-items-center">
                                    <div class="logo-image-wrapper-inline me-3">
                                        <img src="{{ asset('images/k-logo.png') }}" alt="Kisah Roleplay Logo" class="main-logo-img-inline">
                                    </div>
                                    <div class="logo-text-wrapper-inline">
                                        <div class="logo-sub-inline">ROLEPLAY</div>
                                    </div>
                                </div>
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

    <!-- Landing Page Enhancements -->
    <style>
        /* Text Glow Effects */
        .landing-title {
            text-shadow: 0 0 20px rgba(255, 20, 147, 0.6), 0 0 40px rgba(255, 20, 147, 0.3);
            animation: titlePulse 3s ease-in-out infinite;
        }
        
        .title-highlight {
            background: linear-gradient(45deg, #FF1493, #00FFFF);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: gradientShift 4s ease-in-out infinite;
        }
        
        .landing-badge {
            background: rgba(255, 255, 255, 0.1);
            border: 2px solid rgba(255, 20, 147, 0.5);
            backdrop-filter: blur(10px);
            border-radius: 25px;
            padding: 10px 20px;
            display: inline-block;
            animation: badgeFloat 2s ease-in-out infinite;
        }
        
        /* Button Enhancements */
        .btn-discord-main {
            background: linear-gradient(45deg, #5865F2, #7289DA);
            border: none;
            box-shadow: 0 4px 20px rgba(88, 101, 242, 0.4);
            transition: all 0.3s ease;
            animation: buttonGlow 2s ease-in-out infinite alternate;
        }
        
        .btn-discord-main:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 30px rgba(88, 101, 242, 0.6);
        }
        
        .btn-play {
            background: linear-gradient(45deg, #FF1493, #00FFFF);
            border: none;
            box-shadow: 0 4px 20px rgba(255, 20, 147, 0.4);
            transition: all 0.3s ease;
            animation: buttonGlow2 2s ease-in-out infinite alternate;
        }
        
        .btn-play:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 30px rgba(255, 20, 147, 0.6);
        }
        
        /* Logo Enhancement */
        .landing-logo-floating {
            animation: logoFloat 3s ease-in-out infinite;
        }
        
        .main-logo-img-inline {
            filter: drop-shadow(0 0 20px rgba(0, 255, 255, 0.5));
            animation: logoGlow 4s ease-in-out infinite;
        }
        
        .logo-sub-inline {
            text-shadow: 0 0 15px rgba(255, 255, 255, 0.8);
            animation: textGlow 3s ease-in-out infinite;
        }
        
        /* Particle Effects */
        .particle {
            position: absolute;
            width: 4px;
            height: 4px;
            background: linear-gradient(45deg, #00FFFF, #FF1493);
            border-radius: 50%;
            animation: particleFloat 15s linear infinite;
            opacity: 0.7;
            box-shadow: 0 0 10px rgba(0, 255, 255, 0.8);
        }
        
        /* Keyframe Animations */
        @keyframes titlePulse {
            0%, 100% { text-shadow: 0 0 20px rgba(255, 20, 147, 0.6), 0 0 40px rgba(255, 20, 147, 0.3); }
            50% { text-shadow: 0 0 30px rgba(255, 20, 147, 0.8), 0 0 60px rgba(255, 20, 147, 0.5); }
        }
        
        @keyframes gradientShift {
            0%, 100% { background: linear-gradient(45deg, #FF1493, #00FFFF); }
            50% { background: linear-gradient(45deg, #00FFFF, #FF1493); }
        }
        
        @keyframes badgeFloat {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-5px); }
        }
        
        @keyframes buttonGlow {
            0% { box-shadow: 0 4px 20px rgba(88, 101, 242, 0.4); }
            100% { box-shadow: 0 6px 25px rgba(88, 101, 242, 0.6); }
        }
        
        @keyframes buttonGlow2 {
            0% { box-shadow: 0 4px 20px rgba(255, 20, 147, 0.4); }
            100% { box-shadow: 0 6px 25px rgba(255, 20, 147, 0.6); }
        }
        
        @keyframes logoFloat {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-10px) rotate(5deg); }
        }
        
        @keyframes logoGlow {
            0%, 100% { filter: drop-shadow(0 0 20px rgba(0, 255, 255, 0.5)); }
            50% { filter: drop-shadow(0 0 30px rgba(0, 255, 255, 0.8)); }
        }
        
        @keyframes textGlow {
            0%, 100% { text-shadow: 0 0 15px rgba(255, 255, 255, 0.8); }
            50% { text-shadow: 0 0 25px rgba(255, 255, 255, 1); }
        }
        
        @keyframes particleFloat {
            0% {
                transform: translateY(100vh) translateX(0px);
                opacity: 0;
            }
            10% {
                opacity: 0.7;
            }
            90% {
                opacity: 0.7;
            }
            100% {
                transform: translateY(-100px) translateX(100px);
                opacity: 0;
            }
        }
        
        /* Enhanced Particles */
        .particles {
            overflow: hidden;
        }
        
        .particle:nth-child(odd) {
            background: linear-gradient(45deg, #FF1493, #00FFFF);
            box-shadow: 0 0 10px rgba(255, 20, 147, 0.8);
        }
        
        .particle:nth-child(even) {
            background: linear-gradient(45deg, #00FFFF, #FF1493);
            box-shadow: 0 0 10px rgba(0, 255, 255, 0.8);
        }
    </style>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
