<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Image;

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
            $image->delete();
            return response()->json($image);
        } catch (Exception $e) {
            return response()->setStatusCode(400);
        }
    }
}
