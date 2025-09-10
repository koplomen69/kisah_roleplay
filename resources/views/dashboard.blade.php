<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Kisah Roleplay</title>
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

            <!-- Dashboard Content -->
            <div class="form-section">
                <h2 class="form-title">Welcome to the System</h2>
                <p class="form-subtitle">Access granted. Your account is now active.</p>

                <div class="mb-4">
                    <div class="card" style="background: rgba(0, 0, 0, 0.6); border: 2px solid rgba(0, 255, 255, 0.3); border-radius: 12px;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <h5 class="card-title" style="color: #00ffff; font-family: 'Orbitron', monospace;">
                                        Roblox Profile
                                        @if(Auth::user()->roblox_verified_badge)
                                            <span style="color: #00ff00;" title="Verified Badge">✓</span>
                                        @endif
                                    </h5>
                                    <p class="card-text" style="color: #ffffff;">
                                        <strong style="color: #00ffff;">Username:</strong> {{ Auth::user()->roblox_username ?? Auth::user()->name }}<br>
                                        <strong style="color: #00ffff;">Display Name:</strong> {{ Auth::user()->display_name }}<br>
                                        @if(Auth::user()->roblox_id)
                                            <strong style="color: #00ffff;">Roblox ID:</strong> {{ Auth::user()->roblox_id }}<br>
                                        @endif
                                        <strong style="color: #00ffff;">Gender:</strong> {{ ucfirst(Auth::user()->gender) }}<br>
                                        @if(Auth::user()->roblox_created)
                                            <strong style="color: #00ffff;">Account Created:</strong> {{ Auth::user()->roblox_created->format('M d, Y') }}<br>
                                        @endif
                                        <strong style="color: #00ffff;">Status:</strong> <span style="color: #00ff00;">Active</span>
                                    </p>
                                    @if(Auth::user()->roblox_description)
                                        <div style="margin-top: 10px;">
                                            <strong style="color: #00ffff;">Bio:</strong>
                                            <p style="color: #cccccc; font-style: italic;">{{ Auth::user()->roblox_description }}</p>
                                        </div>
                                    @endif
                                </div>
                                @if(Auth::user()->roblox_avatar_url)
                                    <div class="col-md-4 text-center">
                                        <img src="{{ Auth::user()->roblox_avatar_url }}"
                                             alt="Roblox Avatar"
                                             class="img-fluid rounded"
                                             style="max-width: 120px; border: 2px solid rgba(0, 255, 255, 0.3);">
                                        <p style="color: #888; font-size: 0.8rem; margin-top: 5px;">Roblox Avatar</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <div class="card" style="background: rgba(0, 0, 0, 0.6); border: 2px solid rgba(0, 255, 255, 0.3); border-radius: 12px;">
                        <div class="card-body">
                            <h5 class="card-title" style="color: #00ffff; font-family: 'Orbitron', monospace;">System Access</h5>
                            <p class="card-text" style="color: #ffffff;">
                                Welcome to Kisah Roleplay! Your account has been successfully created and you now have access to the roleplay system.
                            </p>
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <button class="btn btn-cyberpunk w-100" style="padding: 10px;">
                                        <i class="fas fa-gamepad me-2"></i>Enter Roleplay
                                    </button>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <button class="btn" style="background: linear-gradient(135deg, #8a2be2 0%, #9932cc 100%); border: none; border-radius: 12px; color: #ffffff; font-weight: 600; padding: 10px;" class="w-100">
                                        <i class="fas fa-cog me-2"></i>Settings
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-between align-items-center">
                    <div class="auth-links">
                        <span>System Version 2.0.1</span>
                    </div>
                    <form method="POST" action="{{ route('logout') }}" class="d-inline">
                        @csrf
                        <button type="submit" class="btn" style="background: linear-gradient(135deg, #dc3545 0%, #c82333 100%); border: none; border-radius: 12px; color: #ffffff; font-weight: 600; padding: 8px 16px;">
                            <i class="fas fa-sign-out-alt me-2"></i>Logout
                        </button>
                    </form>
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
