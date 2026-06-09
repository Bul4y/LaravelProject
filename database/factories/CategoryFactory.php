<?php

namespace Database\Factories;

use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Model>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $deviceCategories = [
            'Laptop',
            'Desktop PC',
            'Monitor',
            'Printer',
            'Network Switch',
            'Router',
            'Server',
            'Mobile Phone',
        ];
        
        return [
            'name' => $this->faker->randomElement($deviceCategories),
            'description' => $this->faker->sentence()
        ];
    }
}
