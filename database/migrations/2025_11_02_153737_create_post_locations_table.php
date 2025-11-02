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
        Schema::create('post_locations', function (Blueprint $table) {
            $table->id();
            $table->integer('post_type')->default(1)->comment('1 check in , 2 destination');
            $table->unsignedBigInteger('post_id');
            $table->string('place_name',255)->nullable();
            $table->decimal('lat',10,8)->nullable();
            $table->decimal('lon',11,8)->nullable();
            $table->text('address')->nullable();
            $table->string('type',255)->nullable();
            $table->string('place_id',255)->nullable();
            $table->integer('place_rank')->nullable();
            $table->string('name',255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_locations');
    }
};
