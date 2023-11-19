<?php

namespace Database\Factories;

use App\Models\Agency;
use App\Models\Employee;
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
            'id' => Employee::factory(),
            'qualification' => fake()->sentence(5),
            'agencyNum' => Agency::inRandomOrder()->pluck('id')->first(),
        ];
    }
}