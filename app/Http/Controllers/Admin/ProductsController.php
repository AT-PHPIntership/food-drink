<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Product;

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
        if ($productName == null) {
            $product = Product::with('Category')->paginate(config('define.number_page_products'));
        } else {
            $product = Product::search($productName)->with('Category')->paginate(config('define.number_page_products'));
        }
        return view('admin.product.index', compact('product'));
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
