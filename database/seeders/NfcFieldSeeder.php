<?php

namespace Database\Seeders;

use App\Models\Backend\NfcField;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NfcFieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        NfcField::factory()->count(10)->create();
    }
}
