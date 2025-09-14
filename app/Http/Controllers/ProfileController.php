<?php

namespace App\Http\Controllers;

use App\Models\PlayerStats;
use App\Services\RobloxService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Get player stats for the user (don't create random data)
        $playerStats = PlayerStats::where('user_id', $user->id)->first();

        // If no stats exist, create empty stats
        if (!$playerStats) {
            $playerStats = new PlayerStats([
                'user_id' => $user->id,
                'roblox_username' => $user->roblox_username ?? $user->name,
                'roblox_id' => $user->roblox_id ?? 0,
                'wallet' => 0,
                'bank' => 0,
                'kantong' => 0,
                'playtime_minutes' => 0,
                'level' => 1,
                'experience' => 0
            ]);
        }

        // Get leaderboards (these will be empty if no data exists)
        $leaderboards = [
            'playtime' => PlayerStats::getPlaytimeLeaderboard(10),
            'wallet' => PlayerStats::getWalletLeaderboard(10),
            'bank' => PlayerStats::getBankLeaderboard(10),
            'kantong' => PlayerStats::getKantongLeaderboard(10),
        ];

        // Get user's ranks (will be null if no stats)
        $userRanks = [
            'playtime' => PlayerStats::getUserRank($user->id, 'playtime_minutes'),
            'wallet' => PlayerStats::getUserRank($user->id, 'wallet'),
            'bank' => PlayerStats::getUserRank($user->id, 'bank'),
            'kantong' => PlayerStats::getUserRank($user->id, 'kantong'),
        ];

        return view('profile', compact('playerStats', 'leaderboards', 'userRanks'));
    }

    public function updateStats(Request $request)
    {
        $user = Auth::user();
        $playerStats = PlayerStats::where('user_id', $user->id)->first();

        if (!$playerStats) {
            return response()->json(['error' => 'Player stats not found'], 404);
        }

        // Update stats (this would typically come from your Roblox game)
        $playerStats->update([
            'wallet' => $request->wallet ?? $playerStats->wallet,
            'bank' => $request->bank ?? $playerStats->bank,
            'kantong' => $request->kantong ?? $playerStats->kantong,
            'playtime_minutes' => $request->playtime_minutes ?? $playerStats->playtime_minutes,
            'level' => $request->level ?? $playerStats->level,
            'experience' => $request->experience ?? $playerStats->experience,
            'last_played' => now()
        ]);

        return response()->json(['success' => 'Stats updated successfully']);
    }

    public function getLeaderboard($type)
    {
        switch ($type) {
            case 'playtime':
                $data = PlayerStats::getPlaytimeLeaderboard(50);
                break;
            case 'wallet':
                $data = PlayerStats::getWalletLeaderboard(50);
                break;
            case 'bank':
                $data = PlayerStats::getBankLeaderboard(50);
                break;
            case 'kantong':
                $data = PlayerStats::getKantongLeaderboard(50);
                break;
            default:
                return response()->json(['error' => 'Invalid leaderboard type'], 400);
        }

        return response()->json($data);
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        // Validate the request
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|min:2',
            'avatar_url' => 'nullable|url|max:500',
            'gender' => 'nullable|in:male,female,other,prefer_not_to_say',
            'current_password' => 'nullable|string|min:8',
            'new_password' => 'nullable|string|min:8|confirmed',
            'new_password_confirmation' => 'nullable|string|min:8'
        ]);

        // If password fields are provided, validate current password
        if ($request->filled('current_password') || $request->filled('new_password')) {
            if (!$request->filled('current_password')) {
                return redirect()->route('profile')->with('error', 'Current password is required to change password.');
            }

            if (!$request->filled('new_password')) {
                return redirect()->route('profile')->with('error', 'New password is required.');
            }

            // Check if current password is correct
            if (!Hash::check($validatedData['current_password'], $user->password)) {
                return redirect()->route('profile')->with('error', 'Current password is incorrect.');
            }
        }

        try {
            // Prepare update data
            $updateData = [
                'name' => $validatedData['name'],
                'avatar_url' => $validatedData['avatar_url'] ?? null,
                'gender' => $validatedData['gender'] ?? null
            ];

            // Add password to update data if provided
            if ($request->filled('new_password')) {
                $updateData['password'] = Hash::make($validatedData['new_password']);
            }

            // Update the user's profile
            $user->update($updateData);

            // If user has player stats and name changed, update roblox_username as well
            if ($user->playerStats) {
                $user->playerStats->update([
                    'roblox_username' => $validatedData['name']
                ]);
            }

            $successMessage = 'Profile updated successfully!';
            if ($request->filled('new_password')) {
                $successMessage = 'Profile and password updated successfully!';
            }

            return redirect()->route('profile')->with('success', $successMessage);
        } catch (\Exception $e) {
            return redirect()->route('profile')->with('error', 'Failed to update profile. Please try again.');
        }
    }

    public function syncRobloxAvatar(Request $request)
    {
        $user = Auth::user();

        if (!$user->roblox_username) {
            return response()->json(['error' => 'No Roblox username associated with this account.'], 400);
        }

        try {
            // Use the existing RobloxService
            $robloxService = new RobloxService();

            // Add debugging information
            Log::info('Attempting to sync Roblox avatar for user: ' . $user->roblox_username);

            $userData = $robloxService->getUserByUsername($user->roblox_username);

            if (!$userData) {
                Log::warning('No user data found for username: ' . $user->roblox_username);
                return response()->json(['error' => 'Roblox user not found. Please check your username.'], 404);
            }

            if (!isset($userData['id'])) {
                Log::warning('User data found but no ID field: ' . json_encode($userData));
                return response()->json(['error' => 'Invalid user data received from Roblox.'], 400);
            }

            Log::info('Found Roblox user ID: ' . $userData['id']);

            $avatarUrl = $robloxService->getUserAvatar($userData['id'], '420x420');

            if (!$avatarUrl) {
                Log::warning('No avatar URL returned for user ID: ' . $userData['id']);
                return response()->json(['error' => 'Could not fetch avatar image from Roblox.'], 400);
            }

            Log::info('Got avatar URL: ' . $avatarUrl);

            // Try to update user's avatar URL
            try {
                $user->avatar_url = $avatarUrl;
                $user->save();
                Log::info('Successfully updated avatar for user: ' . $user->name);
            } catch (\Exception $dbError) {
                Log::warning('Database error while saving avatar: ' . $dbError->getMessage());
                // Still return success since we got the avatar URL
            }

            return response()->json([
                'success' => true,
                'avatar_url' => $avatarUrl,
                'message' => 'Avatar synced successfully!'
            ]);

        } catch (\Exception $e) {
            Log::error('Error syncing Roblox avatar: ' . $e->getMessage());
            return response()->json(['error' => 'Server error: ' . $e->getMessage()], 500);
        }
    }

    public function testRobloxSync(Request $request)
    {
        $username = $request->input('username', 'Roblox'); // Default test username

        try {
            $robloxService = new RobloxService();

            Log::info('Testing Roblox sync for username: ' . $username);

            $userData = $robloxService->getUserByUsername($username);

            if (!$userData) {
                return response()->json([
                    'success' => false,
                    'error' => 'User not found',
                    'username' => $username
                ]);
            }

            $avatarUrl = $robloxService->getUserAvatar($userData['id'], '420x420');

            return response()->json([
                'success' => true,
                'username' => $username,
                'user_data' => $userData,
                'avatar_url' => $avatarUrl
            ]);

        } catch (\Exception $e) {
            Log::error('Test Roblox sync error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'error' => $e->getMessage(),
                'username' => $username
            ]);
        }
    }
}
