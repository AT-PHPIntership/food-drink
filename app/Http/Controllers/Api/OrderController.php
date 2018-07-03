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
     * @param App\Http\Requests\CreateNoteRequest $request request
     *
     * @return \Illuminate\Http\Response
    */
    public function update(Order $order, CreateNoteRequest $request)
    {
        if ($order->user_id == Auth::id()) {
            try {
                $order->update([
                    'status' => Order::REJECTED,
                ]);
                $input['user_id'] = Auth::id();
                $input['order_id'] = $order->id;
                $input['content'] = $request->content;
                Note::create($input);
                return $this->responseDeleteSuccess(Response::HTTP_OK);
            } catch (Exception $e) {
                return response()->json();
            }
        }
        return $this->errorResponse(trans('login.user.unauthorised'), Response::HTTP_UNAUTHORIZED);        
    }
}
