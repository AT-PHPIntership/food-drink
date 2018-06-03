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
    * @param \Illuminate\Http\Request $request request
    *
    * @return \Illuminate\Http\Response
    */
    public function index(Request $request)
    {
        $orders = Order::with('user');
        $search = $request->search;
        if ($search != '') {
            $orders = $orders->whereHas('user', function ($query) use ($search) {
                return $query->where('name', 'Like', "%$search%")
                            ->orWhere("email", 'Like', "%$search%");
            });
            $orders = $orders->paginate(config('define.number_page_products'))->appends(['search' => $search]);
        } else {
            $orders = $orders->paginate(config('define.number_page_products'));
        }
        return view('admin.order.index', compact('orders'));
    }
}
