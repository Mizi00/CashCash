<?php

namespace Database\Factories;

use App\Models\Material;
use App\Models\Intervention;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CoverFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'passingTime' => fake()->numberBetween(1,100),
            'commentWorks' => fake()->text(200),
            'serialNum' => Material::inRandomOrder()->first()->id,
            'sheetNum' => Intervention::inRandomOrder()->first()->id
        ];
    }
}
