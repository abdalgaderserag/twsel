@php($user = \Illuminate\Support\Facades\Auth::user())
<div class="header flex">
    <img id="avatar" src="{{ url('/images/avatar.png') }}">
    <div id="user-name">
        {{ $user->name }} <br>
        <span>
        @if($user->isDriver())
                driver
            @elseif($user->isUser())
                store
            @endif
        </span>
    </div>

</div>

<div id="side-selections">
    <div>
        <a href="{{ route('orders.index') }}">
            <img src="{{ url('/images/hand.svg') }}">
            Orders
        </a>
        <div style="border-left: white 2px solid;margin: 12px;padding-left: 10px">
            <a href="#">new orders</a>
            <a href="#">orders near me</a>
            <a href="#">Delivered</a>
        </div>
    </div>
    @if($user->isDriver())
        <div>
            <a href="{{ route('deliver.index') }}">
                <img src="{{ url('/images/item.svg') }}">
                delivers
            </a>
            <div style="border-left: white 2px solid;margin: 12px;padding-left: 10px">
                <a href="#">On-going</a>
                <a href="#">Canceled</a>
                <a href="#">Delayed</a>
            </div>
        </div>
    @endif

    <div>
        <a href="{{ route('profile.edit') }}">
            <img src="{{ url('/images/edit.svg') }}">
            edit profile
        </a>
    </div>
    <div>
        <a href="{{ route('logout') }}">
            <img src="{{ url('/images/delete.svg') }}">
            logout
        </a>
    </div>
</div>
