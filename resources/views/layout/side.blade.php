@php($user = \Illuminate\Support\Facades\Auth::user())
<div>
    <span>{{ $user->name }}</span>
    <span>
            @if($user->isDriver())
            driver
        @elseif($user->isStore())
            store
        @endif
        </span>
</div>

<div>
    <div>
        <a href="{{ route('orders.index') }}">Orders</a>
    </div>
    @if($user->isDriver())
        <div>
            <a href="{{ route('deliver.index') }}">delivers</a>
        </div>
        <div>
            <a href="#">wage</a>
        </div>
    @endif

    <div>
        <a href="#">edit profile</a>
    </div>
    <div>
        <a href="{{ route('logout') }}">logout</a>
    </div>
</div>
</div>
