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
        if ($request->category_name == ' ') {
            $categories = Category::with('parentCategories')->where('name', '%'.$request->category_name.'%')->paginate(config('define.number_pages'));
            return view('admin.category.index', compact('categories'));
        } else {
            $categories = Category::with('parentCategories')->search($request->category_name)->paginate(config('define.number_pages'));
            return view('admin.category.index', compact('categories'));
        }
    }
}
