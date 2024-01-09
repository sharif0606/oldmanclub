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
        Schema::create('nfc_card_prices', function (Blueprint $table) {
            $table->id();
            $table->string('nfc_card_name');
            $table->string('card_price');
            $table->string('card_title');
            $table->string('payment_type');
            $table->string('card_feature_list');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nfc_card_prices');
    }
};
