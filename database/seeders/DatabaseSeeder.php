<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Status;
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
            'name' => 'Breakfast',
        ]);
        \App\Models\Category::create([
            'name' => 'Launch',
        ]);
        \App\Models\Category::create([
            'name' => 'Dinner',
        ]);
        Status::create([
            'name' => 'Sedang Diproses'
        ]);
        Status::create([
            'name' => 'Selesai'
        ]);

    }
}
