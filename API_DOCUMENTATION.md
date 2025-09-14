# Roblox Game API Documentation

This document explains how to integrate your Roblox game with the website's leaderboard system.

## API Endpoints

### Base URL
- Development: `http://localhost:8000/api/game`
- Production: `https://yourdomain.com/api/game`

### Authentication
All API requests require an API key in the request body:
```json
{
    "api_key": "your-secure-api-key-here-12345"
}
```

## Endpoints

### 1. Update Single Player Stats
**POST** `/player/update`

Updates statistics for a single player.

**Request Body:**
```json
{
    "api_key": "your-secure-api-key-here-12345",
    "roblox_username": "PlayerUsername",
    "wallet": 1500,
    "bank": 25000,
    "kantong": 750,
    "playtime_minutes": 180,
    "level": 15,
    "experience": 2500
}
```

**Response:**
```json
{
    "success": true,
    "message": "Player stats updated successfully",
    "data": {
        "user_id": 123,
        "roblox_username": "PlayerUsername",
        "stats": {
            "id": 456,
            "user_id": 123,
            "wallet": 1500,
            "bank": 25000,
            "kantong": 750,
            "playtime_minutes": 180,
            "level": 15,
            "experience": 2500,
            "created_at": "2024-01-15T10:30:00.000000Z",
            "updated_at": "2024-01-15T10:35:00.000000Z"
        }
    }
}
```

### 2. Batch Update Multiple Players
**POST** `/players/batch-update`

Updates statistics for multiple players in a single request (max 100 players).

**Request Body:**
```json
{
    "api_key": "your-secure-api-key-here-12345",
    "players": [
        {
            "roblox_username": "Player1",
            "wallet": 1500,
            "bank": 25000,
            "playtime_minutes": 180
        },
        {
            "roblox_username": "Player2",
            "wallet": 2000,
            "bank": 30000,
            "level": 20
        }
    ]
}
```

**Response:**
```json
{
    "success": true,
    "message": "Batch update completed: 2 successful, 0 failed",
    "summary": {
        "total": 2,
        "successful": 2,
        "failed": 0
    },
    "results": [
        {
            "roblox_username": "Player1",
            "success": true,
            "message": "Updated successfully"
        },
        {
            "roblox_username": "Player2",
            "success": true,
            "message": "Updated successfully"
        }
    ]
}
```

### 3. Get Player Stats
**GET** `/player/{robloxUsername}?api_key=your-api-key`

Retrieves current statistics for a player.

**Response:**
```json
{
    "success": true,
    "data": {
        "user_id": 123,
        "roblox_username": "PlayerUsername",
        "stats": {
            "id": 456,
            "user_id": 123,
            "wallet": 1500,
            "bank": 25000,
            "kantong": 750,
            "playtime_minutes": 180,
            "level": 15,
            "experience": 2500,
            "created_at": "2024-01-15T10:30:00.000000Z",
            "updated_at": "2024-01-15T10:35:00.000000Z"
        },
        "registered_at": "2024-01-10T08:20:00.000000Z"
    }
}
```

## Field Descriptions

| Field | Type | Description |
|-------|------|-------------|
| `roblox_username` | string | The player's Roblox username (required) |
| `wallet` | integer | Amount of money in player's wallet |
| `bank` | integer | Amount of money in player's bank account |
| `kantong` | integer | Amount of money in player's kantong |
| `playtime_minutes` | integer | Total playtime in minutes |
| `level` | integer | Player's current level (minimum 1) |
| `experience` | integer | Player's current experience points |

**Note:** All fields except `roblox_username` and `api_key` are optional. Only provided fields will be updated.

## Error Responses

### 401 Unauthorized
```json
{
    "success": false,
    "message": "Invalid API key"
}
```

### 404 Not Found
```json
{
    "success": false,
    "message": "User not found with Roblox username: PlayerUsername"
}
```

### 422 Validation Error
```json
{
    "success": false,
    "message": "Validation failed",
    "errors": {
        "roblox_username": ["The roblox username field is required."],
        "wallet": ["The wallet must be at least 0."]
    }
}
```

### 500 Internal Server Error
```json
{
    "success": false,
    "message": "Internal server error"
}
```

## Integration Examples

### Roblox Script Example
See `roblox-scripts/PlayerStatsUpdater.lua` for a complete Roblox server script that:
- Tracks player statistics in real-time
- Automatically syncs with the website every 30 seconds
- Handles player join/leave events
- Provides example commands for testing

### HTTP Request Examples

#### cURL Example
```bash
# Update single player
curl -X POST http://localhost:8000/api/game/player/update \
  -H "Content-Type: application/json" \
  -d '{
    "api_key": "your-secure-api-key-here-12345",
    "roblox_username": "TestPlayer",
    "wallet": 1500,
    "bank": 25000,
    "level": 10
  }'

# Get player stats
curl "http://localhost:8000/api/game/player/TestPlayer?api_key=your-secure-api-key-here-12345"
```

## Security Notes

1. **Keep your API key secret** - Never share it publicly or commit it to version control
2. **Use HTTPS in production** - The API supports CORS but should be used over HTTPS
3. **Rate limiting** - Consider implementing rate limiting in production
4. **Validate requests** - The API validates all incoming data

## Setup Instructions

1. Update your `.env` file with a secure API key:
   ```
   ROBLOX_GAME_API_KEY=your-secure-api-key-here-12345
   ```

2. Enable HTTP requests in your Roblox game:
   - Go to Game Settings > Security
   - Enable "Allow HTTP Requests"

3. Configure the Roblox script:
   - Update `WEBSITE_URL` to your domain
   - Update `API_KEY` to match your `.env` file
   - Customize the `getPlayerStats()` function for your game

4. Place the script in ServerScriptService and it will start syncing automatically!

## Leaderboard System

The website automatically generates leaderboards based on the stats you send:
- **Wallet Leaderboard** - Top players by wallet amount
- **Bank Leaderboard** - Top players by bank amount  
- **Kantong Leaderboard** - Top players by kantong amount
- **Playtime Leaderboard** - Top players by playtime

Players can view their rank and stats on the `/profile` page.
