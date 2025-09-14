<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('landing');
});

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

// Protected Routes
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
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
