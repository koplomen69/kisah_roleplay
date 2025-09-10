<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Kisah Roleplay</title>
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

        .register-container {
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
            max-width: 480px;
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

        /* Custom Gender Radio Buttons */
        .gender-container {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
        }

        .gender-option {
            flex: 1;
            position: relative;
        }

        .gender-option input[type="radio"] {
            display: none;
        }

        .gender-option .gender-label {
            display: block;
            padding: 14px;
            background: rgba(0, 0, 0, 0.6);
            border: 2px solid rgba(0, 255, 255, 0.3);
            border-radius: 12px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            color: #888;
            font-weight: 600;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            position: relative;
            overflow: hidden;
        }

        .gender-option .gender-label::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(0, 255, 255, 0.1), transparent);
            transition: left 0.5s ease;
        }

        .gender-option input[type="radio"]:checked + .gender-label {
            border-color: #00ffff;
            background: rgba(0, 255, 255, 0.1);
            color: #00ffff;
            box-shadow: 
                0 0 15px rgba(0, 255, 255, 0.3),
                inset 0 0 20px rgba(0, 255, 255, 0.1);
            text-shadow: 0 0 10px rgba(0, 255, 255, 0.5);
        }

        .gender-option input[type="radio"]:checked + .gender-label::before {
            left: 100%;
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

        .field-error {
            color: #ff6b6b !important;
            font-size: 0.8rem;
            margin-top: 5px;
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

            .gender-container {
                flex-direction: column;
                gap: 10px;
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

    <div class="register-container">
        <div class="cyberpunk-card">
            <!-- Logo Section -->
            <div class="logo-section">
                <div class="logo-k">K</div>
                <div class="logo-text">KISAH ROLEPLAY</div>
            </div>

            <!-- Form Section -->
            <div class="form-section">
                <h2 class="form-title">Create an Account</h2>
                <p class="form-subtitle">Fill in the details below to create a new account.</p>

                @if($errors->any())
                    <div class="error-alert">
                        @foreach($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif

                <form method="POST" action="{{ route('register') }}">
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
                        @error('roblox_username')
                            <div class="field-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Gender</label>
                        <div class="gender-container">
                            <div class="gender-option">
                                <input type="radio" 
                                       id="male" 
                                       name="gender" 
                                       value="male" 
                                       {{ old('gender') == 'male' ? 'checked' : '' }} 
                                       required>
                                <label for="male" class="gender-label">Male</label>
                            </div>
                            <div class="gender-option">
                                <input type="radio" 
                                       id="female" 
                                       name="gender" 
                                       value="female" 
                                       {{ old('gender') == 'female' ? 'checked' : '' }} 
                                       required>
                                <label for="female" class="gender-label">Female</label>
                            </div>
                        </div>
                        @error('gender')
                            <div class="field-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" 
                               id="password" 
                               name="password" 
                               class="form-control" 
                               placeholder="Enter your password" 
                               required>
                        @error('password')
                            <div class="field-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <input type="password" 
                               id="password_confirmation" 
                               name="password_confirmation" 
                               class="form-control" 
                               placeholder="Confirm your password" 
                               required>
                    </div>

                    <div class="d-grid mb-3">
                        <button type="submit" class="btn btn-cyberpunk">Register</button>
                    </div>
                </form>

                <div class="auth-links">
                    <span>Sudah punya akun? </span>
                    <a href="{{ route('login') }}" class="cyberpunk-link">Masuk sekarang</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
