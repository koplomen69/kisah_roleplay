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
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Rajdhani', sans-serif;
            background: linear-gradient(135deg, #0a0014 0%, #1a0033 25%, #2d0a3d 50%, #4a1458 75%, #6b1e69 100%);
            min-height: 100vh;
            overflow-x: hidden;
            position: relative;
        }

        /* Cyberpunk cityscape background */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                radial-gradient(circle at 20% 80%, rgba(255, 0, 128, 0.15) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(0, 255, 255, 0.15) 0%, transparent 50%),
                radial-gradient(circle at 40% 40%, rgba(255, 20, 147, 0.1) 0%, transparent 50%),
                linear-gradient(90deg, transparent 0%, rgba(255, 0, 128, 0.03) 50%, transparent 100%);
            z-index: -2;
        }

        /* Cyberpunk grid overlay */
        body::after {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: 
                linear-gradient(rgba(0, 255, 255, 0.03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(0, 255, 255, 0.03) 1px, transparent 1px);
            background-size: 50px 50px;
            z-index: -1;
            animation: gridMove 20s linear infinite;
        }

        @keyframes gridMove {
            0% { transform: translate(0, 0); }
            100% { transform: translate(50px, 50px); }
        }

        .login-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            position: relative;
        }

        .cyberpunk-card {
            background: rgba(0, 0, 0, 0.85);
            backdrop-filter: blur(20px);
            border: 2px solid transparent;
            border-radius: 20px;
            box-shadow: 
                0 0 50px rgba(255, 0, 128, 0.3),
                inset 0 0 50px rgba(0, 255, 255, 0.1),
                0 0 100px rgba(255, 20, 147, 0.2);
            position: relative;
            overflow: hidden;
            max-width: 420px;
            width: 100%;
        }

        .cyberpunk-card::before {
            content: '';
            position: absolute;
            top: -3px;
            left: -3px;
            right: -3px;
            bottom: -3px;
            background: linear-gradient(45deg, 
                #ff0080, #00ffff, #ff1493, #8a2be2, #ff0080);
            border-radius: 22px;
            z-index: -1;
            animation: borderPulse 4s ease-in-out infinite;
        }

        @keyframes borderPulse {
            0%, 100% { opacity: 0.6; }
            50% { opacity: 1; }
        }

        .logo-section {
            text-align: center;
            padding: 30px 0 20px;
            position: relative;
        }

        .logo-k {
            font-family: 'Orbitron', monospace;
            font-size: 4rem;
            font-weight: 900;
            color: #ffffff;
            text-shadow: 
                0 0 20px #ff0080,
                0 0 40px #ff0080,
                0 0 60px #ff0080,
                0 0 80px #ff0080;
            position: relative;
            display: inline-block;
            animation: logoGlow 3s ease-in-out infinite alternate;
        }

        .logo-k::before {
            content: 'K';
            position: absolute;
            top: 0;
            left: 0;
            color: #00ffff;
            text-shadow: 
                0 0 20px #00ffff,
                0 0 40px #00ffff;
            animation: glitchEffect 0.3s infinite;
            opacity: 0;
        }

        @keyframes logoGlow {
            0% { 
                text-shadow: 
                    0 0 20px #ff0080,
                    0 0 40px #ff0080,
                    0 0 60px #ff0080;
            }
            100% { 
                text-shadow: 
                    0 0 30px #00ffff,
                    0 0 50px #00ffff,
                    0 0 70px #00ffff;
            }
        }

        @keyframes glitchEffect {
            0%, 90%, 100% { opacity: 0; }
            95% { opacity: 0.8; transform: translateX(2px); }
        }

        .logo-text {
            font-family: 'Orbitron', monospace;
            color: #ffffff;
            font-size: 1.2rem;
            font-weight: 600;
            letter-spacing: 3px;
            margin-top: 10px;
            text-shadow: 0 0 15px rgba(255, 255, 255, 0.5);
        }

        .form-section {
            padding: 0 40px 40px;
        }

        .form-title {
            color: #ffffff;
            font-family: 'Orbitron', monospace;
            font-size: 1.8rem;
            font-weight: 700;
            text-align: center;
            margin-bottom: 8px;
            text-shadow: 0 0 20px rgba(255, 255, 255, 0.3);
        }

        .form-subtitle {
            color: #cccccc;
            text-align: center;
            margin-bottom: 30px;
            font-size: 0.95rem;
            font-weight: 400;
        }

        .form-label {
            color: #00ffff !important;
            font-weight: 600;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 8px;
            text-shadow: 0 0 10px rgba(0, 255, 255, 0.3);
        }

        .form-control {
            background: rgba(0, 0, 0, 0.6) !important;
            border: 2px solid rgba(0, 255, 255, 0.3) !important;
            border-radius: 12px !important;
            color: #ffffff !important;
            font-family: 'Rajdhani', sans-serif;
            font-size: 1rem;
            font-weight: 500;
            padding: 12px 16px;
            transition: all 0.3s ease;
            box-shadow: inset 0 0 20px rgba(0, 0, 0, 0.5);
        }

        .form-control:focus {
            background: rgba(0, 20, 30, 0.8) !important;
            border-color: #00ffff !important;
            box-shadow: 
                0 0 20px rgba(0, 255, 255, 0.4),
                inset 0 0 20px rgba(0, 255, 255, 0.1) !important;
            color: #ffffff !important;
        }

        .form-control::placeholder {
            color: #888 !important;
            font-weight: 400;
        }

        .btn-cyberpunk {
            background: linear-gradient(135deg, #ff0080 0%, #ff1493 50%, #ff0080 100%) !important;
            border: none !important;
            border-radius: 12px !important;
            color: #ffffff !important;
            font-family: 'Orbitron', monospace;
            font-weight: 700;
            font-size: 1rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            padding: 14px 0;
            transition: all 0.3s ease;
            box-shadow: 
                0 0 20px rgba(255, 0, 128, 0.4),
                inset 0 0 20px rgba(255, 255, 255, 0.1);
            position: relative;
            overflow: hidden;
        }

        .btn-cyberpunk::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s ease;
        }

        .btn-cyberpunk:hover {
            background: linear-gradient(135deg, #ff1493 0%, #ff0080 50%, #ff1493 100%) !important;
            box-shadow: 
                0 0 30px rgba(255, 0, 128, 0.6),
                inset 0 0 30px rgba(255, 255, 255, 0.2) !important;
            transform: translateY(-2px);
            color: #ffffff !important;
        }

        .btn-cyberpunk:hover::before {
            left: 100%;
        }

        .btn-discord {
            background: linear-gradient(135deg, #5865F2 0%, #4752C4 100%) !important;
            border: 2px solid rgba(88, 101, 242, 0.5) !important;
            border-radius: 12px !important;
            color: #ffffff !important;
            font-weight: 600;
            padding: 12px 0;
            transition: all 0.3s ease;
            box-shadow: 0 0 15px rgba(88, 101, 242, 0.3);
        }

        .btn-discord:hover {
            background: linear-gradient(135deg, #4752C4 0%, #5865F2 100%) !important;
            box-shadow: 0 0 25px rgba(88, 101, 242, 0.5);
            transform: translateY(-2px);
            color: #ffffff !important;
        }

        .divider {
            position: relative;
            text-align: center;
            margin: 25px 0;
            color: #666;
            font-weight: 500;
        }

        .divider::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(102, 102, 102, 0.5), transparent);
        }

        .divider span {
            background: rgba(0, 0, 0, 0.85);
            padding: 0 20px;
            font-size: 0.9rem;
        }

        .auth-links {
            text-align: center;
            margin-top: 25px;
        }

        .auth-links span {
            color: #888;
            font-weight: 400;
        }

        .cyberpunk-link {
            color: #00ffff !important;
            text-decoration: none !important;
            font-weight: 600;
            transition: all 0.3s ease;
            text-shadow: 0 0 10px rgba(0, 255, 255, 0.3);
            position: relative;
        }

        .cyberpunk-link:hover {
            color: #ff0080 !important;
            text-shadow: 0 0 15px rgba(255, 0, 128, 0.5);
        }

        .error-alert {
            background: rgba(255, 0, 0, 0.1) !important;
            border: 1px solid rgba(255, 0, 0, 0.3) !important;
            color: #ff6b6b !important;
            border-radius: 12px !important;
            padding: 12px 16px;
            margin-bottom: 20px;
            font-weight: 500;
        }

        /* Floating particles effect */
        .particles {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: -1;
        }

        .particle {
            position: absolute;
            width: 2px;
            height: 2px;
            background: #00ffff;
            border-radius: 50%;
            animation: float 15s infinite linear;
            opacity: 0.7;
            box-shadow: 0 0 6px #00ffff;
        }

        .particle:nth-child(odd) {
            background: #ff0080;
            box-shadow: 0 0 6px #ff0080;
            animation-duration: 20s;
        }

        @keyframes float {
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

        /* Responsive */
        @media (max-width: 768px) {
            .form-section {
                padding: 0 25px 30px;
            }
            
            .logo-k {
                font-size: 3rem;
            }
            
            .cyberpunk-card {
                margin: 10px;
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
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="roblox_username" class="form-label">Roblox Username</label>
                        <input type="text" 
                               id="roblox_username" 
                               name="roblox_username" 
                               class="form-control" 
                               placeholder="Enter your Roblox username" 
                               value="{{ old('roblox_username') }}" 
                               required>
                    </div>

                    <div class="mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" 
                               id="password" 
                               name="password" 
                               class="form-control" 
                               placeholder="Enter your password" 
                               required>
                    </div>

                    <div class="d-grid mb-3">
                        <button type="submit" class="btn btn-cyberpunk">Login</button>
                    </div>
                </form>

                <div class="divider">
                    <span>or</span>
                </div>

                <div class="d-grid mb-3">
                    <a href="#" class="btn btn-discord d-flex align-items-center justify-content-center">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor" class="me-2">
                            <path d="M20.317 4.37a19.791 19.791 0 0 0-4.885-1.515.074.074 0 0 0-.079.037c-.21.375-.444.864-.608 1.25a18.27 18.27 0 0 0-5.487 0 12.64 12.64 0 0 0-.617-1.25.077.077 0 0 0-.079-.037A19.736 19.736 0 0 0 3.677 4.37a.07.07 0 0 0-.032.027C.533 9.046-.32 13.58.099 18.057a.082.082 0 0 0 .031.057 19.9 19.9 0 0 0 5.993 3.03.078.078 0 0 0 .084-.028 14.09 14.09 0 0 0 1.226-1.994.076.076 0 0 0-.041-.106 13.107 13.107 0 0 1-1.872-.892.077.077 0 0 1-.008-.128 10.2 10.2 0 0 0 .372-.292.074.074 0 0 1 .077-.01c3.928 1.793 8.18 1.793 12.062 0a.074.074 0 0 1 .078.01c.12.098.246.198.373.292a.077.077 0 0 1-.006.127 12.299 12.299 0 0 1-1.873.892.077.077 0 0 0-.041.107c.36.698.772 1.362 1.225 1.993a.076.076 0 0 0 .084.028 19.839 19.839 0 0 0 6.002-3.03.077.077 0 0 0 .032-.054c.5-5.177-.838-9.674-3.549-13.66a.061.061 0 0 0-.031-.03zM8.02 15.33c-1.183 0-2.157-1.085-2.157-2.419 0-1.333.956-2.419 2.157-2.419 1.21 0 2.176 1.096 2.157 2.42 0 1.333-.956 2.418-2.157 2.418zm7.975 0c-1.183 0-2.157-1.085-2.157-2.419 0-1.333.955-2.419 2.157-2.419 1.21 0 2.176 1.096 2.157 2.42 0 1.333-.946 2.418-2.157 2.418z"/>
                        </svg>
                        Login with Discord
                    </a>
                </div>

                <div class="auth-links">
                    <span>Belum punya akun? </span>
                    <a href="{{ route('register') }}" class="cyberpunk-link">Daftar sekarang</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
