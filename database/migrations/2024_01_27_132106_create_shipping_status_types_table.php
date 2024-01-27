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
        Schema::create('shipping_status_types', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('shipping_id')->index();
            $table->foreign('shipping_id')->references('id')->on('shippings')->onDelete('cascade');
            $table->string('shipping_address')->nullable();
            $table->string('delivery_address')->nullable();
            $table->string('shipping_method')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipping_status_types');
    }
};
