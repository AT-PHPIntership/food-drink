<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;

class OrderController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        return view('user.order.index');
    }

    /**
     * Show the form for creating a new data.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.order.create');
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
        return view('user.order.show', $order);
    }
}
