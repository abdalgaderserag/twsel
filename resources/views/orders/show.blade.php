@extends('layout.main')

@section('headline')
    <div class="flex">
        <div>{{ $order->item }} :</div>
    </div>
@endsection


@section('main')
    <div style="width: 93%;margin-left: 3%;padding-bottom: 32px">
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
        <div class="section sec-pad">
            <div>
                <span>item :</span> {{ $order->item }}<br>
                <span>client :</span> {{ $order->user->name }}
            </div>
            <div>
                <span>contact :</span> {{ $order->contact }}<br>
                <span>location :</span> {{ $order->location }}
            </div>
        </div>

        <h4>client info :</h4>
        <div class="section sec-pad" style="margin-bottom: 42px">
            <span>client name :</span> {{ $order->user->name }}<br>
            <span>client contact :</span> {{ $order->user->contact }}
        </div>
        @if(auth()->user()->isDriver())
            {{ $order->token }}
            <form action="{{ route('deliver.store',$order->id) }}" method="post">
                @csrf
                @method('post')
                <label for="token">enter token :</label>
                <input class="input" style="@error('token')border-color: #e14c4c;@enderror" type="text" name="token" placeholder="@error('token'){{ $message }}@enderror">

                <button style="float: right" class="button button-g flex" type="submit">
                    <img src="{{ url('/images/hand.svg') }}">
                    <div style="padding: 1px 0 4px 12px">Deliver</div>
                </button>
            </form>
        @endif
    </div>
@endsection
