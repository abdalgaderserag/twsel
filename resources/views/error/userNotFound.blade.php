@extends('user.layout.main')
<?php
$user = \Illuminate\Support\Facades\Auth::user();
?>
@section('main')
    <h1>
        Looks like user is not found or removed!
    </h1>
@endsection
