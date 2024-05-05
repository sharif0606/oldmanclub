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
            $table->string('display_name')->nullable()->after('username');
            $table->tinyInteger('verification_request_status')->comment('1 => Request Pending, 2=> Code generated, 0=> Not Requested Yet')->default(0)->after('address_proof_type');
            $table->string('code')->comment('Code for address verification')->nullable()->after('verification_request_status');
            $table->string('phone_code')->nullable()->after('dob');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->dropColumn('display_name');
            $table->dropColumn('verification_request_status');
            $table->dropColumn('code');
            $table->dropColumn('phone_code');
        });
    }
};
