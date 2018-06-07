<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\ApiController;
use App\Product;
use App\Order;
use App\Http\Requests\SortApiProdctRequest;

class ProductController extends ApiController
{
    /**
     * index Product 
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SortApiProdctRequest $request)
    {
        $product = Product::with('category', 'images')
                        ->when(isset($request->sort_type), function ($query) use ($request) {
                            return $query->orderBy('created_at', $request->sort_type);
                        })
                        ->when(isset($request->limit), function ($query) use ($request) {
                            return $query->limit($request->limit);
                        })
                        ->when(isset($request->category), function ($query) use ($request) {
                            return $query->whereHas('category', function ($query) use($request){
                                $query->where('id', $request->category);
                            });
                        })->get();
        return $this->responseSuccess($product);
    }
}
