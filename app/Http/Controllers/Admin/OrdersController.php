<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ChangeStatusRequest;
use Symfony\Component\HttpFoundation\Response;
use App\Order;
use App\OrderDetail;
use App\Mail\ChangeStatusOrderMail;

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
            $orders = $orders->sortable()->paginate(config('define.number_page_products'))->appends(['search' => $search]);
        } else {
            $orders = Order::with('user')->sortable()->paginate(config('define.number_page_products'));
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
            $data = ['name' => $order->user->name,
                'status' => $request->status,
                'pending' => $order::PENDING,
                'accepted' => $order::ACCEPTED,
                'rejected' => $order::REJECTED,
            ];
            \Mail::to($order->user->email)->send(new ChangeStatusOrderMail($data));
            return response()->json($order);
        } catch (Exception $e) {
            return response(trans('message.post.fail_delete'), Response::HTTP_BAD_REQUEST);
        }
    }
}
