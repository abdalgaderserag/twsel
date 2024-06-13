@extends('layout.main')
@section('main')
    <div id="orders">
        <div>
            <h2 style="padding: 0 0 0 12px;cursor: default;">All orders :</h2>
        </div>
        @foreach($delivers as $deliver)
            @php($order = $deliver->order)
            <div class="card" style="display: flex">
                <div style="display: flex;align-items: center;">
                    <a href="{{ route('orders.show',$order['id']) }}">{{ $order['name'] }}</a>
                    <img src="/images/location.svg">{{ $order['location'] }}
                    {{ $order['status'] }}
                </div>
                <div style="display: flex">
                    <a href="{{ route('deliver.show',$deliver->id) }}" class="button"><img src="/images/edit.svg"></a>
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
