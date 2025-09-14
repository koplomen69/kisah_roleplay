<?php

// Quick test of Roblox API
use App\Services\RobloxService;
use Illuminate\Support\Facades\Http;

echo "Testing Roblox API...\n";

// Test the actual API endpoints
$username = 'koplomen';

echo "Testing username: $username\n";

// Test the username API first
try {
    $response = Http::timeout(10)->post('https://users.roblox.com/v1/usernames/users', [
        'usernames' => [$username],
        'excludeBannedUsers' => true
    ]);

    echo "Username API Status: " . $response->status() . "\n";
    echo "Username API Response: " . $response->body() . "\n";

    if ($response->successful() && !empty($response->json('data'))) {
        $userData = $response->json('data')[0] ?? null;
        if ($userData) {
            echo "User ID found: " . $userData['id'] . "\n";

            // Test avatar API
            $avatarResponse = Http::timeout(10)->get("https://thumbnails.roblox.com/v1/users/avatar-headshot", [
                'userIds' => $userData['id'],
                'size' => '420x420',
                'format' => 'Png',
                'isCircular' => false
            ]);

            echo "Avatar API Status: " . $avatarResponse->status() . "\n";
            echo "Avatar API Response: " . $avatarResponse->body() . "\n";
        }
    }

} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
