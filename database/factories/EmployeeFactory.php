<?php

namespace Database\Factories;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'lastName' => fake()->lastName(),
            'firstName' => fake()->firstName(),
            'hireDate' => fake()->date(),
            'mailAddress' => fake()->unique()->safeEMail(),
            'phoneNumber' => fake()->numerify('06########'),
            'password' => Hash::make('P@ssword')
        ];
    }
}
