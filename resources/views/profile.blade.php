@extends('layouts.profile')

@section('title', 'Profile - Kisah Roleplay')

@section('content')


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
            <div class="card h-100" style="background: rgba(26, 0, 17, 0.95); border: 2px solid #00FFFF; border-radius: 15px; backdrop-filter: blur(15px); box-shadow: 0 0 30px rgba(0, 255, 255, 0.3);">
                <div class="card-header text-center py-4" style="background: rgba(0, 255, 255, 0.1); border-bottom: 2px solid rgba(0, 255, 255, 0.3);">
                    <div class="profile-avatar mb-3">
                        <div style="width: 120px; height: 120px; background: linear-gradient(45deg, #00FFFF, #FF1493); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto; position: relative; overflow: hidden; box-shadow: 0 0 25px rgba(0, 255, 255, 0.5);">
                            <div style="width: 110px; height: 110px; background: rgba(26, 0, 17, 0.9); border-radius: 50%; display: flex; align-items: center; justify-content: center; overflow: hidden;">
                                @if(Auth::user()->avatar_url)
                                    <img src="{{ Auth::user()->avatar_url }}" alt="Avatar" style="width: 100%; height: 100%; object-fit: cover;">
                                @else
                                    <i class="fas fa-user" style="font-size: 3rem; color: #00FFFF;"></i>
                                @endif
                            </div>
                        </div>
                    </div>
                    <h4 style="color: #00FFFF; font-family: 'Orbitron', monospace; margin: 0; text-shadow: 0 0 10px rgba(0, 255, 255, 0.5);">
                        {{ Auth::user()->name }}
                    </h4>
                    <p style="color: #D77CA8; margin: 0; font-family: 'Rajdhani', sans-serif;">
                        <i class="fas fa-crown me-1"></i>Player Profile
                    </p>
                </div>

                <div class="card-body p-4">
                    <div class="profile-stats">
                        <div class="stat-item mb-4" style="background: rgba(0, 255, 255, 0.1); padding: 15px; border-radius: 10px; border-left: 4px solid #00FFFF;">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-id-card me-3" style="color: #00FFFF; font-size: 1.5rem;"></i>
                                <div>
                                    <small style="color: #D77CA8; opacity: 0.8;">Member Since</small>
                                    <div style="color: #00FFFF; font-weight: bold;">{{ Auth::user()->created_at->format('M d, Y') }}</div>
                                </div>
                            </div>
                        </div>

                        <div class="stat-item mb-4" style="background: rgba(255, 20, 147, 0.1); padding: 15px; border-radius: 10px; border-left: 4px solid #00FFFF;">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-envelope me-3" style="color: #00FFFF; font-size: 1.5rem;"></i>
                                <div>
                                    <small style="color: #00FFFF; opacity: 0.8;">Email</small>
                                    <div style="color: #00FFFF; font-weight: bold; font-size: 0.9rem;">{{ Auth::user()->email }}</div>
                                </div>
                            </div>
                        </div>

                        @if(Auth::user()->roblox_username)
                        <div class="stat-item mb-4" style="background: rgba(152, 25, 74, 0.2); padding: 15px; border-radius: 10px; border-left: 4px solid #00FFFF;">
                            <div class="d-flex align-items-center">
                                <i class="fab fa-roblox me-3" style="color: #98194A; font-size: 1.5rem;"></i>
                                <div>
                                    <small style="color: #00FFFF; opacity: 0.8;">Roblox Username</small>
                                    <div style="color: #00FFFF; font-weight: bold;">{{ Auth::user()->roblox_username }}</div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>

                    <div class="text-center mt-4">
                        <!-- Edit Profile Button -->
                        <button type="button" class="btn btn-outline-info w-100 mb-3" data-bs-toggle="modal" data-bs-target="#editProfileModal" style="border: 2px solid #00FFFF; color: #00FFFF; font-family: 'Orbitron', monospace; text-transform: uppercase; letter-spacing: 1px; transition: all 0.3s ease;">
                            <i class="fas fa-edit me-2"></i>Edit Profile
                        </button>

                        <!-- Logout Button -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger w-100" style="border: 2px solid #FF1493; color: #FF1493; font-family: 'Orbitron', monospace; text-transform: uppercase; letter-spacing: 1px; transition: all 0.3s ease;">
                                <i class="fas fa-sign-out-alt me-2"></i>Logout
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
                    <div class="card h-100" style="background: rgba(26, 0, 17, 0.95); border: 2px solid #00FFFF; border-radius: 15px; backdrop-filter: blur(15px); box-shadow: 0 0 20px rgba(0, 255, 255, 0.2);">
                        <div class="card-header text-center py-3" style="background: rgba(0, 255, 255, 0.1); border-bottom: 1px solid rgba(0, 255, 255, 0.3);">
                            <h5 class="mb-0" style="color: #00FFFF; font-family: 'Orbitron', monospace; text-transform: uppercase; letter-spacing: 1px;">
                                <i class="fas fa-clock me-2"></i>Leaderboard Playtime
                            </h5>
                        </div>
                        <div class="card-body p-0">
                            @if(isset($leaderboards['playtime']) && $leaderboards['playtime']->count() > 0)
                                <div class="table-responsive">
                                    <table class="table table-dark table-hover mb-0">
                                        <thead style="background: rgba(0, 255, 255, 0.2);">
                                            <tr>
                                                <th style="color: #00FFFF;">Rank</th>
                                                <th style="color: #00FFFF;">Player</th>
                                                <th style="color: #00FFFF;">Playtime</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($leaderboards['playtime'] as $entry)
                                                <tr class="{{ $entry['user_id'] == Auth::id() ? 'table-info' : '' }}">
                                                    <td style="color: #D77CA8;">{{ $entry['rank'] }}</td>
                                                    <td style="color: #D77CA8;">{{ $entry['player'] }}</td>
                                                    <td style="color: #00FFFF;">{{ $entry['value'] }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <div class="text-center py-5">
                                    <i class="fas fa-clock display-4 mb-3" style="color: #00FFFF; opacity: 0.5;"></i>
                                    <p class="text-muted">No playtime data available</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Leaderboard Wallet -->
                <div class="col-md-6">
                    <div class="card h-100" style="background: rgba(26, 0, 17, 0.95); border: 2px solid #FF1493; border-radius: 15px; backdrop-filter: blur(15px); box-shadow: 0 0 20px rgba(255, 20, 147, 0.2);">
                        <div class="card-header text-center py-3" style="background: rgba(255, 20, 147, 0.1); border-bottom: 1px solid rgba(255, 20, 147, 0.3);">
                            <h5 class="mb-0" style="color: #FF1493; font-family: 'Orbitron', monospace; text-transform: uppercase; letter-spacing: 1px;">
                                <i class="fas fa-wallet me-2"></i>Leaderboard Wallet
                            </h5>
                        </div>
                        <div class="card-body p-0">
                            @if(isset($leaderboards['wallet']) && $leaderboards['wallet']->count() > 0)
                                <div class="table-responsive">
                                    <table class="table table-dark table-hover mb-0">
                                        <thead style="background: rgba(255, 20, 147, 0.2);">
                                            <tr>
                                                <th style="color: #FF1493;">Rank</th>
                                                <th style="color: #FF1493;">Player</th>
                                                <th style="color: #FF1493;">Wallet</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($leaderboards['wallet'] as $entry)
                                                <tr class="{{ $entry['user_id'] == Auth::id() ? 'table-info' : '' }}">
                                                    <td style="color: #D77CA8;">{{ $entry['rank'] }}</td>
                                                    <td style="color: #D77CA8;">{{ $entry['player'] }}</td>
                                                    <td style="color: #FF1493;">{{ $entry['value'] }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <div class="text-center py-5">
                                    <i class="fas fa-wallet display-4 mb-3" style="color: #FF1493; opacity: 0.5;"></i>
                                    <p class="text-muted">No wallet data available</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Leaderboard Bank -->
                <div class="col-md-6">
                    <div class="card h-100" style="background: rgba(26, 0, 17, 0.95); border: 2px solid #98194A; border-radius: 15px; backdrop-filter: blur(15px); box-shadow: 0 0 20px rgba(152, 25, 74, 0.2);">
                        <div class="card-header text-center py-3" style="background: rgba(152, 25, 74, 0.1); border-bottom: 1px solid rgba(152, 25, 74, 0.3);">
                            <h5 class="mb-0" style="color: #98194A; font-family: 'Orbitron', monospace; text-transform: uppercase; letter-spacing: 1px;">
                                <i class="fas fa-university me-2"></i>Leaderboard Bank
                            </h5>
                        </div>
                        <div class="card-body p-0">
                            @if(isset($leaderboards['bank']) && $leaderboards['bank']->count() > 0)
                                <div class="table-responsive">
                                    <table class="table table-dark table-hover mb-0">
                                        <thead style="background: rgba(152, 25, 74, 0.2);">
                                            <tr>
                                                <th style="color: #98194A;">Rank</th>
                                                <th style="color: #98194A;">Player</th>
                                                <th style="color: #98194A;">Bank</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($leaderboards['bank'] as $entry)
                                                <tr class="{{ $entry['user_id'] == Auth::id() ? 'table-info' : '' }}">
                                                    <td style="color: #D77CA8;">{{ $entry['rank'] }}</td>
                                                    <td style="color: #D77CA8;">{{ $entry['player'] }}</td>
                                                    <td style="color: #98194A;">{{ $entry['value'] }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <div class="text-center py-5">
                                    <i class="fas fa-university display-4 mb-3" style="color: #98194A; opacity: 0.5;"></i>
                                    <p class="text-muted">No bank data available</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Leaderboard Kantong -->
                <div class="col-md-6">
                    <div class="card h-100" style="background: rgba(26, 0, 17, 0.95); border: 2px solid #D77CA8; border-radius: 15px; backdrop-filter: blur(15px); box-shadow: 0 0 20px rgba(215, 124, 168, 0.2);">
                        <div class="card-header text-center py-3" style="background: rgba(215, 124, 168, 0.1); border-bottom: 1px solid rgba(215, 124, 168, 0.3);">
                            <h5 class="mb-0" style="color: #D77CA8; font-family: 'Orbitron', monospace; text-transform: uppercase; letter-spacing: 1px;">
                                <i class="fas fa-shopping-bag me-2"></i>Leaderboard Kantong
                            </h5>
                        </div>
                        <div class="card-body p-0">
                            @if(isset($leaderboards['kantong']) && $leaderboards['kantong']->count() > 0)
                                <div class="table-responsive">
                                    <table class="table table-dark table-hover mb-0">
                                        <thead style="background: rgba(215, 124, 168, 0.2);">
                                            <tr>
                                                <th style="color: #D77CA8;">Rank</th>
                                                <th style="color: #D77CA8;">Player</th>
                                                <th style="color: #D77CA8;">Kantong</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($leaderboards['kantong'] as $entry)
                                                <tr class="{{ $entry['user_id'] == Auth::id() ? 'table-info' : '' }}">
                                                    <td style="color: #D77CA8;">{{ $entry['rank'] }}</td>
                                                    <td style="color: #D77CA8;">{{ $entry['player'] }}</td>
                                                    <td style="color: #D77CA8;">{{ $entry['value'] }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <div class="text-center py-5">
                                    <i class="fas fa-shopping-bag display-4 mb-3" style="color: #D77CA8; opacity: 0.5;"></i>
                                    <p class="text-muted" >No kantong data available</p>
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


<script>
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
