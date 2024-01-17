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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('first_name_en');
            $table->string('first_name_bn')->nullable();
            $table->string('middle_name_en')->nullable();
            $table->string('middle_name_bn')->nullable();
            $table->string('last_name_en');
            $table->string('last_name_bn')->nullable();
            $table->date('date_of_birth');
            $table->string('contact_en');
            $table->string('contact_bn')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('password');
            $table->string('address_line_1')->nullable();
            $table->string('address_line_2')->nullable();
            $table->string('country');
            $table->string('city');
            $table->string('state');
            $table->string('zip_code')->nullable();
            $table->string('nationality')->nullable();
            $table->string('id_no')->nullable();
            $table->string('id_no_type')->comment('0=>Passport, 1=>National ID, 2=>Driver License, 3=>Birth Certificate')->nullable();
            $table->string('image')->nullable();
            $table->string('cover_photo')->nullable();
            $table->string('photo_id')->nullable();
            $table->integer('is_photo_verified')->default(0)->comment('0=>No, 1=>Yes')->nullable();
            $table->string('address_proof_photo')->nullable();
            $table->integer('address_proof_type')->comment('0=>Utility, 1=>Bank Statement, 2=>Printed Letter')->nullable();
            $table->integer('is_address_verified')->default(0)->comment('0=>No, 1=>Yes');
            $table->integer('is_email_verified')->default(0)->comment('0=>No, 1=>Yes');
            $table->integer('is_contact_verified')->default(0)->comment('0=>No, 1=>Yes');
            $table->integer('status')->default(1)->comment('1=>active, 0=>inactive');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
