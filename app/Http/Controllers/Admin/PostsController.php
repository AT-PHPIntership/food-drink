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
        $data['getPosts'] = Post::all();
        return view('admin.post.index', $data);
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
        $idPost = Post::find($request->idPost);
        if ($idPost->status == 0) {
            $data['getPost'] = DB::table('posts')
                ->where('id', $idPost->id)
                ->update(['status' => 1]);
        } else {
            $data['getPost'] = DB::table('posts')
                ->where('id', $idPost->id)
                ->update(['status' => 0]);
        }
        $data['getPost'] = DB::table('posts')->where('id', $idPost->id)->first();
        return response()->json([
            "status" => true,
            "html" => view("admin.post._ajaximg", $data)->render(),
        ]);
    }
}
