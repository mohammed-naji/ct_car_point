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
    </style>
@endsection

@section('content')

    <br>
    <br>
    <!-- Blog Container -->
    <section class="blog" id="blog">
        <div class="heading">
            <h2>Our Blog Content</h2>
        </div>
        <!-- Blog Container -->
        <div class="blog-container container">
            <!-- Box 1 -->
            <div class="box">
                <img src="{{ asset('assets/img/car1.jpg') }}" alt="">
                <span>Feb 14 2022</span>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Explicabo, veniam.</p>

            </div>
        </div>
    </section>
@endsection
