<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NfcVirtualBackgroundCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['category_name' => 'Featured'],
            ['category_name' => 'Abstract'],
            ['category_name' => 'City'],
            ['category_name' => 'Iconic'],
            ['category_name' => 'Indoor'],
            ['category_name' => 'Nature'],
        ];

        DB::table('nfc_virtual_background_categories')->insert($categories);
    }
}
