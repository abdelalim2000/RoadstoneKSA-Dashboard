@extends('layouts.site')
@section('title', 'Roadstone KSA - Homepage')
@section('og_title', 'Roadstone KSA - Homepage')
@section('seo_description',  trans('website.seo.home-seo-description') )
@section('og_description',  trans('website.seo.home-seo-description') )
@section('seo_keywords', trans('website.seo.home-seo-keywords') )

@push('addional-css')
    <!-- Owl carousel js link cdn -->
    <link rel="stylesheet" href="{{ mix('assets/css/owl.carousel.min.css') }}"/>
    <link rel="stylesheet" href="{{ mix('assets/css/owl.theme.default.min.css') }}"/>

@endpush

@section('content')

    <header>
        <nav class="navbar fixed-top ps-md-3">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img class="navbar-brand-logo" src="{{ settingImage('logo') }}" alt="RoadStone KSA"/>
                </a>
                <div class="d-flex ms-auto">
                    <div class="pe-4">
                        <a rel="alternate" hreflang="ar"
                           href="{{ LaravelLocalization::getLocalizedURL('ar', null, [], true) }}"
                           class="lang-link lang-link-ar">
                            {{ ucfirst('ar') }}
                        </a>
                        <span class="curved-line">&sol;</span>
                        <a rel="alternate" hreflang="en"
                           href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}"
                           class="lang-link lang-link-ar">
                            {{ ucfirst('en') }}
                        </a>
                    </div>
                    <span class="lang-nav link">
                        @if(app()->getLocale() == 'ar')
                            <img src="{{ settingImage('arabic-flag') }}" alt="Arabic-flag">
                        @elseif(app()->getLocale() == 'en')
                            <img src="{{ settingImage('english-flag') }}" alt="english-flag">
                        @endif
                    </span>
                </div>
            </div>
        </nav>
    </header>

    @include('includes.nav')

    <main class="main-page scroll-container" id="main">
        <!-- start section seeWorld -->
        <section class="seeWorld-container">
            <video class="video-roadstone" id="ved" muted autoplay="autoplay" loop="loop" playsinline="playsinline"
                   preload="metadata">
                <source src="{{ settingFile('home-video') }}"/>
            </video>
            <header class="see-world">
                <div class="seeWorld-content">
                    <h1 class="seeWorld-heading">
                        {!! trans('website.home.hero-caption') !!}
                    </h1>
                    <div class="pt-3">
                        <p class="seeWorld-desc m-0">
                            {{ trans('website.home.hero-first-description') }}
                        </p>
                        <p class="seeWorld-desc m-0">
                            {{ trans('website.home.hero-second-description') }}
                        </p>
                    </div>
                    <a href="#" class="btn btn-more">{{ trans('website.home.explore-button') }}</a>
                </div>
            </header>
            <a class="scrollDown-link">
                <p class="scroll-down">{{ trans('website.home.scroll-down') }}</p>
                <svg class="arrows" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                     width="27.117" height="36.459" viewBox="0 0 27.117 36.459">
                    <defs>
                        <linearGradient
                            id="linear-gradient"
                            x1="0.5"
                            x2="0.5"
                            y2="1"
                            gradientUnits="objectBoundingBox"
                        >
                            <stop offset="0" stop-color="#fff" stop-opacity="0"/>
                            <stop offset="1" stop-color="#fff"/>
                        </linearGradient>
                    </defs>
                    <g
                        class="arrow"
                        id="svgexport-6_74_"
                        data-name="svgexport-6 (74)"
                        transform="translate(0 12.226)"
                    >
                        <path
                            class="a1"
                            id="Path_422"
                            data-name="Path 422"
                            d="M13.559,195.295l-9.834-9.834L0,189.186l13.559,13.559,13.559-13.559-3.725-3.725Zm0,0"
                            transform="translate(0 -178.512)"
                            fill="url(#linear-gradient)"
                        />
                        <path
                            class="a2"
                            id="Path_423"
                            data-name="Path 423"
                            d="M27.117,4.225,23.392.5l-9.834,9.834L3.725.5,0,4.225,13.559,17.784Zm0,0"
                            transform="translate(0 -3.347)"
                            opacity="0.6"
                            fill="url(#linear-gradient)"
                        />
                        <path
                            class="a3"
                            id="Path_444"
                            data-name="Path 444"
                            d="M27.117,4.225,23.392.5l-9.834,9.834L3.725.5,0,4.225,13.559,17.784Zm0,0"
                            transform="translate(0 -12.726)"
                            opacity="0.2"
                            fill="url(#linear-gradient)"
                        />
                    </g>
                </svg>
            </a>
        </section>
        <!-- end section seeWorld -->

        <!-- Sections  -->
        @forelse($types as $key=>$item)
            <section id="section-{{$key+1}}" class="panel">
                <div class="scene-body d-flex flex-column justify-content-center">
                    <h1 class="section-heading text-uppercase text-center">
                        @php
                            $str = explode(' ',$item->name);
                            $word = explode(' ',$item->name);
                            array_splice($word, -1);
                        @endphp
                        {{ implode($word) }} <span class="span-change-color">{{ end($str) }}</span>
                    </h1>
                    <div class="animate-one">
                        <div class="passenger-svg-content">
                            <svg
                                id="tire-1-line-svg"
                                class="svg-curve-line"
                                width="225.40499877929688"
                                height="81.73500061035156"
                                viewBox="0 0 225.405 81.735"
                            >
                                <g
                                    id="Group_176"
                                    data-name="Group 176"
                                    transform="translate(-419 -949.265)"
                                >
                                    <path
                                        id="Path_481"
                                        data-name="Path 481"
                                        d="M13069.6,1037.867l48.658-72.6h169.148"
                                        transform="translate(-12643 -15)"
                                        fill="none"
                                        stroke="#ed1c24"
                                        stroke-width="2"
                                        class="svg-elem-1"
                                    ></path>
                                    <g
                                        id="Ellipse_27"
                                        data-name="Ellipse 27"
                                        transform="translate(419 1021)"
                                        fill="none"
                                        stroke="#ed1c24"
                                        stroke-width="1.5"
                                    >
                                        <circle
                                            cx="5"
                                            cy="5"
                                            r="5"
                                            stroke="none"
                                            class="svg-elem-2"
                                        ></circle>
                                        <circle
                                            cx="5"
                                            cy="5"
                                            r="4.25"
                                            fill="none"
                                            class="svg-elem-3"
                                        ></circle>
                                    </g>
                                </g>
                            </svg>

                            <div class="passenger-parent-content">
                                <div class="tire-section-one">
                                    <div id="typed-string">
                                        <p class="tire-p d-xl-none d-inline-block">
                                            {{ $item->description }}
                                        </p>
                                    </div>
                                    <span
                                        id="typed"
                                        class="section-typed d-none d-xl-block"
                                    ></span>
                                    <a href=""
                                       class="show-more-section-one text-danger text-uppercase text-decoration-none fw-bold">
                                        {{ trans('website.home.see-more') }}
                                        <img
                                            src="./dist/imgs/seeMorePassenger.png"
                                            class="left-arrow-one"
                                            alt="left arrow"
                                        />
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- //image tire 1  -->
                    </div>
                    <div class="align-items-center d-flex imagee justify-content-center tire-image">
                        <img src="{{ $item->image }}" alt="{{ $item->name }}"/>
                    </div>
                </div>
            </section>
        @empty
        @endforelse

        <!-- start section retailers -->
        <section class="retailers">
            <div class="container py-6">
                <h2 class="section-main-heading retailers-heading pb-5">{{ trans('website.home.retailer') }}</h2>
                <div class="retailersCity owl-carousel owl-theme">
                    @forelse($cities as $item)
                        <div class="city-content">
                            <div class="city riyada" style="background-image: url({{ $item->image }})"></div>
                            <span class="city-name same-dis">{{ $item->name }}</span>
                        </div>
                    @empty
                    @endforelse
                </div>
                <a href="" class="d-block text-center">
                    <button type="button" class="btn btn-more-retailer btn-more">
                        Explore More
                    </button>
                </a>
            </div>
        </section>
        <!-- end section retailers -->
        <!-- start section tireAboutFooter -->
        <section class="tireAboutFooter-container pt-5">
            <div class="tire-size owl-carousel owl-theme">
                <div
                    class="tire-bg tire-bg-x"
                    style="
              background-image: url('./dist/imgs/tire-marking.png');
              background-repeat: no-repeat;
              background-size: cover;
            "
                >
                    <div class="tireSize-content">
                        <h2 class="tireSize-heading">Tire Size Markings</h2>
                        <p class="tireSize-desc">
                            You must check the tire standards when purchasing a tire. If you
                            must replace a tire, you must be aware of the tire standards...
                        </p>
                        <a href="./blog-details.html" class="read-more">
                            <span class="more-tire me-3">Read More</span>
                            <img
                                src="./dist/imgs/readMoreArrow.png"
                                alt="Read More Arrow"
                            />
                        </a>
                    </div>
                </div>
                <div
                    class="tire-bg tire-bg-y"
                    style="
              background-image: url('./dist/imgs/tire-markink2.png');
              background-repeat: no-repeat;
              background-size: cover;
            "
                >
                    <div class="tireSize-content">
                        <h2 class="tireSize-heading">Tire Size Markings</h2>
                        <p class="tireSize-desc">
                            You must check the tire standards when purchasing a tire. If you
                            must replace a tire, you must be aware of the tire standards...
                        </p>
                        <a href="./blog-details.html" class="read-more">
                            <span class="more-tire me-3">Read More</span>
                            <img
                                src="./dist/imgs/readMoreArrow.png"
                                alt="Read More Arrow"
                            />
                        </a>
                    </div>
                </div>
                <div
                    class="tire-bg tire-bg-z"
                    style="
              background-image: url('./dist/imgs/tire-marking.png');
              background-repeat: no-repeat;
              background-size: cover;
            "
                >
                    <div class="tireSize-content">
                        <h2 class="tireSize-heading">Tire Size Markings</h2>
                        <p class="tireSize-desc">
                            You must check the tire standards when purchasing a tire. If you
                            must replace a tire, you must be aware of the tire standards...
                        </p>
                        <a href="./blog-details.html" class="read-more">
                            <span class="more-tire me-3">Read More</span>
                            <img
                                src="./dist/imgs/readMoreArrow.png"
                                alt="Read More Arrow"
                            />
                        </a>
                    </div>
                </div>
            </div>
            <div class="about py-4">
                <div class="container">
                    <h2 class="section-main-heading about-heading pb-3">
                        about roadstone
                    </h2>
                    <p class="about-desc px-md-5">
                        ROADSTONE, associated brand produced by NEXEN TIRE, has Yangsan
                        plant in Korea and 500,000 square meter large Qingdao plant in
                        China, one of the world's biggest Tire markets. And in March 2012,
                        it has opened its third plant in Changnyeong, Korea.
                    </p>
                    <a href="./about.html" class="d-block text-center">
                        <button type="button" class="btn btn-more-retailer btn-more mt-2">
                            read more
                        </button>
                    </a>
                </div>
            </div>
        </section>
        <!-- end section tireAboutFooter -->
    </main>

    <footer class="main-footer down-page">
        <div class="footer-contnet">
            <div class="container-fluid container-fluid-edit">
                <div class="newLetter-Sign">
                    <div class="newLetter-container row justify-content-center">
                        <div
                            class="col-sm-12 col-md-10 d-flex justify-content-between flex-column flex-lg-row"
                        >
                            <h2 class="newLetter-heading mb-0">Newsletter Signup</h2>
                            <form>
                                <div
                                    class="row me-9 justify-content-center justify-content-lg-evenly"
                                >
                                    <div class="col-12 col-sm-8 col-md-7 col-lg-4">
                                        <input
                                            type="text"
                                            class="form-control input-name"
                                            id="fieldInputName"
                                            aria-describedby="nameHelp"
                                            placeholder="Full Name"
                                        />
                                        <small id="nameHelp" class="form-text wrong-text"
                                        >Full name field is required</small
                                        >
                                    </div>
                                    <div class="col-12 col-sm-8 col-md-7 col-lg-4">
                                        <input
                                            type="email"
                                            class="form-control input-email"
                                            id="fieldInputEmail1"
                                            aria-describedby="emailHelp"
                                            placeholder="Email Address"
                                        />
                                        <small id="emailHelp" class="form-text wrong-text"
                                        >Email field is required</small
                                        >
                                    </div>
                                    <div
                                        class="col-12 col-md-10 col-lg-2 d-flex justify-content-center"
                                    >
                                        <a href="#" class="text-decoration-none">
                                            <button type="submit" class="btn btn-submit">
                                                Submit
                                                <img
                                                    src="./dist/imgs/readMoreArrow.png"
                                                    alt="Arrow Icon"
                                                />
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div
                            class="col-12 col-md-10 col-lg-2 d-flex justify-content-center justify-content-lg-end"
                        >
                            <a class="btn-back-up">
                                <svg
                                    class="arrows-back back-up"
                                    xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="27.117"
                                    height="36.459"
                                    viewBox="0 0 27.117 36.459"
                                >
                                    <defs>
                                        <linearGradient
                                            id="linear-gradient"
                                            x1="0.5"
                                            x2="0.5"
                                            y2="1"
                                            gradientUnits="objectBoundingBox"
                                        >
                                            <stop
                                                offset="0"
                                                stop-color="#fff"
                                                stop-opacity="0"
                                            />
                                            <stop offset="1" stop-color="#fff"/>
                                        </linearGradient>
                                    </defs>
                                    <g
                                        class="arrows-back"
                                        id="svgexport-6_74_"
                                        data-name="svgexport-6 (74)"
                                        transform="translate(0 12.226)"
                                    >
                                        <path
                                            class="b1"
                                            id="Path_422"
                                            data-name="Path 422"
                                            d="M13.559,195.295l-9.834-9.834L0,189.186l13.559,13.559,13.559-13.559-3.725-3.725Zm0,0"
                                            transform="translate(0 -178.512)"
                                            fill="url(#linear-gradient)"
                                        />
                                        <path
                                            class="b2"
                                            id="Path_423"
                                            data-name="Path 423"
                                            d="M27.117,4.225,23.392.5l-9.834,9.834L3.725.5,0,4.225,13.559,17.784Zm0,0"
                                            transform="translate(0 -3.34)"
                                            opacity="0.6"
                                            fill="url(#linear-gradient)"
                                        />
                                        <path
                                            class="b3"
                                            id="Path_444"
                                            data-name="Path 444"
                                            d="M27.117,4.225,23.392.5l-9.834,9.834L3.725.5,0,4.225,13.559,17.784Zm0,0"
                                            transform="translate(0 -12.726)"
                                            opacity="0.2"
                                            fill="url(#linear-gradient)"
                                        />
                                    </g>
                                </svg>
                                <span class="back-to-up">back to top</span>
                            </a>
                        </div>
                    </div>
                </div>
                <hr class="hr-line"/>
                <div
                    class="d-flex justify-content-between flex-column flex-lg-row"
                >
                    <ul class="nav">
                        <li class="nav-item menu-item list-inline">
                            <a class="nav-link menu-link ps-0" href="#">tires</a>
                        </li>
                        <li class="nav-item menu-item list-unstyled list-inline-item">
                            <a class="nav-link menu-link" href="#">retailers</a>
                        </li>
                        <li class="nav-item menu-item list-unstyled list-inline-item">
                            <a class="nav-link menu-link" href="#">about roadstone</a>
                        </li>
                        <li class="nav-item menu-item list-unstyled list-inline-item">
                            <a class="nav-link menu-link" href="#">blogs</a>
                        </li>
                        <li class="nav-item menu-item list-unstyled list-inline-item">
                            <a class="nav-link menu-link" href="#">contact us</a>
                        </li>
                    </ul>
                    <ul class="social-container list-inline">
                        <li class="social-item list-unstyled list-inline-item">
                            <a href="#">
                                <img
                                    class="social-icon"
                                    src="./dist/imgs/facebook.png"
                                    alt="facebook icon"
                                />
                            </a>
                        </li>
                        <li class="social-item list-unstyled list-inline-item">
                            <a href="#">
                                <img
                                    class="social-icon"
                                    src="./dist/imgs/instagram.png"
                                    alt="instagram icon"
                                />
                            </a>
                        </li>
                        <li class="social-item list-unstyled list-inline-item">
                            <a href="#">
                                <img
                                    class="social-icon me-0"
                                    src="./dist/imgs/twitter.png"
                                    alt="twitter icon"
                                />
                            </a>
                        </li>
                    </ul>
                </div>
                <hr class="hr-line"/>
                <div
                    class="global-footer text-center d-flex justify-content-between align-items-center py-2 flex-column flex-lg-row"
                >
                    <div class="copy-right ps-0">
                        COPYRIGHT© 2022 Arabian Tires Group. ALL RIGHTS RESERVED.
                    </div>
                    <ul class="footer-terms list-inline m-0">
                        <li class="footer-terms-item list-unstyled list-inline-item">
                            <a class="nav-link menu-link" href="#">Privacy Policy</a>
                        </li>
                        <li class="footer-terms-item list-unstyled list-inline-item">
                            <a class="nav-link menu-link" href="#"
                            >Terms Of Conditions</a
                            >
                        </li>
                        <li class="footer-terms-item list-unstyled list-inline-item">
                            <a class="nav-link menu-link pe-0" href="#"
                            >Terms Of Conditions</a
                            >
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

@endsection
