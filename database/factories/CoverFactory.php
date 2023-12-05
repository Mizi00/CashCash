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
        $materialId = Material::inRandomOrder()->pluck('id')->first();
        $interventionId = Intervention::whereNotIn('id', [$materialId])->inRandomOrder()->pluck('id')->first();
        $random = rand(0,1);
        return [
            'passingTime' => $random ? fake()->numberBetween(1,100) : null,
            'commentWorks' => $random ? fake()->text(200) : null,
            'serialNum' => $materialId,
            'sheetNum' => $interventionId
        ];
    }
}
