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

<div class="accordion accordion-flush">
    <div class="accordion-item">
        <button class="accordion-button" onclick="showDetails()">
            <a class="accordion-header" href="{{ route('orders.index') }}">Orders</a>
        </button>
        <div class="accordion-collapse collapse">
            <div>completed orders</div>
        </div>
    </div>
    @if($user->isDriver())
        <div class="accordion-item">
            <button class="accordion-button">
                <a class="accordion-header" href="{{ route('deliver.index') }}">delivers</a>
            </button>
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
