<?php
namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Category;

class CategoryComposer
{
    /**
     * Bind data to the view.
     *
     * @param View $view vategory
     *
     * @return void
    */
    public function compose(View $view)
    {
        $categories = Category::all();
        $view->with('categories', $categories);
    }
}
