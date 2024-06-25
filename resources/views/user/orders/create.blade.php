@extends('user.layout.main')
<?php
$user = \Illuminate\Support\Facades\Auth::user();
$order = $user->orders->last();
?>
@section('main')

    <h2>create new order :</h2>

    <div class="card">
        <form action="{{ route('orders.store') }}" method="post">
            @csrf
            @method('post')

            <label for="item">enter the name of the item :</label><br>
            <input class="input @error('item') error-input @enderror" type="text" name="item" value="{{ old('item') }}">
            @error('item')
                <div class="error-text">
                    {{ $message }}
                </div>
            @enderror
            <br>

            <label for="contact">client phone number :</label><br>
            <input class="input @error('contact') error-input @enderror" type="text" name="contact" value="{{ old('contact') }}">
            @error('contact')
            <div class="error-text">
                {{ $message }}
            </div>
            @enderror
            <br>

            <label for="pickup">address of the pickup :</label><br>
            <input class="input @error('pickup') error-input @enderror" type="text" name="pickup" value="{{ old('pickup') }}">
            @error('pickup')
            <div class="error-text">
                {{ $message }}
            </div>
            @enderror
            <br>

            <label for="location">address of the delivery :</label><br>
            <input class="input @error('location') error-input @enderror" type="text" name="location" value="{{ old('location') }}">
            @error('location')
            <div class="error-text">
                {{ $message }}
            </div>
            @enderror

            <br>
            <br>
            <input type="submit" value="save order">
        </form>
    </div>
@endsection
