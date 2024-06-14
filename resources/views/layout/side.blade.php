<div class="side">
    @php($user = \Illuminate\Support\Facades\Auth::user())
    <div>
        <span style="font-weight: 900;font-size: 16pt">{{ $user->name }}</span>
        <span style="font-size: 10pt;color: #727070">
            @if($user->isDriver())
                driver
            @elseif($user->isStore())
                store
            @endif
        </span>
    </div>

    <br><br>
    <div style="color: rgb(63,63,63);padding: 2px 12px;">
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
