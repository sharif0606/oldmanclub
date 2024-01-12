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
        Schema::create('llc_pricings', function (Blueprint $table) {
            $table->id();
            $table->string('llcpricing_plan')->nullable();
            $table->string('llcprice')->nullable();
            $table->string('llcpricing_package')->nullable();
            $table->string('llcpricingfeature_list')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('llc_pricings');
    }
};
