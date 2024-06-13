<div class="side">
    @php($user = \Illuminate\Support\Facades\Auth::user())
    <div>
        {{ $user->name }}
    </div>
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
