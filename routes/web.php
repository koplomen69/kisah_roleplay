<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('landing');
})->name('home');

// Welcome page as separate route
Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Public Routes
Route::get('/leaderboard', function () {
    return view('leaderboard');
})->name('leaderboard');

Route::get('/donasi', function () {
    return view('donasi');
})->name('donasi');

// Test Routes (Public)
Route::get('/test/roblox-sync', [ProfileController::class, 'testRobloxSync'])->name('test.roblox-sync');

Route::get('/test/roblox-debug', function () {
    $username = request('username', 'koplomen');

    try {
        // Test username API directly
        $response = \Illuminate\Support\Facades\Http::timeout(10)->post('https://users.roblox.com/v1/usernames/users', [
            'usernames' => [$username],
            'excludeBannedUsers' => true
        ]);

        $result = [
            'username' => $username,
            'status_code' => $response->status(),
            'successful' => $response->successful(),
            'response_body' => $response->json(),
            'headers' => $response->headers()
        ];

        if ($response->successful() && !empty($response->json('data'))) {
            $userData = $response->json('data')[0] ?? null;
            if ($userData) {
                // Test avatar API
                $avatarResponse = \Illuminate\Support\Facades\Http::timeout(10)->get("https://thumbnails.roblox.com/v1/users/avatar-headshot", [
                    'userIds' => $userData['id'],
                    'size' => '420x420',
                    'format' => 'Png',
                    'isCircular' => false
                ]);

                $result['avatar_api'] = [
                    'status_code' => $avatarResponse->status(),
                    'successful' => $avatarResponse->successful(),
                    'response_body' => $avatarResponse->json(),
                ];
            }
        }

        return response()->json($result);

    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()]);
    }
})->name('test.roblox-debug');

// Protected Routes
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile/sync-roblox-avatar', [ProfileController::class, 'syncRobloxAvatar'])->name('profile.sync-roblox-avatar');
    Route::post('/profile/update-stats', [ProfileController::class, 'updateStats'])->name('profile.update-stats');
    Route::get('/leaderboard/{type}', [ProfileController::class, 'getLeaderboard'])->name('leaderboard.get');

    Route::post('/refresh-roblox', [AuthController::class, 'refreshRobloxData'])->name('refresh.roblox');

    // Test route to add sample data
    Route::get('/test/add-stats', function () {
        $user = Auth::user();

        $playerStats = \App\Models\PlayerStats::updateOrCreate(
            ['user_id' => $user->id],
            [
                'roblox_username' => $user->roblox_username ?? $user->name,
                'roblox_id' => $user->roblox_id ?? 0,
                'wallet' => 15000,
                'bank' => 250000,
                'kantong' => 75,
                'playtime_minutes' => 180,
                'level' => 15,
                'experience' => 2500
            ]
        );

        return redirect()->route('profile')->with('success', 'Test stats added successfully!');
    })->name('test.add-stats');
});
