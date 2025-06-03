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
    <section class="home" id="home">
        <div class="home-text">
            <h1>{{ __('website.hero') }} <span>{{ __('website.car') }}</span> {{ __('website.need') }}</h1>
            <p>{{ __('website.hero_text') }}</p>
            <!-- Home BUtton -->
            <a href="#" class="btn">{{ __('website.hero_btn') }}</a>
        </div>
    </section>
    <!-- Cars Section -->

    <section class="cars" id="cars">

        <div class="heading">

            <span>All Cars</span>

            <h2>We have all types cars</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum, aperiam!</p>
            <!-- Cars Container -->

            <div class="cars-container container">

                <!-- Box 1 -->

                <div class="box">

                    <img src="{{ asset('assets/img/car1.jpg') }}" alt="">

                    <h2>Porche Car</h2>

                </div>

                <!-- Box 2 -->

                <div class="box">

                    <img src="{{ asset('assets/img/car2.jpg') }}" alt="">
                    <h2>Porche Car</h2 car2.jpg>

                </div>

                <!-- Box 3 -->

                <div class="box">
                    <img src="{{ asset('assets/img/car3.jpg') }}" alt="">

                    <h2>Porche Car</h2>

                </div>
                <!-- Box 4 -->

                <div class="box">
                    <img src="{{ asset('assets/img/car4.jpg') }}" alt="">

                    <h2>Porche Car</h2>

                </div>
                <!-- Box 5 -->

                <div class="box">
                    <img src="{{ asset('assets/img/car5.jpg') }}" alt="">

                    <h2>Porche Car</h2>

                </div>
                <!-- Box 6 -->

                <div class="box">
                    <img src="{{ asset('assets/img/car6.jpg') }}" alt="">

                    <h2>Porche Car</h2>

                </div>
            </div>
    </section>

    <!-- About -->
    <section class="about container" id="about">

        <div class="about-img">
            <img src="{{ asset('assets/img/about.png') }}" alt="">
        </div>

        <div class="about-text">
            <span>About Us</span>

            <h2>Cheap Prices with <br>Quality Cars</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed laborum blanditiis ratione numquam odio ea!
            </p>

            :

            <!-- About Button -->

            <a href="#" class="btn">Learn More</a>

        </div>
    </section>

    <!-- Parts Section -->
    <section class="parts" id="parts">

        <div class="heading">

            <span>What We Offer</span>

            <h2>Our Car Is Always Excellent</h2>

            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iusto, doloremque.</p>
        </div>
        <!-- Parts Container -->

        <div class="parts-container container">

            <!-- Box 1 -->

            <div class="box">

                <img src="{{ asset('assets/img/part1.png') }}" alt="">

                <h3>Auto Spare Parts</h3>

                <span>$149.99</span>

                <i class='bx bxs-star'>(6 Reviews)</i>

                <a href="#" class="btn">Buy Now</a>

                <a href="{{ route('front.part', 1) }}" class="details">View Details</a>

            </div>
            <!-- Box 2 -->

            <div class="box">

                <img src="{{ asset('assets/img/part2.png') }}" alt="">

                <h3>Auto Spare Parts</h3>

                <span>$119.99</span>

                <i class='bx bxs-star'>(6 Reviews)</i>

                <a href="#" class="btn">Buy Now</a>

                <a href="#" class="details">View Details</a>

            </div>
            <!-- Box 3 -->

            <div class="box">

                <img src="{{ asset('assets/img/part3.png') }}" alt="">

                <h3>Auto Spare Parts</h3>

                <span>$129.99</span>

                <i class='bx bxs-star'>(6 Reviews)</i>

                <a href="#" class="btn">Buy Now</a>

                <a href="#" class="details">View Details</a>

            </div>
            <!-- Box 4 -->

            <div class="box">

                <img src="{{ asset('assets/img/part4.png') }}" alt="">

                <h3>Auto Spare Parts</h3>

                <span>$109.99</span>

                <i class='bx bxs-star'>(6 Reviews)</i>

                <a href="#" class="btn">Buy Now</a>

                <a href="#" class="details">View Details</a>

            </div>
            <!-- Box 5 -->

            <div class="box">

                <img src="{{ asset('assets/img/part5.png') }}" alt="">

                <h3>Auto Spare Parts</h3>

                <span>$99.99</span>

                <i class='bx bxs-star'>(6 Reviews)</i>

                <a href="#" class="btn">Buy Now</a>

                <a href="#" class="details">View Details</a>

            </div>
            <!-- Box 6 -->

            <div class="box">

                <img src="{{ asset('assets/img/part6.png') }}" alt="">

                <h3>Auto Spare Parts</h3>

                <span>$109.99</span>

                <i class='bx bxs-star'>(6 Reviews)</i>

                <a href="#" class="btn">Buy Now</a>

                <a href="#" class="details">View Details</a>

            </div>


        </div>

    </section>

    <!-- Blog Container -->
    <section class="blog" id="blog">
        <div class="heading">
            <span>Blog & News</span>
            <h2>Our Blog Content</h2>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iusto, doloremque.</p>
        </div>
        <!-- Blog Container -->
        <div class="blog-container container">
            <!-- Box 1 -->
            <div class="box">
                <img src="{{ asset('assets/img/car1.jpg') }}" alt="">
                <span>Feb 14 2022</span>
                <h3>How To Get Perfect Car At Low Price</h3>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Explicabo, veniam.</p>
                <a href="{{ route('front.blog', 1) }}" class="blog-btn">Read More<i class='bx bx-right-arrow-alt'></i></a>
            </div>
            <!-- Box 2 -->
            <div class="box">
                <img src="{{ asset('assets/img/car2.jpg') }}" alt="">
                <span>March 16 2022</span>
                <h3>How To Get Perfect Car At Low Price</h3>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Explicabo, veniam.</p>
                <a href="#" class="blog-btn">Read More<i class='bx bx-right-arrow-alt'></i></a>
            </div>
            <!-- Box 3 -->
            <div class="box">
                <img src="{{ asset('assets/img/car3.jpg') }}" alt="">
                <span>May 15 2022</span>
                <h3>How To Get Perfect Car At Low Price</h3>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Explicabo, veniam.</p>
                <a href="#" class="blog-btn">Read More<i class='bx bx-right-arrow-alt'></i></a>
            </div>
        </div>
    </section>
@endsection
