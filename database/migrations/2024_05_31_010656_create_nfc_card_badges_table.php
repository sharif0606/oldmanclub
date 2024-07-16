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
        Schema::create('nfc_card_badges', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nfc_card_id')->constrained('nfc_cards');
            $table->string('badge_image');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nfc_card_badges');
    }
};
