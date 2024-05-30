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
        Schema::create('reply_reactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reply_id')->constrained('replies');
            $table->foreignId('client_id')->constrained('clients');
            $table->enum('type', ['like', 'love', 'care', 'haha', 'wow', 'sad', 'angry', 'dislike']);
            $table->timestamps();
            $table->softDeletes(); // Add soft delete column
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reply_reactions');
    }
};
