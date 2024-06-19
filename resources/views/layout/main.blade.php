<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('APP_NAME') }}</title>
    <style>
        body{
            margin: 0;
            font-family: sans-serif;
        }
        a{
            color: inherit;
            text-decoration: inherit;
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

        h4{
            text-decoration-line: underline;
        }


        .card{
            background-color: #fff;
            box-shadow: 1px 2px 6px 0px rgba(220, 220, 220, 0.95);
            padding: 8px 12px;
            margin: 0 0 1px 0;
            justify-content: space-between;
        }

        .button{
            background-color: #417fff;
            padding: 2px 14px;
            border: none;
            font-size: 12pt;
            margin: 0 6px;
            color: #fff;
            border-radius: 4px;
            cursor: pointer;
        }

        .button-danger{
            background-color: #f62751;
        }

    </style>
    <link rel="stylesheet" href="/public/css/bootstrap.min.css">
</head>
<body style="width: 100%">
<div style="display: flex;width: 100%">
    <div id="main">
        @yield('main')
{{--        @include('layout.footer')--}}
    </div>
    @include('layout.side')
</div>
<script src="/public/js/bootstrap.min.js"></script>
</body>
</html>
