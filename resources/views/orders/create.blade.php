@extends('layout.main')
@section('main')

    <h2>create new order :</h2>

    <div class="card">
        <form action="{{ route('orders.store') }}" method="post">
            @csrf
            @method('post')
            <label for="name">enter the name of the client :</label><br>
            <input class="input" type="text" name="name"><br><br>

            <label for="item">enter the name of the item :</label><br>
            <input class="input" type="text" name="item"><br><br>

            <label for="contact">client phone number :</label><br>
            <input class="input" type="text" name="contact"><br><br>

            <label for="pickup">address of the pickup :</label><br>
            <input class="input" type="text" name="pickup">

            <label for="location">address of the order :</label><br>
            <input class="input" type="text" name="location">
            <br>
            <br>
            <input type="submit" value="save order">
        </form>
    </div>
@endsection
