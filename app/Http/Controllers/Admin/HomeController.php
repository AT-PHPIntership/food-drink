<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Order;
use App\OrderDetail;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $lastweek = new Carbon('last week');
        $lastmonth = new Carbon('last month');
        $totalProduct = Product::count();
        $totalOrder = Order::where('status', Order::ACCEPTED)->count();
        $totalRevenue = Order::where('status', Order::ACCEPTED)->sum('total');
        $totalProductOrdered = OrderDetail::whereHas('order', function ($query) {
            $query->where('status', '=', Order::ACCEPTED);
        })->sum('quantity');
        $latestOrders = Order::with('user')->where('status', Order::ACCEPTED)->orderBy('orders.updated_at', 'desc')->limit(7)->get();
        $totalProductOrderedW = OrderDetail::whereHas('order', function ($query) {
            $query->where([
                ['status', '=', Order::ACCEPTED],
                ['updated_at', '>', new Carbon('last week')],
            ]);
        })->sum('quantity');
        $totalOrderedWeek = Order::where([
            ['status', Order::ACCEPTED],
            ['updated_at', '>', $lastweek],
        ])->count();
        $totalProductOrderedM = OrderDetail::whereHas('order', function ($query) {
            $query->where([
                ['status', '=', Order::ACCEPTED],
                ['updated_at', '>', new Carbon('last month')],
            ]);
        })->sum('quantity');
        $totalOrderedMonth = Order::where([
            ['status', Order::ACCEPTED],
            ['updated_at', '>', $lastmonth],
        ])->count();
        return view('admin.home.index', compact(
            'totalProduct',
            'totalOrder',
            'totalRevenue',
            'totalProductOrdered',
            'latestOrders',
            'totalProductOrderedW',
            'totalOrderedWeek',
            'totalProductOrderedM',
            'totalOrderedMonth'
        ));
    }
}
