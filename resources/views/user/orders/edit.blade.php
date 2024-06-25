@extends('user.layout.main')
<?php
$user = \Illuminate\Support\Facades\Auth::user();
if (!empty(old())){
    $order['item'] = old('item');
    $order['contact'] = old('contact');
    $order['pickup'] = old('pickup');
    $order['location'] = old('location');
}

?>
@section('main')

    <h2>edit order :</h2>
    <div class="card">
        <form action="{{ route('orders.update',$order->id) }}" method="post">
            <?php
            ?>
            @csrf
            @method('put')
            <label for="item">enter the name of the item :</label><br>
            <input class="input @error('item') error-input @enderror" type="text" name="item" value="{{ $order['item'] }}">
            @error('item')
            <div class="error-text">
                {{ $message }}
            </div>
            @enderror
            <br>

            <label for="contact">client phone number :</label><br>
            <input class="input @error('contact') error-input @enderror" type="text" name="contact" value="{{ $order['contact'] }}">
            @error('contact')
            <div class="error-text">
                {{ $message }}
            </div>
            @enderror
            <br>

            <label for="pickup">address of the pickup :</label><br>
            <input class="input @error('pickup') error-input @enderror" type="text" name="pickup" value="{{ $order['pickup'] }}">
            @error('pickup')
            <div class="error-text">
                {{ $message }}
            </div>
            @enderror
            <br>

            <label for="location">address of the delivery :</label><br>
            <input class="input @error('location') error-input @enderror" type="text" name="location" value="{{ $order['location'] }}">
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
