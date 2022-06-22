<!doctype html>
<html lang="{{ LaravelLocalization::getCurrentLocale() }}"
      dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="robots" content="index"/>
    <meta name="description" content="@yield('seo_description', '')"/>
    <meta name="keywords" content="@yield('seo_keywords', '')"/>
    <meta property="og:locale" content="{{ LaravelLocalization::getCurrentLocaleRegional() }}"/>
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="@yield('og_title','Roadstone KSA - Homepage')"/>
    <meta property="og:url" content="{{ env('APP_URL') }}"/>
    <meta property="og:site_name" content="@yield('site_name', 'Roadstone KSA')"/>
    <meta property="og:image" content="{{ settingImage('logo') }}"/>
    <meta property="og:description" content="@yield('og_description', '')"/>
    <!-- Add site Favicon -->
    <link rel="icon" href="{{ settingImage('site-icon') }}" sizes="40x40"/>
    <link rel="icon" href="{{ settingImage('site-icon') }}" sizes="192x192"/>
    <link rel="apple-touch-icon" href="{{ settingImage('site-icon') }}"/>
    <meta name="msapplication-TileImage" content="{{ settingImage('site-icon') }}"/>
    @if(app()->getLocale() == 'ar')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css">
    @else
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
    @endif

    @stack('addional-css')
    <!-- select2 link -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet"/>

    <link rel="stylesheet" href="{{ mix('assets/css/royal-preload.css') }}">

    @if(app()->getLocale() == 'ar')
        <link rel="stylesheet" href="{{ mix('assets/css/style-rtl.css') }}">
    @else
        <link rel="stylesheet" href="{{ mix('assets/css/style.css') }}"/>
    @endif

    @stack('custom-css')

    <title>@yield('title', 'Roadstone KSA - Homepage')</title>

    {!! settingText('scripts-head', 'short_description') !!}
</head>
<body class="royal_preloader" data-lang="{{ app()->getLocale() }}">


@yield('content')


<!-- OWL Carousel  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<!--Bootstrap Js   -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.0/typed.min.js"></script>

<!-- select2 drowpdown link -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<!-- js file -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/ScrollTrigger.min.js"></script>
<script src="{{ mix('assets/js/slick.js') }}"></script>
<script src="{{mix('assets/js/royal_preloader.min.js')}}"></script>
<script src="{{ mix('assets/js/script.js') }}"></script>
<script src="{{ mix('assets/js/main.js') }}"></script>
@stack('js')
@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
<script>
    let scrollDown = document.querySelector(".scrollDown-link");
    //Function that scroll down
    const btnScrollBottom = () => {
        window.scrollTo({
            top: document.body.clientHeight,
            behavior: 'smooth'
        });
    }
    scrollDown.addEventListener('click', btnScrollBottom);
</script>
<script>

    window.jQuery = window.$ = jQuery;
    (function ($) {
        "use strict";
        //Preloader
        Royal_Preloader.config({
            mode: 'logo',
            logo: '{{ settingImage('logo') }}',
            logo_size: [180, 54],
            showProgress: true,
            showPercentage: true,
            text_colour: '#ED1C24',
            background: '#1C1B24'
        });
    })(jQuery);

</script>
{!! settingText('scripts-head', 'short_description') !!}
</body>
</html>
