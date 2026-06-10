<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
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
        $officeLocations = [
            'HR Department',
            'IT Department',
            'Finance Department',
            'Marketing Department',
            'Sales Department',
            'Customer Support',
            'Research and Development',
            'Administration',
            'Warehouse',
            'Executive Office',
            'Conference Room',
            'Reception Area',
        ];
        return [
            'name' => $this->faker->unique()->randomElement($officeLocations),
            'address' => $this->faker->address()
        ];
    }
}