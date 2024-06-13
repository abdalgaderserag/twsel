@extends('layout.main')
@section('main')
<form action="{{ route('orders.update',$order->id) }}" method="post">
    @csrf
    @method('put')
    <label for="name">enter the name of the client :</label>
    <input type="text" name="name" value="{{ $order['name'] }}">

    <label for="name">enter the name of the item :</label>
    <input type="text" name="item" value="{{ $order['item'] }}">

    <label for="name">client phone number :</label>
    <input type="number" name="contact" value="{{ $order['phone'] }}">

    <label for="name">address of the order :</label>
    <input type="text" name="location" value="{{ $order['location'] }}">

    <input type="submit" value="add order">
</form>
@endsection
