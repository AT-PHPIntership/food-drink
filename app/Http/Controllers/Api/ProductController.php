<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\ApiController;
use App\Product;
use App\Order;

class ProductController extends ApiController
{
    private $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * Get top 10 latest product
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fields = [
            'name',
            'image',
            'avg_rate',
            'price',
            'product_id',
            'products.created_at'
        ];
        $topNewProduct = Product::join('images', 'products.id', '=', 'images.product_id')
                        ->distinct('product_id')
                        ->select($fields)
                        ->orderBy('products.created_at', 'DESC')
                        ->limit(10)->get();
        return $this->responseSuccess($topNewProduct);
    }

    /**
     * Get top 10 rate highest product
     *
     * @return \Illuminate\Http\Response
     */
    public function topRate()
    {
        
        $fields = [
            'name',
            'image',
            'avg_rate',
            'price'
        ];
        $toprateProduct = Product::join('images', 'products.id', '=', 'images.product_id')
                        ->select($fields)
                        ->orderBy('avg_rate', 'DESC')
                        ->limit(10)->get();
        return $this->responseSuccess( $toprateProduct);
    }

    /**
     * Get top 3 product orderd
     *
     * @return \Illuminate\Http\Response
     */
    public function topProductOrdered()
    {
        $fields = [
            'name_product',
            'image',
            'price'
        ];
        $rateProduct = Order::join('order_details', 'orders.id', '=', 'order_details.order_id')
                        ->select($fields)
                        ->orderBy('orders.updated_at', 'DESC')
                        ->limit(3)->get();
        return response()->json(['data' => $rateProduct, 200]);
    }
}
