<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Location;
use App\Models\Manufacturer;
use App\Models\Asset;
use Illuminate\Database\Seeder;
use App\Enums\UserRole;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(seedUser::class);
        User::factory(20)->create();
        Category::factory(10)->create();
        Location::factory(10)->create();
        Manufacturer::factory(10)->create();
        Asset::factory(100)->create();
    }
}
