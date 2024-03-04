<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('nfc_fields', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('icon', 100)->nullable();
            $table->tinyInteger('category')->default(1)->comment('1 => Most Popular, 2 => Social, 3 => Communication, 4 => Payment, 5 => Video, 6=> Music, 7=> Design, 8=> Gaming, 9=> Other');
            $table->tinyInteger('type')->default(1)->comment('1 => text, 2=> file 3=> textarea 4=>date');
            $table->tinyInteger('status')->default(1)->comment('1=> Show, 2=> Hide');
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
        DB::table('nfc_fields')->insert(
            [
                [
                    'name' => 'web',
                    'icon' => 'fas fa-globe',
                    'category'  => 1,
                    'status' => 1,
                    'created_by' => 1,
                ],
                [
                    'name' => 'link',
                    'icon' => 'fas fa-link',
                    'category'  => 1,
                    'status' => 1,
                    'created_by' => 1,
                ],
                [
                    'name' => 'instagram',
                    'icon' => 'fab fa-instagram',
                    'category'  => 1,
                    'status' => 1,
                    'created_by' => 1,
                ],
                [
                    'name' => 'email',
                    'icon' => 'fas fa-envelope',
                    'category'  => 1,
                    'status' => 1,
                    'created_by' => 1,
                ],
                [
                    'name' => 'linkledin',
                    'icon' => 'fab fa-linkedin',
                    'category'  => 1,
                    'status' => 1,
                    'created_by' => 1,
                ],
                [
                    'name' => 'email',
                    'icon' => 'fab fa-facebook',
                    'category'  => 1,
                    'status' => 1,
                    'created_by' => 1,
                ],
                [
                    'name' => 'snapchat',
                    'icon' => 'fab fa-snapchat',
                    'category'  => 1,
                    'status' => 1,
                    'created_by' => 1,
                ],
                [
                    'name' => 'pinterest',
                    'icon' => 'fab fa-pinterest',
                    'category'  => 1,
                    'status' => 1,
                    'created_by' => 1,
                ],
                [
                    'name' => 'tiktok',
                    'icon' => 'fab fa-tiktok',
                    'category'  => 1,
                    'status' => 1,
                    'created_by' => 1,
                ],
                [
                    'name' => 'xing',
                    'icon' => 'fab fa-xing',
                    'category'  => 1,
                    'status' => 1,
                    'created_by' => 1,
                ],
                [
                    'name' => 'whatsapp',
                    'icon' => 'fab fa-whatsapp',
                    'category'  => 1,
                    'status' => 1,
                    'created_by' => 1,
                ],
                [
                    'name' => 'telegram',
                    'icon' => 'fab fa-telegram',
                    'category'  => 1,
                    'status' => 1,
                    'created_by' => 1,
                ],
                [
                    'name' => 'discord',
                    'icon' => 'fab fa-discord',
                    'category'  => 1,
                    'status' => 1,
                    'created_by' => 1,
                ],
                [
                    'name' => 'wechat',
                    'icon' => 'fab fa-weixin',
                    'category'  => 1,
                    'status' => 1,
                    'created_by' => 1,
                ],
                [
                    'name' => 'line',
                    'icon' => 'fab fa-line',
                    'category'  => 1,
                    'status' => 1,
                    'created_by' => 1,
                ],
                [
                    'name' => 'skype',
                    'icon' => 'fab fa-skype',
                    'category'  => 1,
                    'status' => 1,
                    'created_by' => 1,
                ],
                [
                    'name' => 'phone',
                    'icon' => 'fas fa-phone-alt',
                    'category'  => 1,
                    'status' => 1,
                    'created_by' => 1,
                ],
                [
                    'name' => 'paypal',
                    'icon' => 'fab fa-paypal',
                    'category'  => 1,
                    'status' => 1,
                    'created_by' => 1,
                ],
                [
                    'name' => 'cashapp',
                    'icon' => 'fas fa-dollar-sign',
                    'category'  => 1,
                    'status' => 1,
                    'created_by' => 1,
                ],
                [
                    'name' => 'youtube',
                    'icon' => 'fab fa-youtube',
                    'category'  => 1,
                    'status' => 1,
                    'created_by' => 1,
                ],
                [
                    'name' => 'vimeo',
                    'icon' => 'fab fa-vimeo',
                    'category'  => 1,
                    'status' => 1,
                    'created_by' => 1,
                ],
                [
                    'name' => 'twitch',
                    'icon' => 'fab fa-twitch',
                    'category'  => 1,
                    'status' => 1,
                    'created_by' => 1,
                ],
                [
                    'name' => 'spotify',
                    'icon' => 'fab fa-spotify',
                    'category'  => 1,
                    'status' => 1,
                    'created_by' => 1,
                ],
                [
                    'name' => 'applemusic',
                    'icon' => 'fas fa-music',
                    'category'  => 1,
                    'status' => 1,
                    'created_by' => 1,
                ],
                [
                    'name' => 'soundcloud',
                    'icon' => 'fas fa-cloud',
                    'category'  => 1,
                    'status' => 1,
                    'created_by' => 1,
                ],
                [
                    'name' => 'behance',
                    'icon' => 'fab fa-behance',
                    'category'  => 1,
                    'status' => 1,
                    'created_by' => 1,
                ],
                [
                    'name' => 'dribble',
                    'icon' => 'fab fa-dribble',
                    'category'  => 1,
                    'status' => 1,
                    'created_by' => 1,
                ],
            ]
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nfc_fields');
    }
};
