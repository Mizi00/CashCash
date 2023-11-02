<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Agency;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
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
            'socialReason' => fake()->company(),
            'sirenNum' => fake()->numerify('#########'),
            'apeCode' => rand(1000, 5000).strtoupper(fake()->randomLetter()),
            'address' => fake()->address(),
            'phoneNumber' =>fake()->numerify('06########'),
            'faxNum' => fake()->numerify('0#########'),
            'mailAddress' => fake()->unique()->safeEmail(),
            'kmDistance' => rand(1, 1000),
            'travelTime' => rand(1, 60),
            'agencyNum' => Agency::inRandomOrder()->first()->id
         ];
    }
}
