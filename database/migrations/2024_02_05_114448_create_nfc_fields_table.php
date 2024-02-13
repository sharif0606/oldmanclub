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
        Schema::create('nfc_fields', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('icon', 100)->nullable();
            $table->tinyInteger('category')->default(1)->comment('1 => Most Popular, 2 => Social, 3 => Communication, 4 => Payment, 5 => Video, 6=> Music, 7=> Design, 8=> Gaming, 9=> Other');
            $table->tinyInteger('status')->default(1)->comment('1=> Show, 2=> Hide');
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
        Schema::dropIfExists('nfc_fields');
    }
};
