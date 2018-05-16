<?php

use Illuminate\Database\Seeder;
use App\Image;
use App\Product;

class ImagesTableSeeder extends Seeder
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
        Image::truncate();
        $faker = \Faker\Factory::create();

        // And now let's generate a few dozen users for our app:
        for ($i = 0; $i < 20; $i++) {
            Image::create([
                'image' => 'default-product.jpg',
                'product_id' => $faker->randomElement(Product::pluck('id')->toArray()),
            ]);
        }

        // enable foreign key constraints
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
