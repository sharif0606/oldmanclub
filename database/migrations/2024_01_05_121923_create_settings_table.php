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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('header_logo');
            $table->string('company_name');
            $table->string('contact_no_en')->unique();
            $table->string('contact_no_bn')->nullable();
            $table->string('email');
            $table->string('facebook_icon')->nullable();
            $table->string('twitter_icon')->nullable();
            $table->string('linkedln_icon')->nullable();
            $table->string('instagram_icon')->nullable();
            $table->string('footer_text');
            $table->string('footer_logo');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
