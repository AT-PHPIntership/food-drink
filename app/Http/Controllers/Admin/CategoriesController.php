<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Http\Requests\CategoryRequests;
use App\Http\Requests\SortCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Exceptions\LevelParentException;
use DB;

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
        if ($request->category_name) {
            $categories = Category::with('parentCategories')->search($request->category_name);
        } else {
            $categories = Category::with('parentCategories');
        }
        $categories = $categories->when(isset($request->sortBy) && isset($request->dir), function ($query) use ($request) {
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

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request  request
     * @param Category                 $category category object
     *
     * @return \Illuminate\Http\Response
    */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        try {
            $category->name = $request->name;
            if ($category->id != Category::DEFAULT_CATEGORY_FOOD && $category->id != Category::DEFAULT_CATEGORY_DRINK) {
                $parentLevel = Category::find($request->parent_id)->level;
                if ($category->level > $parentLevel) {
                    $category->parent_id = $request->parent_id;
                    $category->level = ++$parentLevel;
                } else {
                    throw new LevelParentException();
                }
            }
            $category->save();
            flash(trans('category.admin.message.success_edit'))->success();
        } catch (\Exception $e) {
            flash($e->getMessage())->error();
            return view('admin.category.edit', compact('category'));
        }
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category category object
     *
     * @return \Illuminate\Http\Response
    */
    public function destroy(Category $category)
    {
        DB::beginTransaction();
        try {
            Category::where('parent_id', '=', $category->id)
                ->update([
                    'parent_id' => $category->parent_id,
                    'level' => $category->level,
                ]);
            $category->delete();
            flash(trans('category.admin.message.success_delete'))->success();
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            flash(trans('category.admin.message.fail_delete'))->error();
        }
        return redirect()->route('category.index');
    }
}
