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
        $this->call(EmployeesTableSeeder::class);
        $this->call(TechniciansTableSeeder::class);
        $this->call(HelpersTableSeeder::class);
        $this->call(InterventionsTableSeeder::class);
        $this->call(CoverstableSeeder::class);²
    }
}
