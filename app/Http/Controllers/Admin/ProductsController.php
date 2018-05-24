<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
            $product = Product::with('category', 'images')->paginate(config('define.number_page_products'));
        } else {
            $product = Product::search($productName)->with('Category')->paginate(config('define.number_page_products'));
        }
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
        // dd($product);
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
}
