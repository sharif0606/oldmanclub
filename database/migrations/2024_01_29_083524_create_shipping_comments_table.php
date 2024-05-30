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
            $table->foreignId('shipping_id')->constrained('shippings');
            $table->foreignId('client_id')->constrained('clients');
            $table->text('body');
            $table->foreignId('parent_id')->constrained('shipping_comments'); // Nullable for top-level comments
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
