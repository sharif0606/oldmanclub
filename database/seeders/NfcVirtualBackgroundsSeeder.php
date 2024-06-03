<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NfcVirtualBackgroundsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Fetching category IDs
        $categoryIds = DB::table('nfc_virtual_background_categories')->pluck('id')->toArray();

        // Dummy image URLs (replace with actual URLs if needed)
        $dummyImages = [
            'uploads/virtual_background/nature1.jpg',
            'uploads/virtual_background/technology1.jpg',
            'uploads/virtual_background/art1.jpg',
            'uploads/virtual_background/space1.jpg',
        ];

        $backgrounds = [];
        foreach ($categoryIds as $index => $categoryId) {
            $backgrounds[] = [
                'image' => $dummyImages[$index % count($dummyImages)],
                'category_id' => $categoryId,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('nfc_virtual_backgrounds')->insert($backgrounds);
    }
}
