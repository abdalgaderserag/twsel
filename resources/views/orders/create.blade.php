@extends('layout.main')
@section('main')
    <style>
        .input{
            margin: 6px 0 0 0;
            font-size: 13pt;
            padding: 6px 12px;
            border: 1px solid #d0d0d0;
            color: #595959;
            font-weight: 100;
            width: 90%;
        }
        label{
            font-size: 13pt;
            margin-left: 12px;
            font-weight: bolder;
        }
    </style>
    <h2>create new order :</h2>

    <div class="card">
        <form action="{{ route('orders.store') }}" method="post">
            @csrf
            @method('post')
            <label for="name">enter the name of the client :</label><br>
            <input class="input" type="text" name="name"><br><br>

            <label for="name">enter the name of the item :</label><br>
            <input class="input" type="text" name="item"><br><br>

            <label for="name">client phone number :</label><br>
            <input class="input" type="text" name="contact"><br><br>

            <label for="name">address of the order :</label><br>
            <input class="input" type="text" name="location">
            <br>
            <br>
            <input type="submit" value="save order" class="button" style="padding: 8px 16px">
        </form>
    </div>
@endsection
