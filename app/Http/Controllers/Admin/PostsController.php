<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\User;
use App\Product;

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
            $posts = Post::with('product', 'user')->whereHas('product', function ($query) use ($search) {
                return $query->where('name', 'Like', "%$search%")
                            ->orWhere("content", 'Like', "%$search%");
            });
            $posts = $posts->sortable()->paginate(Post::PAGINATE)->appends(['search' => $search]);
        } else {
            $posts = Post::with('product', 'user')->sortable()->paginate(Post::PAGINATE);
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
        $product = Product::find($post->product_id);
        $post->update(['status' => !$post->status]);
        if ($post->status == Post::ENABLE) {
            $product->update([
                "avg_rate" => ($post->rate + $product->total_rate)/($product->sum_rate + 1),
                "sum_rate" => $product->sum_rate + 1,
                "total_rate" => $post->rate + $product->total_rate,     
            ]);
        } elseif ($post->status == Post::DISABLE) {
            $product->update([
               "avg_rate" => ($product->total_rate - $post->rate)/($product->sum_rate - 1),
                "sum_rate" => $product->sum_rate - 1,
                "total_rate" => $product->total_rate - $post->rate,     
            ]);
        }
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
