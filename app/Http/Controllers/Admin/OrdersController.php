<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $orders = Order::with('user')->paginate(config('define.number_page_products'));
        return view('admin.order.index', compact('orders'));
    }

        /**
     * Update status of order
     *
     * @param \Illuminate\Http\Request $request request
     * @param \App\Models\order        $order   order
     *
     * @return \Illuminate\Http\Response
     */
    public function updateStatus(Request $request, Order $order)
    {
        $order['status'] = $request->status;
        // dd($order['status']);
        $order->save();
        return response()->json($order);
    }
}
