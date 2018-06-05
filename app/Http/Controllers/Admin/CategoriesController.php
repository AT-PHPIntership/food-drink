<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Http\Requests\CategoryRequests;
use App\Http\Requests\SortCategoryRequest;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SortCategoryRequest $request)
    {
        if ($request->category_name) {
            $categories = Category::with('parentCategories')->search($request->category_name)->when(isset($request->sortBy) && isset($request->dir), function ($query) use ($request) {
                return $query->orderBy($request->sortBy, $request->dir);
            });
        }
        $categories = Category::with('parentCategories')->when(isset($request->sortBy) && isset($request->dir), function ($query) use ($request) {
                        return $query->orderBy($request->sortBy, $request->dir);
        })->paginate(config('define.number_pages'));
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
     * @param Category $category category object
     *
     * @return \Illuminate\Http\Response
    */
    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }
}
