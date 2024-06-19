<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('APP_NAME') }}</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <style>
        #main{
            align-content: center;
        }
    </style>
</head>
<body style="background-color: var(--bs-gray-200);">
    <div class="pb-5" id="main">
        <div class="container col-lg-5">
            <div></div>
            <div>
                <form class="col-form-label" action="{{ route('login') }}" method="post">
                    @csrf
                    @method('post')

                    <div class="form-floating">
                        <input class="form-control" type="text" name="username" id="username" placeholder="Enter your username!">
                        <label class="user-select-none" style="color: rgba(var(--bs-body-color-rgb),.65)" for="username">Enter your username!</label>
                    </div>


                    <div class="form-floating my-4">
                        <input class="form-control" type="password" name="password" id="password" placeholder="Enter password">
                        <label class="user-select-none" style="color: rgba(var(--bs-body-color-rgb),.65)" for="password">Enter password</label>
                    </div>


                    <div class="d-grid gap-1 my-4">
                        <input class="btn btn-success" type="submit" value="Login">
                    </div>
                </form>
            </div>
            <div></div>
        </div>
    </div>
<script src="/js/bootstrap.min.js"></script>
    <script>
        var f = document.getElementById('main');
        function resize(){
            let he = window.innerHeight;
            f.style.height = he + 'px';
        }
        resize();
        window.onresize= ()=>{
            resize();
        };
    </script>
</body>
</html>
