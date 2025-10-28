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
        Schema::table('clients', function (Blueprint $table) {
            $table->string('pronounce_name')->nullable()->after('last_name');
            $table->string('website')->nullable()->after('pronounce_name');
            $table->string('member_of_group')->nullable()->after('website');
            $table->string('cell_number')->nullable()->after('member_of_group');
            $table->integer('cell_number_verified')->default(0)->comment('0=>No, 1=>Yes')->nullable()->after('cell_number');
            $table->integer('email_verified')->default(0)->comment('0=>No, 1=>Yes')->nullable()->after('email');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->dropColumn('pronounce_name');
            $table->dropColumn('website');
            $table->dropColumn('member_of_group');
            $table->dropColumn('cell_number');
            $table->dropColumn('cell_number_verified');
            $table->dropColumn('email_verified');
        });
    }
};
