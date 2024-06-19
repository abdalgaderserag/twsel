@extends('layout.main')
@section('main')
<h1>{{ $order->name }} : </h1>
    <div>
        <h4>order :</h4>
        <p>
            order <span>#{{ $order->id }}</span> by <span>{{ $order->user->name }}</span> to <span>{{ $order->item }}</span> send to <span>{{ $order->name }}</span>
            the order is currently
            <span>
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
            </span>
        </p>
        <h4>order info :</h4>
        <div>
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
        <span>shop name :</span> {{ $order->user->name }}<br>
        <span>shop contact :</span> {{ $order->user->contact }}<br><br>
        @if(auth()->user()->isDriver())
            <a href="{{ route('deliver.store',$order->id) }}">
                <img src="/images/hand.svg">
                <span>deliver</span>
            </a>
        @endif
    </div>
@endsection
