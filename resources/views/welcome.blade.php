<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kisah Roleplay - Welcome</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600;700;900&family=Rajdhani:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <style>
        :root {
            --cyberpunk-primary: #480018;
            --cyberpunk-secondary: #4B021B;
            --cyberpunk-tertiary: #4A071D;
            --cyberpunk-accent: #98194A;
            --cyberpunk-light: #D77CA8;
            --cyberpunk-neon: #00FFFF;
            --cyberpunk-pink: #FF1493;
        }

        body {
            font-family: 'Rajdhani', sans-serif;
            background: linear-gradient(135deg, var(--cyberpunk-primary) 0%, var(--cyberpunk-secondary) 25%, var(--cyberpunk-tertiary) 50%, var(--cyberpunk-accent) 75%, var(--cyberpunk-light) 100%);
            min-height: 100vh;
            color: white;
        }

        /* Floating particles animation */
        .particles {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
            pointer-events: none;
        }

        .particle {
            position: absolute;
            width: 4px;
            height: 4px;
            background: var(--cyberpunk-neon);
            border-radius: 50%;
            animation: float 15s infinite linear;
            box-shadow: 0 0 10px var(--cyberpunk-neon);
        }

        @keyframes float {
            0% { transform: translateY(100vh) rotate(0deg); opacity: 0; }
            10% { opacity: 1; }
            90% { opacity: 1; }
            100% { transform: translateY(-100vh) rotate(360deg); opacity: 0; }
        }

        .auth-container {
            z-index: 10;
            position: relative;
        }

        .cyberpunk-card {
            background: rgba(26, 0, 17, 0.95);
            backdrop-filter: blur(15px);
            border: 2px solid var(--cyberpunk-neon);
            border-radius: 20px;
            box-shadow:
                0 0 50px rgba(0, 255, 255, 0.3),
                0 0 100px rgba(255, 20, 147, 0.2),
                inset 0 0 20px rgba(0, 255, 255, 0.1);
            overflow: hidden;
            position: relative;
        }

        .cyberpunk-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(90deg, transparent, var(--cyberpunk-neon), transparent);
            animation: scanLine 3s ease-in-out infinite;
        }

        @keyframes scanLine {
            0%, 100% { transform: translateX(-100%); }
            50% { transform: translateX(100%); }
        }

        .logo-section {
            text-align: center;
            padding: 2rem 2rem 1rem;
            border-bottom: 1px solid rgba(0, 255, 255, 0.3);
        }

        .logo-k {
            font-family: 'Orbitron', monospace;
            font-size: 3rem;
            font-weight: 900;
            color: var(--cyberpunk-neon);
            text-shadow: 0 0 20px var(--cyberpunk-neon);
            margin-bottom: 0.5rem;
        }

        .logo-text {
            font-family: 'Orbitron', monospace;
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--cyberpunk-light);
            letter-spacing: 3px;
        }

        .form-section {
            padding: 2rem;
        }

        .form-title {
            font-family: 'Orbitron', monospace;
            color: var(--cyberpunk-neon);
            font-size: 1.8rem;
            font-weight: 700;
            text-align: center;
            margin-bottom: 0.5rem;
            text-shadow: 0 0 15px var(--cyberpunk-neon);
        }

        .form-subtitle {
            color: var(--cyberpunk-light);
            text-align: center;
            margin-bottom: 2rem;
            opacity: 0.9;
        }

        .card {
            background: rgba(0, 0, 0, 0.6) !important;
            border: 2px solid rgba(0, 255, 255, 0.3) !important;
            border-radius: 12px !important;
            backdrop-filter: blur(10px);
        }

        .card-title {
            color: var(--cyberpunk-neon) !important;
            font-family: 'Orbitron', monospace;
            font-weight: 700;
        }

        .feature-list {
            color: #ffffff;
            list-style: none;
            padding: 0;
        }

        .feature-item {
            margin-bottom: 8px;
            display: flex;
            align-items: center;
        }

        .feature-icon {
            color: var(--cyberpunk-neon);
            margin-right: 10px;
            width: 20px;
        }

        .feature-icon-alt {
            color: var(--cyberpunk-pink);
            margin-right: 10px;
            width: 20px;
        }

        .btn-cyberpunk {
            background: linear-gradient(135deg, var(--cyberpunk-accent) 0%, var(--cyberpunk-neon) 100%);
            border: 2px solid var(--cyberpunk-neon);
            color: white;
            font-family: 'Orbitron', monospace;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 12px 0;
            border-radius: 12px;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .btn-cyberpunk:hover {
            background: linear-gradient(135deg, var(--cyberpunk-neon) 0%, var(--cyberpunk-accent) 100%);
            box-shadow: 0 0 25px rgba(0, 255, 255, 0.6);
            transform: translateY(-2px);
            color: white;
            text-decoration: none;
        }

        .btn-register {
            background: linear-gradient(135deg, #8a2be2 0%, #9932cc 100%);
            border: 2px solid #9932cc;
            color: white;
            font-family: 'Orbitron', monospace;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 2px;
            padding: 14px 0;
            border-radius: 12px;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .btn-register:hover {
            background: linear-gradient(135deg, #9932cc 0%, #8a2be2 100%);
            box-shadow: 0 0 25px rgba(153, 50, 204, 0.5);
            transform: translateY(-2px);
            color: white;
            text-decoration: none;
        }

        .btn-logout {
            background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
            border: 2px solid #dc3545;
            color: white;
            font-weight: 600;
            padding: 12px;
            border-radius: 12px;
            transition: all 0.3s ease;
        }

        .btn-logout:hover {
            background: linear-gradient(135deg, #c82333 0%, #dc3545 100%);
            box-shadow: 0 0 25px rgba(220, 53, 69, 0.5);
            transform: translateY(-2px);
            color: white;
        }

        .alert-success {
            background: rgba(0, 255, 0, 0.1) !important;
            border: 1px solid rgba(0, 255, 0, 0.3) !important;
            border-radius: 12px !important;
            color: #00ff00 !important;
        }

        .auth-links {
            text-align: center;
            color: var(--cyberpunk-light);
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .cyberpunk-card {
                margin: 20px;
            }

            .logo-k {
                font-size: 2.5rem;
            }

            .form-title {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
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

    <div class="container-fluid auth-container d-flex align-items-center justify-content-center min-vh-100">
        <div class="cyberpunk-card" style="max-width: 600px;">
            <!-- Logo Section -->
            <div class="logo-section">
                <div class="logo-k">K</div>
                <div class="logo-text">KISAH ROLEPLAY</div>
            </div>

            <!-- Welcome Content -->
            <div class="form-section">
                <h2 class="form-title">Welcome to the Future</h2>
                <p class="form-subtitle">Enter the cyberpunk roleplay universe where your stories come to life.</p>

                <div class="mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">
                                <i class="fas fa-microchip me-2"></i>System Features
                            </h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <ul class="feature-list">
                                        <li class="feature-item">
                                            <i class="fas fa-play feature-icon"></i>
                                            Immersive Roleplay
                                        </li>
                                        <li class="feature-item">
                                            <i class="fas fa-play feature-icon"></i>
                                            Character Creation
                                        </li>
                                        <li class="feature-item">
                                            <i class="fas fa-play feature-icon"></i>
                                            Interactive Stories
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <ul class="feature-list">
                                        <li class="feature-item">
                                            <i class="fas fa-play feature-icon-alt"></i>
                                            Community Events
                                        </li>
                                        <li class="feature-item">
                                            <i class="fas fa-play feature-icon-alt"></i>
                                            Custom Scenarios
                                        </li>
                                        <li class="feature-item">
                                            <i class="fas fa-play feature-icon-alt"></i>
                                            Real-time Chat
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @auth
                    <div class="mb-4">
                        <div class="alert alert-success">
                            <strong><i class="fas fa-check-circle me-2"></i>System Status:</strong>
                            Logged in as {{ Auth::user()->name }}
                        </div>
                    </div>

                    <div class="d-grid gap-2">
                        <a href="{{ route('dashboard') }}" class="btn btn-cyberpunk">
                            <i class="fas fa-rocket me-2"></i>Enter Dashboard
                        </a>
                        <form method="POST" action="{{ route('logout') }}" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-logout w-100">
                                <i class="fas fa-sign-out-alt me-2"></i>Logout
                            </button>
                        </form>
                    </div>
                @else
                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <a href="{{ route('login') }}" class="btn btn-cyberpunk w-100">
                                <i class="fas fa-sign-in-alt me-2"></i>Login
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('register') }}" class="btn btn-register w-100">
                                <i class="fas fa-user-plus me-2"></i>Register
                            </a>
                        </div>
                    </div>
                @endauth

                <div class="auth-links">
                    <small>
                        <i class="fas fa-brain me-2"></i>Powered by Neural Network v2.0.1
                    </small>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Font Awesome for icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>
</html>
