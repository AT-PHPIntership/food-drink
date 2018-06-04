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
    * @param \Illuminate\Http\Request $request request
    *
    * @return \Illuminate\Http\Response
    */
    public function index(Request $request)
    {
        $search = $request->search;
        if ($search != '') {
            $orders = Order::with('user')->whereHas('user', function ($query) use ($search) {
                return $query->where('name', 'Like', "%$search%")
                            ->orWhere("email", 'Like', "%$search%");
            });
            $orders = $orders->paginate(config('define.number_page_products'))->appends(['search' => $search]);
        } else {
            $orders = Order::with('user')->paginate(config('define.number_page_products'));
        }
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
        return view('admin.order.show', compact('order'));
    }
}
