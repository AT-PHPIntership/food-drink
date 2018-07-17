<?php

namespace App\Traits;

use App\Category;

trait FilterTrait
{
    /**
     * Make to array category id
     *
     * @param id $id id of category
     *
     * @return array category id
     */
    public function arrayCategoryId($id)
    {
        $category = Category::where('id', $id)->first();
        $categoryAll = $category->children()->with('children')->get();
        $categoriesId = array();
        array_push($categoriesId, $id);
        foreach ($categoryAll as $key => $value) {
            array_push($categoriesId, $value->id);
            foreach ($value->children as $key => $value) {
                array_push($categoriesId, $value->id);
            }
        }
        return $categoriesId;
    }
}
