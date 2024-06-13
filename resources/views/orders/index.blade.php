@extends('layout.main')
@section('main')
    <div id="orders">
        <div>
            <h2 style="padding: 0 0 0 12px;cursor: default;">All orders :</h2>
        </div>
        @foreach($orders as $order)
            <div class="card" style="display: flex">
                <div style="display: flex;align-items: center;">
                    <a href="{{ route('orders.show',$order->id) }}">{{ $order['item'] }}</a>
                    <img src="/images/location.svg">{{ $order['location'] }}
                    {{ $order['status'] }}
                </div>
                @if(auth()->user()->isDriver())
                    <a href="{{ route('deliver.store',$order->id) }}">deliver</a>
                @endif

                @if(auth()->user()->isStore())
                    <div style="display: flex">
                        <a href="{{ route('orders.edit',$order->id) }}" class="button"><img src="/images/edit.svg"></a>
                        <form action="{{ route('orders.destroy',$order->id) }}" method="post">
                            @csrf
                            @method('delete')
{{--                            <input type="submit" value="img" class="button button-danger">--}}
                            <button type="submit"><img src="/images/delete.svg"></button>
                        </form>
                    </div>
                @endif


                @if(auth()->user()->isAdmin())
                    <form action="{{ route('orders.destroy',$order->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit"><img src="/images/delete.svg"></button>
                    </form>
                @endif
            </div>
        @endforeach
    </div>
@endsection
