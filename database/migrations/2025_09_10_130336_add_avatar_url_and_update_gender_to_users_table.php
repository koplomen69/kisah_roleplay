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
            // Add avatar_url column
            $table->string('avatar_url', 500)->nullable()->after('email');

            // Update gender enum to include more options
            $table->dropColumn('gender');
        });

        // Re-add gender column with updated options
        Schema::table('users', function (Blueprint $table) {
            $table->enum('gender', ['male', 'female', 'other', 'prefer_not_to_say'])->nullable()->after('avatar_url');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Remove avatar_url column
            $table->dropColumn('avatar_url');

            // Revert gender enum back to original
            $table->dropColumn('gender');
        });

        // Re-add original gender column
        Schema::table('users', function (Blueprint $table) {
            $table->enum('gender', ['male', 'female'])->after('email');
        });
    }
};
