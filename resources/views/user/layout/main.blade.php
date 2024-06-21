<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('APP_NAME') }}</title>
    <link rel="stylesheet" href="{{ url('/dist/css/main.css') }}">

</head>
<body>
<div id="main">
    <div class="flex" id="header">
        @include('user.layout.header')
    </div>


    <div id="main-section">
        @yield('main')
    </div>

</div>
<script>

    function resize (){
        const pageHeight = window.innerHeight;
        const m = document.getElementById('main-section')
        m.style.minHeight = (pageHeight - 40) + 'px';
        // m.style.height = (pageHeight - 40) + 'px';
    }
    window.onload = resize()
</script>
</body>
</html>
