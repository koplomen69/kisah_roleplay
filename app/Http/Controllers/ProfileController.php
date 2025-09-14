<?php

namespace App\Http\Controllers;

use App\Models\PlayerStats;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            'gender' => 'nullable|in:male,female,other,prefer_not_to_say'
        ]);

        try {
            // Update the user's profile
            $user->update([
                'name' => $validatedData['name'],
                'avatar_url' => $validatedData['avatar_url'] ?? null,
                'gender' => $validatedData['gender'] ?? null
            ]);

            // If user has player stats and name changed, update roblox_username as well
            if ($user->playerStats) {
                $user->playerStats->update([
                    'roblox_username' => $validatedData['name']
                ]);
            }

            return redirect()->route('profile')->with('success', 'Profile updated successfully!');
        } catch (\Exception $e) {
            return redirect()->route('profile')->with('error', 'Failed to update profile. Please try again.');
        }
    }
}
