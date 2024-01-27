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
        Schema::create('shipping_trackings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('shipping_id')->index();
            $table->foreign('shipping_id')->references('id')->on('shippings')->onDelete('cascade');
            $table->string('tracking_status')->default('1')->comment('1=>order,2=>delivered, 3=>received');
            $table->string('location');
            $table->string('tracking_note');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipping_trackings');
    }
};
