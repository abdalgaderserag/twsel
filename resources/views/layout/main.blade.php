<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('APP_NAME') }}</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <style>
        .side-section *{
            background-color: #7cb1fd;
            color: #343434;
        }
        .side-section{
            background-color: #7cb1fd;
            color: #343434;
        }
    </style>
</head>
<body>
<div class="container row">
    <div class="col-2 side-section" id="side">
        @include('layout.side')
    </div>


    <div class="col-9" id="main">
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
