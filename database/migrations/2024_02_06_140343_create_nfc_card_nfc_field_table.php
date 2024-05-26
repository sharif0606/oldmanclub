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
        Schema::create('nfc_card_nfc_field', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nfc_field_id');
            $table->unsignedBigInteger('nfc_card_id');
            $table->string('field_value')->nullable();
            $table->string('display_text')->nullable();
            $table->tinyInteger('type')->default(1)->comment('1 => work, 2=> personal');
            // Add additional fields if needed
            $table->timestamps();

            // Define foreign keys
            $table->foreign('nfc_field_id')->references('id')->on('nfc_fields')->onDelete('cascade');
            $table->foreign('nfc_card_id')->references('id')->on('nfc_cards')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nfc_card_nfc_field');
    }
};
