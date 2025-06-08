<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Location>
 */
class LocationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'location_id' => $this->faker->unique()->numberBetween(1, 1000),
            'name' => $this->faker->word(),
            'threat_level' => $this->faker->numberBetween(1, 5),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
