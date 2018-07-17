<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;

class ProductController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        return view('user.product.index');
    }

    /**
     * Show view detail product
     *
     * @param Product $product product
     *
     * @return view
     */
    public function show(Product $product)
    {
        return view('user.product.show', $product);
    }

    /**
     * Go to view compare product
     *
     * @return view
     */
    public function compare()
    {
        return view('user.product.compare');
    }
}
