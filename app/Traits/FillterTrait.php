<?php

namespace App\Traits;

use App\Category;

trait FillterTrait
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
        $categoryAll = Category::where('id', $id)->first();
        $categoryRelation = $categoryAll->children()->with('children')->get();
        $categoriesId = array();
        array_push($categoriesId, $id);
        foreach ($categoryRelation as $key => $value) {
            array_push($categoriesId, $value->id);
            foreach ($value->children as $key => $value) {
                    array_push($categoriesId, $value->id);
            }
        }
        return $categoriesId;
    }
}
