<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(AgenciesTableSeeder::class);
        $this->call(ClientsTableSeeder::class);
        $this->call(MaterialsTypesTableSeeder::class);
        $this->call(MaterialsTableSeeder::class);
        $this->call(MaintenanceContractsTableSeeder::class);
        
    }
}
