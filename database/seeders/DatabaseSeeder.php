<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Department;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        Department::factory()->createMany([
            [
                'id' => 1,
                'name' => 'Computer Science',
                'code' => 'CS',
                'max_level' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'name' => 'Mathematics',
                'code' => 'MATH',
                'max_level' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'name' => 'Biology',
                'code' => 'BIO',
                'max_level' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'name' => 'Physics',
                'code' => 'PHYS',
                'max_level' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'name' => 'English',
                'code' => 'ENGL',
                'max_level' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 6,
                'name' => 'History',
                'code' => 'HIST',
                'max_level' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 7,
                'name' => 'Business Administration',
                'code' => 'BA',
                'max_level' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 8,
                'name' => 'Economics',
                'code' => 'ECON',
                'max_level' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 9,
                'name' => 'Psychology',
                'code' => 'PSY',
                'max_level' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 10,
                'name' => 'Sociology',
                'code' => 'SOC',
                'max_level' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
