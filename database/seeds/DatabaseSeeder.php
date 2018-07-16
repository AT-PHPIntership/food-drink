<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(UserInfosTableSeeder::class);
        $this->call(OrdersTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(PostsTableSeeder::class);
        $this->call(ImagesTableSeeder::class);
        $this->call(OrderDetailsTableSeeder::class);
        $this->call(NotesTableSeeder::class);
        App\Shipping::truncate();
        factory(App\Shipping::class, 31)->create();
    }
}
