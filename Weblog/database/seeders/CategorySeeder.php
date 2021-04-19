<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      \App\Models\Category::factory()->count(30)->hasAttached(
          \App\Models\Post::factory()->count(3))->create();
    }
}
