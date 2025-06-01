<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', env('APP_NAME'))</title>
    <!-- Link To CSS -->

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    @if (app()->getLocale() == 'ar')
        <style>
            @import url('https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Arabic:wght@100;200;300;400;500;600;700&display=swap');

            * {
                font-family: "IBM Plex Sans Arabic", sans-serif;
            }

            body {
                direction: rtl;
                text-align: right;


            }
        </style>
    @endif

    <!-- Box Icons -->

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    @yield('css')
</head>

<body>
    <header>

        <!-- Nav Container -->

        <div class="nav container">

            <!-- Menu Icon -->

            <i class='bx bx-menu' id="menu-icon"></i>



            <!-- Logo -->

            <a href="#" class="logo">Car<span>Point</span></a>

            <!-- Nav List -->

            <ul class="navbar">

                <li><a href="#home" class="active">{{ __('website.nav.home') }}</a></li>

                <li><a href="#cars">{{ __('website.nav.cars') }}</a></li>

                <li><a href="#about">{{ __('website.nav.about') }}</a></li>

                <li><a href="#parts">{{ __('website.nav.parts') }}</a></li>

                <li><a href="#blog">{{ __('website.nav.blogs') }}</a></li>

                @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    @if ($localeCode != app()->getLocale())
                        <li>
                            <a rel="alternate" hreflang="{{ $localeCode }}"
                                href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                {{-- @if ($localeCode == 'ar')
                                    <img width="30" src="{{ asset('flags/ps.png') }}" alt="">
                                @else
                                    <img width="30" src="{{ asset('flags/uk.webp') }}" alt="">
                                @endif
 --}}
                                <img width="30" src="{{ asset('flags/' . $properties['flag']) }}" alt="">
                            </a>
                        </li>
                    @endif
                @endforeach

            </ul>
            <i class='bx bx-search' id="search-icon"></i>

            <!-- Search Box -->

            <div class="search-box container">

                <input type="search" name="" id="" placeholder="Search here...">

            </div>

        </div>

    </header>

    @yield('content')

    <!-- Footer -->
    <section class="footer">
        <div class="footer-container container">

            <div class="footer-box">

                <a href="#" class="logo">Car<span>Point</span></a>

                <div class="social">
                    <a href="#"><i class='bx bxl-facebook'></i></a>
                    <a href="#"><i class='bx bxl-twitter'></i></a>
                    <a href="#"><i class='bx bxl-instagram'></i></a>
                    <a href="#"><i class='bx bxl-youtube'></i></a>
                </div>
            </div>
            <div class="footer-box">
                <h3>Page</h3>
                <a href="#">Home</a>
                <a href="#">Cars</a>
                <a href="#">Parts</a>
                <a href="#">Sales</a>
            </div>
            <div class="footer-box">
                <h3>Legal</h3>
                <a href="#">Privacy</a>
                <a href="#">Refund Policy</a>
                <a href="#">Cookie Policy</a>
            </div>
            <div class="footer-box">
                <h3>Contact</h3>
                <p>United States</p>
                <p>Japan</p>
                <p>Germany</pn>
            </div>
        </div>

    </section>
    <!-- Copyright -->

    <div class="copyright">
        <p>&#169; Farah Elhello </p>
    </div>
    <!-- Link To Js -->
    <script src="{{ asset('assets/js/script.js') }}"></script>
    @yield('js')
</body>

</html>
