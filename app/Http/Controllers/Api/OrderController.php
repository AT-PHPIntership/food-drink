<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\ApiController;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Order;
use App\OrderDetail;
use App\Product;
use PHPUnit\Framework\MockObject\Stub\Exception;
use App\Http\Requests\Api\SortOrderRequest;
use App\Http\Requests\Api\CreateNoteRequest;
use App\Note;
use DB;
use App\Http\Requests\Api\CreateOrderRequest;

class OrderController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SortOrderRequest $request)
    {
        $user = Auth::user();
        $orders = Order::with('notes')->where('user_id', $user->id)->sortable()->paginate($request->limit);
        $orders->appends(request()->query());
        return $this->successResponse($orders, Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param Order                    $order   order object
     * @param \Illuminate\Http\Request $request request
     *
     * @return \Illuminate\Http\Response
    */
    public function show(Order $order, SortOrderRequest $request)
    {
        $user = Auth::user();
        $orderDetails = [];
        if ($order->user_id == $user->id) {
            $orderDetails = $order->orderDetails()->paginate($request->limit);
            $orderDetails->appends(request()->query());
        }
        return $this->successResponse(['order_details' => $orderDetails, 'order' => $order], Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Order                          $order   order
     * @param App\Http\Requests\CreateNoteRequest $request request
     *
     * @return \Illuminate\Http\Response
    */
    public function cancel(Order $order, CreateNoteRequest $request)
    {
        DB::beginTransaction();
        $userId = Auth::id();
        if ($order->user_id == $userId) {
            try {
                $order->update([
                    'status' => Order::REJECTED,
                ]);
                $input['user_id'] = $userId;
                $input['order_id'] = $order->id;
                $input['content'] = $request->content;
                Note::create($input);
                $order->load('notes');
                DB::commit();
                return $this->successResponse($order, Response::HTTP_OK);
            } catch (Exception $e) {
                DB::rollBack();
                return $this->errorResponse(trans('errors.update_fail'), Response::HTTP_UNPROCESSABLE_ENTITY);
            }
        }
        return $this->errorResponse(trans('login.user.unauthorised'), Response::HTTP_UNAUTHORIZED);
    }
    
    /**
     * Api create order.
     *
     * @param \Illuminate\Http\Request $request request
     *
     * @return \Illuminate\Http\Response
    */
    public function store(CreateOrderRequest $request)
    {
        $input = $request->all();
        $input['status'] = Order::PENDING;
        $input['user_id'] = Auth::user()->id;
        $order = Order::create($input);
        foreach ($request->product as $product) {
            OrderDetail::create([
                'order_id' => $order->id,
                'product_id' => $product['id'],
                'quantity' => $product['quantity'],
                'price' => $product['price'],
                'name_product' => $product['name_product'],
                'image' => $product['image']
            ]);
        }
        return $this->showOne($order->load('orderDetails'), Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Order                          $order   order
     * @param App\Http\Requests\CreateNoteRequest $request request
     *
     * @return \Illuminate\Http\Response
    */
    public function update(Order $order, CreateOrderRequest $request)
    {
        if ($order->status == Order::PENDING) {
            try {
                $total = 0;
                $products = [];
                DB::beginTransaction();
                if ($request->product) {
                    foreach ($request->product as $product) {
                        $orderDetail = OrderDetail::where('order_id', $order->id)->where('product_id', $product['id'])->first();
                        if ($orderDetail) {
                            $orderDetail->update([
                                'quantity' => $product['quantity'],
                            ]);
                            $total += $product['quantity'] * $orderDetail->price;
                            array_push($products, $product);
                        }
                    }
                    OrderDetail::where('order_id', $order->id)->whereNotIn('product_id', array_pluck($request->product, 'id'))->delete();
                } else {
                    $order->update([
                        "status" => Order::REJECTED,
                    ]);
                }
                $order->update([
                    "address" => $request->address,
                    "total" => $total,
                ]);
                DB::commit();
                return $this->showOne($order->load('orderDetails'), Response::HTTP_OK);
            } catch (Exception $e) {
                DB::rollBack();
                return $this->errorResponse(trans('errors.update_fail'), Response::HTTP_UNPROCESSABLE_ENTITY);
            }
        }
        return $this->errorResponse(trans('errors.update_fail'), Response::HTTP_UNPROCESSABLE_ENTITY);
    }
}
