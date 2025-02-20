<?php

namespace Database\Seeders;

use App\Models\Box;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Tenant;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'email' => 'test@example.com',
        ]);
        User::factory()->create([
            'email' => 'benjamin@example.com',
        ]);
        Tenant::factory(2)->create([
            'user_id' => 1,
        ]);
        Tenant::factory(2)->create([
            'user_id' => 2,
        ]);
        Box::factory()->create([
            'name' => 'Box de garage #1',
            'surface' => 34,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam semper vestibulum orci, eget molestie nulla auctor ac. Aenean vel pellentesque odio, vel eleifend diam. Sed lobortis pharetra diam, non commodo massa auctor eget. Mauris ultrices ligula et rutrum pretium. Suspendisse potenti.',
            'price' => 359,
            'user_id' => 1,
        ]);
        Box::factory()->create([
            'name' => 'Box de garage #2',
            'surface' => 67,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam semper vestibulum orci, eget molestie nulla auctor ac. Aenean vel pellentesque odio, vel eleifend diam. Sed lobortis pharetra diam, non commodo massa auctor eget. Mauris ultrices ligula et rutrum pretium. Suspendisse potenti.',
            'price' => 639,
            'user_id' => 2,
        ]);
    }
}
