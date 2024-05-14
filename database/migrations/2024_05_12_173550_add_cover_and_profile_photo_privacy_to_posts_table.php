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
            $table->enum('post_type', ['cover_photo', 'profile_photo', 'shared_post'])->nullable()->after('client_id');
            $table->enum('privacy_mode', ['public', 'admin_block', 'only_me'])->nullable()->default('public')->after('post_type');
            $table->unsignedBigInteger('shared_from')->after('privacy_mode')->nullable();
            $table->tinyInteger('is_report')->after('shared_from')->nullable()->default(0);
            $table->unsignedBigInteger('report_by')->after('is_report')->nullable();

            // Define foreign key constraints
            $table->foreign('shared_from')->references('id')->on('clients')->onDelete('cascade');
            $table->foreign('report_by')->references('id')->on('clients')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            // Drop foreign key constraint first
            $table->dropForeign(['shared_from']);
            $table->dropForeign(['report_by']);

            // Then drop the column
            $table->dropColumn('post_type');
            $table->dropColumn('privacy_mode');
            $table->dropColumn('shared_from');
            $table->dropColumn('is_report');
            $table->dropColumn('report_by');
        });
    }
};
