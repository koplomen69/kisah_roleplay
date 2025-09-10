<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\GameApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Game API Routes for Roblox Integration
Route::prefix('game')->group(function () {
    // Update single player stats
    Route::post('/player/update', [GameApiController::class, 'updatePlayerStats']);

    // Batch update multiple players' stats
    Route::post('/players/batch-update', [GameApiController::class, 'batchUpdatePlayerStats']);

    // Get player stats by Roblox username
    Route::get('/player/{robloxUsername}', [GameApiController::class, 'getPlayerStats']);
});
