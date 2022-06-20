@extends('layouts.site')
@section('title', 'Roadstone KSA - Guide & Blogs')
@section('og_title', 'Roadstone KSA - Guide & Blogs')
@section('seo_description',  trans('website.seo.blog-seo-description') )
@section('og_description',  trans('website.seo.blog-seo-description') )
@section('seo_keywords', trans('website.seo.blog-seo-keywords') )

@section('content')

    <header class="guide-header">
        <nav class="navbar fixed-top ps-md-3">
            <div class="container-fluid">
                <a class="navbar-brand"  href="./index.html">
                    <img class="navbar-brand-logo" src="./dist/imgs/RoadstoneLodowhite.png" alt="RoadStone Logo"></a>
                <div class="d-flex ms-auto">
                    <div class="pe-4">
                        <a class="lang-link lang-link-ar" href="#">Ar</a>
                        <span class="curved-line">&sol;</span>
                        <a class="lang-link lang-link-ar" href="./index.html">En</a>
                    </div>
                    <span class="lang-nav link"><img src="./dist/imgs/Flag_of_Saudi_Arabia.png" alt="Flag of Saudi Arabia"></span>
                </div>
            </div>
        </nav>
        <div class="guide-header-bg"></div>
    </header>

    @include('includes.nav')

    <main class="guide-main">
        <!-- start section guide -->
        <section class="guide-container">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="breadcrumb-link" href="./index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Guide & Blogs</li>
                    </ol>
                </nav>
                <section class="our-recent-news">
                    <header>
                        <h1 class="recent-news-heading">read our most recent news</h1>
                    </header>
                    <div class="tire-size-blogs">
                        <div class="row">
                            <div class="col-md-6 col-lg-4 mb-5">
                                <div class="tire-size-container">
                                    <a href="./bolg-details.html" class="text-decoration-none">
                                        <div class="img-tire-content">
                                            <img src="./dist/imgs/tire-marking.png" class="w-100" alt="Tire Marking Picture">
                                        </div>
                                        <div class="tire-size-details">
                                            <h2 class="tire-size-heading">Tire Size Markings</h2>
                                            <p class="tire-size-desc">You must check the tire standards when purchasing a tire. If you must replace a tire, you must be aware of the tire standards...</p>
                                            <a href="#" class="read-more">
                                                <span class="more-tire me-3">Read More</span>
                                                <svg class="arrow-right" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="22.883" height="17.02" viewBox="0 0 22.883 17.02">
                                                    <defs>
                                                        <linearGradient id="linear-gradient" x1="0.5" x2="0.5" y2="1" gradientUnits="objectBoundingBox">
                                                            <stop offset="0" stop-color="#fff" stop-opacity="0"/>
                                                            <stop offset="1" stop-color="#fff"/>
                                                        </linearGradient>
                                                    </defs>
                                                    <g class="arrows-right" id="svgexport-6_74_" data-name="svgexport-6 (74)" transform="translate(12.226 17.02) rotate(-90)">
                                                        <path class="path1" id="Path_422" data-name="Path 422" d="M8.51,191.633l-6.172-6.172L0,187.8l8.51,8.51,8.51-8.51-2.338-2.338Zm0,0" transform="translate(0 -185.652)" fill="url(#linear-gradient)"/>
                                                        <path class="path2" id="Path_423" data-name="Path 423" d="M17.02,2.838,14.682.5,8.51,6.672,2.338.5,0,2.838l8.51,8.51Zm0,0" transform="translate(0 -6.839)" opacity="0.6" fill="url(#linear-gradient)"/>
                                                        <path class="path3" id="Path_444" data-name="Path 444" d="M17.02,2.838,14.682.5,8.51,6.672,2.338.5,0,2.838l8.51,8.51Zm0,0" transform="translate(0 -12.726)" opacity="0.2" fill="url(#linear-gradient)"/>
                                                    </g>
                                                </svg>
                                            </a>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4 mb-5">
                                <div class="tire-size-container">
                                    <a href="./bolg-details.html" class="text-decoration-none">
                                        <div class="img-tire-content">
                                            <img src="./dist/imgs/tire-marking.png" class="w-100" alt="Tire Marking Picture">
                                        </div>
                                        <div class="tire-size-details">
                                            <h2 class="tire-size-heading">Tire Size Markings</h2>
                                            <p class="tire-size-desc">You must check the tire standards when purchasing a tire. If you must replace a tire, you must be aware of the tire standards...</p>
                                            <a href="#" class="read-more">
                                                <span class="more-tire me-3">Read More</span>
                                                <svg class="arrow-right" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="22.883" height="17.02" viewBox="0 0 22.883 17.02">
                                                    <defs>
                                                        <linearGradient id="linear-gradient" x1="0.5" x2="0.5" y2="1" gradientUnits="objectBoundingBox">
                                                            <stop offset="0" stop-color="#fff" stop-opacity="0"/>
                                                            <stop offset="1" stop-color="#fff"/>
                                                        </linearGradient>
                                                    </defs>
                                                    <g class="arrows-right" id="svgexport-6_74_" data-name="svgexport-6 (74)" transform="translate(12.226 17.02) rotate(-90)">
                                                        <path class="path1" id="Path_422" data-name="Path 422" d="M8.51,191.633l-6.172-6.172L0,187.8l8.51,8.51,8.51-8.51-2.338-2.338Zm0,0" transform="translate(0 -185.652)" fill="url(#linear-gradient)"/>
                                                        <path class="path2" id="Path_423" data-name="Path 423" d="M17.02,2.838,14.682.5,8.51,6.672,2.338.5,0,2.838l8.51,8.51Zm0,0" transform="translate(0 -6.839)" opacity="0.6" fill="url(#linear-gradient)"/>
                                                        <path class="path3" id="Path_444" data-name="Path 444" d="M17.02,2.838,14.682.5,8.51,6.672,2.338.5,0,2.838l8.51,8.51Zm0,0" transform="translate(0 -12.726)" opacity="0.2" fill="url(#linear-gradient)"/>
                                                    </g>
                                                </svg>
                                            </a>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4 mb-5">
                                <div class="tire-size-container">
                                    <a href="./bolg-details.html" class="text-decoration-none">
                                        <div class="img-tire-content">
                                            <img src="./dist/imgs/tire-marking.png" class="w-100" alt="Tire Marking Picture">
                                        </div>
                                        <div class="tire-size-details">
                                            <h2 class="tire-size-heading">Tire Size Markings</h2>
                                            <p class="tire-size-desc">You must check the tire standards when purchasing a tire. If you must replace a tire, you must be aware of the tire standards...</p>
                                            <a href="#" class="read-more">
                                                <span class="more-tire me-3">Read More</span>
                                                <svg class="arrow-right" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="22.883" height="17.02" viewBox="0 0 22.883 17.02">
                                                    <defs>
                                                        <linearGradient id="linear-gradient" x1="0.5" x2="0.5" y2="1" gradientUnits="objectBoundingBox">
                                                            <stop offset="0" stop-color="#fff" stop-opacity="0"/>
                                                            <stop offset="1" stop-color="#fff"/>
                                                        </linearGradient>
                                                    </defs>
                                                    <g class="arrows-right" id="svgexport-6_74_" data-name="svgexport-6 (74)" transform="translate(12.226 17.02) rotate(-90)">
                                                        <path class="path1" id="Path_422" data-name="Path 422" d="M8.51,191.633l-6.172-6.172L0,187.8l8.51,8.51,8.51-8.51-2.338-2.338Zm0,0" transform="translate(0 -185.652)" fill="url(#linear-gradient)"/>
                                                        <path class="path2" id="Path_423" data-name="Path 423" d="M17.02,2.838,14.682.5,8.51,6.672,2.338.5,0,2.838l8.51,8.51Zm0,0" transform="translate(0 -6.839)" opacity="0.6" fill="url(#linear-gradient)"/>
                                                        <path class="path3" id="Path_444" data-name="Path 444" d="M17.02,2.838,14.682.5,8.51,6.672,2.338.5,0,2.838l8.51,8.51Zm0,0" transform="translate(0 -12.726)" opacity="0.2" fill="url(#linear-gradient)"/>
                                                    </g>
                                                </svg>
                                            </a>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4 mb-5">
                                <div class="tire-size-container">
                                    <a href="./bolg-details.html" class="text-decoration-none">
                                        <div class="img-tire-content">
                                            <img src="./dist/imgs/tire-marking.png" class="w-100" alt="Tire Marking Picture">
                                        </div>
                                        <div class="tire-size-details">
                                            <h2 class="tire-size-heading">Tire Size Markings</h2>
                                            <p class="tire-size-desc">You must check the tire standards when purchasing a tire. If you must replace a tire, you must be aware of the tire standards...</p>
                                            <a href="#" class="read-more">
                                                <span class="more-tire me-3">Read More</span>
                                                <svg class="arrow-right" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="22.883" height="17.02" viewBox="0 0 22.883 17.02">
                                                    <defs>
                                                        <linearGradient id="linear-gradient" x1="0.5" x2="0.5" y2="1" gradientUnits="objectBoundingBox">
                                                            <stop offset="0" stop-color="#fff" stop-opacity="0"/>
                                                            <stop offset="1" stop-color="#fff"/>
                                                        </linearGradient>
                                                    </defs>
                                                    <g class="arrows-right" id="svgexport-6_74_" data-name="svgexport-6 (74)" transform="translate(12.226 17.02) rotate(-90)">
                                                        <path class="path1" id="Path_422" data-name="Path 422" d="M8.51,191.633l-6.172-6.172L0,187.8l8.51,8.51,8.51-8.51-2.338-2.338Zm0,0" transform="translate(0 -185.652)" fill="url(#linear-gradient)"/>
                                                        <path class="path2" id="Path_423" data-name="Path 423" d="M17.02,2.838,14.682.5,8.51,6.672,2.338.5,0,2.838l8.51,8.51Zm0,0" transform="translate(0 -6.839)" opacity="0.6" fill="url(#linear-gradient)"/>
                                                        <path class="path3" id="Path_444" data-name="Path 444" d="M17.02,2.838,14.682.5,8.51,6.672,2.338.5,0,2.838l8.51,8.51Zm0,0" transform="translate(0 -12.726)" opacity="0.2" fill="url(#linear-gradient)"/>
                                                    </g>
                                                </svg>
                                            </a>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4 mb-5">
                                <div class="tire-size-container">
                                    <a href="./bolg-details.html" class="text-decoration-none">
                                        <div class="img-tire-content">
                                            <img src="./dist/imgs/tire-marking.png" class="w-100" alt="Tire Marking Picture">
                                        </div>
                                        <div class="tire-size-details">
                                            <h2 class="tire-size-heading">Tire Size Markings</h2>
                                            <p class="tire-size-desc">You must check the tire standards when purchasing a tire. If you must replace a tire, you must be aware of the tire standards...</p>
                                            <a href="#" class="read-more">
                                                <span class="more-tire me-3">Read More</span>
                                                <svg class="arrow-right" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="22.883" height="17.02" viewBox="0 0 22.883 17.02">
                                                    <defs>
                                                        <linearGradient id="linear-gradient" x1="0.5" x2="0.5" y2="1" gradientUnits="objectBoundingBox">
                                                            <stop offset="0" stop-color="#fff" stop-opacity="0"/>
                                                            <stop offset="1" stop-color="#fff"/>
                                                        </linearGradient>
                                                    </defs>
                                                    <g class="arrows-right" id="svgexport-6_74_" data-name="svgexport-6 (74)" transform="translate(12.226 17.02) rotate(-90)">
                                                        <path class="path1" id="Path_422" data-name="Path 422" d="M8.51,191.633l-6.172-6.172L0,187.8l8.51,8.51,8.51-8.51-2.338-2.338Zm0,0" transform="translate(0 -185.652)" fill="url(#linear-gradient)"/>
                                                        <path class="path2" id="Path_423" data-name="Path 423" d="M17.02,2.838,14.682.5,8.51,6.672,2.338.5,0,2.838l8.51,8.51Zm0,0" transform="translate(0 -6.839)" opacity="0.6" fill="url(#linear-gradient)"/>
                                                        <path class="path3" id="Path_444" data-name="Path 444" d="M17.02,2.838,14.682.5,8.51,6.672,2.338.5,0,2.838l8.51,8.51Zm0,0" transform="translate(0 -12.726)" opacity="0.2" fill="url(#linear-gradient)"/>
                                                    </g>
                                                </svg>
                                            </a>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4 mb-5">
                                <div class="tire-size-container">
                                    <a href="./bolg-details.html" class="text-decoration-none">
                                        <div class="img-tire-content">
                                            <img src="./dist/imgs/tire-marking.png" class="w-100" alt="Tire Marking Picture">
                                        </div>
                                        <div class="tire-size-details">
                                            <h2 class="tire-size-heading">Tire Size Markings</h2>
                                            <p class="tire-size-desc">You must check the tire standards when purchasing a tire. If you must replace a tire, you must be aware of the tire standards...</p>
                                            <a href="#" class="read-more">
                                                <span class="more-tire me-3">Read More</span>
                                                <svg class="arrow-right" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="22.883" height="17.02" viewBox="0 0 22.883 17.02">
                                                    <defs>
                                                        <linearGradient id="linear-gradient" x1="0.5" x2="0.5" y2="1" gradientUnits="objectBoundingBox">
                                                            <stop offset="0" stop-color="#fff" stop-opacity="0"/>
                                                            <stop offset="1" stop-color="#fff"/>
                                                        </linearGradient>
                                                    </defs>
                                                    <g class="arrows-right" id="svgexport-6_74_" data-name="svgexport-6 (74)" transform="translate(12.226 17.02) rotate(-90)">
                                                        <path class="path1" id="Path_422" data-name="Path 422" d="M8.51,191.633l-6.172-6.172L0,187.8l8.51,8.51,8.51-8.51-2.338-2.338Zm0,0" transform="translate(0 -185.652)" fill="url(#linear-gradient)"/>
                                                        <path class="path2" id="Path_423" data-name="Path 423" d="M17.02,2.838,14.682.5,8.51,6.672,2.338.5,0,2.838l8.51,8.51Zm0,0" transform="translate(0 -6.839)" opacity="0.6" fill="url(#linear-gradient)"/>
                                                        <path class="path3" id="Path_444" data-name="Path 444" d="M17.02,2.838,14.682.5,8.51,6.672,2.338.5,0,2.838l8.51,8.51Zm0,0" transform="translate(0 -12.726)" opacity="0.2" fill="url(#linear-gradient)"/>
                                                    </g>
                                                </svg>
                                            </a>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <nav aria-label="...">
                            <ul class="pagination justify-content-center">
                                <li class="page-item disabled">
                                    <a class="page-link active" href="#" tabindex="-1" aria-disabled="true">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item" aria-current="page">
                                    <a class="page-link" href="#">2</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </section>
            </div>
        </section>
        <!-- end section guide -->
    </main>

    @include('includes.footer')

@endsection
