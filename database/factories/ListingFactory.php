<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => mt_rand(1, 5),
            'category_id' => mt_rand(1, 3),
            'title' => fake()->jobTitle(),
            'slug' => fake()->slug(),
            'company' => fake()->company(),
            'location' => fake()->city(),
            'email' => fake()->safeEmail(),
            'description' => collect(fake()->paragraphs(mt_rand(3, 5)))
                ->map(fn ($desc) => "<p>$desc</p>")
                ->implode('')
        ];
    }
}
