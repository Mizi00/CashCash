<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\MaterialType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Material>
 */
class MaterialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'saleDate' => fake()->date(),
            'installationDate' => fake()->date(),
            'salePrice' => fake()->randomFloat(2, 1, 1000),
            'location' => fake()->randomElement(['Fruits & Légumes', 'Poissonerie', 'Boucherie', 'Boulangerie',
                                                'Produits ménagers', 'Électronique', 'Vêtements', 'Bricolage & quincaillerie',
                                                'Jouets & jeux']),
            'internalRef' => MaterialType::inRandomOrder()->pluck('internalRef')->first(),
            'clientNum' => Client::inRandomOrder()->pluck('id')->first(),
            'contractNum' => null
        ];
    }
}
