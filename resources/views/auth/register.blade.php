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
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- Kota Roleplay Cyberpunk Styles -->
    <link href="{{ asset('css/auth.css') }}" rel="stylesheet">
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

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show cyberpunk-alert" role="alert">
                        <div class="alert-content">
                            <i class="fas fa-check-circle me-2"></i>
                            <span class="alert-text">{{ session('success') }}</span>
                        </div>
                    </div>
                @endif

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
                               placeholder="Enter your exact Roblox username"
                               value="{{ old('roblox_username') }}"
                               required>
                        <small style="color: #888; font-size: 0.85rem;">
                            We'll verify this username exists on Roblox and fetch your profile data.
                        </small>
                        @error('roblox_username')
                            <div class="field-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <fieldset>
                            <legend class="form-label mb-3">Gender</legend>
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
                        </fieldset>
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

    <!-- Auto-hide success alerts -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Move alerts to body level
            const alerts = document.querySelectorAll('.cyberpunk-alert');
            alerts.forEach(function(alert) {
                // Remove from current position and append to body
                document.body.appendChild(alert);

                // Set initial state
                alert.style.transform = 'translateX(-50%) translateY(-150%)';
                alert.style.opacity = '0';

                // Trigger entrance animation
                requestAnimationFrame(() => {
                    alert.style.transition = 'transform 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275), opacity 0.3s ease-out';
                    alert.style.transform = 'translateX(-50%) translateY(0)';
                    alert.style.opacity = '1';
                });

                // Set up exit animation after delay
                setTimeout(() => {
                    alert.style.transition = 'transform 0.5s cubic-bezier(0.6, -0.28, 0.735, 0.045), opacity 0.3s ease-in';
                    alert.style.transform = 'translateX(-50%) translateY(-150%)';
                    alert.style.opacity = '0';

                    // Remove element after animation
                    setTimeout(() => {
                        alert.remove();
                    }, 500);
                }, 5000);
            });
        });
    </script>
</body>
</html>
