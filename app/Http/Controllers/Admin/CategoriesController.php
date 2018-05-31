<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Http\Requests\CategoryRequests;

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

    /**
     * Show the form for creating a new data.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nameCategories = Category::get(['id', 'name']);
        return view('admin.category.create', compact('nameCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request get request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequests $request)
    {
        try {
            Category::create($request->all());
            flash(trans('category.admin.message.success_create'))->success();
        } catch (Exception $e) {
            flash(trans('category.admin.message.fail_create'))->error();
        }
        return redirect()->route('category.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category category oj
     *
     * @return \Illuminate\Http\Response
    */
    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }
}
