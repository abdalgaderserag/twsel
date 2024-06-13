@extends('layout.main')
@section('main')
    {{ $order->id }}<br/>
    {{ $order->item }}<br/>
    {{ $order->name }}<br/>
    {{ $order->contact }}<br/>
    {{ $order->location }}<br/>
    {{ $order->user->name }}<br/>
    {{ $order->user->contact }}<br/>
    {{ $order->status }}
@endsection
