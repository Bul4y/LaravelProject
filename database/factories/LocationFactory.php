<?php

namespace Database\Factories;

use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Model>
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
        $officeLocation = [
            'Main Office - Floor 1',
            'Annex Building - IT Department',
            'Warehouse - Storage Area A',
            'Remote Office - Manila',
            'Branch Office - Cebu',
            'Data Center - Server Room 1',
            'Conference Room 3',
        ];

        return [
            'name' => $this->faker->randomElement($officeLocation),
            'address' => $this->faker->address(),
        ];
    }
}
