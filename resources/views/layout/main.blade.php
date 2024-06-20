<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('APP_NAME') }}</title>
    <link rel="stylesheet" href="{{ url('/dist/css/app.css') }}">

</head>
<body>
<div class="flex" id="main">
    <div id="side-section">
        @include('layout.side')
    </div>


    <div id="main-section">
        <div id="headline" class="header flex">
            <div class="flex">
                <div>Orders :</div>
{{--                <div class="button">--}}
{{--                    Order--}}
{{--                </div>--}}
            </div>
            <div class="button flex">
                <img src="{{ url('images/filter.svg') }}"><span style="margin-left: 8px">Filters</span>
            </div>
        </div>
        @yield('main')
    </div>

</div>
<script>
    const item = document.getElementsByClassName('header')[0];

    function resize (){
        const pageHeight = window.innerHeight;
        const headerHeight = item.offsetHeight - 12;
        document.getElementsByClassName('header')[1].style.height = headerHeight + 'px';
        const s = document.getElementById('side-section')
        s.style.height = pageHeight + 'px';

        const m = document.getElementById('main-section')
        m.style.maxHeight = (pageHeight - 40) + 'px';
        m.style.height = (pageHeight - 40) + 'px';
    }
    window.onload = resize()
</script>
</body>
</html>
