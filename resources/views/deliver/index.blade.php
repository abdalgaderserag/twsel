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

            <div class="item-small">
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
                    <a href="{{ route('orders.show',$order['id']) }}">{{ $order['name'] }}</a>
                </div>
                <div class="item">
                    <img src="{{ url('/images/location.svg') }}">{{ $order['location'] }}
                </div>

                <div class="item-small">
                    <span class="status">
                        {{ $order['status'] }}
                    </span>
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
@endsection
