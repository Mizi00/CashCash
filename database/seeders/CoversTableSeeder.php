<?php

namespace Database\Seeders;

use App\Models\Cover;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CoversTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cover::factory()->count(5)->create();
    }
}
