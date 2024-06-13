@extends('layout.main')
@section('main')
    <style>
        span{
            font-weight: bold;
        }
        h4{
            font-weight: 100;
            margin: 26px 0 4px 0;
        }
    </style>
    <h1>{{ $order->name }} : </h1>
    <div class="card">
        <h4>order :</h4>
        <p>
            order #{{ $order->id }} by {{ $order->user->name }} {{ $order->item }} send to {{ $order->name }}
            the order is currently
            @if($order->status == 1)
                wating for driver
            @elseif($order->status == 2)
                on the way
            @elseif($order->status == 3)
                delyed
            @elseif($order->status == 4)
                delivered
            @elseif($order->status == 5)
                canceled
            @endif
        </p>
        <h4>order info :</h4>
        <div style="display: flex;justify-content: space-between">
            <div>
                <span>item :</span> {{ $order->item }}<br>
                <span>client :</span> {{ $order->name }}
            </div>
            <div>
                <span>contact :</span> {{ $order->contact }}<br>
                <span>location :</span> {{ $order->location }}
            </div>
        </div>
        <h4>shop info :</h4>
        <span>item :</span> {{ $order->user->name }}<br>
        <span>client :</span> {{ $order->user->contact }}
    </div>
@endsection
