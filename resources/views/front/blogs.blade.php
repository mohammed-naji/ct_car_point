@extends('front.layout.master')

@section('title', 'Homepage | ' . env('APP_NAME'))

@section('content')

    <!-- Blog Container -->
    <section class="blog" id="blog">
        <div class="heading">
            <span>{{ __('website.blog_subtitle') }}</span>
            <h2>{{ __('website.blog_title') }}</h2>
            <p>{{ __('website.blog_desc') }}</p>
        </div>
        <!-- Blog Container -->
        <div class="blog-container container">
            @foreach ($blogs['posts'] as $blog)
                <div class="box">
                    <h3>{{ $blog['title'] }}</h3>
                    <p>{{ $blog['body'] }}</p>
                </div>
            @endforeach


        </div>
    </section>

@endsection
