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
        Schema::create('printing_services', function (Blueprint $table) {
            $table->id();
            $table->string('service_name',255)->nullable();
            $table->text('service_details')->nullable();
            $table->integer('qty')->default(1);
            $table->decimal('price',10,2)->default(0.00)->comment('Per Qty Price');
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
        Schema::dropIfExists('printing_services');
    }
};
