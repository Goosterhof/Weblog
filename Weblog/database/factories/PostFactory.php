<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \App\Models\Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
   public function definition()
     {
         return [
             'title' => $this->faker->realText($maxNbChars = 40, $indexSize = 2),
             'body' => $this->faker->realText($maxNbChars = 3500, $indexSize = 2),
             'slug' => $this->faker->text(100),

             'media_name' => $this->faker->text(20),
             'media_path' => $this->faker->imageUrl(640,480),

             'user_id'=> \App\Models\User::factory(),
          ];
     }
}
