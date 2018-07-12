<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Shipping;

class ShippingsTableSeeder extends Seeder
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
        Shipping::truncate();

        $faker = \Faker\Factory::create();

        // And now let's generate a few dozen users for our app:
        for ($i = 0; $i < 20; $i++) {
            Shipping::create([
                'user_id' => $faker->randomElement(User::pluck('id')->toArray()),
                'address_shipping' => $faker->address,
                'default' => 0,
            ]);
        }

        // enable foreign key constraints
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
