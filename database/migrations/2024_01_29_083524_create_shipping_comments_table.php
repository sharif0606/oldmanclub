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
        Schema::create('shipping_comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('shipping_id')->index();
            $table->foreign('shipping_id')->references('id')->on('shippings')->onDelete('cascade');
            $table->text('client_message')->nullable();
            $table->text('user_message')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });;
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipping_comments');
    }
};
