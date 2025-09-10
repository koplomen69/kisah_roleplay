<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class RobloxService
{
    private const ROBLOX_API_BASE = 'https://users.roblox.com/v1/users';
    private const ROBLOX_USERNAME_API = 'https://users.roblox.com/v1/usernames/users';

    /**
     * Get Roblox user data by username
     *
     * @param string $username
     * @return array|null
     */
    public function getUserByUsername(string $username): ?array
    {
        try {
            // Cache the result for 5 minutes to avoid excessive API calls
            $cacheKey = "roblox_user_" . strtolower($username);

            return Cache::remember($cacheKey, 300, function () use ($username) {
                // First, get user ID from username
                $response = Http::timeout(10)->post(self::ROBLOX_USERNAME_API, [
                    'usernames' => [$username],
                    'excludeBannedUsers' => true
                ]);

                if (!$response->successful() || empty($response->json('data'))) {
                    return null;
                }

                $userData = $response->json('data')[0] ?? null;
                if (!$userData) {
                    return null;
                }

                // Get additional user details
                $userDetailsResponse = Http::timeout(10)->get(self::ROBLOX_API_BASE . '/' . $userData['id']);
                $userDetails = $userDetailsResponse->successful() ? $userDetailsResponse->json() : [];

                return [
                    'id' => $userData['id'],
                    'username' => $userData['name'],
                    'display_name' => $userData['displayName'] ?? $userData['name'],
                    'description' => $userDetails['description'] ?? '',
                    'created' => $userDetails['created'] ?? null,
                    'is_banned' => $userDetails['isBanned'] ?? false,
                    'external_app_display_name' => $userDetails['externalAppDisplayName'] ?? null,
                    'has_verified_badge' => $userDetails['hasVerifiedBadge'] ?? false,
                ];
            });
        } catch (\Exception $e) {
            Log::error('Roblox API Error: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Validate if a username exists on Roblox
     *
     * @param string $username
     * @return bool
     */
    public function validateUsername(string $username): bool
    {
        $userData = $this->getUserByUsername($username);
        return $userData !== null && !($userData['is_banned'] ?? false);
    }

    /**
     * Get Roblox user avatar thumbnail URL
     *
     * @param int $userId
     * @param string $size (30x30, 48x48, 60x60, 75x75, 100x100, 110x110, 140x140, 150x150, 180x180, 352x352, 420x420)
     * @return string|null
     */
    public function getUserAvatar(int $userId, string $size = '150x150'): ?string
    {
        try {
            $response = Http::timeout(10)->get("https://thumbnails.roblox.com/v1/users/avatar-headshot", [
                'userIds' => $userId,
                'size' => $size,
                'format' => 'Png',
                'isCircular' => false
            ]);

            if ($response->successful()) {
                $data = $response->json();
                if (!empty($data['data'][0]['imageUrl'])) {
                    return $data['data'][0]['imageUrl'];
                }
            }
        } catch (\Exception $e) {
            Log::error('Roblox Avatar API Error: ' . $e->getMessage());
        }

        return null;
    }

    /**
     * Check if user exists and return verification status
     *
     * @param string $username
     * @return array
     */
    public function verifyUser(string $username): array
    {
        $userData = $this->getUserByUsername($username);

        if (!$userData) {
            return [
                'exists' => false,
                'error' => 'Username not found on Roblox'
            ];
        }

        if ($userData['is_banned']) {
            return [
                'exists' => false,
                'error' => 'This Roblox account is banned'
            ];
        }

        return [
            'exists' => true,
            'data' => $userData
        ];
    }
}
