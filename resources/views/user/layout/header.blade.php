
<div id="left-header" class="flex">
        <img id="logo" src="{{ url('images/deezer.svg') }}" onclick="location.href = '{{ route('home') }}'">

    <div class="item">
        <a href="{{ route('orders.create') }}">
            <button>
                + Order Now
            </button>
        </a>
    </div>
</div>
@auth
<div class="flex" style="margin-right: 0.8%">

    <div onclick="location.href='{{ route('home') }}'" class="item item-ef @if(url()->current() === route('home')) active @endif">
        Dashboard
    </div>
    <div onclick="location.href='{{ route('profile',$user->username) }}'" class="item item-ef @if(url()->current() === route('profile',$user->username)) active @endif">
        profile
    </div>
    <div onclick="location.href='{{ route('logout') }}'" class="item item-ef">
        logout
    </div>
{{--    <div class="item item-ef">--}}
{{--        payments--}}
{{--    </div>--}}
    <div id="user" class="item flex">
        <img onclick="location.href = '{{ route('profile',$user->username) }}'" src="{{ url('images/avatar.png') }}">
        <div>
            <a href="{{ route('profile',$user->username) }}">
                {{ $user->name }}
            </a>
        </div>
    </div>
</div>

@endauth

@guest
    <div>
        <div>Login</div>
        <div>Register</div>
    </div>
@endguest
