
<div class="flex" style="justify-content: space-between;min-width: 26%">
    <img id="logo" src="{{ url('images/deezer.svg') }}">

    <div class="item">
        <button>
            + Order Now
        </button>
    </div>
</div>
@auth
<div class="flex" style="margin-right: 0.8%">

    <div class="item item-ef active">
        Dashboard
    </div>
    <div class="item item-ef">
        Orders
    </div>
    <div class="item item-ef">
        payments
    </div>
    <div id="user" class="item flex">
        <img src="{{ url('images/avatar.png') }}">
        <div>
            {{ $user->name }}
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
