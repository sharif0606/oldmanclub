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
        Schema::create('phone_books', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id')->index();
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->unsignedBigInteger('group_id')->index();
            $table->foreign('group_id')->references('id')->on('phone_groups')->onDelete('cascade');
            $table->string('name_en');
            $table->string('name_bn')->nullable();
            $table->string('contact_en');
            $table->string('contact_bn')->nullable();
            $table->string('email')->uniqid();
            $table->string('given_name')->nullable();
            $table->string('additional_name')->nullable();
            $table->string('family_name')->nullable();
            $table->string('yomi_name')->nullable();
            $table->string('given_name_yomi')->nullable();
            $table->string('additional_name_yomi')->nullable();
            $table->string('family_name_yomi')->nullable();
            $table->string('name_prefix')->nullable();
            $table->string('name_suffix')->nullable();
            $table->string('initials')->nullable();
            $table->string('short_name')->nullable();
            $table->string('maiden_name')->nullable();
            $table->string('birthday')->nullable();
            $table->string('gender')->nullable();
            $table->string('location')->nullable();
            $table->string('billing_information')->nullable();
            $table->string('directory_server')->nullable();
            $table->string('mileage_occupation')->nullable();
            $table->string('hobby')->nullable();
            $table->string('sensitivity')->nullable();
            $table->string('priority')->nullable();
            $table->string('subject_notes')->nullable();
            $table->string('language')->nullable();
            $table->string('photo')->nullable();
            $table->string('group_membership')->nullable();
            $table->string('phone_1_type')->nullable();
            $table->string('Phone_1_value')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phone_books');
    }
};
