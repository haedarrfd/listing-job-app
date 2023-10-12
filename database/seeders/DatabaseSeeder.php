<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Listing;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(5)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Listing::factory(6)->create();

        Category::create([
            'name' => 'Front End Developer',
            'slug' => 'front-end-developer',
        ]);

        Category::create([
            'name' => 'Back End Developer',
            'slug' => 'back-end-developer',
        ]);

        Category::create([
            'name' => 'Full Stack Developer',
            'slug' => 'full-stack-developer',
        ]);
    }
}
