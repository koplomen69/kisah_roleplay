<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PlayerStats extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'roblox_username',
        'roblox_id',
        'wallet',
        'bank',
        'kantong',
        'playtime_minutes',
        'level',
        'experience',
        'achievements',
        'inventory',
        'last_played'
    ];

    protected $casts = [
        'wallet' => 'decimal:2',
        'bank' => 'decimal:2',
        'achievements' => 'array',
        'inventory' => 'array',
        'last_played' => 'datetime'
    ];

    /**
     * Get the user that owns the player stats.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get formatted playtime as hours and minutes
     */
    public function getFormattedPlaytimeAttribute(): string
    {
        $hours = floor($this->playtime_minutes / 60);
        $minutes = $this->playtime_minutes % 60;
        return "{$hours}h {$minutes}j";
    }

    /**
     * Get leaderboard for wallet
     */
    public static function getWalletLeaderboard($limit = 10)
    {
        return self::with('user')
            ->whereNotNull('wallet')
            ->where('wallet', '>', 0)
            ->orderBy('wallet', 'desc')
            ->limit($limit)
            ->get()
            ->map(function ($stats, $index) {
                return [
                    'rank' => $index + 1,
                    'player' => $stats->roblox_username ?? $stats->user->name,
                    'value' => number_format((float)$stats->wallet, 2),
                    'user_id' => $stats->user_id
                ];
            });
    }

    /**
     * Get leaderboard for bank
     */
    public static function getBankLeaderboard($limit = 10)
    {
        return self::with('user')
            ->whereNotNull('bank')
            ->where('bank', '>', 0)
            ->orderBy('bank', 'desc')
            ->limit($limit)
            ->get()
            ->map(function ($stats, $index) {
                return [
                    'rank' => $index + 1,
                    'player' => $stats->roblox_username ?? $stats->user->name,
                    'value' => number_format((float)$stats->bank, 2),
                    'user_id' => $stats->user_id
                ];
            });
    }

    /**
     * Get leaderboard for kantong
     */
    public static function getKantongLeaderboard($limit = 10)
    {
        return self::with('user')
            ->whereNotNull('kantong')
            ->where('kantong', '>', 0)
            ->orderBy('kantong', 'desc')
            ->limit($limit)
            ->get()
            ->map(function ($stats, $index) {
                return [
                    'rank' => $index + 1,
                    'player' => $stats->roblox_username ?? $stats->user->name,
                    'value' => number_format((float)$stats->kantong, 0),
                    'user_id' => $stats->user_id
                ];
            });
    }

    /**
     * Get leaderboard for playtime
     */
    public static function getPlaytimeLeaderboard($limit = 10)
    {
        return self::with('user')
            ->whereNotNull('playtime_minutes')
            ->where('playtime_minutes', '>', 0)
            ->orderBy('playtime_minutes', 'desc')
            ->limit($limit)
            ->get()
            ->map(function ($stats, $index) {
                return [
                    'rank' => $index + 1,
                    'player' => $stats->roblox_username ?? $stats->user->name,
                    'value' => $stats->formatted_playtime,
                    'user_id' => $stats->user_id
                ];
            });
    }

    /**
     * Get user's rank in a specific leaderboard
     */
    public static function getUserRank($userId, $field)
    {
        $userStats = self::where('user_id', $userId)->first();
        if (!$userStats || $userStats->$field === null || $userStats->$field <= 0) {
            return null;
        }

        $rank = self::where($field, '>', $userStats->$field)->count() + 1;

        // Format the value based on field type
        if ($field === 'playtime_minutes') {
            $value = $userStats->formatted_playtime;
        } else {
            $decimals = ($field === 'kantong') ? 0 : 2;
            $value = number_format((float)$userStats->$field, $decimals);
        }

        return [
            'rank' => $rank,
            'player' => $userStats->roblox_username ?? $userStats->user->name,
            'value' => $value,
            'user_id' => $userStats->user_id
        ];
    }
}
