<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Image;
use App\Product;

class ImagesController extends Controller
{
    /**
     * Remove the specified resource from storage.
     *
     * @param ImageBook $image image
     *
     * @return \Illuminate\Http\Response
    */
    public function destroy(Image $image)
    {
        try {
            $product = Product::with('images')->findOrFail($image->product_id);
            if (count($product->images) <= 1) {
                return response(trans('product.admin.edit.canot_delete_image'), 400);
            }
            $image->delete();
            unlink("images/products/".$image->image);
            return response()->json($image);
        } catch (Exception $e) {
            return response()->setStatusCode(400);
        }
    }
}
