<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
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
            $product = $product->search($productName)->when(isset($request->sortBy) && isset($request->dir), function ($query) use ($request) {
                return $query->orderBy($request->sortBy, $request->dir);
            });
        }
        $product = $product->when(isset($request->sortBy) && isset($request->dir), function ($query) use ($request) {
            return $query->orderBy($request->sortBy, $request->dir);
        })->paginate(config('define.number_page_products'))->appends(request()->query());
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
            flash(trans('message.product.fail_create'))->error();
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
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request request
     * @param Product                  $product product object
     *
     * @return \Illuminate\Http\Response
    */
    public function update(UpdateProductRequest $request, Product $product)
    {
        DB::beginTransaction();
        try {
            $arrIdImage = preg_split("/[,]/", $request->delImg);
            $product->update($request->all());
            if ($request->hasFile('images')) {
                foreach (request()->file('images') as $image) {
                    $nameNew = time().'_'.md5(rand(0, 99999)).'.'.$image->getClientOriginalExtension();
                    $image->move(public_path(config('define.images_path_products')), $nameNew);
                    Image::create([
                        'product_id' => $product->id,
                        'image' => $nameNew
                    ]);
                }
            }
            if ($request->delImg != null) {
                foreach ($arrIdImage as $i) {
                    $nameImage = Image::find($i)->image;
                    unlink("images/products/".$nameImage);
                }
                Image::whereIn('id', $arrIdImage)->where('product_id', $product->id)->delete();
            }
            $product->update($request->all());
            DB::commit();
        } catch (Exception $e) {
            flash(trans('message.product.fail_update'))->error();
            DB::rollBack();
        }
        flash(trans('message.product.success_update'))->success();
        return redirect()->route('product.index');
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
            flash(trans('message.product.fail_delete'))->error();
        }
        return redirect()->route('product.index');
    }
}
