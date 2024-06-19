@extends('layout.main')
@section('main')
    <div id="orders">
        <div>
            <h2>All orders :</h2>
        </div>
        @foreach($orders as $order)
            <div>
                <div>
                    <a href="{{ route('orders.show',$order->id) }}">{{ $order['item'] }}</a>
                    <img src="/images/location.svg">{{ $order['location'] }}
                    {{ $order['status'] }}
                </div>
                <div>
                    <a href="{{ route('orders.show',$order->id) }}">
                        <img src="/images/info.svg">
                        <span>info</span>
                    </a>
{{--                    @if(auth()->user()->isDriver())--}}
{{--                        <a href="{{ route('deliver.store',$order->id) }}" style="display: flex;align-items: center;background-color: white">--}}
{{--                            <img src="/images/hand.svg">--}}
{{--                            <span style="margin: 0 0 0 8px">deliver</span>--}}
{{--                        </a>--}}
{{--                    @endif--}}

                    @if(auth()->user()->isStore())

                        <a href="{{ route('orders.edit',$order->id) }}">
                            <img src="/images/edit.svg">
                        </a>
                        <form action="{{ route('orders.destroy',$order->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit"><img src="/images/delete.svg"></button>
                        </form>

                    @endif
                </div>


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
