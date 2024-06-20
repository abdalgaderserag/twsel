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
        <span>shop name :</span> {{ $order->user->name }}<br>
        <span>shop contact :</span> {{ $order->user->contact }}
        <br>
        <br>
        <br>
        <br>
        <div class="flex">
            @if($order->status != 4 && $order->status != 5)
                <form action="{{ route('deliver.update',$deliver->id) }}" method="post">
                    @csrf
                    @method('put')
                    <input class="button button-g" type="submit" value="done" name="status">
                </form>

                <form action="{{ route('deliver.update',$deliver->id) }}" method="post">
                    @csrf
                    @method('put')
                    <input class="button-clear" type="submit" value="delayed" name="status">
                </form>
            @endif
        </div>
    </div>
@endsection
