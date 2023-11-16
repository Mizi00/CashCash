<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\InterventionSheet;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class InterventionSheetsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        InterventionSheet::factory()->count(10)->create();
    }
}
