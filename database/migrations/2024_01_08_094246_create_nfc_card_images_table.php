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
        Schema::create('nfc_card_images', function (Blueprint $table) {
            $table->id();
            $table->string('header_text_large');
            $table->text('header_text_small');
            $table->string('header_image');
            $table->string('video_link');
            $table->string('feature_list');
            $table->string('feature_image');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nfc_card_images');
    }
};
