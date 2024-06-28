<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDeliverRequest;
use App\Models\Deliver;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;

class DeliverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    //        todo : fix math
    public function index()
    {
        $delivers = Deliver::with('order');
        $delivers = $delivers->where('user_id', '=', Auth::id())->where('isCanceled', '=' , false)->get();

        $delivers = $delivers->reject(function (Deliver $d){
            return $d->order->status === 4;
        })->sortBy('status');
        $page = \Illuminate\Support\Facades\Request::input('page');
        $count = $delivers->count();


        if ($count > 20){
            try {
                if ($page < 1)
                    return redirect()->route('deliver.index',['page'=> 1 ]);
                if (($page * 20) > $count){
                    return redirect()->route('deliver.index',['page'=> $count/20 ]);
                }
            } catch (\TypeError $e){
                return view('errors.404');
            }
            return view('deliver.index')->with(['delivers' => $delivers->forPage($page,20), 'numOfPages' => $count/20]);
        }
        return view('deliver.index')->with(['delivers' => $delivers, 'numOfPages' => 0]);
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
    public function store(Order $order, StoreDeliverRequest $request)
    {
        if ($request->token !== $order->token){
            $errors = [
                'token' => 'wrong token'
            ];
            if (empty($request->token))
                $errors = [
                    'token' => 'please type the token here or scan throw QR code'
                ];
            return redirect()->back()->withErrors($errors);
        }
        $count = 0;
        $delivers = Deliver::with('order')->where('user_id','=',Auth::id());
        foreach ($delivers as $del){
            $stat =  $del->order->status;
            if ($stat !== 5 && $stat !== 4){
                $count++;
            }
        }

        if ($count>=5){
            return redirect()->back()->withErrors(['over_orders' => true]);
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
        $order = $deliver->order;
        $status = $order->status;


        if ($status === 2 || $status === 3){
            if ($request['status'] === 'delayed')
                $order->status = 3;
            elseif ($request['status'] === 'done'){
                $order->status = 4;
            }
            else
                return '404';
        }
        $order->update();


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

    public function ongoing()
    {
        $delivers = Deliver::with('order');
        $delivers = $delivers->where('user_id', '=', Auth::id())->where('isCanceled', '=' , false)->get();
        $delivers = $delivers->filter(function (Deliver $d){
            return $d->order->status === 2 || $d->order->status === 3;
        });
        return view('deliver.index')->with(['delivers' => $delivers, 'numOfPages' => 0]);
    }

    public function canceled()
    {
        $delivers = Deliver::with('order');
        $delivers = $delivers->where('user_id', '=', Auth::id())->where('isCanceled', '=' , true)->get();
        return view('deliver.index')->with(['delivers' => $delivers, 'numOfPages' => 0]);
    }


    public function delayed()
    {
        $delivers = Deliver::with('order');
        $delivers = $delivers->where('user_id', '=', Auth::id())->where('isCanceled', '=' , false)->get();
        $delivers = $delivers->filter(function (Deliver $d){
            return $d->order->status === 3;
        });
        return view('deliver.index')->with(['delivers' => $delivers, 'numOfPages' => 0]);
    }
}
