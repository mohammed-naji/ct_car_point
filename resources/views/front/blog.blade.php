@extends('front.layout.master')

@section('title', 'Homepage | ' . env('APP_NAME'))

@section('css')
    <style>
        .blog-container .box:hover {
            background: #fff
        }

        .blog-container .box {
            width: 80%;
            display: block;
            margin: 0 auto;
            flex: unset;
        }

        .blog-container .box img {
            width: 100%;
            display: block;
            margin-bottom: 10px
        }
    </style>
@endsection

@section('content')

    <br>
    <br>
    <!-- Blog Container -->
    <section class="blog" id="blog">
        <div class="heading">
            <h2>{{ $blog->trans_title }}</h2>
        </div>
        <!-- Blog Container -->
        <div class="blog-container container">
            <!-- Box 1 -->
            <div class="box">
                <img src="{{ asset('storage/' . $blog->image) }}" alt="">
                <span>{{ $blog->created_at->format('M d Y') }}</span>
                {!! $blog->trans_description !!}

            </div>
        </div>
    </section>
@endsection
