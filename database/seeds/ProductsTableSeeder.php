<?php

use Illuminate\Database\Seeder;
use App\Product;
use App\Category;

class ProductsTableSeeder extends Seeder
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
        Product::truncate();
        $faker = \Faker\Factory::create();

        // And now let's generate a few dozen users for our app:
        for ($i = 0; $i < 20; $i++) {
            Product::create([
                'name' => $faker->name,
                'price' => $faker->numberBetween($min = 10, $max = 200),
                'quantity' =>$faker->numberBetween($min = 0, $max = 15),
                'category_id' => $faker->randomElement(Category::pluck('id')->toArray()),
                'preview' => $faker->text,
                'description' => $faker->text,
                'avg_rate' => $faker->randomFloat($nbMaxDecimals = 1, $min = 1, $max = 5),
                'sum_rate' => $faker->numberBetween($min = 1, $max = 20),
                'total_rate' =>$faker->numberBetween($min = 10, $max = 80),
                'created_at' => $faker->dateTime,
                'updated_at' => $faker->dateTime,
            ]);
        }

        // enable foreign key constraints
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
