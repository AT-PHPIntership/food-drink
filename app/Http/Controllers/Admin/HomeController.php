<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Order;
use App\OrderDetail;
use Carbon\Carbon;
use DB;

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
        $latestOrders = Order::with('user')->where('status', Order::PENDING)->orderBy('orders.updated_at', 'desc')->limit(Order::LATEST_ORDERS)->get();
        $totalProductOrdered = OrderDetail::whereHas('order', function ($query) {
            $query->where('status', '=', Order::ACCEPTED);
        })->sum('quantity');
        $totalWeek = Order::select(DB::raw("count(orders.id) as count_order"), DB::raw("sum(order_details.quantity) as sum_quantity_product"))
                    ->join('order_details', 'orders.id', '=', 'order_details.order_id')
                    ->where([
                        ['orders.status', '=', Order::ACCEPTED],
                        ['orders.updated_at', '>', $lastweek],
                    ])->first();
        $totalMonth = Order::select(DB::raw("count(orders.id) as count_order"), DB::raw("sum(order_details.quantity) as sum_quantity_product"))
                    ->join('order_details', 'orders.id', '=', 'order_details.order_id')
                    ->where([
                        ['orders.status', '=', Order::ACCEPTED],
                        ['orders.updated_at', '>', $lastmonth],
                    ])->first();
        return view('admin.home.index', compact(
            'totalProduct',
            'totalOrder',
            'totalRevenue',
            'totalProductOrdered',
            'latestOrders',
            'totalWeek',
            'totalMonth'
        ));
    }
}
