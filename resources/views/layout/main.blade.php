<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('APP_NAME') }}</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">

</head>
<body>
<div id="main">
    <div>
        @include('layout.side')
    </div>


    <div>
        @yield('main')
    </div>

</div>
<script src="/js/bootstrap.min.js"></script>
<script>
    const showDetails = () => {
        console.log(e);
    }
</script>
</body>
</html>
