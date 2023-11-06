<?php

namespace Database\Seeders;

use App\Models\Helper;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class HelpersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Helper::factory()->count(10)->create();
    }
}
