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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained('clients');
            $table->foreignId('order_id')->constrained('orders');
            $table->double('total',8,2)->nullable()->default(0.00);
            $table->double('discount',8,2)->nullable()->default(0.00);
            $table->double('payable',8,2)->nullable()->comment('Total-discount=total+deliveryfee')->default(0.00);
            $table->text('description')->nullable();
            $table->string('payment_method')->comment('1=>Cash On Delivery')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
