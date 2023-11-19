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
            'socialReason' => fake()->company(),
            'sirenNum' => fake()->numerify('#########'),
            'apeCode' => rand(1000, 5000).strtoupper(fake()->randomLetter()),
            'address' => fake()->address(),
            'phoneNumber' =>fake()->numerify('06########'),
            'faxNum' => fake()->numerify('0#########'),
            'mailAddress' => fake()->unique()->safeEmail(),
            'agencyNum' => Agency::inRandomOrder()->pluck('id')->first()
         ];
    }
}
