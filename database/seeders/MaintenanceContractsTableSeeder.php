<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MaintenanceContract;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MaintenanceContractsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MaintenanceContract::factory()->count(10)->create();
    }
}
