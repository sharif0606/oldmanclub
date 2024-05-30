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
        Schema::create('sms_packages', function (Blueprint $table) {
            $table->id();
            $table->integer('package_type')->comment('1=>Regular,2=>validity');
            $table->string('title');
            $table->string('number_of_sms');
            $table->integer('validity_days')->nullable()->default(null); // Set the column nullable with a default value of null
            $table->double('per_sms_charge', 3, 2);
            $table->string('image')->nullable();
            $table->double('price', 8, 2);
            $table->double('discount_percentage', 5, 2)->nullable();
            $table->double('discount_price');
            $table->integer('status')->default(1)->comment('1=>active 0=>inactive');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sms_packages');
    }
};
