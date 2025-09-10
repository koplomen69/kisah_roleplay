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
        Schema::table('users', function (Blueprint $table) {
            $table->bigInteger('roblox_id')->nullable()->unique()->after('id');
            $table->string('roblox_username')->nullable()->after('name');
            $table->string('roblox_display_name')->nullable()->after('roblox_username');
            $table->text('roblox_description')->nullable()->after('roblox_display_name');
            $table->string('roblox_avatar_url')->nullable()->after('roblox_description');
            $table->timestamp('roblox_created')->nullable()->after('roblox_avatar_url');
            $table->boolean('roblox_verified_badge')->default(false)->after('roblox_created');
            $table->timestamp('roblox_data_updated')->nullable()->after('roblox_verified_badge');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'roblox_id',
                'roblox_username',
                'roblox_display_name',
                'roblox_description',
                'roblox_avatar_url',
                'roblox_created',
                'roblox_verified_badge',
                'roblox_data_updated'
            ]);
        });
    }
};
