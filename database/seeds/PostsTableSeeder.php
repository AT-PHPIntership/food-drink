<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\User;
use App\Product;
class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // disable foreign key constraints
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        // Let's clear the users table first
        Post::truncate();
        $faker = \Faker\Factory::create();

        // And now let's generate a few dozen users for our app:
        for ($i = 0; $i < 20; $i++) {
            Post::create([
                'user_id' => $faker->randomElement(User::pluck('id')->toArray()),
                'product_id' => $faker->randomElement(Product::pluck('id')->toArray()),
                'content' => $faker->text,
                'rate' => $faker->numberBetween($min = 0, $max = 5),
                'type' => random_int(1, 2),
                'created_at' => $faker->dateTime,
                'updated_at' => $faker->dateTime,
            ]);
        }

        // enable foreign key constraints
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
