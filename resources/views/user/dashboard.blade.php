@extends('user.layout.main')
<?php
    $user = \Illuminate\Support\Facades\Auth::user();
?>

@section('main')

    @if($ongoing->count() > 0)
    <div class="header">
        On the way :
    </div>
    <div class="orders">
        @foreach($ongoing as $order)
        <div class="order-card flex">
            <div class="card-info">
                <a href="{{ route('profile',$order->deliver->user->username) }}">
                    <img src="{{ url($order->deliver->user->image) }}">
                </a>
                <div>
                    <a href="{{ route('profile',$order->deliver->user->username) }}">
                        {{ $order->deliver->user->name }}
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="card-text">
                    <div>
                        Hi {{ $user->name }}. I am {{ $order->deliver->user->name }} your delivery guy for today!
                    </div>

                    <div>
                        I am currently delivering your {{ $order->item }}
                        from {{ $order->pickup }} to {{ $order->location }}
                    </div>

                    <div>
                        feel free to contact me at +{{ $order->deliver->user->contact }}
                    </div>
                </div>
                <div style="margin-top: 52px">
                    <a href="{{ route('orders.show',$order->id) }}">
                        <button class="green">view</button>
                    </a>
                </div>
            </div>
        </div>
        @endforeach

    </div>

    @endif





    @if($orders->count() > 0)

    <div class="header">
        Your Orders :
    </div>

    <div class="orders">
        <div class="order-card">



            <div class="item-row flex">
                <div class="item">
                    item
                </div>

                <div class="item item-wide">
                    pickup
                </div>

                <div class="item item-wide">
                    deliver
                </div>

                <div class="item center-text">
                    status
                </div>

                <div class="item center-text">
                    Action
                </div>
            </div>


            @foreach($orders as $order)
                <div class="item-row flex">
                    <div class="item">
                        <a href="{{ route('orders.show',$order->id) }}">{{ $order['item'] }}</a>
                    </div>

                    <div class="item item-wide">
                        <img src="{{ url('/images/location.svg') }}">{{ $order['pickup'] }}
                    </div>

                    <div class="item item-wide">
                        <img src="{{ url('/images/home.svg') }}">{{ $order['location'] }}
                    </div>

                    <div class="item center-text">
                        @switch($order['status'])
                            @case(1)
                                <div class="status">waiting</div>
                                @break
                            @case(2)
                                <div class="status s-b">picked up</div>
                                @break
                            @case(3)
                                <div class="status s-y">delayed</div>
                                @break
                            @case(4)
                                <div class="status s-d">delivered</div>
                                @break
                            @case(5)
                                <div class="status s-r">canceled</div>
                                @break
                        @endswitch
                    </div>

                    <div class="item center-text">
                        <a href="{{ route('orders.show',$order->id) }}">
                            <img src="{{ url('/images/info-g.svg') }}">
                        </a>

                        @if($order['status'] !== 4)
                            <a href="{{ route('orders.edit',$order->id) }}">
                                <img src="{{ url('/images/edit-g.svg') }}">
                            </a>
                        @endif
                    </div>
                </div>
            @endforeach


        </div>
    </div>

    @if($numOfPages > 10)
        <div class="pagination">
            <a href="{{ route('orders',['page' => 1, 'username' => $user->username]) }}">
                <img src="{{ url('images/expand.svg') }}">
            </a>
        </div>
    @endif

    @else
        <h1>You didnt add any order yet!</h1>
    @endif
@endsection
