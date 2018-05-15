<?php

use Illuminate\Database\Seeder;
use App\UserInfo;
use App\User;
class UserInfosTableSeeder extends Seeder
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
        UserInfo::truncate();

        $faker = \Faker\Factory::create();
        // get array user id
        $idUsers = User::pluck('id')->toArray();

        // And now let's generate a few dozen users for our app:
        for ($i = 0; $i < count($idUsers); $i++) {
            UserInfo::create([
                'user_id' => $idUsers[$i],
                'address' => $faker->address,
                'phone' => $faker->phoneNumber,
                'avatar' => 'public/storage/images/users/default-user-avatar.png',
            ]);
        }

        // enable foreign key constraints
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
