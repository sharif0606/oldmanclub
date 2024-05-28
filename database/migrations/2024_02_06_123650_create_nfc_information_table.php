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
        Schema::create('nfc_information', function (Blueprint $table) {
            $table->id();
            /*=== Personal=== */
            $table->foreignId('nfc_card_id')->constrained('nfc_cards');
            $table->string('prefix', 50)->nullable();
            $table->string('suffix', 50)->nullable();
            $table->string('accreditations', 50)->nullable();
            $table->string('preferred_name', 100)->nullable();
            $table->string('maiden_name', 100)->nullable();
            $table->string('pronoun', 100)->nullable();
            /*=== Affiliation=== */
            $table->text('title')->nullable();
            $table->string('department', 100)->nullable();
            $table->string('company', 100)->nullable();
            $table->text('headline')->nullable();
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
        Schema::dropIfExists('nfc_information');
    }
};
