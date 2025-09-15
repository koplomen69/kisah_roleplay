@extends('layouts.profile')

@section('title', 'Profile - Kisah Roleplay')

@section('content')
<!-- Animated Cyberpunk Background -->
<div class="cyberpunk-background">
    <!-- Floating Particles -->
    <div class="particles-container">
        <div class="particle particle-1"></div>
        <div class="particle particle-2"></div>
        <div class="particle particle-3"></div>
        <div class="particle particle-4"></div>
        <div class="particle particle-5"></div>
        <div class="particle particle-6"></div>
        <div class="particle particle-7"></div>
        <div class="particle particle-8"></div>
    </div>
    
    <!-- Grid Lines -->
    <div class="grid-lines">
        <div class="grid-line grid-line-vertical grid-line-1"></div>
        <div class="grid-line grid-line-vertical grid-line-2"></div>
        <div class="grid-line grid-line-vertical grid-line-3"></div>
        <div class="grid-line grid-line-horizontal grid-line-4"></div>
        <div class="grid-line grid-line-horizontal grid-line-5"></div>
    </div>
    
    <!-- Data Streams -->
    <div class="data-streams">
        <div class="data-stream stream-1"></div>
        <div class="data-stream stream-2"></div>
        <div class="data-stream stream-3"></div>
    </div>
    
    <!-- Pulsing Rings -->
    <div class="pulse-rings">
        <div class="pulse-ring ring-1"></div>
        <div class="pulse-ring ring-2"></div>
        <div class="pulse-ring ring-3"></div>
    </div>
</div>

    <!-- Success/Error Messages -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="background: rgba(0, 255, 0, 0.1); border: 2px solid #00FF00; color: #00FF00; border-radius: 10px;">
            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert" style="background: rgba(255, 0, 0, 0.1); border: 2px solid #FF0000; color: #FF0000; border-radius: 10px;">
            <i class="fas fa-exclamation-triangle me-2"></i>{{ session('error') }}
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row g-4">
        <!-- Left Profile Section -->
        <div class="col-lg-4">
            <div class="card h-100 profile-card-hover" style="background: rgba(26, 0, 17, 0.95); border: 2px solid #00FFFF; border-radius: 15px; backdrop-filter: blur(15px); box-shadow: 0 0 30px rgba(0, 255, 255, 0.3);">
                <!-- Cyberpunk Header with Decorative Corners -->
                <div class="card-header text-center py-4 position-relative" style="background: linear-gradient(135deg, rgba(0, 255, 255, 0.15), rgba(255, 20, 147, 0.1)); border-bottom: 2px solid rgba(0, 255, 255, 0.3); overflow: hidden;">
                    <!-- Cyberpunk Corner Decorations -->
                    <div class="position-absolute" style="top: 0; left: 0; width: 30px; height: 30px; border-top: 3px solid #00FFFF; border-left: 3px solid #00FFFF;"></div>
                    <div class="position-absolute" style="top: 0; right: 0; width: 30px; height: 30px; border-top: 3px solid #FF1493; border-right: 3px solid #FF1493;"></div>
                    <div class="position-absolute" style="bottom: 0; left: 0; width: 30px; height: 30px; border-bottom: 3px solid #D77CA8; border-left: 3px solid #D77CA8;"></div>
                    <div class="position-absolute" style="bottom: 0; right: 0; width: 30px; height: 30px; border-bottom: 3px solid #98194A; border-right: 3px solid #98194A;"></div>
                    
                    <!-- Floating Avatar -->
                    <div class="profile-avatar mb-3" style="animation: avatarFloat 3s ease-in-out infinite;">
                        <div style="width: 120px; height: 120px; background: linear-gradient(45deg, #00FFFF, #FF1493); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto; position: relative; overflow: hidden; box-shadow: 0 0 35px rgba(0, 255, 255, 0.6), 0 0 70px rgba(255, 20, 147, 0.3);">
                            <div style="width: 110px; height: 110px; background: rgba(26, 0, 17, 0.9); border-radius: 50%; display: flex; align-items: center; justify-content: center; overflow: hidden;">
                                @if(Auth::user()->avatar_url)
                                    <img src="{{ Auth::user()->avatar_url }}" alt="Avatar" style="width: 100%; height: 100%; object-fit: cover;">
                                @else
                                    <i class="fas fa-user" style="font-size: 3rem; color: #00FFFF;"></i>
                                @endif
                            </div>
                            <!-- Avatar Pulse Ring -->
                            <div class="position-absolute" style="width: 140px; height: 140px; border: 2px solid rgba(0, 255, 255, 0.3); border-radius: 50%; animation: pulseRing 2s infinite;"></div>
                        </div>
                    </div>
                    
                    <!-- Modern Typography -->
                    <div class="position-relative" style="z-index: 10;">
                        <h4 style="color: #00FFFF; font-family: 'Orbitron', monospace; margin: 0; font-size: 1.4rem; font-weight: 700; text-shadow: 0 0 15px rgba(0, 255, 255, 0.7); letter-spacing: 2px; text-transform: uppercase;">
                            {{ Auth::user()->name }}
                        </h4>
                        <div class="mt-2" style="width: 60px; height: 2px; background: linear-gradient(90deg, #00FFFF, #FF1493); margin: 0 auto; animation: headerUnderline 2s ease-in-out infinite alternate;"></div>
                        @php
                            // Generate unique verification code based on user ID and timestamp
                            $verificationCode = 'K-' . strtoupper(substr(md5(Auth::user()->id . Auth::user()->created_at->timestamp), 0, 6));
                        @endphp
                        
                        <p style="color: #D77CA8; margin: 8px 0 0 0; font-family: 'Rajdhani', sans-serif; font-size: 0.95rem; font-weight: 500; letter-spacing: 1px;">
                            <i class="fas fa-link me-2" style="color: #FF1493;"></i>VERIFICATION ID: 
                            <span id="verificationCode" style="color: #00FFFF; font-weight: bold; text-shadow: 0 0 10px rgba(0, 255, 255, 0.5); cursor: pointer; padding: 2px 6px; border-radius: 4px; transition: all 0.3s ease;" 
                                  onclick="copyVerificationCode('{{ $verificationCode }}')" 
                                  onmouseover="this.style.background='rgba(0, 255, 255, 0.1)'" 
                                  onmouseout="this.style.background='transparent'" 
                                  title="Click to copy">{{ $verificationCode }}</span> 
                            <i class="fas fa-copy ms-1" style="color: #00FFFF; font-size: 0.8rem; cursor: pointer;" onclick="copyVerificationCode('{{ $verificationCode }}')"></i> • <i class="fas fa-crown me-1" style="color: #D77CA8;"></i>PLAYER
                        </p>
                        
                        <!-- Verification Instructions -->
                        <div class="mt-3 p-2" style="background: rgba(255, 193, 7, 0.15); border: 1px solid rgba(255, 193, 7, 0.4); border-radius: 8px;">
                            <p class="mb-0" style="color: #FFFFFF; font-size: 0.85rem; font-family: 'Rajdhani', sans-serif; line-height: 1.4; font-weight: 600;">
                                <i class="fas fa-info-circle me-1" style="color: #ffc107;"></i>
                                <strong style="color: #ffc107;">Verification:</strong> Add this ID to your Roblox bio to link your account
                            </p>
                        </div>
                    </div>
                </div>

                <div class="card-body p-4">
                    <div class="profile-stats">
                        <div class="stat-item data-item-enhanced mb-4" style="background: rgba(0, 255, 255, 0.1); padding: 15px; border-radius: 10px; border-left: 4px solid #00FFFF; cursor: pointer;">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-id-card me-3" style="color: #00FFFF; font-size: 1.5rem;"></i>
                                <div>
                                    <small style="color: #FFFFFF; opacity: 0.9; font-weight: 600;">Member Since</small>
                                    <div style="color: #00FFFF; font-weight: bold; text-shadow: 0 0 10px rgba(0, 255, 255, 0.8);">{{ Auth::user()->created_at->format('M d, Y') }}</div>
                                </div>
                            </div>
                        </div>

                        @if(Auth::user()->roblox_username)
                        <div class="stat-item data-item-enhanced mb-4" style="background: rgba(152, 25, 74, 0.2); padding: 15px; border-radius: 10px; border-left: 4px solid #98194A; cursor: pointer;">
                            <div class="d-flex align-items-center">
                                <i class="fab fa-roblox me-3" style="color: #FF6B9D; font-size: 1.5rem;"></i>
                                <div>
                                    <small style="color: #FFFFFF; opacity: 0.9; font-weight: 600;">Roblox Username</small>
                                    <div style="color: #00FFFF; font-weight: bold; text-shadow: 0 0 8px rgba(0, 255, 255, 0.8);">{{ Auth::user()->roblox_username }}</div>
                                </div>
                            </div>
                        </div>
                        @endif

                        @php
                            $playerStats = Auth::user()->playerStats;
                        @endphp

                        <!-- Game Statistics -->
                        <div style="border-top: 2px solid rgba(215, 124, 168, 0.3); padding-top: 20px; margin-top: 20px;">
                            <h6 style="color: #FFFFFF; font-family: 'Orbitron', monospace; margin-bottom: 15px; text-transform: uppercase; letter-spacing: 1px; font-weight: 700; text-shadow: 0 0 10px rgba(255, 255, 255, 0.3);">
                                <i class="fas fa-gamepad me-2" style="color: #D77CA8;"></i>Game Data
                            </h6>
                            
                            <!-- Wallet -->
                            <div class="stat-item mb-3" style="background: rgba(255, 20, 147, 0.1); padding: 12px; border-radius: 10px; border-left: 4px solid #FF1493; transition: all 0.3s ease; cursor: pointer;" onmouseover="this.style.background='rgba(255, 20, 147, 0.2)'; this.style.transform='translateX(5px)';" onmouseout="this.style.background='rgba(255, 20, 147, 0.1)'; this.style.transform='translateX(0px)';">
                                <div class="d-flex align-items-center">
                                    <div class="position-relative me-3">
                                        <i class="fas fa-wallet" style="color: #FF1493; font-size: 1.2rem;"></i>
                                        @if($playerStats && $playerStats->wallet > 10000)
                                            <div class="position-absolute top-0 start-100 translate-middle badge rounded-pill" style="background: #FF1493; color: white; font-size: 0.6rem;">💎</div>
                                        @endif
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="d-flex justify-content-between align-items-center mb-1">
                                            <small style="color: #FFFFFF; opacity: 0.9; font-weight: 700;">Wallet</small>
                                            <div style="color: #00FFFF; font-weight: bold; text-shadow: 0 0 8px rgba(0, 255, 255, 0.5);">
                                                @if($playerStats && $playerStats->wallet !== null)
                                                    ${{ number_format($playerStats->wallet) }}
                                                @else
                                                    $0
                                                @endif
                                            </div>
                                        </div>
                                        <!-- Mini progress bar -->
                                        <div style="height: 3px; background: rgba(255, 20, 147, 0.2); border-radius: 2px; overflow: hidden;">
                                            @php
                                                $walletPercent = $playerStats && $playerStats->wallet ? min(($playerStats->wallet / 50000) * 100, 100) : 0;
                                            @endphp
                                            <div style="height: 100%; background: linear-gradient(90deg, #FF1493, #00FFFF); width: {{ $walletPercent }}%; transition: width 0.8s ease;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Bank -->
                            <div class="stat-item mb-3" style="background: rgba(152, 25, 74, 0.1); padding: 12px; border-radius: 10px; border-left: 4px solid #98194A; transition: all 0.3s ease; cursor: pointer;" onmouseover="this.style.background='rgba(152, 25, 74, 0.2)'; this.style.transform='translateX(5px)';" onmouseout="this.style.background='rgba(152, 25, 74, 0.1)'; this.style.transform='translateX(0px)';">
                                <div class="d-flex align-items-center">
                                    <div class="position-relative me-3">
                                        <i class="fas fa-university" style="color: #98194A; font-size: 1.2rem;"></i>
                                        @if($playerStats && $playerStats->bank > 100000)
                                            <div class="position-absolute top-0 start-100 translate-middle badge rounded-pill" style="background: #98194A; color: white; font-size: 0.6rem;">🏦</div>
                                        @endif
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="d-flex justify-content-between align-items-center mb-1">
                                            <small style="color: #FFFFFF; opacity: 0.9; font-weight: 700;">Bank</small>
                                            <div style="color: #00FFFF; font-weight: bold; text-shadow: 0 0 8px rgba(0, 255, 255, 0.5);">
                                                @if($playerStats && $playerStats->bank !== null)
                                                    ${{ number_format($playerStats->bank) }}
                                                @else
                                                    $0
                                                @endif
                                            </div>
                                        </div>
                                        <!-- Mini progress bar -->
                                        <div style="height: 3px; background: rgba(152, 25, 74, 0.2); border-radius: 2px; overflow: hidden;">
                                            @php
                                                $bankPercent = $playerStats && $playerStats->bank ? min(($playerStats->bank / 200000) * 100, 100) : 0;
                                            @endphp
                                            <div style="height: 100%; background: linear-gradient(90deg, #98194A, #00FFFF); width: {{ $bankPercent }}%; transition: width 0.8s ease;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Kantong -->
                            <div class="stat-item mb-3" style="background: rgba(255, 193, 7, 0.1); padding: 12px; border-radius: 10px; border-left: 4px solid #ffc107; transition: all 0.3s ease; cursor: pointer;" onmouseover="this.style.background='rgba(255, 193, 7, 0.2)'; this.style.transform='translateX(5px)';" onmouseout="this.style.background='rgba(255, 193, 7, 0.1)'; this.style.transform='translateX(0px)';">
                                <div class="d-flex align-items-center">
                                    <div class="position-relative me-3">
                                        <i class="fas fa-shopping-bag" style="color: #ffc107; font-size: 1.2rem;"></i>
                                        @if($playerStats && $playerStats->kantong > 50)
                                            <div class="position-absolute top-0 start-100 translate-middle badge rounded-pill" style="background: #ffc107; color: #1a0011; font-size: 0.6rem;">🛍</div>
                                        @endif
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="d-flex justify-content-between align-items-center mb-1">
                                            <small style="color: #FFFFFF; opacity: 0.9; font-weight: 700;">Kantong</small>
                                            <div style="color: #00FFFF; font-weight: bold; text-shadow: 0 0 8px rgba(0, 255, 255, 0.5);">
                                                @if($playerStats && $playerStats->kantong !== null)
                                                    {{ number_format($playerStats->kantong) }}
                                                @else
                                                    0
                                                @endif
                                            </div>
                                        </div>
                                        <!-- Mini progress bar -->
                                        <div style="height: 3px; background: rgba(255, 193, 7, 0.2); border-radius: 2px; overflow: hidden;">
                                            @php
                                                $kantongPercent = $playerStats && $playerStats->kantong ? min(($playerStats->kantong / 100) * 100, 100) : 0;
                                            @endphp
                                            <div style="height: 100%; background: linear-gradient(90deg, #ffc107, #00FFFF); width: {{ $kantongPercent }}%; transition: width 0.8s ease;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Playtime -->
                            <div class="stat-item mb-3" style="background: rgba(40, 167, 69, 0.1); padding: 12px; border-radius: 10px; border-left: 4px solid #28a745; transition: all 0.3s ease; cursor: pointer;" onmouseover="this.style.background='rgba(40, 167, 69, 0.2)'; this.style.transform='translateX(5px)';" onmouseout="this.style.background='rgba(40, 167, 69, 0.1)'; this.style.transform='translateX(0px)';">
                                <div class="d-flex align-items-center">
                                    <div class="position-relative me-3">
                                        <i class="fas fa-clock" style="color: #28a745; font-size: 1.2rem;"></i>
                                        @php
                                            $playtimeValue = $playerStats && $playerStats->playtime ? $playerStats->playtime : '0h 0m';
                                            $hasLongPlaytime = str_contains($playtimeValue, 'h') && (int)explode('h', $playtimeValue)[0] > 10;
                                        @endphp
                                        @if($hasLongPlaytime)
                                            <div class="position-absolute top-0 start-100 translate-middle badge rounded-pill" style="background: #28a745; color: white; font-size: 0.6rem;">⏱</div>
                                        @endif
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="d-flex justify-content-between align-items-center mb-1">
                                            <small style="color: #FFFFFF; opacity: 0.9; font-weight: 700;">Playtime</small>
                                            <div style="color: #00FFFF; font-weight: bold; text-shadow: 0 0 8px rgba(0, 255, 255, 0.5);">
                                                @if($playerStats && $playerStats->playtime !== null)
                                                    {{ $playerStats->playtime }}
                                                @else
                                                    0h 0m
                                                @endif
                                            </div>
                                        </div>
                                        <!-- Mini progress bar for playtime -->
                                        <div style="height: 3px; background: rgba(40, 167, 69, 0.2); border-radius: 2px; overflow: hidden;">
                                            @php
                                                $hours = 0;
                                                if ($playerStats && $playerStats->playtime && str_contains($playerStats->playtime, 'h')) {
                                                    $hours = (int)explode('h', $playerStats->playtime)[0];
                                                }
                                                $playtimePercent = min(($hours / 100) * 100, 100);
                                            @endphp
                                            <div style="height: 100%; background: linear-gradient(90deg, #28a745, #00FFFF); width: {{ $playtimePercent }}%; transition: width 0.8s ease;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Enhanced Action Buttons -->
                    <div class="text-center mt-4">
                        <!-- Discord Button -->
                        <a href="https://discord.gg/kisahroleplay" target="_blank" class="btn w-100 mb-3 position-relative overflow-hidden" style="background: linear-gradient(45deg, #5865F2, #7289DA); border: none; color: white; font-family: 'Orbitron', monospace; text-transform: uppercase; letter-spacing: 1px; transition: all 0.3s ease; box-shadow: 0 4px 15px rgba(88, 101, 242, 0.3);" onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 6px 20px rgba(88, 101, 242, 0.4)';" onmouseout="this.style.transform='translateY(0px)'; this.style.boxShadow='0 4px 15px rgba(88, 101, 242, 0.3)';">
                            <span class="position-relative" style="z-index: 2;">
                                <i class="fab fa-discord me-2"></i>Join Discord
                            </span>
                            <!-- Sweep Light Effect -->
                            <div class="position-absolute top-0 start-0 w-100 h-100" style="background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.2), transparent); transform: translateX(-100%); animation: sweepLight 3s infinite;"></div>
                        </a>

                        <!-- Edit Profile Button -->
                        <button type="button" class="btn w-100 mb-3 position-relative overflow-hidden" data-bs-toggle="modal" data-bs-target="#editProfileModal" style="background: linear-gradient(45deg, #00FFFF, #00CED1); border: none; color: #1a0011; font-family: 'Orbitron', monospace; text-transform: uppercase; letter-spacing: 1px; font-weight: 600; transition: all 0.3s ease; box-shadow: 0 4px 15px rgba(0, 255, 255, 0.3);" onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 6px 20px rgba(0, 255, 255, 0.4)';" onmouseout="this.style.transform='translateY(0px)'; this.style.boxShadow='0 4px 15px rgba(0, 255, 255, 0.3)';">
                            <span class="position-relative" style="z-index: 2;">
                                <i class="fas fa-user-edit me-2"></i>Edit Profile
                            </span>
                            <!-- Sweep Light Effect -->
                            <div class="position-absolute top-0 start-0 w-100 h-100" style="background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.3), transparent); transform: translateX(-100%); animation: sweepLight 3s infinite 1s;"></div>
                        </button>

                        <!-- Logout Button -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn w-100 position-relative overflow-hidden" style="background: linear-gradient(45deg, #FF1493, #C71585); border: none; color: white; font-family: 'Orbitron', monospace; text-transform: uppercase; letter-spacing: 1px; font-weight: 600; transition: all 0.3s ease; box-shadow: 0 4px 15px rgba(255, 20, 147, 0.3);" onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 6px 20px rgba(255, 20, 147, 0.4)';" onmouseout="this.style.transform='translateY(0px)'; this.style.boxShadow='0 4px 15px rgba(255, 20, 147, 0.3)';">
                                <span class="position-relative" style="z-index: 2;">
                                    <i class="fas fa-power-off me-2"></i>Logout
                                </span>
                                <!-- Sweep Light Effect -->
                                <div class="position-absolute top-0 start-0 w-100 h-100" style="background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.2), transparent); transform: translateX(-100%); animation: sweepLight 3s infinite 2s;"></div>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Leaderboards Section -->
        <div class="col-lg-8">
            <div class="row g-4">
                <!-- Leaderboard Playtime -->
                <div class="col-md-6">
                    <div class="card h-100" style="background: linear-gradient(135deg, rgba(26, 0, 17, 0.95), rgba(0, 40, 60, 0.8)); border: 2px solid #00FFFF; border-radius: 15px; backdrop-filter: blur(15px); box-shadow: 0 0 30px rgba(0, 255, 255, 0.4), 0 0 60px rgba(0, 255, 255, 0.1);">
                        <div class="card-header text-center py-3" style="background: linear-gradient(90deg, rgba(0, 255, 255, 0.2), rgba(0, 200, 255, 0.15)); border-bottom: 2px solid rgba(0, 255, 255, 0.5);">
                            <h5 class="mb-0" style="color: #FFFFFF; font-family: 'Orbitron', monospace; text-transform: uppercase; letter-spacing: 1px; font-weight: 700; text-shadow: 0 0 15px rgba(0, 255, 255, 0.8);">
                                <i class="fas fa-clock me-2" style="color: #00FFFF;"></i>Leaderboard Playtime
                            </h5>
                        </div>
                        <div class="card-body p-0">
                            @if(isset($leaderboards['playtime']) && $leaderboards['playtime']->count() > 0)
                                <div class="table-responsive">
                                    <table class="table table-dark table-hover mb-0">
                                        <thead style="background: rgba(0, 255, 255, 0.2);">
                                            <tr>
                                                <th style="color: #FFFFFF; font-weight: 700; text-shadow: 0 0 8px rgba(0, 255, 255, 0.8);">Rank</th>
                                                <th style="color: #FFFFFF; font-weight: 700; text-shadow: 0 0 8px rgba(0, 255, 255, 0.8);">Player</th>
                                                <th style="color: #FFFFFF; font-weight: 700; text-shadow: 0 0 8px rgba(0, 255, 255, 0.8);">Playtime</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($leaderboards['playtime'] as $entry)
                                                <tr class="{{ $entry['user_id'] == Auth::id() ? 'table-info' : '' }}">
                                                    <td style="color: #FFFFFF; font-weight: 600; opacity: 0.9;">{{ $entry['rank'] }}</td>
                                                    <td style="color: #FFFFFF; font-weight: 600; opacity: 0.9;">{{ $entry['player'] }}</td>
                                                    <td style="color: #00FFFF; font-weight: bold; text-shadow: 0 0 8px rgba(0, 255, 255, 0.8);">{{ $entry['value'] }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <div class="text-center py-5">
                                    <i class="fas fa-clock display-4 mb-3" style="color: #00FFFF; opacity: 0.7;"></i>
                                    <p style="color: #FFFFFF; opacity: 0.8; font-weight: 500;">No playtime data available</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Leaderboard Wallet -->
                <div class="col-md-6">
                    <div class="card h-100" style="background: linear-gradient(135deg, rgba(26, 0, 17, 0.95), rgba(60, 0, 30, 0.8)); border: 2px solid #FF1493; border-radius: 15px; backdrop-filter: blur(15px); box-shadow: 0 0 30px rgba(255, 20, 147, 0.4), 0 0 60px rgba(255, 20, 147, 0.1);">
                        <div class="card-header text-center py-3" style="background: linear-gradient(90deg, rgba(255, 20, 147, 0.25), rgba(255, 100, 180, 0.15)); border-bottom: 2px solid rgba(255, 20, 147, 0.5);">
                            <h5 class="mb-0" style="color: #FFFFFF; font-family: 'Orbitron', monospace; text-transform: uppercase; letter-spacing: 1px; font-weight: 700; text-shadow: 0 0 15px rgba(255, 20, 147, 0.8);">
                                <i class="fas fa-wallet me-2" style="color: #FF1493;"></i>Leaderboard Wallet
                            </h5>
                        </div>
                        <div class="card-body p-0">
                            @if(isset($leaderboards['wallet']) && $leaderboards['wallet']->count() > 0)
                                <div class="table-responsive">
                                    <table class="table table-dark table-hover mb-0">
                                        <thead style="background: rgba(255, 20, 147, 0.2);">
                                            <tr>
                                                <th style="color: #FFFFFF; font-weight: 700; text-shadow: 0 0 8px rgba(255, 20, 147, 0.8);">Rank</th>
                                                <th style="color: #FFFFFF; font-weight: 700; text-shadow: 0 0 8px rgba(255, 20, 147, 0.8);">Player</th>
                                                <th style="color: #FFFFFF; font-weight: 700; text-shadow: 0 0 8px rgba(255, 20, 147, 0.8);">Wallet</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($leaderboards['wallet'] as $entry)
                                                <tr class="{{ $entry['user_id'] == Auth::id() ? 'table-info' : '' }}">
                                                    <td style="color: #FFFFFF; font-weight: 600; opacity: 0.9;">{{ $entry['rank'] }}</td>
                                                    <td style="color: #FFFFFF; font-weight: 600; opacity: 0.9;">{{ $entry['player'] }}</td>
                                                    <td style="color: #FF1493; font-weight: bold; text-shadow: 0 0 8px rgba(255, 20, 147, 0.8);">{{ $entry['value'] }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <div class="text-center py-5">
                                    <i class="fas fa-wallet display-4 mb-3" style="color: #FF1493; opacity: 0.7;"></i>
                                    <p style="color: #FFFFFF; opacity: 0.8; font-weight: 500;">No wallet data available</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Leaderboard Bank -->
                <div class="col-md-6">
                    <div class="card h-100" style="background: linear-gradient(135deg, rgba(26, 0, 17, 0.95), rgba(40, 0, 40, 0.8)); border: 2px solid #9B59B6; border-radius: 15px; backdrop-filter: blur(15px); box-shadow: 0 0 30px rgba(155, 89, 182, 0.4), 0 0 60px rgba(155, 89, 182, 0.1);">
                        <div class="card-header text-center py-3" style="background: linear-gradient(90deg, rgba(155, 89, 182, 0.25), rgba(180, 120, 200, 0.15)); border-bottom: 2px solid rgba(155, 89, 182, 0.5);">
                            <h5 class="mb-0" style="color: #FFFFFF; font-family: 'Orbitron', monospace; text-transform: uppercase; letter-spacing: 1px; font-weight: 700; text-shadow: 0 0 15px rgba(155, 89, 182, 0.8);">
                                <i class="fas fa-university me-2" style="color: #9B59B6;"></i>Leaderboard Bank
                            </h5>
                        </div>
                        <div class="card-body p-0">
                            @if(isset($leaderboards['bank']) && $leaderboards['bank']->count() > 0)
                                <div class="table-responsive">
                                    <table class="table table-dark table-hover mb-0">
                                        <thead style="background: rgba(155, 89, 182, 0.2);">
                                            <tr>
                                                <th style="color: #FFFFFF; font-weight: 700; text-shadow: 0 0 8px rgba(155, 89, 182, 0.8);">Rank</th>
                                                <th style="color: #FFFFFF; font-weight: 700; text-shadow: 0 0 8px rgba(155, 89, 182, 0.8);">Player</th>
                                                <th style="color: #FFFFFF; font-weight: 700; text-shadow: 0 0 8px rgba(155, 89, 182, 0.8);">Bank</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($leaderboards['bank'] as $entry)
                                                <tr class="{{ $entry['user_id'] == Auth::id() ? 'table-info' : '' }}">
                                                    <td style="color: #FFFFFF; font-weight: 600; opacity: 0.9;">{{ $entry['rank'] }}</td>
                                                    <td style="color: #FFFFFF; font-weight: 600; opacity: 0.9;">{{ $entry['player'] }}</td>
                                                    <td style="color: #9B59B6; font-weight: bold; text-shadow: 0 0 8px rgba(155, 89, 182, 0.8);">{{ $entry['value'] }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <div class="text-center py-5">
                                    <i class="fas fa-university display-4 mb-3" style="color: #9B59B6; opacity: 0.7;"></i>
                                    <p style="color: #FFFFFF; opacity: 0.8; font-weight: 500;">No bank data available</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Leaderboard Kantong -->
                <div class="col-md-6">
                    <div class="card h-100" style="background: linear-gradient(135deg, rgba(26, 0, 17, 0.95), rgba(50, 30, 0, 0.8)); border: 2px solid #F39C12; border-radius: 15px; backdrop-filter: blur(15px); box-shadow: 0 0 30px rgba(243, 156, 18, 0.4), 0 0 60px rgba(243, 156, 18, 0.1);">
                        <div class="card-header text-center py-3" style="background: linear-gradient(90deg, rgba(243, 156, 18, 0.25), rgba(255, 180, 50, 0.15)); border-bottom: 2px solid rgba(243, 156, 18, 0.5);">
                            <h5 class="mb-0" style="color: #FFFFFF; font-family: 'Orbitron', monospace; text-transform: uppercase; letter-spacing: 1px; font-weight: 700; text-shadow: 0 0 15px rgba(243, 156, 18, 0.8);">
                                <i class="fas fa-shopping-bag me-2" style="color: #F39C12;"></i>Leaderboard Kantong
                            </h5>
                        </div>
                        <div class="card-body p-0">
                            @if(isset($leaderboards['kantong']) && $leaderboards['kantong']->count() > 0)
                                <div class="table-responsive">
                                    <table class="table table-dark table-hover mb-0">
                                        <thead style="background: rgba(243, 156, 18, 0.2);">
                                            <tr>
                                                <th style="color: #FFFFFF; font-weight: 700; text-shadow: 0 0 8px rgba(243, 156, 18, 0.8);">Rank</th>
                                                <th style="color: #FFFFFF; font-weight: 700; text-shadow: 0 0 8px rgba(243, 156, 18, 0.8);">Player</th>
                                                <th style="color: #FFFFFF; font-weight: 700; text-shadow: 0 0 8px rgba(243, 156, 18, 0.8);">Kantong</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($leaderboards['kantong'] as $entry)
                                                <tr class="{{ $entry['user_id'] == Auth::id() ? 'table-info' : '' }}">
                                                    <td style="color: #FFFFFF; font-weight: 600; opacity: 0.9;">{{ $entry['rank'] }}</td>
                                                    <td style="color: #FFFFFF; font-weight: 600; opacity: 0.9;">{{ $entry['player'] }}</td>
                                                    <td style="color: #F39C12; font-weight: bold; text-shadow: 0 0 8px rgba(243, 156, 18, 0.8);">{{ $entry['value'] }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <div class="text-center py-5">
                                    <i class="fas fa-shopping-bag display-4 mb-3" style="color: #F39C12; opacity: 0.7;"></i>
                                    <p style="color: #FFFFFF; opacity: 0.8; font-weight: 500;">No kantong data available</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Edit Profile Modal -->
<div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="background: rgba(26, 0, 17, 0.95); border: 2px solid #00FFFF; border-radius: 15px; backdrop-filter: blur(20px);">
            <div class="modal-header" style="border-bottom: 2px solid rgba(0, 255, 255, 0.3); background: rgba(0, 255, 255, 0.1);">
                <h5 class="modal-title" id="editProfileModalLabel" style="color: #00FFFF; font-family: 'Orbitron', monospace; text-transform: uppercase; letter-spacing: 1px;">
                    <i class="fas fa-edit me-2"></i>Edit Profile
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form method="POST" action="{{ route('profile.update') }}">
                @csrf
                @method('PUT')

                <div class="modal-body p-4">
                    <!-- Name Field -->
                    <div class="mb-4">
                        <label for="name" class="form-label" style="color: #D77CA8; font-weight: bold; font-family: 'Orbitron', monospace;">
                            <i class="fas fa-user me-2"></i>Character Name
                        </label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', Auth::user()->name) }}" required
                               style="background: rgba(0, 255, 255, 0.1); border: 2px solid rgba(0, 255, 255, 0.3); color: #00FFFF; border-radius: 10px;"
                               placeholder="Enter your character name">
                        @error('name')
                            <div class="text-danger mt-1" style="font-size: 0.85rem;">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Avatar URL Field -->
                    <div class="mb-4">
                        <label for="avatar_url" class="form-label" style="color: #D77CA8; font-weight: bold; font-family: 'Orbitron', monospace;">
                            <i class="fas fa-image me-2"></i>Avatar URL
                        </label>
                        <input type="url" class="form-control" id="avatar_url" name="avatar_url" value="{{ old('avatar_url', Auth::user()->avatar_url) }}"
                               style="background: rgba(255, 20, 147, 0.1); border: 2px solid rgba(255, 20, 147, 0.3); color: #FF1493; border-radius: 10px;"
                               placeholder="https://example.com/avatar.jpg">
                        <small class="form-text" style="color: #D77CA8; opacity: 0.8;">
                            <i class="fas fa-info-circle me-1"></i>Enter a valid image URL for your avatar
                        </small>
                        @error('avatar_url')
                            <div class="text-danger mt-1" style="font-size: 0.85rem;">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Gender Field -->
                    <div class="mb-4">
                        <label for="gender" class="form-label" style="color: #D77CA8; font-weight: bold; font-family: 'Orbitron', monospace;">
                            <i class="fas fa-venus-mars me-2"></i>Gender
                        </label>
                        <select class="form-select" id="gender" name="gender"
                                style="background: rgba(152, 25, 74, 0.1); border: 2px solid rgba(152, 25, 74, 0.3); color: #98194A; border-radius: 10px;">
                            <option value="">Select Gender</option>
                            <option value="male" {{ old('gender', Auth::user()->gender) == 'male' ? 'selected' : '' }}>Male</option>
                            <option value="female" {{ old('gender', Auth::user()->gender) == 'female' ? 'selected' : '' }}>Female</option>
                            <option value="other" {{ old('gender', Auth::user()->gender) == 'other' ? 'selected' : '' }}>Other</option>
                            <option value="prefer_not_to_say" {{ old('gender', Auth::user()->gender) == 'prefer_not_to_say' ? 'selected' : '' }}>Prefer not to say</option>
                        </select>
                        @error('gender')
                            <div class="text-danger mt-1" style="font-size: 0.85rem;">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Change Password Section -->
                    <div class="mb-4">
                        <h6 style="color: #D77CA8; font-family: 'Orbitron', monospace; margin-bottom: 20px; text-transform: uppercase; letter-spacing: 1px;">
                            <i class="fas fa-lock me-2"></i>Change Password (Optional)
                        </h6>

                        <!-- Current Password -->
                        <div class="mb-3">
                            <label for="current_password" class="form-label" style="color: #D77CA8; font-weight: bold; font-family: 'Orbitron', monospace;">
                                <i class="fas fa-key me-2"></i>Current Password
                            </label>
                            <input type="password" class="form-control" id="current_password" name="current_password"
                                   style="background: rgba(215, 124, 168, 0.1); border: 2px solid rgba(215, 124, 168, 0.3); color: #D77CA8; border-radius: 10px;"
                                   placeholder="Enter current password">
                            @error('current_password')
                                <div class="text-danger mt-1" style="font-size: 0.85rem;">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- New Password -->
                        <div class="mb-3">
                            <label for="new_password" class="form-label" style="color: #D77CA8; font-weight: bold; font-family: 'Orbitron', monospace;">
                                <i class="fas fa-lock me-2"></i>New Password
                            </label>
                            <input type="password" class="form-control" id="new_password" name="new_password"
                                   style="background: rgba(215, 124, 168, 0.1); border: 2px solid rgba(215, 124, 168, 0.3); color: #D77CA8; border-radius: 10px;"
                                   placeholder="Enter new password">
                            @error('new_password')
                                <div class="text-danger mt-1" style="font-size: 0.85rem;">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Confirm New Password -->
                        <div class="mb-3">
                            <label for="new_password_confirmation" class="form-label" style="color: #D77CA8; font-weight: bold; font-family: 'Orbitron', monospace;">
                                <i class="fas fa-lock me-2"></i>Confirm New Password
                            </label>
                            <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation"
                                   style="background: rgba(215, 124, 168, 0.1); border: 2px solid rgba(215, 124, 168, 0.3); color: #D77CA8; border-radius: 10px;"
                                   placeholder="Confirm new password">
                            @error('new_password_confirmation')
                                <div class="text-danger mt-1" style="font-size: 0.85rem;">{{ $message }}</div>
                            @enderror
                        </div>

                        <small class="form-text" style="color: #D77CA8; opacity: 0.8;">
                            <i class="fas fa-info-circle me-1"></i>Leave password fields empty if you don't want to change your password
                        </small>
                    </div>

                    <!-- Sync Roblox Avatar Button -->
                    @if(Auth::user()->roblox_username)
                    <div class="mb-4">
                        <button type="button" id="syncRobloxAvatar" class="btn btn-outline-warning w-100"
                                style="border: 2px solid #ffc107; color: #ffc107; font-family: 'Orbitron', monospace; text-transform: uppercase; letter-spacing: 1px;">
                            <i class="fab fa-roblox me-2"></i>Sync Avatar from Roblox
                        </button>
                        <small class="form-text" style="color: #D77CA8; opacity: 0.8;">
                            <i class="fas fa-info-circle me-1"></i>This will automatically fetch your avatar from Roblox
                        </small>
                    </div>
                    @endif

                    <!-- Preview Section -->
                    <div class="mt-4 p-3" style="background: rgba(215, 124, 168, 0.1); border: 1px solid rgba(215, 124, 168, 0.3); border-radius: 10px;">
                        <h6 style="color: #D77CA8; font-family: 'Orbitron', monospace; margin-bottom: 15px;">
                            <i class="fas fa-eye me-2"></i>Preview
                        </h6>
                        <div class="d-flex align-items-center">
                            <div class="me-3">
                                <div id="avatarPreview" style="width: 60px; height: 60px; background: linear-gradient(45deg, #00FFFF, #FF1493); border-radius: 50%; display: flex; align-items: center; justify-content: center; overflow: hidden;">
                                    @if(Auth::user()->avatar_url)
                                        <img src="{{ Auth::user()->avatar_url }}" alt="Avatar" style="width: 100%; height: 100%; object-fit: cover;">
                                    @else
                                        <i class="fas fa-user" style="color: #00FFFF; font-size: 1.5rem;"></i>
                                    @endif
                                </div>
                            </div>
                            <div>
                                <div id="namePreview" style="color: #00FFFF; font-weight: bold;">{{ Auth::user()->name }}</div>
                                <div id="genderPreview" style="color: #D77CA8; font-size: 0.9rem;">
                                    @if(Auth::user()->gender)
                                        {{ ucfirst(str_replace('_', ' ', Auth::user()->gender)) }}
                                    @else
                                        Gender not specified
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer" style="border-top: 2px solid rgba(0, 255, 255, 0.3); background: rgba(0, 255, 255, 0.1);">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal" style="border: 2px solid #6c757d; color: #6c757d; font-family: 'Orbitron', monospace;">
                        <i class="fas fa-times me-2"></i>Cancel
                    </button>
                    <button type="submit" class="btn btn-outline-success" style="border: 2px solid #00FFFF; color: #00FFFF; font-family: 'Orbitron', monospace; text-transform: uppercase; letter-spacing: 1px;">
                        <i class="fas fa-save me-2"></i>Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


<style>
/* Cyberpunk Animations */
@keyframes avatarFloat {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-10px); }
}

@keyframes pulseRing {
    0% {
        transform: scale(0.8);
        opacity: 1;
    }
    50% {
        transform: scale(1.1);
        opacity: 0.7;
    }
    100% {
        transform: scale(0.8);
        opacity: 1;
    }
}

@keyframes headerUnderline {
    0% {
        width: 60px;
        opacity: 1;
    }
    100% {
        width: 80px;
        opacity: 0.7;
    }
}

@keyframes sweepLight {
    0% {
        transform: translateX(-100%);
    }
    50% {
        transform: translateX(0%);
    }
    100% {
        transform: translateX(100%);
    }
}

/* Enhanced Card Hover Effect */
.profile-card-hover {
    transition: all 0.4s ease;
}

.profile-card-hover:hover {
    transform: scale(1.02);
    box-shadow: 0 0 50px rgba(0, 255, 255, 0.4), 0 0 100px rgba(255, 20, 147, 0.2) !important;
}

/* Data Item Enhanced Hover */
.data-item-enhanced {
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    overflow: hidden;
}

.data-item-enhanced::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
    transition: left 0.5s ease;
}

.data-item-enhanced:hover::before {
    left: 100%;
}
</style>

<script>
// Copy Verification Code Function
function copyVerificationCode(code) {
    navigator.clipboard.writeText(code).then(function() {
        // Show success feedback
        const codeElement = document.getElementById('verificationCode');
        const originalText = codeElement.textContent;
        codeElement.textContent = 'COPIED!';
        codeElement.style.color = '#28a745';
        codeElement.style.textShadow = '0 0 10px rgba(40, 167, 69, 0.5)';
        
        setTimeout(function() {
            codeElement.textContent = originalText;
            codeElement.style.color = '#00FFFF';
            codeElement.style.textShadow = '0 0 10px rgba(0, 255, 255, 0.5)';
        }, 1500);
        
        // Optional: Show toast notification
        if (typeof Swal !== 'undefined') {
            Swal.fire({
                icon: 'success',
                title: 'Copied!',
                text: 'Verification code copied to clipboard',
                timer: 2000,
                showConfirmButton: false,
                background: 'rgba(26, 0, 17, 0.95)',
                color: '#00FFFF'
            });
        }
    }).catch(function(err) {
        console.error('Failed to copy: ', err);
        // Fallback for older browsers
        const textArea = document.createElement('textarea');
        textArea.value = code;
        document.body.appendChild(textArea);
        textArea.select();
        document.execCommand('copy');
        document.body.removeChild(textArea);
        
        // Show feedback
        alert('Verification code copied: ' + code);
    });
}

document.addEventListener('DOMContentLoaded', function() {
    // Real-time preview updates
    const nameInput = document.getElementById('name');
    const avatarInput = document.getElementById('avatar_url');
    const genderSelect = document.getElementById('gender');

    const namePreview = document.getElementById('namePreview');
    const avatarPreview = document.getElementById('avatarPreview');
    const genderPreview = document.getElementById('genderPreview');

    // Update name preview
    nameInput.addEventListener('input', function() {
        namePreview.textContent = this.value || 'Character Name';
    });

    // Update avatar preview
    avatarInput.addEventListener('input', function() {
        if (this.value) {
            // Test if the URL is valid by creating a temporary image
            const img = new Image();
            img.onload = function() {
                avatarPreview.innerHTML = `<img src="${avatarInput.value}" alt="Avatar" style="width: 100%; height: 100%; object-fit: cover;">`;
            };
            img.onerror = function() {
                avatarPreview.innerHTML = '<i class="fas fa-user" style="color: #00FFFF; font-size: 1.5rem;"></i>';
            };
            img.src = this.value;
        } else {
            avatarPreview.innerHTML = '<i class="fas fa-user" style="color: #00FFFF; font-size: 1.5rem;"></i>';
        }
    });

    // Update gender preview
    genderSelect.addEventListener('change', function() {
        if (this.value) {
            const genderText = this.value.replace('_', ' ').split(' ').map(word =>
                word.charAt(0).toUpperCase() + word.slice(1)
            ).join(' ');
            genderPreview.textContent = genderText;
        } else {
            genderPreview.textContent = 'Gender not specified';
        }
    });

    // Sync Roblox Avatar functionality
    @if(Auth::user()->roblox_username)
    const syncRobloxBtn = document.getElementById('syncRobloxAvatar');
    if (syncRobloxBtn) {
        syncRobloxBtn.addEventListener('click', function() {
            const btn = this;
            const originalText = btn.innerHTML;

            // Show loading state
            btn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Syncing...';
            btn.disabled = true;

            // Fetch avatar using server-side endpoint
            fetch('{{ route("profile.sync-roblox-avatar") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') ||
                                   document.querySelector('input[name="_token"]').value
                }
            })
            .then(response => {
                console.log('Response status:', response.status); // Debug logging
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                return response.json();
            })
            .then(data => {
                console.log('Server response:', data); // Debug logging

                if (data.success) {
                    // Update the avatar URL input and preview
                    avatarInput.value = data.avatar_url;
                    avatarPreview.innerHTML = `<img src="${data.avatar_url}" alt="Avatar" style="width: 100%; height: 100%; object-fit: cover;">`;

                    // Show success message
                    btn.innerHTML = '<i class="fas fa-check me-2"></i>Synced!';
                    btn.style.borderColor = '#28a745';
                    btn.style.color = '#28a745';

                    setTimeout(() => {
                        btn.innerHTML = originalText;
                        btn.style.borderColor = '#ffc107';
                        btn.style.color = '#ffc107';
                        btn.disabled = false;
                    }, 2000);
                } else {
                    throw new Error(data.error || 'Failed to sync avatar');
                }
            })
            .catch(error => {
                console.error('Error syncing Roblox avatar:', error);

                // Show error state with more detailed message
                btn.innerHTML = '<i class="fas fa-exclamation-triangle me-2"></i>Error!';
                btn.style.borderColor = '#dc3545';
                btn.style.color = '#dc3545';

                // Show error message to user
                alert('Error syncing avatar: ' + (error.message || 'Unknown error'));

                setTimeout(() => {
                    btn.innerHTML = originalText;
                    btn.style.borderColor = '#ffc107';
                    btn.style.color = '#ffc107';
                    btn.disabled = false;
                }, 2000);
            });
        });
    }
    @endif
});
</script>
@endsection
