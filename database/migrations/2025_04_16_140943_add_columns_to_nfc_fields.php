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
        Schema::table('nfc_fields', function (Blueprint $table) {
            $table->string('link')->nullable()->after('name');
        });

        $fields = [
            [
                'name' => 'web',
                'link' => null,
                'icon' => 'fas fa-globe',
                'category' => 1,
            ],
            [
                'name' => 'link',
                'link' => null,
                'icon' => 'fas fa-link',
                'category' => 2,
            ],
            [
                'name' => 'instagram',
                'link' => null,
                'icon' => 'fab fa-instagram',
                'category' => 2,
            ],
            [
                'name' => 'email',
                'link' => null,
                'icon' => 'fas fa-envelope',
                'category' => 2,
            ],
            [
                'name' => 'linkedin',
                'link' => 'https://www.linkedin.com/in/',
                'icon' => 'fab fa-linkedin',
                'category' => 2,
            ],
            [
                'name' => 'facebook',
                'link' => 'https://www.facebook.com/',
                'icon' => 'fab fa-facebook',
                'category' => 1,
            ],
            [
                'name' => 'snapchat',
                'link' => 'https://www.snapchat.com/',
                'icon' => 'fab fa-snapchat',
                'category' => 2,
            ],
            [
                'name' => 'pinterest',
                'link' => 'https://www.pinterest.com/',
                'icon' => 'fab fa-pinterest',
                'category' => 2,
            ],
            [
                'name' => 'tiktok',
                'link' => 'https://www.tiktok.com/en/',
                'icon' => 'fab fa-tiktok',
                'category' => 2,
            ],
            [
                'name' => 'xing',
                'link' => 'https://www.xing.com/en',
                'icon' => 'fab fa-xing',
                'category' => 1,
            ],
            [
                'name' => 'whatsapp',
                'link' => 'https://api.whatsapp.com/send?phone=',
                'icon' => 'fab fa-whatsapp',
                'category' => 2,
            ],
            [
                'name' => 'telegram',
                'link' => 'https://t.me/',
                'icon' => 'fab fa-telegram',
                'category' => 2,
            ],
            [
                'name' => 'discord',
                'link' => 'https://discord.com/',
                'icon' => 'fab fa-discord',
                'category' => 2,
            ],
            [
                'name' => 'wechat',
                'link' => 'https://web.wechat.com/',
                'icon' => 'fab fa-weixin',
                'category' => 2,
            ],
            [
                'name' => 'line',
                'link' => null,
                'icon' => 'fab fa-line',
                'category' => 2,
            ],
            [
                'name' => 'skype',
                'link' => 'https://www.skype.com/en/',
                'icon' => 'fab fa-skype',
                'category' => 2,
            ],
            [
                'name' => 'phone',
                'link' => null,
                'icon' => 'fas fa-phone-alt',
                'category' => 1,
            ],
            [
                'name' => 'paypal',
                'link' => null,
                'icon' => 'fab fa-paypal',
                'category' => 1,
            ],
            [
                'name' => 'cashapp',
                'link' => null,
                'icon' => 'fas fa-dollar-sign',
                'category' => 1,
            ],
            [
                'name' => 'youtube',
                'link' => 'https://www.youtube.com/',
                'icon' => 'fab fa-youtube',
                'category' => 2,
            ],
            [
                'name' => 'vimeo',
                'link' => 'https://vimeo.com/',
                'icon' => 'fab fa-vimeo',
                'category' => 1,
            ],
            [
                'name' => 'twitch',
                'link' => 'https://x.com/',
                'icon' => 'fab fa-twitch',
                'category' => 2,
            ],
            [
                'name' => 'spotify',
                'link' => 'https://spotify.com/',
                'icon' => 'fab fa-spotify',
                'category' => 1,
            ],
            [
                'name' => 'applemusic',
                'link' => null,
                'icon' => 'fas fa-music',
                'category' => 1,
            ],
            [
                'name' => 'soundcloud',
                'link' => null,
                'icon' => 'fas fa-cloud',
                'category' => 1,
            ],
            [
                'name' => 'behance',
                'link' => null,
                'icon' => 'fab fa-behance',
                'category' => 1,
            ],
            [
                'name' => 'dribble',
                'link' => 'https://dribbble.com/',
                'icon' => 'fab fa-dribbble',
                'category' => 1,
            ],
        ];

        try{
             foreach ($fields as $field) {
                $record = DB::table('nfc_fields')->where('name', $field['name'])->first();

                if ($record) {
                    DB::table('nfc_fields')->where('name', $field['name'])->update([
                        'icon' => $field['icon'],
                        'category' => $field['category'],
                        'link' => $field['link'],
                        'status' => 1,
                        'created_by' => 1,
                    ]);
                } else {
                    DB::table('nfc_fields')->insert([
                        'name' => $field['name'],
                        'icon' => $field['icon'],
                        'category' => $field['category'],
                        'link' => $field['link'],
                        'status' => 1,
                        'created_by' => 1,
                    ]);
                }
            }


        }catch(Exception $e){
            echo $e->getMessage();
        }


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('nfc_fields', function (Blueprint $table) {
            $table->dropColumn('link');
        });
    }
};
