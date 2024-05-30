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
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id();
            $table->integer('cart_id')->constrained('carts');
            $table->foreignId('printing_service_id')->constrained('printing_services');
            $table->integer('quantity')->default(1);
            $table->decimal('price',10,2);
            $table->tinyInteger('dis_type')->nullable();
            $table->decimal('discount',10,2)->default(0.00);
            $table->string('sample_image',255)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_items');
    }
};
