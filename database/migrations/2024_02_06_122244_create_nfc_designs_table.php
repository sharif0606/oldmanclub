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
        Schema::create('nfc_designs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('nfc_card_id')->constrained('nfc_cards');
            $table->foreignId('design_card_id')->constrained('design_cards');
            $table->string('color')->nullable();
            $table->string('logo')->nullable();
            $table->string('badges')->nullable();
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nfc_designs');
    }
};
