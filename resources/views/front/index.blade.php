@extends('front.layout.master')

@section('title', 'Homepage | ' . env('APP_NAME'))

@section('css')
    <style>
        .home-text h1 {
            width: 60%;
        }

        #weather {
            display: flex;
            align-items: center;
            gap: 20px
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

            <span>{{ __('website.types_subtitle') }}</span>
            <h2>{{ __('website.types_title') }}</h2>
            <p>{{ __('website.types_desc') }}</p>
            <!-- Cars Container -->

            <div class="cars-container container">
                @foreach ($types as $type)
                    <div class="box">
                        <a href="{{ route('front.type', $type->id) }}">
                            <img src="{{ asset('storage/' . $type->image) }}" alt="">

                            <h2>{{ $type->trans_name }}</h2>
                        </a>
                    </div>
                @endforeach


            </div>
    </section>

    <!-- About -->
    <section class="about container" id="about">

        <div class="about-img">

            @php
                $src = 'assets/img/about.png';
                if (isset($settings['about_image'])) {
                    $src = 'storage/' . $settings['about_image'];
                }
            @endphp
            <img src="{{ asset($src) }}" alt="">
        </div>

        <div class="about-text">
            <span>{{ $settings['about_subtitle_' . app()->getLocale()] ?? 'About Us' }}</span>

            <h2>{{ $settings['about_title_' . app()->getLocale()] ?? 'Cheap Prices with Quality Cars' }} </h2>
            <p>{{ $settings['about_desc_' . app()->getLocale()] ?? 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero, facere nam quo magni culpa esse.' }}
            </p>

            {{-- :

            <a href="#" class="btn">Learn More</a> --}}

        </div>
    </section>

    <!-- Parts Section -->
    <section class="parts" id="parts">

        <div class="heading">

            <span>{{ __('website.parts_subtitle') }}</span>

            <h2>{{ __('website.parts_title') }}</h2>

            <p>{{ __('website.parts_desc') }}</p>
        </div>
        <!-- Parts Container -->

        <div class="parts-container container">
            @foreach ($parts as $part)
                @include('front.parts.box')
            @endforeach
        </div>

    </section>

    <!-- Blog Container -->
    <section class="blog" id="blog">
        <div class="heading">
            <span>{{ __('website.blog_subtitle') }}</span>
            <h2>{{ __('website.blog_title') }}</h2>
            <p>{{ __('website.blog_desc') }}</p>
        </div>
        <!-- Blog Container -->
        <div class="blog-container container">
            @foreach ($blogs as $blog)
                <div class="box">
                    <img src="{{ asset('storage/' . $blog->image) }}" alt="">
                    <span>{{ $blog->created_at->format('M d Y') }}</span>
                    <h3>{{ $blog->trans_title }}</h3>
                    <p>{{ Str::words(strip_tags($blog->trans_description), 10, '...') }}</p>
                    <a href="{{ route('front.blog', $blog->slug) }}" class="blog-btn">{{ __('website.read_more') }} <i
                            class='bx bx-{{ app()->getLocale() == 'ar' ? 'left' : 'right' }}-arrow-alt'></i></a>
                </div>
            @endforeach


        </div>
    </section>

    <!-- Weather -->
    <section class="weather container" id="weather">
        <img width="60" id="weather_img" src="" alt="">
        <div>
            <p>{{ now()->format('M d, h:ma') }}</p>
            <h2 id="location"></h2>
            <p><span id="temp"></span>°C</p>
        </div>
    </section>
@endsection

@section('js')
    <script src="http://www.geoplugin.net/javascript.gp" type="text/javascript"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            function waitForGeoPlugin(retries = 10) {
                if (typeof geoplugin_countryName === "function") {
                    const country = geoplugin_countryName();
                    const countryCode = geoplugin_countryCode();
                    const city = geoplugin_city();
                    // get the country weather
                    let url =
                        `https://api.openweathermap.org/data/2.5/weather?q=${city}&units=metric&appid=f8f80b0e0f5a492d43c822da6c23328b`

                    // AJAX
                    // jQuery, fetch, axios
                    fetch(url)
                        .then(res => res.json())
                        .then(data => {
                            document.querySelector('#location').innerHTML =
                                `${city}, ${country}, ${countryCode}`
                            document.querySelector('#temp').innerHTML = Math.ceil(data.main.temp)
                            let img_url = `https://openweathermap.org/img/wn/${data.weather[0].icon}@2x.png`
                            document.querySelector('#weather_img').src = img_url
                        }).catch((err) => {
                            console.log(err);

                        });

                } else if (retries > 0) {
                    setTimeout(() => waitForGeoPlugin(retries - 1), 200);
                } else {
                    console.error("GeoPlugin script did not load in time.");
                }
            }

            waitForGeoPlugin();
        });
    </script>

@endsection
