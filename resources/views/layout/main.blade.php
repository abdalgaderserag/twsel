<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('APP_NAME') }}</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
</head>
<body>
<div class="container row">
    <div class="col-2" id="side">
        @include('layout.side')

    <div class="col-9" id="main">
        @yield('main')
    </div>

</div>
<script src="/js/bootstrap.min.js"></script>
</body>
</html>
