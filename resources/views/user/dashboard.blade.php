@extends('user.layout.main')
<?php
    $user = \Illuminate\Support\Facades\Auth::user();
    $order = $user->orders->last();
?>

@section('main')
    <div class="header">
        On the way :
    </div>
    <div class="orders">
        <div class="order-card flex">
            <div class="card-info">
                <img src="{{ url($order->deliver->user->image) }}">
                <div>
                    {{ $order->deliver->user->name }}
                </div>
            </div>
            <div class="card-body">
                <div class="card-text">
                    <div>
                        Hi {{ $user->name }}. I am {{ $order->deliver->user->name }} your delivery guy for today!
                    </div>

                    <div>
                        Iam currently delivering your {{ $order->item }}
                        from {{ $order->pickup }} to {{ $order->location }}
                    </div>

                    <div>
                        feel free to contact my at +{{ $order->deliver->user->contact }}
                    </div>
                </div>
                <div style="margin-top: 52px">
                    <button class="green">view</button>
                </div>
            </div>
        </div>
    </div>






    <div class="header">
        all your Orders :
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
                            <div>2</div>
                            @break
                    @endswitch
                </div>

                <div class="item center-text">
                    <a href="{{ route('orders.show',$order->id) }}">
                        <img src="{{ url('/images/info-g.svg') }}">
                    </a>

                    <a href="{{ route('orders.edit',$order->id) }}">
                        <img src="{{ url('/images/edit-g.svg') }}">
                    </a>
                </div>
            </div>


        </div>
    </div>
@endsection
