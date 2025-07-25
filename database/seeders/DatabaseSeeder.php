<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'PSN',
            'email' => 'psn@gmail.com',
            'password' => Hash::make('admin123'), // Ensure the password is hashed
            'role' => 1, // Assuming 1 is the admin role
        ]);


        $categories = [
            ['name' => 'Documents', 'description' => 'Files related to documents'],
            ['name' => 'Images', 'description' => 'Image files'],
            ['name' => 'Videos', 'description' => 'Video files'],
            ['name' => 'Audio', 'description' => 'Audio files'],
            ['name' => 'Archives', 'description' => 'Compressed files like zip, rar'],
        ];
        foreach ($categories as $category) {
            Category::create($category);
        }






    }
}
