<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\PlayerStats;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class GameApiController extends Controller
{
    /**
     * Update player statistics from Roblox game server
     */
    public function updatePlayerStats(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'api_key' => 'required|string',
            'roblox_username' => 'required|string',
            'wallet' => 'nullable|integer|min:0',
            'bank' => 'nullable|integer|min:0',
            'kantong' => 'nullable|integer|min:0',
            'playtime_minutes' => 'nullable|integer|min:0',
            'level' => 'nullable|integer|min:1',
            'experience' => 'nullable|integer|min:0'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        // Verify API key (you should set this in your .env file)
        $expectedApiKey = env('ROBLOX_GAME_API_KEY', 'your-secret-api-key-here');
        if ($request->api_key !== $expectedApiKey) {
            Log::warning('Invalid API key attempt', [
                'ip' => $request->ip(),
                'provided_key' => $request->api_key
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Invalid API key'
            ], 401);
        }

        try {
            // Find user by roblox username
            $user = User::where('roblox_username', $request->roblox_username)->first();

            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'User not found with Roblox username: ' . $request->roblox_username
                ], 404);
            }

            // Update or create player stats
            $playerStats = PlayerStats::updateOrCreate(
                ['user_id' => $user->id],
                array_filter([
                    'wallet' => $request->wallet,
                    'bank' => $request->bank,
                    'kantong' => $request->kantong,
                    'playtime_minutes' => $request->playtime_minutes,
                    'level' => $request->level,
                    'experience' => $request->experience,
                    'updated_at' => now()
                ], function($value) {
                    return $value !== null;
                })
            );

            Log::info('Player stats updated', [
                'user_id' => $user->id,
                'roblox_username' => $request->roblox_username,
                'stats' => $playerStats->toArray()
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Player stats updated successfully',
                'data' => [
                    'user_id' => $user->id,
                    'roblox_username' => $user->roblox_username,
                    'stats' => $playerStats->toArray()
                ]
            ]);

        } catch (\Exception $e) {
            Log::error('Failed to update player stats', [
                'error' => $e->getMessage(),
                'roblox_username' => $request->roblox_username
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Internal server error'
            ], 500);
        }
    }

    /**
     * Batch update multiple players' statistics
     */
    public function batchUpdatePlayerStats(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'api_key' => 'required|string',
            'players' => 'required|array|min:1|max:100',
            'players.*.roblox_username' => 'required|string',
            'players.*.wallet' => 'nullable|integer|min:0',
            'players.*.bank' => 'nullable|integer|min:0',
            'players.*.kantong' => 'nullable|integer|min:0',
            'players.*.playtime_minutes' => 'nullable|integer|min:0',
            'players.*.level' => 'nullable|integer|min:1',
            'players.*.experience' => 'nullable|integer|min:0'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        // Verify API key
        $expectedApiKey = env('ROBLOX_GAME_API_KEY', 'your-secret-api-key-here');
        if ($request->api_key !== $expectedApiKey) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid API key'
            ], 401);
        }

        $results = [];
        $successCount = 0;
        $failureCount = 0;

        foreach ($request->players as $playerData) {
            try {
                $user = User::where('roblox_username', $playerData['roblox_username'])->first();

                if (!$user) {
                    $results[] = [
                        'roblox_username' => $playerData['roblox_username'],
                        'success' => false,
                        'message' => 'User not found'
                    ];
                    $failureCount++;
                    continue;
                }

                $statsData = array_filter([
                    'wallet' => $playerData['wallet'] ?? null,
                    'bank' => $playerData['bank'] ?? null,
                    'kantong' => $playerData['kantong'] ?? null,
                    'playtime_minutes' => $playerData['playtime_minutes'] ?? null,
                    'level' => $playerData['level'] ?? null,
                    'experience' => $playerData['experience'] ?? null,
                    'updated_at' => now()
                ], function($value) {
                    return $value !== null;
                });

                $playerStats = PlayerStats::updateOrCreate(
                    ['user_id' => $user->id],
                    $statsData
                );

                $results[] = [
                    'roblox_username' => $playerData['roblox_username'],
                    'success' => true,
                    'message' => 'Updated successfully'
                ];
                $successCount++;

            } catch (\Exception $e) {
                $results[] = [
                    'roblox_username' => $playerData['roblox_username'],
                    'success' => false,
                    'message' => 'Internal error'
                ];
                $failureCount++;
            }
        }

        return response()->json([
            'success' => true,
            'message' => "Batch update completed: {$successCount} successful, {$failureCount} failed",
            'summary' => [
                'total' => count($request->players),
                'successful' => $successCount,
                'failed' => $failureCount
            ],
            'results' => $results
        ]);
    }

    /**
     * Get player statistics by Roblox username
     */
    public function getPlayerStats(Request $request, $robloxUsername)
    {
        $validator = Validator::make(['api_key' => $request->api_key], [
            'api_key' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'API key is required'
            ], 422);
        }

        // Verify API key
        $expectedApiKey = env('ROBLOX_GAME_API_KEY', 'your-secret-api-key-here');
        if ($request->api_key !== $expectedApiKey) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid API key'
            ], 401);
        }

        $user = User::where('roblox_username', $robloxUsername)->first();

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User not found'
            ], 404);
        }

        $playerStats = PlayerStats::where('user_id', $user->id)->first();

        return response()->json([
            'success' => true,
            'data' => [
                'user_id' => $user->id,
                'roblox_username' => $user->roblox_username,
                'stats' => $playerStats ? $playerStats->toArray() : null,
                'registered_at' => $user->created_at->toISOString()
            ]
        ]);
    }
}
