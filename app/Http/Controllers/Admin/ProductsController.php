<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProductRequest;
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
        if ($productName == null) {
            $product = Product::with('category', 'images')->paginate(config('define.number_page_products'));
        } else {
            $product = Product::search($productName)->with('category', 'images')->paginate(config('define.number_page_products'));
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
        $category = Category::all();
        return view('admin.product.create', compact('category'));
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
        DB::transaction(function () use ($request) {
            // $data = $request->all();
            $product = Product::create($request->except(['image']));
            if ($request->hasFile('image')) {
                    // $image =$request->file('image');
                foreach ($request->file('image') as $image) {
                    $nameNew = time().'_'.md5(rand(0, 99999)).'.'.$image->getClientOriginalExtension();
                    $image->move(public_path(config('define.images_path_products')), $nameNew);
                    // Image::create([
                    //     'product_id' => $product->id,
                    //     'image' => $nameNew
                    // ]);
                    Image::where('product_id', $product->id)->create([
                        'product_id' => $product->id,
                        'image' => $nameNew
                    ]);
                }
            }
        });
        
        flash(trans('message.product.create'))->success();
        return redirect()->route('product.index');
    }
}
