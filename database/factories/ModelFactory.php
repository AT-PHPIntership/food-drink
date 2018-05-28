<?php
use Faker\Generator as Faker;
/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Category::class, function (Faker $faker) {
        return([
            'name' => $faker->name,
            'parent_id' => App\Category::all()->random()->id,
        ]);
});
$factory->define(App\Images::class, function (Faker $faker) {
    return([
        'image' => config('image.images_product'),
        'product_id' => $faker->randomElement(App\Product::pluck('id')->toArray()),
    ]);
});
$factory->define(App\OrderDetail::class, function (Faker $faker) {
    return [
        'order_id' => $faker->randomElement(App\Order::pluck('id')->toArray()),
        'product_id' => $faker->randomElement(App\Product::pluck('id')->toArray()),
        'quantity' => $faker->numberBetween(1, 5),
        'price' => $faker->numberBetween(10, 200),
        'preview' => $faker->randomElement(App\Product::pluck('preview')->toArray()),
        'address' => $faker->address,
        'name_product' => $faker->randomElement(App\Product::pluck('name')->toArray()),
        'image' => config('image.images_product'),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
    ];
});
$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'user_id' => $faker->randomElement(App\User::pluck('id')->toArray()),
        'product_id' => $faker->randomElement(App\Product::pluck('id')->toArray()),
        'content' => $faker->text,
        'rate' => $faker->numberBetween(0, 5),
        'type' => random_int(1, 2),
        'status' => 0,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
    ];
});
$factory->define(App\Order::class, function (Faker $faker) {
    return [
        'user_id' => $faker->randomElement(App\User::pluck('id')->toArray()),
        'total' => 1000,
        'status' => random_int(1, 3),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
    ];
});
$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'price' => $faker->numberBetween(10, 200),
        'quantity' =>$faker->numberBetween(0, 15),
        'category_id' => $faker->randomElement(App\Category::pluck('id')->toArray()),
        'preview' => $faker->text,
        'description' => $faker->text,
        'avg_rate' => $faker->randomFloat(1, 1, 5),
        'sum_rate' => $faker->numberBetween(1, 20),
        'total_rate' =>$faker->numberBetween(10, 80),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
    ];
});
$factory->define(App\UserInfo::class, function (Faker $faker) {
    return [
        'user_id' => $faker->unique()->randomElement(App\User::pluck('id')->toArray()),
        'address' => $faker->address,
        'phone' => $faker->phoneNumber,
        'avatar' => config('image.images_user'),
    ];
});
$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(config('auth.defaults.passwords')),
        'role' => 0,
    ];
});
$factory->defineAs(App\User::class, 'admin', function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt(config('auth.defaults.passwords')), // secret
        'role' => 1,
        'deleted_at' => null,
    ];
});
$factory->defineAs(App\Category::class, 'parent', function (Faker $faker) {
        return([
            'name' => $faker->name,
            'parent_id' => 0,
        ]);
});
