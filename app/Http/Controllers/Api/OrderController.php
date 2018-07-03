<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\ApiController;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Order;
use PHPUnit\Framework\MockObject\Stub\Exception;
use App\Http\Requests\Api\SortOrderRequest;
use App\Http\Requests\Api\CreateNoteRequest;
use App\Note;
use DB;

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
        $orders = Order::with('note')->where('user_id', $user->id)->sortable()->paginate($request->limit);
        $orders->appends(request()->query());
        return $this->successResponse($orders, Response::HTTP_OK);
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
        $user = Auth::user();
        $order = $order->load('orderDetails');
        $orderDetails = [];
        if ($order->user_id == $user->id) {
            $orderDetails = $order->orderDetails;
        }
        return $this->showAll($orderDetails, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Order                          $order   order
     * @param App\Http\Requests\CreateNoteRequest $request request
     *
     * @return \Illuminate\Http\Response
    */
    public function update(Order $order, CreateNoteRequest $request)
    {
        $userId = Auth::id();
        if ($order->user_id == $userId) {
            DB::beginTransaction();
            try {
                $order->update([
                    'status' => Order::REJECTED,
                ]);
                $input['user_id'] = $userId;
                $input['order_id'] = $order->id;
                $input['content'] = $request->content;
                Note::create($input);
                $order->load('note');
                return $this->successResponse($order, Response::HTTP_OK);
                DB::commit();
            } catch (Exception $e) {
                DB::rollBack();
                return response()->json();
            }
        }
        return $this->errorResponse(trans('login.user.unauthorised'), Response::HTTP_UNAUTHORIZED);
    }
}
