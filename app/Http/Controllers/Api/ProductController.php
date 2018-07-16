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
use App\Category;
use App\Traits\FillterTrait;

class ProductController extends ApiController
{
    use FillterTrait;
    /**
     * Display a doc of the resource.
     *
     * @param \Illuminate\Http\Request $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SortApiProductRequest $request)
    {
        $categories_id = 0;
        if ($request->category) {
            $categories_id = $this->ArryCategory($request);
        }
        $products = Product::with('category', 'images')
                    ->when(isset($request->min_price) && isset($request->max_price), function ($query) use ($request) {
                        $query->where('price', '>=', $request->min_price);
                        $query->where('price', '<=', $request->max_price);
                    })
                    ->when(isset($request->rate), function ($query) use ($request) {
                        return $query->whereBetween('avg_rate', [round($request->rate)-0.5, round($request->rate)+0.4]);
                    })
                    ->when(isset($request->name), function ($query) use ($request) {
                        return $query->where('name', 'like', '%'.$request->name.'%');
                    })
                    ->when(isset($request->category), function ($query) use ($request,  $categories_id) {
                        return $query->whereHas('category', function ($query) use ($request, $categories_id) {
                            $query->whereIn('id', $categories_id);
                        });
                    })->sortable()->paginate($request->limit);
        $products->appends(request()->query());
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
        $posts = $product->posts()->with('user.userInfo')
                ->when(isset($request->status), function ($query) use ($request) {
                    return $query->where('status', '=', $request->status);
                })
                ->when(isset($request->type), function ($query) use ($request) {
                    return $query->where('type', '=', $request->type);
                })
                ->sortable()->paginate(config('define.number_page_posts_user'));
        $posts->appends(request()->query());
        return $this->successResponse($posts, Response::HTTP_OK);
    }
}
