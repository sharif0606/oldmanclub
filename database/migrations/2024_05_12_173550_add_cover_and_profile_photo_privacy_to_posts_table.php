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
        Schema::table('posts', function (Blueprint $table) {
            $table->boolean('is_cover_photo')->default(false)->after('client_id');
            $table->boolean('is_profile_photo')->default(false)->after('is_cover_photo');
            $table->enum('privacy_mode', ['public', 'private', 'only_me'])->default('public')->after('is_profile_photo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('is_cover_photo');
            $table->dropColumn('is_profile_photo');
            $table->dropColumn('privacy_mode');
        });
    }
};
