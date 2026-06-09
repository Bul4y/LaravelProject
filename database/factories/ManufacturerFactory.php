<?php

namespace Database\Factories;

use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Model>
 */
class ManufacturerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->company(),
            'url' => $this->faker->url(),
            'support_url' => $this->faker->url(),
            'support_phone' => $this->faker->phoneNumber(),
            'support_email' => $this->faker->unique()->safeEmail(),
        ];
    }
}
