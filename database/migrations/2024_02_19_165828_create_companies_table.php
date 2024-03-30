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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('qrcode')->unique()->nullable();
            $table->string('company_name');
            $table->string('company_image');
            $table->string('company_logo');
            $table->string('contact_no')->unique();
            $table->string('email')->unique();
            $table->string('phone_number')->unique();
            $table->text('address');
            $table->string('city');
            $table->string('state');
            $table->string('zip_code');
            $table->text('description');
            $table->string('contact_person_name')->nullable();
            $table->string('contact_person_email')->nullable();
            $table->string('contact_person_phone')->nullable();
            $table->string('company_document');
            $table->unsignedBigInteger('client_id')->index();
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->tinyInteger('status')->default('1')->comment('1 => Pending, 2 => Accepted, 3 => Rejected');
            $table->timestamps();
            $table->softDeletes();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
