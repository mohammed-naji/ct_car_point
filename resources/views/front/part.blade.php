@extends('front.layout.master')

@section('title', $part->trans_name . ' | ' . env('APP_NAME'))

@section('css')
    <style>
        .del {
            font-size: 20px;
            text-decoration: line-through;
            color: #717171
        }
    </style>
@endsection

@section('content')

    <br>
    <br>

    <!-- About -->
    <section class="about container" id="about">

        <div class="about-img">
            <img style="padding: 0 50px" src="{{ asset('storage/' . $part->image) }}" alt="">
        </div>

        <div class="about-text">
            <span>{{ $part->type->trans_name }}</span>

            <h2>{{ $part->trans_name }}</h2>
            @if ($part->sale_price)
                <h1><del class="del">${{ $part->price }}</del> ${{ $part->sale_price }}</h1>
            @else
                <h1>${{ $part->price }}</h1>
            @endif

            <p>{{ $part->trans_description }}</p>

            <p><i class='bx bxs-star'></i> {{ number_format($part->reviews->avg('review'), 1) }}
                ({{ $part->reviews->count() }} Reviews)</p>
            <!-- About Button -->

            @auth
                <a href="/pay" class="btn pay-btn" data-id="{{ $part->id }}">{{ __('website.buy_now') }}</a>
            @endauth

            @guest
                <a href="{{ route('login') }}" class="btn">{{ __('website.buy_now') }}</a>
            @endguest

        </div>
    </section>

    <!-- Parts Section -->
    <section class="parts" id="parts">

        <div class="heading">

            <span>{{ $part->type->trans_name }}</span>

            <h2>{{ __('website.related') }}</h2>
        </div>
        <!-- Parts Container -->

        <div class="parts-container container">

            @foreach ($related as $item)
                @include('front.parts.box', ['part' => $item])
            @endforeach

        </div>

    </section>
@endsection
