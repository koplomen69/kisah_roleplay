-- Roblox Server Script: PlayerStatsUpdater.lua
-- Place this in ServerScriptService

local HttpService = game:GetService("HttpService")
local Players = game:GetService("Players")
local RunService = game:GetService("RunService")

-- Configuration
local WEBSITE_URL = "http://localhost:8000" -- Change this to your website URL
local API_KEY = "your-secure-api-key-here-12345" -- Change this to match your .env file
local UPDATE_INTERVAL = 30 -- Update stats every 30 seconds

-- Player data storage
local PlayerData = {}

-- Helper function to get player's Roblox username
local function getRobloxUsername(player)
    return player.Name
end

-- Helper function to get player stats (customize this based on your game)
local function getPlayerStats(player)
    local data = PlayerData[player.UserId] or {}

    return {
        wallet = data.Wallet or 0,
        bank = data.Bank or 0,
        kantong = data.Kantong or 0,
        playtime_minutes = data.PlaytimeMinutes or 0,
        level = data.Level or 1,
        experience = data.Experience or 0
    }
end

-- Function to update stats on website
local function updatePlayerStatsOnWebsite(player)
    local success, result = pcall(function()
        local stats = getPlayerStats(player)
        local robloxUsername = getRobloxUsername(player)

        local requestData = {
            api_key = API_KEY,
            roblox_username = robloxUsername,
            wallet = stats.wallet,
            bank = stats.bank,
            kantong = stats.kantong,
            playtime_minutes = stats.playtime_minutes,
            level = stats.level,
            experience = stats.experience
        }

        local jsonData = HttpService:JSONEncode(requestData)

        local response = HttpService:PostAsync(
            WEBSITE_URL .. "/api/game/player/update",
            jsonData,
            Enum.HttpContentType.ApplicationJson,
            false
        )

        local responseData = HttpService:JSONDecode(response)

        if responseData.success then
            print("Successfully updated stats for " .. robloxUsername)
        else
            print("Failed to update stats for " .. robloxUsername .. ": " .. (responseData.message or "Unknown error"))
        end

        return responseData
    end)

    if not success then
        print("Error updating player stats: " .. tostring(result))
    end
end

-- Function to batch update all online players
local function batchUpdateAllPlayers()
    local success, result = pcall(function()
        local playersData = {}

        for _, player in pairs(Players:GetPlayers()) do
            local stats = getPlayerStats(player)
            local robloxUsername = getRobloxUsername(player)

            table.insert(playersData, {
                roblox_username = robloxUsername,
                wallet = stats.wallet,
                bank = stats.bank,
                kantong = stats.kantong,
                playtime_minutes = stats.playtime_minutes,
                level = stats.level,
                experience = stats.experience
            })
        end

        if #playersData == 0 then
            return
        end

        local requestData = {
            api_key = API_KEY,
            players = playersData
        }

        local jsonData = HttpService:JSONEncode(requestData)

        local response = HttpService:PostAsync(
            WEBSITE_URL .. "/api/game/players/batch-update",
            jsonData,
            Enum.HttpContentType.ApplicationJson,
            false
        )

        local responseData = HttpService:JSONDecode(response)

        if responseData.success then
            print("Batch update completed: " .. responseData.message)
        else
            print("Batch update failed: " .. (responseData.message or "Unknown error"))
        end

        return responseData
    end)

    if not success then
        print("Error in batch update: " .. tostring(result))
    end
end

-- Initialize player data when they join
local function onPlayerAdded(player)
    PlayerData[player.UserId] = {
        Wallet = 0,
        Bank = 0,
        Kantong = 0,
        PlaytimeMinutes = 0,
        Level = 1,
        Experience = 0,
        JoinTime = tick()
    }

    -- You can load player data from DataStore here
    print("Player " .. player.Name .. " joined the game")
end

-- Clean up when player leaves
local function onPlayerRemoving(player)
    -- Final stats update when player leaves
    updatePlayerStatsOnWebsite(player)

    -- Clean up data
    PlayerData[player.UserId] = nil

    print("Player " .. player.Name .. " left the game")
end

-- Example functions to modify player stats (customize these for your game)
local function addMoney(player, amount)
    if PlayerData[player.UserId] then
        PlayerData[player.UserId].Wallet = (PlayerData[player.UserId].Wallet or 0) + amount
    end
end

local function addBankMoney(player, amount)
    if PlayerData[player.UserId] then
        PlayerData[player.UserId].Bank = (PlayerData[player.UserId].Bank or 0) + amount
    end
end

local function addExperience(player, amount)
    if PlayerData[player.UserId] then
        local data = PlayerData[player.UserId]
        data.Experience = (data.Experience or 0) + amount

        -- Level up logic (customize as needed)
        local requiredExp = data.Level * 100
        if data.Experience >= requiredExp then
            data.Level = data.Level + 1
            data.Experience = data.Experience - requiredExp
            print(player.Name .. " leveled up to level " .. data.Level .. "!")
        end
    end
end

-- Update playtime for all players
local function updatePlaytime()
    local currentTime = tick()
    for userId, data in pairs(PlayerData) do
        if data.JoinTime then
            data.PlaytimeMinutes = math.floor((currentTime - data.JoinTime) / 60)
        end
    end
end

-- Connect events
Players.PlayerAdded:Connect(onPlayerAdded)
Players.PlayerRemoving:Connect(onPlayerRemoving)

-- Initialize for players already in game
for _, player in pairs(Players:GetPlayers()) do
    onPlayerAdded(player)
end

-- Regular updates
local lastUpdate = 0
RunService.Heartbeat:Connect(function()
    local currentTime = tick()

    -- Update playtime every second
    updatePlaytime()

    -- Send stats to website every UPDATE_INTERVAL seconds
    if currentTime - lastUpdate >= UPDATE_INTERVAL then
        lastUpdate = currentTime
        batchUpdateAllPlayers()
    end
end)

-- Example commands (you can integrate these with your game's command system)
game.Players.PlayerAdded:Connect(function(player)
    player.Chatted:Connect(function(message)
        local args = string.split(message, " ")
        local command = args[1]:lower()

        if command == "/addmoney" and #args >= 2 then
            local amount = tonumber(args[2])
            if amount then
                addMoney(player, amount)
                print("Added $" .. amount .. " to " .. player.Name .. "'s wallet")
            end
        elseif command == "/addbank" and #args >= 2 then
            local amount = tonumber(args[2])
            if amount then
                addBankMoney(player, amount)
                print("Added $" .. amount .. " to " .. player.Name .. "'s bank")
            end
        elseif command == "/addexp" and #args >= 2 then
            local amount = tonumber(args[2])
            if amount then
                addExperience(player, amount)
                print("Added " .. amount .. " experience to " .. player.Name)
            end
        elseif command == "/mystats" then
            local stats = getPlayerStats(player)
            print(player.Name .. "'s Stats:")
            print("Wallet: $" .. stats.wallet)
            print("Bank: $" .. stats.bank)
            print("Kantong: $" .. stats.kantong)
            print("Level: " .. stats.level)
            print("Experience: " .. stats.experience)
            print("Playtime: " .. stats.playtime_minutes .. " minutes")
        end
    end)
end)

print("PlayerStatsUpdater script loaded successfully!")
print("Players' stats will be synchronized with the website every " .. UPDATE_INTERVAL .. " seconds")
