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
    <!-- Cyberpunk Auth Styles -->
    <link href="{{ asset('css/cyberpunk-auth.css') }}" rel="stylesheet">
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

    <div class="container-fluid auth-container d-flex align-items-center justify-content-center">
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
                    <div class="card" style="background: rgba(0, 0, 0, 0.6); border: 2px solid rgba(0, 255, 255, 0.3); border-radius: 12px;">
                        <div class="card-body">
                            <h5 class="card-title" style="color: #00ffff; font-family: 'Orbitron', monospace;">System Features</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <ul style="color: #ffffff; list-style: none; padding: 0;">
                                        <li style="margin-bottom: 8px;"><span style="color: #00ffff;">▶</span> Immersive Roleplay</li>
                                        <li style="margin-bottom: 8px;"><span style="color: #00ffff;">▶</span> Character Creation</li>
                                        <li style="margin-bottom: 8px;"><span style="color: #00ffff;">▶</span> Interactive Stories</li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <ul style="color: #ffffff; list-style: none; padding: 0;">
                                        <li style="margin-bottom: 8px;"><span style="color: #ff0080;">▶</span> Community Events</li>
                                        <li style="margin-bottom: 8px;"><span style="color: #ff0080;">▶</span> Custom Scenarios</li>
                                        <li style="margin-bottom: 8px;"><span style="color: #ff0080;">▶</span> Real-time Chat</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @auth
                    <div class="mb-4">
                        <div class="alert" style="background: rgba(0, 255, 0, 0.1); border: 1px solid rgba(0, 255, 0, 0.3); border-radius: 12px; color: #00ff00;">
                            <strong>System Status:</strong> Logged in as {{ Auth::user()->name }}
                        </div>
                    </div>

                    <div class="d-grid gap-2">
                        <a href="{{ route('dashboard') }}" class="btn btn-cyberpunk">
                            <i class="fas fa-rocket me-2"></i>Enter Dashboard
                        </a>
                        <form method="POST" action="{{ route('logout') }}" class="d-inline">
                            @csrf
                            <button type="submit" class="btn w-100" style="background: linear-gradient(135deg, #dc3545 0%, #c82333 100%); border: none; border-radius: 12px; color: #ffffff; font-weight: 600; padding: 12px;">
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
                            <a href="{{ route('register') }}" class="btn w-100" style="background: linear-gradient(135deg, #8a2be2 0%, #9932cc 100%); border: none; border-radius: 12px; color: #ffffff; font-family: 'Orbitron', monospace; font-weight: 700; font-size: 1rem; text-transform: uppercase; letter-spacing: 2px; padding: 14px 0;">
                                <i class="fas fa-user-plus me-2"></i>Register
                            </a>
                        </div>
                    </div>
                @endauth

                <div class="text-center">
                    <small class="auth-links">
                        <span>Powered by Neural Network v2.0.1</span>
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
