<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'first_name' => 'Default',
            'last_name' => 'User',
            'email' => 'test@example.com',
            'password' => 'password!',
        ]);
        \App\Models\Size::factory()->create([
            'size_name' => 'Small',
        ]);
        \App\Models\Size::factory()->create([
            'size_name' => 'Medium',
        ]);        #
        \App\Models\Size::factory()->create([
            'size_name' => 'Large',
        ]);
        \App\Models\Room::factory(12)->create();
    }
}
