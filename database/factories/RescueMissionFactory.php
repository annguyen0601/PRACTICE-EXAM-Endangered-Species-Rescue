<?php

namespace Database\Factories;

use App\Models\Mission;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class RescueMissionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'location_id' => LocationFactory::factory(),
            'leader_email' => $this->faker->email(),
            'report' => $this->faker->text(2048),
            'success' => $this->faker->boolean(),
        ];
    }
}
