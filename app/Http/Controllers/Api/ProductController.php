<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\ApiController;
use App\Product;
use App\Order;
use App\Http\Requests\Api\SortApiProductRequest;
use App\Http\Requests\Api\SortApiPostRequest;
use Symfony\Component\HttpFoundation\Response;
use App\Post;

class ProductController extends ApiController
{
    /**
     * Display a doc of the resource.
     *
     * @param \Illuminate\Http\Request $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SortApiProductRequest $request)
    {
        $products = Product::with('category', 'images')
                    ->when(isset($request->price), function ($query) use ($request) {
                        return $query->where('price', '>=', $request->price);
                    })
                    ->when(isset($request->name), function ($query) use ($request) {
                        return $query->where('name', 'like', $request->name);
                    })
                    ->when(isset($request->category), function ($query) use ($request) {
                        return $query->whereHas('category', function ($query) use ($request) {
                                    $query->where('id', $request->category);
                        });
                    })->sortable()->paginate($request->limit);
        return $this->successResponse($products, Response::HTTP_OK);
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
        $product = $product->load('images', 'category');
        return $this->showOne($product, Response::HTTP_OK);
    }
    
    /**
     * Get all product's post
     *
     * @param \Illuminate\Http\Request $request request
     * @param Product                  $product Product object
     *
     * @return Illuminate\Http\Response
     */
    public function getPosts(SortApiPostRequest $request, Product $product)
    {
        $posts = $product->posts()->with('user.userInfo');
        if (isset($request->type)) {
            $posts = $posts->where('type', $request->type);
        }
        $posts = $posts->sortable()->paginate(config('define.number_page_posts_user'));
        $posts->appends(request()->query());
        return $this->successResponse($posts, Response::HTTP_OK);
    }
}
