@extends('layout.main')
@section('main')
<form action="{{ route('orders.store') }}" method="post">
    @csrf
    @method('post')
    <label for="name">enter the name of the client :</label>
    <input type="text" name="name">

    <label for="name">enter the name of the item :</label>
    <input type="text" name="item">

    <label for="name">client phone number :</label>
    <input type="number" name="contact">

    <label for="name">address of the order :</label>
    <input type="text" name="location">

    <input type="submit" value="add order">
</form>
@endsection
