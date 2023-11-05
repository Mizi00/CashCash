<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MaintenanceContract>
 */
class MaintenanceContractFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $date = fake()->date();
        return [
            'signatureDate' => $date,
            'dueDate' => fake()->dateTimeBetween($date, '+1 year'),
            'clientNum' => Client::inRandomOrder()->first()->id
        ];
    }
}
