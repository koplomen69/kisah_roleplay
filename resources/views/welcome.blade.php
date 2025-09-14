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
    <!-- Kota Roleplay Cyberpunk Styles -->
    <link href="{{ asset('css/kota-roleplay.css') }}" rel="stylesheet">
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
                <p class="form-subtitle">KISAH ROLE PLAY SIAP ON TOP.</p>

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
