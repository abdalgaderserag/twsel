@php($user = \Illuminate\Support\Facades\Auth::user())
<div>
    <span>{{ $user->name }}</span>
    <span>
            @if($user->isDriver())
            driver
        @elseif($user->isUser())
            store
        @endif
        </span>
</div>

<ul>
    <li>
        <a href="{{ route('orders.index') }}">Orders</a>
    </li>
    @if($user->isDriver())
        <li>
            <a class="accordion-header" href="{{ route('deliver.index') }}">delivers</a>
        </li>
        <li>
            <a href="#">wage</a>
        </li>
    @endif

    <li>
        <a href="#">edit profile</a>
    </li>
    <li>
        <a href="{{ route('logout') }}">logout</a>
    </li>
</ul>
