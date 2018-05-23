<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categoryName = $request->category_name;
        $categories = Category::with('parentCategories')->search($categoryName)->paginate(config('define.number_pages'));
        return view('admin.category.index', compact('categories'));
    }
}
