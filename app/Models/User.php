<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar_url',
        'gender',
        'roblox_id',
        'roblox_username',
        'roblox_display_name',
        'roblox_description',
        'roblox_avatar_url',
        'roblox_created',
        'roblox_verified_badge',
        'roblox_data_updated',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'roblox_created' => 'datetime',
            'roblox_data_updated' => 'datetime',
            'roblox_verified_badge' => 'boolean',
        ];
    }

    /**
     * Get the user's Roblox avatar URL or a default if not available
     */
    public function getRobloxAvatarAttribute(): ?string
    {
        return $this->roblox_avatar_url;
    }

    /**
     * Get the display name for the user (Roblox display name or username)
     */
    public function getDisplayNameAttribute(): string
    {
        return $this->roblox_display_name ?? $this->roblox_username ?? $this->name;
    }

    /**
     * Get the player stats for this user
     */
    public function playerStats()
    {
        return $this->hasOne(PlayerStats::class);
    }
}
