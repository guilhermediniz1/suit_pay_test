<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Course::factory(100)->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
        ]);
    }
}
