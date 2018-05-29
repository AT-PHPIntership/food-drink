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
        $posts = DB::table('posts')
        ->select('id', 'user_id', 'product_id', 'content', 'rate', 'type', 'status')
        ->paginate(Post::PAGINATE);
        return view('admin.post.index', ['posts'=>$posts]);
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
    /**
     * Remove the specified resource from storage.
     *
     * @param int $post post
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        flash(trans('user.admin.message.success_delete'))->success();
        return redirect()->route('admin.post.index');
    }
}
