<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use Illuminate\Http\Request\CategoryRequest;

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
        $categories = Category::with('parentCategories');
        if ($request->category_name) {
            $categories = $categories->search($request->category_name);
        }
        $categories = $categories->paginate(config('define.number_pages'));
        return view('admin.category.index', compact('categories'));
    }
}
