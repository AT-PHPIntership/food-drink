<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\ApiController;
use App\Category;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::where('level', Category::DEFAULT_VALUE)->with('children.children')->get();
        return $this->showAll($categories, Response::HTTP_OK);
    }
}
