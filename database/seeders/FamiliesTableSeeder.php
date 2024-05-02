<?php

namespace Database\Seeders;

use App\Models\Family;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
