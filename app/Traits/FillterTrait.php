<?php 
namespace App\Traits;

use Illuminate\Http\Request;
use App\Category;

Trait FillterTrait 
{
    /**
     * make to array category id 
     *
     * @param \Illuminate\Http\Request $request request
     *
     * @return array category id
     */
    public function ArryCategory($request)
    {
        $category_all = Category::where('id', $request->category)->first();
        $category_relation = $category_all->children()->with('children')->get();
        $categories_id = array();
        array_push($categories_id, $request->category);
        foreach ($category_relation as $key => $value) {
            array_push($categories_id, $value->id);
            foreach ($value->children as $key => $value) {
                    array_push($categories_id, $value->id);
            }
        }
        return $categories_id;
    }
}
