@extends('user.layout.main')
<?php
$user = \Illuminate\Support\Facades\Auth::user();
?>

@section('main')
    <div>
        <h4>order :</h4>
        <p>
            order <span>#{{ $order->id }}</span> by <span>{{ $order->user->name }}</span> which is <span>{{ $order->item }}</span> send to <span>{{ $order->location }}</span>
            from <span>{{ $order->pickup }}</span>
            the order is currently
            <span>
                @if($order->status === 1)
                    wating for driver
                @elseif($order->status === 2)
                    on the way
                @elseif($order->status === 3)
                    delyed
                @elseif($order->status === 4)
                    delivered
                @elseif($order->status === 5)
                    canceled
                @endif
            </span>
        </p>


        <h4>order info :</h4>
        <div>
            <div>
                <span>item :</span> {{ $order->item }}<br>
                <span>client :</span> {{ $order->user->name }}
            </div>
            <div>
                <span>contact :</span> {{ $order->contact }}<br>
                <span>location :</span> {{ $order->location }}
            </div>
        </div>
        @if(!empty($order->deliver))
        <h4>driver info :</h4>
        <div style="margin-bottom: 42px">
            <span>driver name :</span> <a href="{{ route('profile',$order->deliver->user->username) }}">{{ $order->deliver->user->name }}</a><br>
            <span>driver contact :</span> {{ $order->deliver->user->contact }}
        </div>
        @endif
        @if(auth()->id() == $order->user->id)
            <div>
                <h4>token :</h4>
                <div>
                    {{ $order->token }}
                </div>
                <div>
{{--                    {{ // TODO : generate QR image here }}--}}
                </div>
            </div>
            <br>
            <div class="flex" style="justify-content: start">
                <button onclick="location.href='{{ route('orders.edit',$order->id) }}'" class="green flex" style="padding: 6px 3% 6px 2%;">
                    <img src="{{ url('/images/edit.svg') }}">
                    Edit
                </button>
                @if($order->status === 1)
                    <form action="{{ route('orders.destroy', $order->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" style="background-color: inherit;color: inherit;box-shadow: none">
                            Delete Order
                        </button>
                    </form>
                @endif
            </div>
        @endif
    </div>
@endsection
