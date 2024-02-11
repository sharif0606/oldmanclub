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
        Schema::create('design_cards', function (Blueprint $table) {
            $table->id();
            $table->string('design_name')->nullable();
            $table->text('svg')->nullable();
            $table->tinyInteger('template_id')->default(1)->comment('1=>Classic, 2=> Modern, 3=>Flat, 4=>Sleek');
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
        Schema::dropIfExists('design_cards');
    }
};
