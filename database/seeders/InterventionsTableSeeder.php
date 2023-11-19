<?php

namespace Database\Seeders;

use App\Models\Intervention;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class InterventionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Intervention::factory()->count(10)->create();
    }
}
