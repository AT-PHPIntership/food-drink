<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\ApiController;
use Symfony\Component\HttpFoundation\Response;
use App\Post;
use App\User;
use Illuminate\Support\Facades\Auth;

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
}
