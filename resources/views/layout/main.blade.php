<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('APP_NAME') }}</title>
    <link rel="stylesheet" href="/dist/css/app.css">

</head>
<body>
<div class="flex" id="main">
    <div id="side-section">
        @include('layout.side')
    </div>


    <div id="main-section">
        @yield('main')
    </div>

</div>
<script>
    function resize (){
        const pageHeight = window.innerHeight;
        const s = document.getElementById('side-section')
        s.style.height = pageHeight + 'px';

        const m = document.getElementById('main-section')
        m.style.maxHeight = pageHeight + 'px';
        m.style.height = pageHeight + 'px';
    }
    window.onload = resize()
</script>
</body>
</html>
