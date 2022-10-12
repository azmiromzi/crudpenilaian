<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'is_admin' => 1
        ]);
        \App\Models\User::factory()->create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'is_admin' => 0
        ]);

        \App\Models\Category::create([
            'name' => 'APPETIZER',
        ]);
        \App\Models\Category::create([
            'name' => 'SOUP',
        ]);
        \App\Models\Category::create([
            'name' => 'MAIN COURSE',
        ]);
        \App\Models\Category::create([
            'name' => 'DESSERT ',
        ]);
        \App\Models\Category::create([
            'name' => 'HOT BEVERAGE',
        ]);
    }
}
