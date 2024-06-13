@extends('layout.main')
@section('main')
    @foreach($orders as $order)
        {{ $order }} <br>
    @endforeach
@endsection
