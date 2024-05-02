<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FamiliesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $families = [
            ['code' => 'PC', 'libelle' => 'petite caisse'],
            ['code' => 'SE', 'libelle' => 'serveur']
        ];
        Family::insert($families);
    }
}
