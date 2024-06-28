@extends('layout.main')

@section('headline')
    <div class="flex">
        <div>{{ $order->item }} :</div>
    </div>
@endsection



@section('main')

    <div class="card" style="padding: 0 3%">
        <h4>order :</h4>
        <p>
            order <span>#{{ $order->id }}</span> by <span>{{ $order->user->name }}</span>
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
        <div class="section sec-pad">
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
        <div class="section sec-pad" style="margin-bottom: 42px">
            <span>shop name :</span> {{ $order->user->name }}<br>
            <span>shop contact :</span> {{ $order->user->contact }}
        </div>

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
