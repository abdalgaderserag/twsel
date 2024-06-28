@extends('user.layout.main')
<?php
$user = \Illuminate\Support\Facades\Auth::user();
?>
@section('main')
    <div class="orders">
        <div class="order-card flex" style="margin-top: 48px">
            <div class="card-info">
                <a href="{{ route('profile',$userData->username) }}">
                    <img src="{{ url($userData->image) }}">
                </a>
                <div>
                    <a href="{{ route('profile',$userData->username) }}">
                        {{ $userData->name }}
                    </a>
                </div>
            </div>
            <div class="card-body">

                <div class="card-text">
                    <br>
                    <span>Name : </span> {{ $userData->name }}<br>
                    <span>E-mail : </span> {{ $userData->email }}<br>
                    <span>Account : </span> @if($userData->isUser()) user @elseif($userData->isDriver()) driver @endif <br>
                    <span>Contact : </span> {{ $userData->contact }}<br>
                    @if($userData->isUser())
                        <span>number of orders : </span> {{ $userData->orders->count() }}<br>
                    @endif
                    @if($userData->isDriver())
                        <?php
                            $deilvers = $userData->delivers;
                            if (empty($deilvers))
                                $deilvers = collect();
                            ?>
                        <span>number of delivered orders : </span>{{ $deilvers->filter(function (\App\Models\Deliver $d){
                        return $d->order->status === 4;
                    })->count() }}<br>

                        <span>number of canceled orders : </span>{{ $deilvers->filter(function (\App\Models\Deliver $d){
                        return $d->order->status === 5;
                    })->count() }}<br>

                        <span>number of ongoing orders : </span>{{ $deilvers->filter(function (\App\Models\Deliver $d){
                        return $d->order->status === 2 || $d->order->status === 3;
                    })->count() }}<br>
                    @endif

                </div>
            </div>
        </div>
        <div class="order-card" style="background-color: #6C77F6">
        </div>
        @if($userData->orders->count() > 0)
        <div class="header">
            <?php
                if ($userData->isUser())
                    $ident = "Orders";
                else
                    $ident = "delivers";
            ?>
            @if($userData->id === $user->id)
                all Your {{ $ident }} :
            @else
                all {{ $userData->name }} {{ $ident }} :
            @endif
        </div>
        @if($userData->isUser())
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

                @foreach($userData->orders as $order)
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

                            @if($order['status'] !== 4 && $order['user_id'] === $user->id)
                                <a href="{{ route('orders.edit',$order->id) }}">
                                    <img src="{{ url('/images/edit-g.svg') }}">
                                </a>
                            @endif
                        </div>
                    </div>
                @endforeach


            </div>
        @endif

        @if($userData->isDriver())
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

                @foreach($userData->delivers as $deliver)
                    <div class="item-row flex">
                        <div class="item">
                            <a href="{{ route('orders.show',$deliver->order->id) }}">{{ $deliver->order['item'] }}</a>
                        </div>

                        <div class="item item-wide">
                            <img src="{{ url('/images/location.svg') }}">{{ $deliver->order['pickup'] }}
                        </div>

                        <div class="item item-wide">
                            <img src="{{ url('/images/home.svg') }}">{{ $deliver->order['location'] }}
                        </div>

                        <div class="item center-text">
                            @switch($deliver->order['status'])
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
                            <a href="{{ route('orders.show',$deliver->order->id) }}">
                                <img src="{{ url('/images/info-g.svg') }}">
                            </a>

                            @if($deliver->order['status'] !== 4 && $deliver->order['user_id'] === $user->id)
                                <a href="{{ route('orders.edit',$deliver->order->id) }}">
                                    <img src="{{ url('/images/edit-g.svg') }}">
                                </a>
                            @endif
                        </div>
                    </div>
                @endforeach


            </div>
        @endif
        @else
            @if($userData->id === $user->id)
                <h1>Your added Orders will show here</h1>
            @else
                <h1>Look like this user didn't have orders</h1>
            @endif
        @endif
    </div>
@endsection
