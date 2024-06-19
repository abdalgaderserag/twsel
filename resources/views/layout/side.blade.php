@php($user = \Illuminate\Support\Facades\Auth::user())
<div class="header flex">
    <img id="avatar" src="./images/avatar.png">
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
            <img src="/images/hand.svg">
            Orders
        </a>
        <div style="border-left: white 2px solid;margin: 12px;padding-left: 10px">
            <a href="#">New!</a>
            <a href="#">Near me</a>
            <a href="#">Delivered</a>
        </div>
    </div>
    @if($user->isDriver())
        <div>
            <a href="{{ route('deliver.index') }}">
                <img src="/images/item.svg">
                delivers
            </a>
            <div style="border-left: white 2px solid;margin: 12px;padding-left: 10px">
                <a href="#">On-going</a>
                <a href="#">Canceled</a>
                <a href="#">Delayed</a>
            </div>
        </div>
        <div>
            <a href="#">
                <img src="/images/info.svg">
                wage
            </a>
        </div>
    @endif

    <div>
        <a href="#">
            <img src="/images/edit.svg">
            edit profile
        </a>
    </div>
    <div>
        <a href="{{ route('logout') }}">
            <img src="/images/delete.svg">
            logout
        </a>
    </div>
</div>
