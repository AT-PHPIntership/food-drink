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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::with('parentCategories')->paginate(config('define.number_pages'));
        return view('admin.category.index', compact('categories'));
    }
    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $categoryName = $request->category_name;
        if ($request->category_name == '') {
            $categories = Category::with('parentCategories')->where('name', '%'.$categoryName.'%')->paginate(config('define.number_pages'));
        } else {
            $categories = Category::with('parentCategories')->search($categoryName)->paginate(config('define.number_pages'));
        }
        return view('admin.category.index', compact('categories'));
    }
}
