<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\OrderDetail;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $orders = Order::with('user')->paginate(config('define.number_page_orders'));
        return view('admin.order.index', compact('orders'));
    }

    /**
     * Display the specified resource.
     *
     * @param Order $order order object
     *
     * @return \Illuminate\Http\Response
    */
    public function show(Order $order)
    {
        $order->load('orderDetails', 'user.userInfo');
        $orderDetail = $order->orderDetails;
        // dd($order);
        return view('admin.order.show', compact('orderDetail', 'order'));
    }
}
