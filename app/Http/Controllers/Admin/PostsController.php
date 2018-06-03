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
    * @param Http\Requests\Request $request request
    *
    * @return \Illuminate\Http\Response
    */
    public function index(Request $request)
    {
        $search = $request->search;
        if ($search != '') {
            $posts = Post::with('product')->whereHas('product', function ($query) use ($search) {
                return $query->where('name', 'Like', "%$search%")
                            ->orWhere("content", 'Like', "%$search%");
            });
            $posts = $posts->paginate(Post::PAGINATE)->appends(['search' => $search]);
        } else {
            $posts = Post::with('product')->paginate(Post::PAGINATE);
        }
        $status = Post::$listStatus;
        return view('admin.post.index', ['posts' => $posts, 'status' => $status]);
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
        $post = Post::findOrFail($request->id);
        $post->update(['status' => !$post->status]);
        return response()->json($post);
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
