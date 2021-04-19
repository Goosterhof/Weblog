<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use \App\Models\User;
use \App\Models\Roles;
use Illuminate\Database\Eloquent\Factories\Factory;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      User::factory()->count(10)->create();

      // Create Author user
      User::create([
       'name' => 'Author',
       'email' => 'author@hotmail.com',
       'bio' => 'is a 27-year-old middle manager who enjoys meditation, binge-watching boxed sets and praying. He is inspiring and exciting, but can also be very sneaky and a bit sadistic. He has had two affairs so far. Most recently he cheated on girlfriend, Kit, with 25-year-old management consultant, Krystal Philip. He is now in a relationship with Krystal. He is a British Christian. He has a post-graduate degree in business studies.',
       'email_verified_at' => now(),
       'password' => bcrypt('123456'), // password
       'remember_token' => Str::random(5),
       'account' => 'author'

      ]);

      // Create basic user
      User::create([
       'name' => 'Basic',
       'email' => 'basic@gmail.com',
       'bio' => 'is a 27-year-old middle manager who enjoys meditation, binge-watching boxed sets and praying. He is inspiring and exciting, but can also be very sneaky and a bit sadistic. He has had two affairs so far. Most recently he cheated on girlfriend, Kit, with 25-year-old management consultant, Krystal Philip. He is now in a relationship with Krystal. He is a British Christian. He has a post-graduate degree in business studies.',
       'email_verified_at' => now(),
       'password' => bcrypt('123456'), // password
       'remember_token' => Str::random(5),
       'account' => 'basic'

      ]);
    }
}
