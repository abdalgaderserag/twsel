<?php
$user = \Illuminate\Support\Facades\Auth::user();
$userData = $user;
$view = 'user.layout.main';
if ($user->isDriver()){
    $view = 'layout.main';
}
?>
@extends($view)

@section('main')
    <div class="orders">
        <div class="order-card flex" style="margin-top: 48px">


            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="card-body">
                    <div class="card-info" style="text-align: start">
                        <img src="{{ url($userData->image) }}">
                        <div>
                            <input type="file" name="image">
                            @error('image')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="card-text">
                        <br>
                        <span>Name : </span> <input type="text" name="name" value="{{ $userData->name }}">
                        @error('name')
                        {{ $message }}
                        @enderror
                        <br>
{{--                        <span>E-mail : </span> <input type="email" name="email" value="{{ $userData->email }}">--}}
{{--                        @error('email')--}}
{{--                        {{ $message }}--}}
{{--                        @enderror--}}
                        <br>
                        <span>Contact : </span> <input type="tel" name="contact" value="{{ $userData->contact }}">
                        @error('contact')
                        {{ $message }}
                        @enderror
                        <br>
                        <span>enter old password : </span> <input type="password" name="old_password">
                        @error('old_password')
                        {{ $message }}
                        @enderror
                        <br>
                        <span>enter new password : </span> <input type="password" name="password">
                        @error('password')
                        {{ $message }}
                        @enderror
                        <br>
                        <br><br>
                        <button type="submit">save profile</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
