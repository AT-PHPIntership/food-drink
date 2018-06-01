<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
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
        Category::truncate();

        // make a arry food name by 10 category name
        $foodName = array("food", "drink", "apple", "Gala Apple", "Ambrosia Apple", "Envy Apple", "Beer", "Lager Beer", "Ale Beer", "Way Beer");

        // make a arry food name by 10 category name
        $idParent = array("0", "0", "1", "3" , "3", "3", "2", "7", "7", "7");

        //make a array level 10 category
        $levelCategory = array("0", "0", "1", "2", "2", "2", "1", "2", "2", "2"); 
        // And now let's generate a few dozen users for our app:
        for ($i = 0; $i < count($foodName); $i++) {
            Category::create([
                'name' => $foodName[$i],
                'parent_id' => $idParent[$i],
                'level' => $levelCategory[$i],
            ]);
        }

        // enable foreign key constraints
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
