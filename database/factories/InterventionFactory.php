<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Intervention>
 */
class InterventionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'dateTimeVisit' => fake()->dateTimeBetween('2023-01-01','2024-12-31'),
            'clientNum' => Client::inRandomOrder()->pluck('id')->first(),
            'registrationNum' => null,
        ];
    }
}
