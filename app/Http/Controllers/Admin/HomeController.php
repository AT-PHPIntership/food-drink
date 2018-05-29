<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Order;
use App\OrderDetail;

class HomeController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $totalProduct = Product::count();
        $totalOrder = Order::where('status', 2)->count();
        $totalRevenue = Order::where('status', 2)->sum('total');
        $totalProductOrderd = OrderDetail::whereHas('order', function ($query) {
            $query->where('status', '=', 2);
        })->sum('quantity');
        return view('admin.home.index', compact('totalProduct', 'totalOrder', 'totalRevenue', 'totalProductOrderd'));
    }
}
