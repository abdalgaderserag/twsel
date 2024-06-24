@extends('user.layout.main')
<?php
$user = \Illuminate\Support\Facades\Auth::user();
?>
@section('main')
    {{ $userData }}
@endsection
