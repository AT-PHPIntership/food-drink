<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
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
        $getPosts = DB::table('posts')
        ->select('id','user_id','product_id','content','rate','type','status')
        ->paginate(5);
        return view('admin.post.index', ['getPosts'=>$getPosts]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function active(Request $request)
    {
        $post = Post::findOrFail($request->idPost);
        $post->update(['status' => !$post->status]);
        return response()->json([
            "status" => true,
            "html" => view("admin.post._ajaximg", ['post'=>$post])->render(),
        ]);
    }
}
