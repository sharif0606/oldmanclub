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
        Schema::create('llc_cardsections', function (Blueprint $table) {
            $table->id();
            $table->string('text_large')->nullable();
            $table->string('text_small')->nullable();
            $table->string('image')->nullable();
            $table->string('contact_text_large')->nullable();
            $table->string('contact_text_small')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('llc_cardsections');
    }
};
