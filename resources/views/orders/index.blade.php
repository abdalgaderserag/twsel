@extends('layout.main')
@section('main')
    <div id="orders">
        @foreach($orders as $order)
            <div class="card">
                <a href="{{ route('orders.show',$order->id) }}">{{ $order['id'] }}</a>
                {{ $order['item'] }}
                {{ $order['name'] }}
                {{ $order['location'] }}
                {{ $order['status'] }}
                @if(auth()->user()->isDriver())
{{--                    <a href="{{ route('order.deliver',$order->id) }}">deliver</a>--}}
                @endif

                @if(auth()->user()->isStore())
                    <a href="{{ route('orders.edit',$order->id) }}">edit</a>
                    <form action="{{ route('orders.destroy',$order->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" value="delete">
                    </form>
                @endif


                @if(auth()->user()->isAdmin())
                    <form action="{{ route('orders.destroy',$order->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" value="delete">
                    </form>
                @endif
            </div>
        @endforeach
    </div>
@endsection
