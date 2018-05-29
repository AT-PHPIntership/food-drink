<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProductRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Product;
use App\Category;
use App\Image;
use DB;

class ProductsController extends Controller
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
        $productName = $request->product_name;
        $product = Product::with('category', 'images');
        if ($productName) {
            $product = $product->search($productName);
        }
        $product = $product->paginate(config('define.number_page_products'));
        return view('admin.product.index', compact('product'));
    }

    /**
     * Display the specified resource.
     *
     * @param Product $product Product object
     *
     * @return \Illuminate\Http\Response
    */
    public function show(Product $product)
    {
        $product->load('category', 'images');
        return view('admin.product.show', compact('product'));
    }

    /**
     * Show the form for creating a new data.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductRequest  $request)
    {
        DB::beginTransaction();
        try {
            $product = Product::create($request->all());
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $nameNew = time().'_'.md5(rand(0, 99999)).'.'.$image->getClientOriginalExtension();
                    $image->move(public_path(config('define.images_path_products')), $nameNew);
                    Image::create([
                        'product_id' => $product->id,
                        'image' => $nameNew
                    ]);
                }
            }
            DB::commit();
        } catch (Exception $e) {
            flash(trans('message.product.fail_create'))->success();
            DB::rollBack();
        }
        flash(trans('message.product.success_create'))->success();
        return redirect()->route('product.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Product $product product object
     *
     * @return \Illuminate\Http\Response
    */
    public function edit(Product $product)
    {
        $product->load('images');
        return view('admin.product.edit', compact('product'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param product $product product object
     *
     * @return \Illuminate\Http\Response
    */
    public function destroy(Product $product)
    {
        try {
            $product->delete();
            flash(trans('message.product.success_delete'))->success();
        } catch (ModelNotFoundException $e) {
            flash(trans('message.product.fail_delete'))->success();
        }
        return redirect()->route('product.index');
    }
}
