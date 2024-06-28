@extends('layout.main')

@section('headline')
    <div class="flex">
        <div>your delivers :</div>
    </div>
    <div class="button flex">
        <img src="{{ url('images/filter.svg') }}"><span style="margin-left: 8px">Filters</span>
    </div>
@endsection


@section('main')
    <div class="section" id="delivers">
        <div class="item-row flex">

            <div class="item">
                item
            </div>
            <div class="item">
                location
            </div>

            <div class="item center-text">
                status
            </div>

            <div class="item center-text">
                Actions
            </div>
        </div>
        @foreach($delivers as $deliver)
            @php($order = $deliver->order)
            <div class="item-row flex">

                <div class="item">
                    <a href="{{ route('orders.show',$order['id']) }}">{{ $order['item'] }}</a>
                </div>
                <div class="item">
                    <img src="{{ url('/images/location.svg') }}">{{ $order['location'] }}
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
                    <a href="{{ route('deliver.show',$deliver->id) }}"><img src="{{ url('/images/edit-g.svg') }}"></a>
                    <form action="{{ route('deliver.destroy',$deliver->id) }}" method="post">
                        @csrf
                        @method('delete')
                        {{--                            <input type="submit" value="img" class="button button-danger">--}}
                        <button type="submit"><img src="{{ url('/images/delete-g.svg') }}"></button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
    <?php
    $page = request()->input('page');
    ?>
    @if($numOfPages > 1)
    <div class="pagination flex">
        <div class="page-tab">
            <a href="{{ route('deliver.index',['page' => $page - 1]) }}">
                <img style="rotate: 90deg;" src="{{ url('images/expand.svg') }}">
            </a>
        </div>
        @for($p = 1; $p<= $numOfPages; $p++)
            <div class="page-tab @if($page === '' . $p)active @endif">
                <a href="{{ route('deliver.index',['page' => $p]) }}">
                    {{ $p }}
                </a>
            </div>
        @endfor
        <div class="page-tab">
            <a href="{{ route('deliver.index',['page' => $page + 1]) }}">
                <img style="rotate: -90deg;" src="{{ url('images/expand.svg') }}">
            </a>
        </div>
    </div>
    @endif

@endsection
