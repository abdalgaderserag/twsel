<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $orders = Order::all();
        if ($user->isDriver()){
            $orders = $orders->where('status', '=', '1');
            return view('orders.index')->with('orders', $orders);
        }

        if ($user->isUser()){
            $orders = $orders->where('user_id', '=', $user->id);
            return view('orders.index')->with('orders', $orders);
        }
        if ($user->isAdmin()){
            return view('orders.index')->with('orders', $orders);
        }

        return '404';
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('orders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
        $user = Auth::user();
        $order = new Order($request->except('token'));
        $order['user_id'] = $user->id;
        $order->save();
        return $this->show($order);
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        return view('orders.show')->with('order',$order);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        $user = Auth::user();
        if ($order['user_id'] = $user->id){
            return view('orders.edit')->with('order', $order);
        }
        return '401';
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        $user = Auth::user();
        if ($user->id == $order['user_id']){
            $order->update($request->except('token'));
            $order->save();
            return view('orders.show')->with('order',$order);
        }
        return '404';
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $user = Auth::user();
        if ($user['id'] == $order['user_id']){
            $order->delete();
            return $this->index();
        }
        if ($user->isAdmin()){
            $order->delete();
            return $this->index();
        }
        return '404';
    }
}
