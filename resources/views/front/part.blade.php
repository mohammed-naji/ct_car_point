@extends('front.layout.master')

@section('title', $part->trans_name . ' | ' . env('APP_NAME'))

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
            <p>{{ $part->trans_description }}</p>

            <p><i class='bx bxs-star'></i> {{ number_format($part->reviews->avg('review'), 1) }}
                ({{ $part->reviews->count() }} Reviews)</p>
            <!-- About Button -->

            <a href="#" class="btn">{{ __('website.buy_now') }}</a>

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
