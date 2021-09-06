<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $animals = Category::create(['name' => 'animals', 'description' => 'About animals']);
        $art = Category::create(['name' => 'art', 'description' => 'About art']);
        $biography = Category::create(['name' => 'biography', 'description' => 'Biographies']);
        $computing = Category::create(['name' => 'computing', 'description' => 'About computer science']);
        $geography = Category::create(['name' => 'geography', 'description' => 'About geography']);
        $history = Category::create(['name' => 'history', 'description' => 'About history']);
        $kitchen = Category::create(['name' => 'kitchen', 'description' => 'Recipes']);
        $music = Category::create(['name' => 'music', 'description' => 'About music']);
        $novel = Category::create(['name' => 'novel', 'description' => 'Novels']);
        $other = Category::create(['name' => 'other', 'description' => 'another category']);
        $physical = Category::create(['name' => 'physical', 'description' => 'About physical']);
        $sports = Category::create(['name' => 'sports', 'description' => 'About sports']);
    }
}
