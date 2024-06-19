@extends('layout.main')
@section('main')

    <h2>edit order :</h2>
    <div class="card">
        <form action="{{ route('orders.update',$order->id) }}" method="post">
            @csrf
            @method('put')
            <label for="name">enter the name of the client :</label><br>
            <input class="input" type="text" name="name" value="{{ $order['name'] }}"><br><br>

            <label for="name">enter the name of the item :</label><br>
            <input class="input" type="text" name="item" value="{{ $order['item'] }}"><br><br>

            <label for="name">client phone number :</label><br>
            <input class="input" type="text" name="contact" value="{{ $order['contact'] }}"><br><br>

            <label for="name">address of the order :</label><br>
            <input class="input" type="text" name="location" value="{{ $order['location'] }}">
            <br>
            <br>
            <input type="submit" value="save order">
        </form>
    </div>
@endsection
