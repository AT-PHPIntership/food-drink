<?php

use Illuminate\Database\Seeder;
use App\Note;
use App\Order;
use App\User;

class NotesTableSeeder extends Seeder
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
        Note::truncate();
        $faker = \Faker\Factory::create();

        // And now let's generate a few dozen users for our app:
        for ($i = 0; $i < 20; $i++) {
            Note::create([
                'order_id' => $faker->randomElement(Order::pluck('id')->toArray()),
                'user_id' => 1,
                'content' => $faker->text,
                'created_at' => $faker->dateTime,
                'updated_at' => $faker->dateTime,
            ]);
        }

        // disable foreign key constraints
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
