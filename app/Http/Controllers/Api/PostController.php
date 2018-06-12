<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\ApiController;
use App\Post;
use App\Product;

class PostController extends ApiController
{
    
    /**
     * Get all product's post
     *
     * @param Product $id product's id
     *
     * @return Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts = Post::with('user.userInfo')->where('product_id', $id)->paginate(config('define.number_page_posts_user'));
        return $this->responsePaginate($posts);
    }
}
