@extends('user.layout.main')
<?php
$user = \Illuminate\Support\Facades\Auth::user();
?>

@section('main')
        @if($orders->count() > 0)

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

                <?php
                $page = request()->input('page');
                ?>
            @if($numOfPages > 1)
                <div class="pagination">
                    <div class="page-tab">
                        <a href="{{ route('orders',['page' => $page - 1, 'username' => $user->username]) }}">
                            <img style="rotate: 90deg;" src="{{ url('images/expand.svg') }}">
                        </a>
                    </div>
                    @for($p = 1; $p<= $numOfPages; $p++)
                        <div class="page-tab @if($page === '' . $p)active @endif">
                            <a href="{{ route('orders',['page' => $p, 'username' => $user->username]) }}">
                                {{ $p }}
                            </a>
                        </div>
                    @endfor
                    <div class="page-tab">
                        <a href="{{ route('orders',['page' => $page + 1, 'username' => $user->username]) }}">
                            <img style="rotate: -90deg;" src="{{ url('images/expand.svg') }}">
                        </a>
                    </div>
                </div>
            @endif

        @else
            <h1>No orders to view!</h1>
        @endif
@endsection
