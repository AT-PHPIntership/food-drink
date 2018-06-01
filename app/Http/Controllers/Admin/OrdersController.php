<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ChangeStatusRequest;
use Symfony\Component\HttpFoundation\Response;
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
    public function updateStatus(ChangeStatusRequest $request, Order $order)
    {
        try {
            $order['status'] = $request->status;
            $order->save();
            return response()->json($order);
        } catch (Exception $e) {
            return response(trans('message.post.fail_delete'), Response::HTTP_BAD_REQUEST);
        }
    }
}
