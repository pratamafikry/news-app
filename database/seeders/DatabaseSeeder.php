<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\News;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(5)->create();
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Category::factory()->create([
            'category' => 'Nikkei',
            'slug' => 'nikkei'
        ]);
        Category::factory()->create([
            'category' => 'Hanseng',
            'slug' => 'hanseng'
        ]);

        News::factory(20)->create();
    }
}
