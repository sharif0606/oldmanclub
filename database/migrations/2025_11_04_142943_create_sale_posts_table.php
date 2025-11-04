<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * title,
photos,
price,
categories,
condition,
description,
availability,
product_tags,
sku,
location,
public_meetup,
door_pickup,
door_dropoff,
hide_from_friends,
draft,
     */
    public function up(): void
    {
        Schema::create('sale_posts', function (Blueprint $table) {
            $table->id();
            $table->string( 'title',255)->nullable();
            $table->json('photos')->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->string('category_id')->nullable();
            $table->integer('condition')->nullable()->comment('1 => New, 2 => Used, 3 => Refurbished, 4 => Used Like New, 5 => Good, 6 => Acceptable, 7 => Poor');
            $table->text('description')->nullable();
            $table->integer('availability')->nullable()->comment('1 => In Stock, 2 => List as Single Item');
            $table->string('sku')->nullable();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->unsignedBigInteger('state_id')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();

            $table->integer('public_meetup')->nullable()->default(0)->comment('1 => Yes, 0 => No');
            $table->integer('door_pickup')->nullable()->default(0)->comment('1 => Yes, 0 => No');
            $table->integer('door_dropoff')->nullable()->default(0)->comment('1 => Yes, 0 => No');
            $table->integer('hide_from_friends')->nullable()->default(0)->comment('1 => Yes, 0 => No');
            $table->integer('status')->nullable()->default(1)->comment('1 => draft, 2 => published, 3 => archived');
            $table->date('published_at')->nullable();
            $table->date('unpublished_at')->nullable();
            $table->date('notify_at')->nullable();
            $table->integer('notify_count')->nullable()->default(0);
            $table->integer('view_count')->nullable()->default(0);
            $table->integer('like_count')->nullable()->default(0);
            $table->integer('comment_count')->nullable()->default(0);
            $table->integer('share_count')->nullable()->default(0);
            $table->integer('save_count')->nullable()->default(0);
            $table->integer('report_count')->nullable()->default(0);
            $table->integer('spam_count')->nullable()->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sale_posts');
    }
};
