<?php

use Illuminate\Database\Seeder;
use App\Order;
use App\Product;
use App\OrderDetail;

class OrderDetailsTableSeeder extends Seeder
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
        OrderDetail::truncate();
        $faker = \Faker\Factory::create();

        // And now let's generate a few dozen users for our app:
        for ($i = 0; $i < 20; $i++) {
            OrderDetail::create([
                'order_id' => $faker->randomElement(Order::pluck('id')->toArray()),
                'product_id' => $faker->randomElement(Product::pluck('id')->toArray()),
                'quantity' => $faker->numberBetween($min = 1, $max = 5),
                'price' => $faker->numberBetween($min = 10, $max = 200),
                'preview' => $faker->randomElement(Product::pluck('preview')->toArray()),
                'address' => $faker->address,
                'name_product' => $faker->randomElement(Product::pluck('name')->toArray()),
                'image' => 'public/storage/images/products/default-product.jpg',
                'created_at' => $faker->dateTime,
                'updated_at' => $faker->dateTime,
            ]);
        }

        // disable foreign key constraints
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
