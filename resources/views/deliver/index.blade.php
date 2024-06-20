@extends('layout.main')
@section('main')
    <div id="orders">
        @foreach($delivers as $deliver)
            @php($order = $deliver->order)
            <div>
                <div>
                    <a href="{{ route('orders.show',$order['id']) }}">{{ $order['name'] }}</a>
                    <img src="/images/location.svg">{{ $order['location'] }}
                    {{ $order['status'] }}
                </div>
                <div>
                    <a href="{{ route('deliver.show',$deliver->id) }}"><img src="/images/edit.svg"></a>
                    <form action="{{ route('deliver.destroy',$deliver->id) }}" method="post">
                        @csrf
                        @method('delete')
                        {{--                            <input type="submit" value="img" class="button button-danger">--}}
                        <button type="submit"><img src="/images/delete.svg"></button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection
