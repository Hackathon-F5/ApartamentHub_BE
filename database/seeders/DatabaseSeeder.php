<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Apartment;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Apartment::create([
            'name' => 'Apartment 1',
            'address' => 'street 1',
            'description' => 'hello',
            'availability' => true,
            'people' => 3
        ]);
        Apartment::create([
            'name' => 'Apartment 2',
            'address' => 'street 2',
            'description' => 'hello',
            'availability' => true,
            'people' => 2
        ]);
    }
}
