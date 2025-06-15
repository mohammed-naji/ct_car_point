<div class="box">

    <img src="{{ asset('storage/' . $part->image) }}" alt="">

    <h3>{{ $part->trans_name }}</h3>

    @if ($part->sale_price)
        <div>
            <span>${{ $part->sale_price }}</span>
            <del>${{ $part->price }}</del>
        </div>
    @else
        <span>${{ $part->price }}</span>
    @endif


    <i class='bx bxs-star'>({{ $part->reviews->count() }} Reviews)</i>

    <div>
        @auth
            <a href="/pay" class="btn pay-btn" data-id="{{ $part->id }}">
                {{ __('website.buy_now') }}
            </a>
        @endauth

        @guest
            <a href="{{ route('login') }}" class="btn">
                {{ __('website.buy_now') }}
            </a>
        @endguest
    </div>

    <a href="{{ route('front.part', $part->id) }}" class="details">{{ __('website.view') }}</a>

</div>
