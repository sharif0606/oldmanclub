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
        Schema::create('post_backgrounds', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('post_background_categories');
            $table->string('name')->nullable();
            $table->string('image')->nullable();
            $table->integer('order')->default(1);
            $table->integer('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_backgrounds');
    }
};
