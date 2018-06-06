<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\ApiResponse;

class ApiController extends Controller
{
    use ApiResponse;

     /**
     * Construct parent Controller
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth:api');
    }
}