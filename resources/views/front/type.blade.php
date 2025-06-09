@extends('front.layout.master')

@section('title', 'Homepage | ' . env('APP_NAME'))

@section('css')
    <style>
        .home-text h1 {
            width: 60%;
        }
    </style>

    @if (app()->getLocale() == 'ar')
        <style>
            .home {
                background-image: url({{ asset('assets/img/Background-home-ar.png') }})
            }
        </style>
    @endif
@endsection

@section('content')
    <!-- Home -->
    <section class="home" id="home" style="min-height: 400px">
        <div class="home-text">
            <h1>{{ $type->trans_name }}</h1>
        </div>
    </section>
    <!-- Cars Section -->

    <!-- Parts Section -->
    <section class="parts" id="parts">

        <div class="heading">

            <span>{{ __('website.parts_subtitle') }}</span>

            <h2>{{ __('website.parts_title') }}</h2>

            <p>{{ __('website.parts_desc') }}</p>
        </div>
        <!-- Parts Container -->

        <div class="parts-container container">
            @foreach ($type->parts as $part)
                @include('front.parts.box')
            @endforeach
        </div>

    </section>
@endsection
