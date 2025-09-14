<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('player_stats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('roblox_username');
            $table->bigInteger('roblox_id');

            // Game Stats
            $table->decimal('wallet', 20, 2)->default(0);
            $table->decimal('bank', 20, 2)->default(0);
            $table->integer('kantong')->default(0);
            $table->integer('playtime_minutes')->default(0); // Store in minutes

            // Additional Stats
            $table->integer('level')->default(1);
            $table->integer('experience')->default(0);
            $table->json('achievements')->nullable();
            $table->json('inventory')->nullable();

            // Timestamps
            $table->timestamp('last_played')->nullable();
            $table->timestamps();

            // Indexes
            $table->unique(['user_id', 'roblox_id']);
            $table->index('roblox_username');
            $table->index('wallet');
            $table->index('bank');
            $table->index('kantong');
            $table->index('playtime_minutes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('player_stats');
    }
};
