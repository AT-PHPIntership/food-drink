<?php
namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Category;

class NameCategoryComposer
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
        $nameCategories = Category::all();
        $view->with('nameCategories', $nameCategories);
    }
}
