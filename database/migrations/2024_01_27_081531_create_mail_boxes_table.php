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
        Schema::create('mail_boxes', function (Blueprint $table) {
            $table->id();
            $table->string('number_of_mail')->nullable();
            $table->string('validity')->nullable();
            $table->DECIMAL('price',8,2)->nullable();
            $table->string('package_type')->default(1)->comment('1=>one time, 2=>monthly');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mail_boxes');
    }
};
