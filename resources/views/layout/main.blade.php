<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ app()->getNamespace() }}</title>
</head>
<body>
<div>
    <div id="main">
        @yield('main')
    </div>
    @include('layout.side')
</div>
@include('layout.footer')
</body>
</html>
