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
    // And now let's generate a few dozen users for our app:
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
        'quantity' => $faker->numberBetween($min = 1, $max = 5),
        'price' => $faker->numberBetween($min = 10, $max = 200),
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
        'rate' => $faker->numberBetween($min = 0, $max = 5),
        'type' => random_int(1, 2),
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
        'price' => $faker->numberBetween($min = 10, $max = 200),
        'quantily' =>$faker->numberBetween($min = 0, $max = 15),
        'category_id' => $faker->randomElement(Category::pluck('id')->toArray()),
        'preview' => $faker->text,
        'description' => $faker->text,
        'avg_rate' => $faker->randomFloat($nbMaxDecimals = 1, $min = 1, $max = 5),
        'sum_rate' => $faker->numberBetween($min = 1, $max = 20),
        'total_rate' =>$faker->numberBetween($min = 10, $max = 80),
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
