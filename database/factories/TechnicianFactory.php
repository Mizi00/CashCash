<?php

namespace Database\Factories;

use App\Models\Agency;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Technician>
 */
class TechnicianFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'qualification' => fake()->sentence(5), //sentence sert a générer une phrase (c'est en attendant de trouver une solution ^^)
            'agencyNum' => Agency::inRandomOrder()->first(),
        ];
    }
}
