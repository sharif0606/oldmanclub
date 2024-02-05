<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('fname')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->date('dob')->nullable();
            $table->string('contact_no')->unique();
            $table->string('email')->unique()->nullable();
            $table->string('password');
            $table->string('address_line_1')->nullable();
            $table->string('address_line_2')->nullable();
            $table->integer('country_id')->nullable();
            $table->integer('city_id')->nullable();
            $table->integer('state_id')->nullable();
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
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
        DB::table('clients')->insert([
            'email' => 'kaiser@gmail.com',
            'contact_no' => 1,
            'password' => Hash::make(123),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
