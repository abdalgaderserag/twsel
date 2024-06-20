<?php

namespace App\Http\Controllers;

use App\Models\Deliver;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeliverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $delivers = Deliver::with('order')
            ->where('user_id', '=', Auth::id())
            ->where('isCanceled', '=' , false)->get();
        return view('deliver.index')->with('delivers', $delivers);
//        return view('deliver.index')->with('orders', $orders);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Order $order)
    {
        $user = Auth::user();
        $count = 0;

        foreach ($user->delivers as $del){
            if ($del->order['status'] !== 5 || $del->order['status'] !== 4){
                $count++;
            }
        }

        if ($count>=5){
            return redirect()->back()->with('over_orders',true);
        }

        if ($order['status'] == 1){
            $deliver = new Deliver();
            $deliver['user_id'] = Auth::id();
            $deliver['order_id'] = $order->id;
            $deliver->save();
            $order['status'] = 2;
            $order->save();
            return redirect()->route('deliver.show',$deliver->id);
        }
        return 404;
    }

    /**
     * Display the specified resource.
     */
    public function show(Deliver $deliver)
    {
        return view('deliver.show')->with(['order'=>$deliver->order,'deliver' => $deliver]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Deliver $deliver)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Deliver $deliver)
    {
        $status = $deliver->order->status;


        if ($status === 2 || $status === 3 || $status === 4){
            if ($request['status'] === 'delayed')
                $deliver->order->status = 3;
            elseif ($request['status'] === 'done'){
                $deliver->order->status = 4;
            }
            else
                return '404';
            $deliver->order->save();
        }
        return redirect()->route('deliver.show',$deliver->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Deliver $deliver)
    {
        $deliver->order->status = 5;
        $deliver->order->save();
        $deliver->isCanceled = true;
        $deliver->save();
        return redirect()->route('deliver.index');
    }
}
