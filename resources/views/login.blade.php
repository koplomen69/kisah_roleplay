<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Kisah Roleplay</title>
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

        .login-container {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 20px;
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
            max-width: 450px;
            width: 100%;
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

        .form-label {
            color: var(--cyberpunk-neon);
            font-weight: 600;
            font-size: 0.95rem;
            margin-bottom: 0.5rem;
        }

        .form-control {
            background: rgba(0, 0, 0, 0.6);
            border: 2px solid rgba(0, 255, 255, 0.3);
            border-radius: 10px;
            color: white;
            padding: 12px 15px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            background: rgba(0, 0, 0, 0.8);
            border-color: var(--cyberpunk-neon);
            box-shadow: 0 0 20px rgba(0, 255, 255, 0.4);
            color: white;
        }

        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.5);
        }

        .btn-cyberpunk {
            background: linear-gradient(135deg, var(--cyberpunk-accent) 0%, var(--cyberpunk-neon) 100%);
            border: 2px solid var(--cyberpunk-neon);
            color: white;
            font-family: 'Orbitron', monospace;
            font-weight: 700;
            font-size: 1.1rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            padding: 14px 0;
            border-radius: 12px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .btn-cyberpunk:hover {
            background: linear-gradient(135deg, var(--cyberpunk-neon) 0%, var(--cyberpunk-accent) 100%);
            box-shadow: 0 0 30px rgba(0, 255, 255, 0.6);
            transform: translateY(-2px);
            color: white;
        }

        .btn-discord {
            background: linear-gradient(135deg, #5865F2 0%, #4752C4 100%);
            border: 2px solid #5865F2;
            color: white;
            font-weight: 600;
            padding: 12px 0;
            border-radius: 12px;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .btn-discord:hover {
            background: linear-gradient(135deg, #4752C4 0%, #5865F2 100%);
            box-shadow: 0 0 25px rgba(88, 101, 242, 0.5);
            transform: translateY(-2px);
            color: white;
        }

        .divider {
            text-align: center;
            margin: 1.5rem 0;
            position: relative;
        }

        .divider::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, var(--cyberpunk-neon), transparent);
        }

        .divider span {
            background: rgba(26, 0, 17, 0.95);
            color: var(--cyberpunk-light);
            padding: 0 1rem;
            font-size: 0.9rem;
        }

        .error-alert {
            background: rgba(220, 53, 69, 0.2);
            border: 1px solid #dc3545;
            border-radius: 10px;
            padding: 1rem;
            margin-bottom: 1.5rem;
            color: #ff6b6b;
        }

        .auth-links {
            text-align: center;
            margin-top: 1.5rem;
            color: var(--cyberpunk-light);
        }

        .cyberpunk-link {
            color: var(--cyberpunk-neon);
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .cyberpunk-link:hover {
            color: var(--cyberpunk-pink);
            text-shadow: 0 0 10px var(--cyberpunk-pink);
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .cyberpunk-card {
                margin: 20px;
                max-width: none;
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

    <div class="login-container">
        <div class="cyberpunk-card">
            <!-- Logo Section -->
            <div class="logo-section">
                <div class="logo-k">K</div>
                <div class="logo-text">KISAH ROLEPLAY</div>
            </div>

            <!-- Form Section -->
            <div class="form-section">
                <h2 class="form-title">Login to Your Account</h2>
                <p class="form-subtitle">Enter your Roblox username and password to access your account.</p>

                @if($errors->any())
                    <div class="error-alert">
                        @foreach($errors->all() as $error)
                            <div><i class="fas fa-exclamation-triangle me-2"></i>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="roblox_username" class="form-label">
                            <i class="fas fa-user me-2"></i>Roblox Username
                        </label>
                        <input type="text"
                               id="roblox_username"
                               name="roblox_username"
                               class="form-control"
                               placeholder="Enter your Roblox username"
                               value="{{ old('roblox_username') }}"
                               required>
                    </div>

                    <div class="mb-4">
                        <label for="password" class="form-label">
                            <i class="fas fa-lock me-2"></i>Password
                        </label>
                        <input type="password"
                               id="password"
                               name="password"
                               class="form-control"
                               placeholder="Enter your password"
                               required>
                    </div>

                    <div class="d-grid mb-3">
                        <button type="submit" class="btn btn-cyberpunk">
                            <i class="fas fa-sign-in-alt me-2"></i>Login
                        </button>
                    </div>
                </form>

                <div class="divider">
                    <span>or</span>
                </div>

                <div class="d-grid mb-3">
                    <a href="#" class="btn btn-discord d-flex align-items-center justify-content-center">
                        <i class="fab fa-discord me-2"></i>
                        Login with Discord
                    </a>
                </div>

                <div class="auth-links">
                    <span>Belum punya akun? </span>
                    <a href="{{ route('register') }}" class="cyberpunk-link">
                        <i class="fas fa-user-plus me-1"></i>Daftar sekarang
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
