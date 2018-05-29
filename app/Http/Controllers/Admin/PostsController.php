<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;

class PostsController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $posts = Post::paginate(Post::PAGINATE);
        return view('admin.post.index', ['posts'=>$posts]);
    }
    
    /**
     * Delete a post
     *
     * @param Post $post post
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        try {
            $post->delete();
            flash(trans('message.post.success_delete'))->success();
        } catch (Exception $e) {
            flash(trans('message.post.fail_delete'))->error();
        }
        return redirect()->route('admin.post.index');
    }
}
