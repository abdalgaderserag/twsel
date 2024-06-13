<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ app()->getNamespace() }}</title>
    <style>
        body{
            margin: 0;
        }
        #main{
            width: 84%;
            padding: 8px 16px;
            background-color: rgba(220, 220, 220, 0.24);
        }
        .side{
            width: 16%;
            background-color: #80a9ff;
        }


        .card{
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 1px 2px 6px 0px rgba(255,255,255,0.2);
            padding: 8px 12px;
            margin: 0 0 4px 0;
        }
    </style>
</head>
<body style="width: 100%">
<div style="display: flex;width: 100%">
    <div id="main">
        @yield('main')
    </div>
    @include('layout.side')
</div>
@include('layout.footer')
</body>
</html>
