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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('tracking_no',255);
            $table->integer('client_id')->constrained('clients');
            $table->foreignId('shipping_address_id')->constrained('shipping_addresses');
            $table->foreignId('cart_id')->constrained('carts');
            $table->tinyInteger('order_status')->default('1')->comment('1 => Processing,2 => Printing,3 => Complete,4 => Delivered,5=>Cancel');
            $table->double('tax',8,2)->nullable()->default(0.00);
            $table->double('total',8,2)->nullable()->default(0.00);
            $table->double('discount',8,2)->nullable()->default(0.00);
            $table->double('payable',8,2)->nullable()->comment('Total-discount=total+deliveryfee')->default(0.00);
            $table->text('additional_note')->nullable();
            $table->text('order_cancel_note')->nullable();
            $table->boolean('is_paid')->default(0);
            $table->boolean('is_delivered')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
