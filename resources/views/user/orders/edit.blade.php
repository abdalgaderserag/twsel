@extends('user.layout.main')
<?php
$user = \Illuminate\Support\Facades\Auth::user();
$order = $user->orders->last();
?>
@section('main')

    <h2>edit order :</h2>
    <div class="card">
        <form action="{{ route('orders.update',$order->id) }}" method="post">
            @csrf
            @method('put')
            <label for="name">enter the name of the client :</label><br>
            <input class="input" type="text" name="name" value="{{ $order['name'] }}"><br>

            <label for="item">enter the name of the item :</label><br>
            <input class="input" type="text" name="item" value="{{ $order['item'] }}"><br>

            <label for="contact">client phone number :</label><br>
            <input class="input" type="text" name="contact" value="{{ $order['contact'] }}"><br>

            <label for="pickup">address of the order :</label><br>
            <input class="input" type="text" name="pickup" value="{{ $order['pickup'] }}"><br>

            <label for="name">address of the order :</label><br>
            <input class="input" type="text" name="location" value="{{ $order['location'] }}"><br><br>
            <input class="button" type="submit" value="save order">
        </form>
    </div>
@endsection
