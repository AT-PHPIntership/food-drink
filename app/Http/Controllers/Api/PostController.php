<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\ApiController;
use Symfony\Component\HttpFoundation\Response;
use App\Post;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Product;
use App\Http\Requests\Api\CreatePostRequest;
use App\Order;
use App\OrderDetail;

class PostController extends ApiController
{
    /**
     * Delete a post
     *
     * @param Post $post post
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if ($post->user_id == Auth::id()) {
            try {
                $post->delete();
                return $this->responseDeleteSuccess(Response::HTTP_OK);
            } catch (Exception $e) {
                return response()->json();
            }
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @param \App\Models\Product                  $product product of this post
     * @param \App\Http\Requests\CreatePostRequest $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Product $product, CreatePostRequest $request)
    {
        $user = Auth::user();
        $order = Order::where('user_id', $user->id)
                        ->where('status', Order::RECEIVED)
                        ->whereHas('orderDetails', function ($query) use ($product) {
                            $query->where('product_id', $product->id);
                        })->get();
        $input = $request->only('type', 'content');
        if ($input['type'] == Post::REVIEW) {
            if ($order->isEmpty()) {
                return $this->errorResponse(__('api.error_405'), Response::HTTP_METHOD_NOT_ALLOWED);
            }
            $input['rate'] = $request->rate;
        }
        $input['user_id'] = $user->id;
        $input['product_id'] = $product->id;
        $input['status'] = Post::DISABLE;
        $post = Post::create($input);
        $post = $post->load('user.userInfo');
        return $this->showOne($post, Response::HTTP_OK);
    }
}
