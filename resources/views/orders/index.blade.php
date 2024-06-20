@extends('layout.main')
@section('main')
    @if(empty($orders))
        looks like there is no items at the moment come back later!
    @else
    <div class="section" id="orders">
        <div class="item-row flex">
            <div class="item">
                Item
            </div>

            <div class="item item-wide">
                Delivery location
            </div>

            <div class="item center-text">
                status
            </div>

            <div class="item center-text">
                Actions
            </div>


            @if(auth()->user()->isAdmin())
                <form action="{{ route('orders.destroy',$order->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit"><img src="{{ url('/images/delete.svg') }}"></button>
                </form>
            @endif
        </div>

        @foreach($orders as $order)
            <div class="item-row flex">
                <div class="item">
                    <a href="{{ route('orders.show',$order->id) }}">{{ $order['item'] }}</a>
                </div>

                <div class="item item-wide">
                    <img src="{{ url('/images/location.svg') }}">{{ $order['location'] }}
                </div>

                <div class="item center-text">
                    @switch($order['status'])
                        @case(1)
                            <div class="status">waiting</div>
                            @break
                        @case(2)
                            <div>2</div>
                            @break
                    @endswitch
                </div>

                <div class="item center-text">
                    <a href="{{ route('orders.show',$order->id) }}">
                        <img src="{{ url('/images/info.svg') }}">
{{--                        <span>info</span>--}}
                    </a>
                    @if(auth()->user()->isDriver())
                        <a href="{{ route('deliver.store',$order->id) }}">
                            <img src="{{ url('/images/deliver.svg') }}">
{{--                            <span>deliver</span>--}}
                        </a>
                    @endif

                    @if(auth()->user()->isUser())

                        <a href="{{ route('orders.edit',$order->id) }}">
                            <img src="{{ url('/images/edit.svg') }}">
                        </a>
                        <form action="{{ route('orders.destroy',$order->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit"><img src="{{ url('/images/delete.svg') }}"></button>
                        </form>

                    @endif
                </div>


                @if(auth()->user()->isAdmin())
                    <form action="{{ route('orders.destroy',$order->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit"><img src="{{ url('/images/delete.svg') }}"></button>
                    </form>
                @endif
            </div>
        @endforeach
    </div>
    @endempty
@endsection
