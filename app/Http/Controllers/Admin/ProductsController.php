<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;

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
        $product = Product::search($productName)->with('Category')->paginate(config('define.number_page_products'));
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
}
