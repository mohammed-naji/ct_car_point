@extends('front.layout.master')

@section('title', 'Homepage | ' . env('APP_NAME'))

@section('content')

    <br>
    <br>

    <!-- About -->
    <section class="about container" id="about">

        <div class="about-img">
            <img style="padding: 0 50px" src="{{ asset('assets/img/part1.png') }}" alt="">
        </div>

        <div class="about-text">
            <span>BMW</span>

            <h2>Auto Spare Parts</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed laborum blanditiis ratione numquam odio ea!
            </p>

            <p><i class='bx bxs-star'></i> 4.5 (6 Reviews)</p>
            <!-- About Button -->

            <a href="#" class="btn">Buy Now</a>

        </div>
    </section>

    <!-- Parts Section -->
    <section class="parts" id="parts">

        <div class="heading">

            <span>BMW</span>

            <h2>Related Parts</h2>
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



        </div>

    </section>
@endsection
